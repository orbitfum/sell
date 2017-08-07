<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends MainController
{
    public function register()
    {

        return view('content.register', self::$data);
    }
}
