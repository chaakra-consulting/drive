<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Manajemen_Data_Project extends BaseController
{
  public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
      $data = [
        'data' => $this->db->query("SELECT a.`tahun`,a.`nama`,a.`create_at`,a.`id`,b.`fullname` FROM data_project a LEFT JOIN users b ON a.`id_pembuat`=b.`id`")->getResult(),
        'menu' => 'manajemen_data_Project'
      ];
      return view('manajemen_data_project',$data);
    }
    public function tambah()
    {
      $id = user()->id; 
      $tahun = $this->request->getPost("tahun_proyek");
      $nama = $this->request->getPost("nama_proyek");
      $this->db->query("INSERT INTO data_project (tahun,nama,create_at,id_pembuat) VALUES ('$tahun','$nama',now(),$id)");
      session()->setFlashdata("pesan", "Proyek berhasil ditambahkan");
      return redirect()->to('/dataperusahaan');

    }
    public function ubah()
    {
      $id = user()->id; 
      $id_proyek = $this->request->getPost("id_proyek");      
      $tahun = $this->request->getPost("tahun_proyek");
      $nama = $this->request->getPost("nama_proyek");
      $this->db->query("UPDATE data_project SET tahun='$tahun',nama='$nama' where id=$id_proyek");
      session()->setFlashdata("pesan", "Proyek berhasil diubah");
      return redirect()->to('/dataperusahaan');
    }
    public function hapus()
    {
      $id = user()->id; 
      $id_proyek = $this->request->getPost("id_proyek");
      $a= $this->db->query("SELECT * FROM detail_data_project where id_project=$id_proyek")->getResult();
      foreach($a as $b){
        unlink(FCPATH.'file\file-'.$b->nama_file);
      }
      $this->db->query("DELETE FROM detail_data_project where id_project=$id_proyek");
      $this->db->query("DELETE FROM permisions_project where id_project=$id_proyek");
      $this->db->query("DELETE FROM data_project where id=$id_proyek");
      session()->setFlashdata("pesan-danger", "Proyek berhasil dihapus");
      return redirect()->to('/dataperusahaan');
    }
}
