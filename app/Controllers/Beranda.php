<?php

namespace App\Controllers;

use Config\Database;
use CodeIgniter\Files\File;

use App\Controllers\BaseController;
use function PHPUnit\Framework\isNull;

class Beranda extends BaseController
{
  protected $db;
  protected $helpers = ['form'];

  public function __construct()
  {
      $this->db = \Config\Database::connect();
  }
  public function index()
  {
    if (in_groups('admin') == true || in_groups('super admin') == true) {
      $data = [
        // 'menu' => 'beranda',
        'detail_proyek' => $this->db->query("SELECT *,a.create_at as dibuat FROM detail_data_project a LEFT JOIN data_project b ON a.`id_project`=b.`id` LEFT JOIN users c ON a.`id_pembuat`=c.`id` LIMIT 10")->getResult(),
        // 'proyek' => $this->db->query("SELECT *, SUM(a.`ukuran_file`) AS total_size FROM detail_data_project a LEFT JOIN data_project b ON a.`id_project`=b.`id` GROUP BY b.`id` order by total_size desc")->getResult(),
        'pengunjung' => $this->db->query("SELECT * FROM auth_logins a LEFT JOIN users b ON a.`user_id`=b.`id` ORDER BY DATE DESC LIMIT 5")->getResult(),
        'jumlah_proyek' => $this->db->query("SELECT COUNT(id) AS jumlah FROM data_project")->getResult()[0]->jumlah,
        'total_penyimpanan_digunakan' => $this->db->query("SELECT SUM(ukuran_file) AS jumlah FROM detail_data_project")->getResult()[0]->jumlah,
        'maksimal_penyimpanan' => 5368709120
      ];
      return view('beranda_admin', $data);
    } else {
      $data = [
        'jumlah_proyek' => $this->db->query("SELECT COUNT(id) AS jumlah FROM permisions_project where id_user=" . user()->id)->getResult(),
        'jumlah_data_saya' => $this->db->query("SELECT COUNT(id) AS jumlah FROM detail_data_project WHERE id_pembuat=" . user()->id)->getResult(),
        'jumlah_semua_data' => $this->db->query("SELECT COUNT(id) AS jumlah FROM detail_data_project")->getResult(),
        'menu' => 'manajemen_data_Project',
        'total_storage' => $this->db->query("SELECT SUM(ukuran_file) AS total FROM detail_data_project WHERE id_pembuat=" . user()->id)->getResult(),
      ];
      return view('beranda', $data);
    }
  }
  public function coba()
  {
  }
  public function ubahprofil()
  {
    $id = $this->request->getPost("id");
    $fullname = $this->request->getPost("fullname");
    $username = $this->request->getPost("username");
    $email = $this->request->getPost("email");
    $jabatan = $this->request->getPost("jabatan");
    $nama = $_FILES['foto']['name'];

    if ($nama != '') {
      //$request = \Config\Services::request();
      $file = $this->request->getFile('foto');
      $name = $file->getName(); // Mengetahui Nama File
      $originalName = $file->getClientName(); // Mengetahui Nama Asli
      $tempfile = $file->getTempName(); // Mengetahui Nama TMP File name
      $ext = $file->getClientExtension(); // Mengetahui extensi File
      $type = $file->getClientMimeType(); // Mengetahui Mime File
      $size_kb = $file->getSize('kb'); // Mengetahui Ukuran File dalam kb
      $size_mb = $file->getSize('mb'); // Mengetahui Ukuran File dalam mb

      //$namabaru = $file->getRandomName();//define nama fiel yang baru secara acak

      if ($type == (('image/png') or ('image/jpeg'))) //cek mime file
      {  // File Tipe Sesuai
        // $image = \Config\Services::image('gd'); //Load Image Libray
        // $info = $image->withFile($file)->getFile()->getProperties(true); //Mendapatkan Files Propertis
        // $width = $info['width']; // Mengetahui Image Width
        // $height = $info['height']; // Mengetahui Image Height

        helper('filesystem'); // Load Helper File System
        $direktori = WRITEPATH . '../public/foto/'; //definisikan direktori upload
        $map = directory_map($direktori, FALSE, TRUE); // List direktori

        /* Cek File apakah ada */
        foreach ($map as $key) {
          if ($key == $name) {
            delete_files($direktori, $name); //Hapus terlebih dahulu jika file ada
          }
        }

        $upload = $this->request->getFile('foto');
        $ex_upload = $upload->move(WRITEPATH . '../public/foto/');

        if ($ex_upload) {
          $query = $this->db->query("UPDATE users SET jabatan='$jabatan',username='$username', fullname='$fullname', email='$email', image='" . $name . "' where id=$id");
          session()->setFlashdata("pesan", "Informasi Profil Berhasil Diperbarui");
        } else {
          session()->setFlashdata("pesan-danger", "Informasi Profil Gagal Diperbarui");
        }
      } else {
        session()->setFlashdata("pesan-danger", "Format Tidak Sesuai, Gunakan ekstension JPG/PNG");
      }
    } else {
      $this->db->query("UPDATE users SET jabatan='$jabatan',username='$username', fullname='$fullname', email='$email' where id=$id");
      session()->setFlashdata("pesan", "Informasi Profil Berhasil Diperbarui");
    }
    return redirect()->to('/');
  }
  public function ubahsosmed()
  {
    $id = $this->request->getPost("id");
    $instagram = $this->request->getPost("instagram");
    $twitter = $this->request->getPost("twitter");
    $github = $this->request->getPost("github");
    $linkedin = $this->request->getPost("linkedin");
    $portofolio = $this->request->getPost("portofolio");
    $this->db->query("UPDATE users SET instagram='$instagram',twitter='$twitter',github='$github',linkedin='$linkedin',portofolio='$portofolio' WHERE id=$id");
    session()->setFlashdata("pesan", "Data Sosial Media Berhasil Diubah.");
    return redirect()->to('/');
  }
}
