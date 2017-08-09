<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hash, Session;

class User extends Model
{
    //
    static public function addUser($input)
    {


        $add = new self;


        $add->mail = $input['email'];
        $add->mobile = $input['phone'];
        $add->pass = Hash::make($input['password']);

        $add->save();


            $name = explode('@',$input['email']);
            $name = $name[0];



        Session::put('user_name' , $name);
        Session::flash('success', 'נרשמת בהצלחה! כעת נחבר אותך :).');


    }


    static public function userLogin($input){

        $user   = User::where('mail','=',$input['login'])->orWhere('mobile','=',$input['login'])->get();

        $user =$user[0];

         if(Hash::check($input['password'], $user->pass)){

             if(!empty($user->frist_name)){
                $name = $user->frist_name;
             }else{
                 $name = explode('@',$user->mail);
                 $name = $name[0];
             }

             Session::put('user_name' , $name);
             Session::flash('success', 'התחברת בהצלחה :).');

         }


    }
}
