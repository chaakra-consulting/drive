<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Manajemen_Detail_Data_Project extends BaseController
{
   protected $db;
  public function __construct()
  {
    $this->db = \Config\Database::connect();
  }
  public function index($id)
  {
    $data = [
      'data' => $this->db->query("SELECT a.`ukuran_file`, a.`judul`,a.`id`,a.`nama_file`,a.`pesan`,a.`id_pembuat`,c.`fullname`,b.`nama`,b.`tahun`,a.`create_at` FROM detail_data_project a LEFT JOIN data_project b ON a.`id_project`=b.`id` LEFT JOIN users c ON a.`id_pembuat`=c.`id` WHERE a.`id_project`=$id")->getResult(),
      'data_project' => $this->db->query("SELECT * FROM data_project WHERE id=$id")->getResult(),
      'menu' => 'manajemen_detail__data_project'
    ];
    // if($id==""){
    //     $id2 = session()->get('id_proyek');
    //     $data = [
    //       'data' => $this->db->query("SELECT a.`judul`,a.`id`,a.`nama_file`,a.`pesan`,c.`fullname`,b.`nama`,b.`tahun`,a.`create_at` FROM detail_data_project a LEFT JOIN data_project b ON a.`id_project`=b.`id` LEFT JOIN users c ON a.`id_pembuat`=c.`id` WHERE a.`id_project`=$id2")->getResult(),
    //       'data_project' => $this->db->query("SELECT * FROM data_project WHERE id=$id2")->getResult(),
    //       'menu' => 'manajemen_detail__data_project'
    //     ];
    // }else{
    //   if($id!=session()->get('id_proyek')){
    //     session()->set('id_proyek', $id);
    //     $id2 = session()->get('id_proyek');
    //     $data = [
    //       'data' => $this->db->query("SELECT a.`judul`,a.`id`,a.`nama_file`,a.`pesan`,c.`fullname`,b.`nama`,b.`tahun`,a.`create_at` FROM detail_data_project a LEFT JOIN data_project b ON a.`id_project`=b.`id` LEFT JOIN users c ON a.`id_pembuat`=c.`id` WHERE a.`id_project`=$id2")->getResult(),
    //       'data_project' => $this->db->query("SELECT * FROM data_project WHERE id=$id2")->getResult(),
    //       'menu' => 'manajemen_detail__data_project'
    //     ];
    //   }else{
    //     $id2 = $id;
    //     $data = [
    //       'data' => $this->db->query("SELECT a.`judul`,a.`id`,a.`nama_file`,a.`pesan`,c.`fullname`,b.`nama`,b.`tahun`,a.`create_at` FROM detail_data_project a LEFT JOIN data_project b ON a.`id_project`=b.`id` LEFT JOIN users c ON a.`id_pembuat`=c.`id` WHERE a.`id_project`=$id2")->getResult(),
    //       'data_project' => $this->db->query("SELECT * FROM data_project WHERE id=$id2")->getResult(),
    //       'menu' => 'manajemen_detail__data_project'
    //     ];
    //   }
    // }
    return view('manajemen_detail_data_project', $data);
  }
  public function tambah()
  {
    $id_pembuat = user()->id;
    $id_project = session()->get('id_proyek');
    $judul      = $this->request->getPost("judul");
    $pesan      = $this->request->getPost("pesan");

    // 1. Ambil nama file dari POST (sekarang berupa teks/string dari FilePond, BUKAN file lagi)
    $tempFileName = $this->request->getPost('file_project');

    if (!empty($tempFileName)) {
        
        // Definisikan path awal (file sementara) dan path tujuan (file akhir)
        $tempPath = WRITEPATH . 'uploads/temp/' . $tempFileName;
        
        // FCPATH otomatis menunjuk ke folder 'public' Anda. Ini setara dengan WRITEPATH . '../public/file/'
        $direktoriTarget = FCPATH . 'file/'; 

        // 2. Cek apakah file benar-benar ada di folder sementara
        if (file_exists($tempPath)) {
            
            // Inisialisasi object File CI4 dari file fisik untuk mendapatkan informasi ukuran
            $file = new \CodeIgniter\Files\File($tempPath);
            $size_kb = $file->getSize();
            
            // 3. Format nama file baru sesuai standar Anda
            // Catatan: $tempFileName sudah membawa ekstensi file dari proses upload_temp
            $name = $id_project . ' - ' . $id_pembuat . ' - ' . date("Y-m-d h.i.sa") . ' - ' . $tempFileName;
            
            $finalPath = $direktoriTarget . $name;

            // 4. Pindahkan file dari temp ke folder akhir menggunakan fungsi bawaan PHP rename()
            if (rename($tempPath, $finalPath)) {
                var_dump("INSERT INTO detail_data_project (nama_file, judul, create_at, id_pembuat, pesan, id_project, ukuran_file) VALUES ('" . $name . "', '$judul', now(), $id_pembuat, '$pesan', $id_project, $size_kb)");
                // 5. Simpan ke Database
                $query = $this->db->query("INSERT INTO detail_data_project (nama_file, judul, create_at, id_pembuat, pesan, id_project, ukuran_file) VALUES ('" . $name . "', '$judul', now(), $id_pembuat, '$pesan', $id_project, $size_kb)");
                
                session()->setFlashdata("pesan", "Berhasil Menambahkan File");
            } else {
                session()->setFlashdata("pesan-danger", "Gagal Memindahkan File dari folder sementara.");
            }
        } else {
            session()->setFlashdata("pesan-danger", "File tidak ditemukan di server. Silakan upload ulang.");
        }
    } else {
        session()->setFlashdata("pesan-danger", "Harus menyertakan file");
    }

    return redirect()->to('/detail_project_saya/' . $id_project);
  }
  public function hapus()
  {
    $id = user()->id;
    $id_file = $this->request->getPost("id_file");
    $data = $this->db->query("SELECT * FROM detail_data_project where id=$id_file")->getResult();
    unlink(FCPATH . 'file\file-' . $data[0]->nama_file);
    $this->db->query("DELETE FROM detail_data_project where id=$id_file");
    session()->setFlashdata("pesan-danger", "File proyek berhasil dihapus");
    return redirect()->to('/detail_data_project');
  }
  public function download()
  {
    $id_file = $this->request->getPost("id_file");
    $data = $this->db->query("SELECT * FROM detail_data_project where id=$id_file")->getResult();
    return $this->response->download(FCPATH . 'file\file-' . $data[0]->nama_file, null);
  }
}
