<?php

namespace App\Controllers\auth;

use App\Controllers\BaseController;

class login extends BaseController
{
    public function index()
    {
      // return view('auth/login');
      return view('user/beranda');
    }
}
