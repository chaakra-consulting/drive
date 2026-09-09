<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Project_Saya extends BaseController
{
  protected $db;
  public function __construct()
  {
    $this->db = \Config\Database::connect();
  }
  public function index()
  {
    // return view('auth/login');
    $data = [
      'data' => $this->db->query("SELECT a.`id_pembuat`,a.`tahun`,a.`nama`,a.`create_at`,a.`id`,b.`fullname` FROM permisions_project c LEFT JOIN data_project a ON c.`id_project`=a.`id` LEFT JOIN users b ON a.`id_pembuat`=b.`id` WHERE c.`id_user`=" . user()->id)->getResult(),
      'menu' => 'proyek_saya'
    ];
    return view('manajemen_data_project', $data);
  }
  public function tambah()
  {
    $id = user()->id;
    $tahun = $this->request->getPost("tahun_proyek");
    $nama = $this->request->getPost("nama_proyek");
    $this->db->query("INSERT INTO data_project (tahun,nama,create_at,id_pembuat) VALUES ('$tahun','$nama',now(),$id)");
    $a = $this->db->query("SELECT * FROM data_project ORDER BY id DESC LIMIT 1")->getResult();
    $id_proyek = $a[0]->id;
    $this->db->query("INSERT INTO permisions_project (id_project,id_user) values ('$id_proyek','$id')");
    session()->setFlashdata("pesan", "Proyek berhasil ditambahkan");
    return redirect()->to('/project_saya');
  }
  public function ubah()
  {
    $id = user()->id;
    $id_proyek = $this->request->getPost("id_proyek");
    $tahun = $this->request->getPost("tahun_proyek");
    $nama = $this->request->getPost("nama_proyek");
    $this->db->query("UPDATE data_project SET tahun='$tahun',nama='$nama',id_pembuat='$id' where id=$id_proyek");
    session()->setFlashdata("pesan", "Proyek berhasil diubah");
    return redirect()->to('/project_saya');
  }
  public function hapus()
  {
    $id = user()->id;
    $id_proyek = $this->request->getPost("id_proyek");
    $a = $this->db->query("SELECT * FROM detail_data_project where id_project=$id_proyek")->getResult();
    foreach ($a as $b) {
      unlink(FCPATH . 'file/' . $b->nama_file);
    }
    $data2 = $this->db->query("SELECT * FROM data_project where id=$id_proyek")->getResult();
    $archive_file_name = $data2[0]->nama . ' (' . $data2[0]->tahun . ').zip';
    if (!isset($data2)) {
      unlink(FCPATH . $archive_file_name);
    }
    $this->db->query("DELETE FROM detail_data_project where id_project=$id_proyek");
    $this->db->query("DELETE FROM permisions_project where id_project=$id_proyek");
    $this->db->query("DELETE FROM data_project where id=$id_proyek");
    session()->setFlashdata("pesan-danger", "Proyek berhasil dihapus");
    return redirect()->to('/project_saya');
  }
}
