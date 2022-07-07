<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Project_Saya extends BaseController
{
  public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
      // return view('auth/login');
      $data = [
        'data' => $this->db->query("SELECT a.`tahun`,a.`nama`,a.`create_at`,a.`id`,b.`fullname` FROM permisions_project c LEFT JOIN data_project a ON c.`id_project`=a.`id` LEFT JOIN users b ON a.`id_pembuat`=b.`id` WHERE c.`id_user`=".user()->id)->getResult(),
        'menu' => 'proyek_saya'
      ];
      return view('manajemen_data_project',$data);
    }
}
