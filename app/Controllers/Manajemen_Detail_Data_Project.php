<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use ZipArchive;

class Manajemen_Detail_Data_Project extends BaseController
{
  protected $db;
  public function __construct()
  {
    $this->db = \Config\Database::connect();
  }
  public function index()
  {
    $id = $this->request->getPost("id_proyek");
    if ($id == "") {
      $id2 = session()->get('id_proyek');
      $data = [
        'data' => $this->db->query("SELECT a.ukuran_file,a.id_pembuat,a.`judul`,a.`id`,a.`nama_file`,a.`pesan`,c.`fullname`,b.`nama`,b.`tahun`,a.`create_at` FROM detail_data_project a LEFT JOIN data_project b ON a.`id_project`=b.`id` LEFT JOIN users c ON a.`id_pembuat`=c.`id` WHERE a.`id_project`=$id2")->getResult(),
        'data_project' => $this->db->query("SELECT * FROM data_project WHERE id=$id2")->getResult(),
        'menu' => 'manajemen_detail__data_project'
      ];
    } else {
      if ($id != session()->get('id_proyek')) {
        session()->set('id_proyek', $id);
        $id2 = session()->get('id_proyek');
        $data = [
          'data' => $this->db->query("SELECT a.ukuran_file,a.id_pembuat,a.`judul`,a.`id`,a.`nama_file`,a.`pesan`,c.`fullname`,b.`nama`,b.`tahun`,a.`create_at` FROM detail_data_project a LEFT JOIN data_project b ON a.`id_project`=b.`id` LEFT JOIN users c ON a.`id_pembuat`=c.`id` WHERE a.`id_project`=$id2")->getResult(),
          'data_project' => $this->db->query("SELECT * FROM data_project WHERE id=$id2")->getResult(),
          'menu' => 'manajemen_detail__data_project'
        ];
      } else {
        $id2 = session()->get('id_proyek');
        $data = [
          'data' => $this->db->query("SELECT a.ukuran_file,a.id_pembuat,a.`judul`,a.`id`,a.`nama_file`,a.`pesan`,c.`fullname`,b.`nama`,b.`tahun`,a.`create_at` FROM detail_data_project a LEFT JOIN data_project b ON a.`id_project`=b.`id` LEFT JOIN users c ON a.`id_pembuat`=c.`id` WHERE a.`id_project`=$id2")->getResult(),
          'data_project' => $this->db->query("SELECT * FROM data_project WHERE id=$id2")->getResult(),
          'menu' => 'manajemen_detail__data_project'
        ];
      }
    }
    return view('manajemen_detail_data_project', $data);
  }
  public function tambah()
  {
    $id_pembuat = user()->id;
    $id_project = session()->get('id_proyek');
    $judul = $this->request->getPost("judul");
    $pesan = $this->request->getPost("pesan");
    $nama_ori = $_FILES['file_project']['name'];

    if ($nama_ori != '') {
      //$request = \Config\Services::request();
      $file = $this->request->getFile('file_project');
      $name = $file->getName(); // Mengetahui Nama File
      $name = $id_project . ' - ' . $id_pembuat . ' - ' . date("Y-m-d h.i.sa") . ' - ' . $name;

      //$namabaru = $file->getRandomName();//define nama fiel yang baru secara acak

      helper('filesystem'); // Load Helper File System
      $direktori = WRITEPATH . '../public/file/'; //definisikan direktori upload
      $map = directory_map($direktori, FALSE, TRUE); // List direktori

      /* Cek File apakah ada */
      foreach ($map as $key) {
        if ($key == $name) {
          delete_files($direktori, $name); //Hapus terlebih dahulu jika file ada
        }
      }

      $upload = $this->request->getFile('file_project');
      $ex_upload = $upload->move(WRITEPATH . '../public/file/', $name);

      if ($ex_upload) {
        $query = $this->db->query("INSERT INTO detail_data_project (nama_file,judul,create_at,id_pembuat,pesan,id_project) VALUES ('" . $name . "','$judul',now(),$id_pembuat,'$pesan',$id_project)");
        session()->setFlashdata("pesan", "Berhasil Menambahkan File");
      } else {
        session()->setFlashdata("pesan-danger", "Gagal Menambahkan File");
      }
    } else {
      session()->setFlashdata("pesan-danger", "Harus menyertakan file");
    }
    return redirect()->to('/detail_data_project');
  }
  public function hapus()
  {
    $id = user()->id;
    $id_file = $this->request->getPost("id_file");
    $data = $this->db->query("SELECT * FROM detail_data_project where id=$id_file")->getResult();
    unlink(FCPATH . 'file/' . $data[0]->nama_file);
    $this->db->query("DELETE FROM detail_data_project where id=$id_file");
    session()->setFlashdata("pesan-danger", "File proyek berhasil dihapus");
    return redirect()->to('/detail_data_project');
  }
  public function download()
  {
    $id_file = $this->request->getPost("id_file");
    $data = $this->db->query("SELECT * FROM detail_data_project where id=$id_file")->getResult();
    return $this->response->download(FCPATH . 'file/' . $data[0]->nama_file, null);
  }
  public function downloads()
  {
    function zipFilesAndDownload($file_names, $archive_file_name, $file_path)
    {
      //echo $file_path;die;
      $zip = new ZipArchive();
      //create the file and throw the error if unsuccessful
      if ($zip->open($archive_file_name, ZIPARCHIVE::CREATE) !== TRUE) {
        exit("cannot open <$archive_file_name>\n");
      }
      //add each files of $file_name array to archive
      foreach ($file_names as $files) {
        $zip->addFile($file_path . $files, $files);
        //echo $file_path.$files,$files."

      }
      $zip->close();
      //then send the headers to force download the zip file
      header("Content-type: application/zip");
      header("Content-Disposition: attachment; filename=$archive_file_name");
      header("Pragma: no-cache");
      header("Expires: 0");
      readfile("$archive_file_name");
      exit;
    }
    $id_project = session()->get('id_proyek');
    $file_names = array();
    $data = $this->db->query("SELECT * FROM detail_data_project where id_project=$id_project")->getResult();
    foreach ($data as $key) {
      array_push($file_names, $key->nama_file);
    }

    //Archive name
    $data2 = $this->db->query("SELECT * FROM data_project where id=$id_project")->getResult();
    $archive_file_name = $data2[0]->nama . ' (' . $data2[0]->tahun . ').zip';

    //Download Files path
    $file_path = FCPATH . 'file/';

    zipFilesAndDownload($file_names, $archive_file_name, $file_path);
  }
}
