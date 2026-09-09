<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Manajemen_Permision extends BaseController
{
  protected $db;
  public function __construct()
  {
    $this->db = \Config\Database::connect();
  }
  public function index()
  {
    $id_project = $this->request->getPost("id_proyek");
    if ($id_project == "") {
      $id_project = session()->get('id_project');
    } else {
      if ($id_project != session()->get('id_project')) {
        session()->set('id_project', $id_project);
        $id_project = session()->get('id_project');
      } else {
        $id_project = session()->get('id_project');
      }
    }
    $data = [
      'data' => $this->db->query("SELECT a.*,b.fullname,b.id as id_users FROM permisions_project a LEFT JOIN users b ON a.`id_user`=b.`id` WHERE id_project=$id_project")->getResult(),
      'users1' => $this->db->query("SELECT a.*,c.`name` FROM users a LEFT JOIN auth_groups_users b ON a.`id`=b.`user_id` LEFT JOIN auth_groups c ON b.`group_id`=c.`id` WHERE NAME='user' OR NAME='admin'")->getResult(),
      'users2' => $this->db->query("SELECT a.*,c.`name` FROM users a LEFT JOIN auth_groups_users b ON a.`id`=b.`user_id` LEFT JOIN auth_groups c ON b.`group_id`=c.`id`")->getResult(),
      'proyek' => $this->db->query("SELECT * FROM data_project where id=$id_project")->getResult(),
      'menu' => 'Akses Projek'
    ];
    return view('manajemen_permision', $data);
  }
  public function delete()
  {
    $id_permision = $this->request->getPost("id_permision");
    $this->db->query("DELETE FROM permisions_project where id=$id_permision");
    session()->setFlashdata("pesan-danger", "Izin berhasil dihapus");
    return redirect()->to('/permision_project');
  }
  public function add()
  {
    $id_proyek = session()->get('id_project');
    $id_user = $this->request->getPost("id_users");
    $jumlah_permision = $this->db->query("SELECT COUNT(id) AS jumlah FROM permisions_project WHERE id_user=$id_user AND id_project=$id_proyek ")->getResult();
    if (intval($jumlah_permision[0]->jumlah) > 0) {
      session()->setFlashdata("pesan-danger", "Izin proyek gagal ditambahkan karena sudah ada.");
    } else {
      $this->db->query("INSERT INTO permisions_project (id_project,id_user) values ('$id_proyek','$id_user')");
      session()->setFlashdata("pesan", "Izin proyek berhasil ditambahkan");
    }
    return redirect()->to('/permision_project');
  }
}
