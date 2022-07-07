<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Manajemen_Users extends BaseController
{
  public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
      // return view('auth/login');
      $data = [
        'data_users' => $this->db->query("SELECT a.deleted_at,a.active,a.`id`,a.`fullname`,a.`jabatan`,c.name,a.`email`,a.`status`,a.image FROM users a LEFT JOIN auth_groups_users b ON a.`id`=b.user_id LEFT JOIN auth_groups c ON b.group_id = c.id")->getResult()
      ];
      return view('manajemen_users',$data);
    }
    public function nonaktifusers()
    {
      $id = $this->request->getPost("id-nonaktif");
      $this->db->query("UPDATE users SET deleted_at=now() where id=$id");
      session()->setFlashdata("pesan-danger", "User berhasil dinonaktifkan");
      return redirect()->to('/manajemenusers');
    }
    public function reaktifusers()
    {
      $id = $this->request->getPost("id-aktif");
      $this->db->query("UPDATE users SET deleted_at=null where id=$id");
      session()->setFlashdata("pesan", "User berhasil diaktifkan kembali");
      return redirect()->to('/manajemenusers');
    }
    public function delete(){
      $id_permision = $this->request->getPost("id_permision");
      $this->db->query("DELETE FROM permisions_project where id=$id_permision");
      session()->setFlashdata("pesan-danger", "Izin berhasil dihapus");
      return redirect()->to('/detailsuser');
    }
    public function deleteall(){
      $id_user = $this->request->getPost("id_user");
      $this->db->query("DELETE FROM permisions_project where id_user=$id_user");
      session()->setFlashdata("pesan-danger", "Semua izin berhasil dihapus");
      return redirect()->to('/detailsuser');
    }
    public function add(){
      $id_proyek = $this->request->getPost("id_proyek");
      $id_user = session()->get('id_detail_user');
      $jumlah_permision = $this->db->query("SELECT COUNT(id) AS jumlah FROM permisions_project WHERE id_user=$id_user AND id_project=$id_proyek ")->getResult();
      if(intval($jumlah_permision[0]->jumlah)>0){
        session()->setFlashdata("pesan-danger", "Izin proyek gagal ditambahkan karena sudah ada.");
      }else{
        $this->db->query("INSERT INTO permisions_project (id_project,id_user) values ('$id_proyek','$id_user')");
        session()->setFlashdata("pesan", "Izin proyek berhasil ditambahkan");
      }
      return redirect()->to('/detailsuser');
    }
    public function detailsuser()
    {
    $id = $this->request->getPost("id-detail");
    if($id==""){
      $id = session()->get('id_detail_user');
    }else{
      if($id!=session()->get('id_detail_user')){
        session()->set('id_detail_user', $id);
        $id = session()->get('id_detail_user');
      }else{
        $id = session()->get('id_detail_user');
      }
    }
    $data = [
      'jumlah_proyek' => $this->db->query("SELECT COUNT(id) AS jumlah FROM permisions_project where id_user=$id")->getResult(),
        'jumlah_data_user' => $this->db->query("SELECT COUNT(id) AS jumlah FROM detail_data_project WHERE id_pembuat=".$id)->getResult(),
        'jumlah_semua_data' => $this->db->query("SELECT COUNT(id) AS jumlah FROM detail_data_project")->getResult(),
      'details' => $this->db->query("SELECT 
      a.deleted_at,
      a.active,
      a.`id`,
      a.`fullname`,
      a.`jabatan`,
      c.name,
      a.`email`,
      a.`status`,
      a.image,
      a.`github`,
      a.`linkedin`,
      a.`twitter`,
      a.`instagram`,
      a.`portofolio`,
      a.`created_at` 
      FROM users a LEFT JOIN auth_groups_users b ON a.`id`=b.user_id LEFT JOIN auth_groups c ON b.group_id = c.id WHERE a.id=$id")->getResult(),
      'data_permision' => $this->db->query("SELECT a.`id`,a.`id_project`,a.`id_user`,b.`nama`,b.`tahun` FROM permisions_project a LEFT JOIN data_project b ON a.`id_project`=b.`id` WHERE a.`id_user`=$id")->getResult(),
      'data_project' => $this->db->query("SELECT * FROM data_project ORDER BY create_at DESC")->getResult(),
    ];
    return view('detailusers',$data);
  }
}
