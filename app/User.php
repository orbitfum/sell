<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hash;

class User extends Model
{
    //
    static public function addUser($input){




        $add = new self;


        $add->mail = $input['email'];
        $add->mobile =$input['phone'];
        $add->pass =  Hash::make($input['password']);

        $add->save();






    }
}
