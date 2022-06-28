<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;

class beranda extends BaseController
{
    public function index()
    {
      // return view('auth/login');
      return view('user/beranda');
    }
}
