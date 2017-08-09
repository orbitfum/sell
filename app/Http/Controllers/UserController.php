<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRegister;

class UserController extends MainController
{
    public function register(UserRegister $request)
    {

        User::addUser($request);

        return back()->withInput();

    }

    public function login(Request $request)
    {

        User::userLogin($request);

        return back()->withInput();

    }
}
