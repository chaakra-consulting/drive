<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;

class Beranda extends BaseController
{
  public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
      // return view('auth/login');
      return view('beranda');
    }
    public function ganti()
    {
      $data1 = $this->request->getPost("fullname");
      $data2 = $this->request->getPost("pass1");
      echo "haloooo";
echo $data1;echo $data2;
}

}
