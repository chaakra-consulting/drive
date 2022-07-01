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
        'data_users' => $this->db->query("SELECT * FROM users a LEFT JOIN auth_groups_users b ON a.`id`=b.user_id LEFT JOIN auth_groups c ON b.group_id = c.id")->getResult()
      ];
      return view('manajemen_users',$data);
    }
    
}
