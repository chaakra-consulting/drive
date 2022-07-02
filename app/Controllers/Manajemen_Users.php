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
      return redirect()->to('/manajemenusers');
    }
    public function reaktifusers()
    {
      $id = $this->request->getPost("id-nonaktif");
      $this->db->query("UPDATE users SET deleted_at=null where id=$id");
      return redirect()->to('/manajemenusers');
    }
    
}
