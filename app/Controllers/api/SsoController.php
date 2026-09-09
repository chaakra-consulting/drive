<?php

namespace App\Controllers\Api;

use Myth\Auth\Config\Services;
use App\Controllers\BaseController;

class SsoController extends BaseController
{
    protected $session;
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->session = Services::session();
    }
    public function index()
    {
        $user_id = user_id();
        $getSsoData = $this->get_api('http://localhost/loginssochaakra/api/AppController/getUserApp/' . $user_id . '/drive');
        $getSsoData = json_decode($getSsoData);

        $data = [
            'sso_data' => $getSsoData,
            'session' => session(),
            // 'user' => $user,
        ];
        // var_dump($data['session']);
        // exit;

        // Kirimkan data ke tampilan
        return view('sso', $data);
    }
    public function sync_sso()
    {
        $data = [
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
        ];

        $cek_user = $this->post_api('http://localhost/loginssochaakra/api/UserController/cek_login', $data);
        $getRespon = json_decode($cek_user);
        $userId = user()->id; // Dapatkan ID user yang sedang login

        $getRole = $this->db->table('auth_groups_users')
            ->select('auth_groups.id') // Ambil nama role
            ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id') // Join ke tabel auth_groups
            ->where('auth_groups_users.user_id', $userId) // Filter berdasarkan user yang login
            ->distinct()
            ->get()
            ->getResultArray(); // Ambil semua role user dalam bentuk array
        $roleId = !empty($getRole) ? $getRole[0]['id'] : null;
        // var_dump($roleId);
        // die;
        if ($getRespon->success == false) {
            session()->setFlashdata('error', 'Akun SSO tidak ada');
            return redirect()->to(route_to('sync-login-sso'));
        } else {
            $create_data = [
                'user_id' => $getRespon->data_user->id,
                'app_key' => 'drive',
                'user_app_id' => user_id(),
                'role' => $roleId,
                'redirect_url' => '-'
            ];
            // var_dump($create_data);
            // exit;

            $createUserApp = $this->post_api('http://localhost/loginssochaakra/api/AppController/createUserApp', $create_data);
            $getResponCreate = json_decode($createUserApp);

            if ($getResponCreate->success) {
                session()->setFlashdata('success', 'Akun SSO Berhasil Di Sync');
            } else {
                session()->setFlashdata('error', 'Akun SSO Gagal Di Sync');
            }
        }

        return redirect()->to(route_to('sync-login-sso'));
    }

    function post_api($url, $data)
    {
        // Encode data menjadi JSON
        $postData = http_build_query($data);

        // Inisialisasi cURL
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

        // Set Header untuk JSON
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/x-www-form-urlencoded',
            'Content-Length: ' . strlen($postData)
        ]);

        // Eksekusi request dan mendapatkan hasilnya
        $response = curl_exec($ch);

        // Cek error saat request
        if ($response === false) {
            echo 'Curl error: ' . curl_error($ch);
            curl_close($ch);
            return false;
        }

        curl_close($ch);

        // Kembalikan hasil response
        return $response;
    }
    function get_api($url, $headers = [])
    {
        // Inisialisasi cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPGET, true);

        // Set Header jika ada
        if (!empty($headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        // Eksekusi request dan mendapatkan hasilnya
        $response = curl_exec($ch);

        // Cek error saat request
        if ($response === false) {
            log_message('error', 'Curl error: ' . curl_error($ch));
            curl_close($ch);
            return false;
        }

        // Tutup cURL
        curl_close($ch);

        // Mengembalikan hasil response
        return $response;
    }
}
