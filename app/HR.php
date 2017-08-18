<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HR extends Model
{
    static public function tr($name){

        $name = str_replace(' ','%20',$name);


        $json = file_get_contents('https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20170515T201931Z.81feb83504237273.e3a9d813c265d85d19aea47e4028c5c5c47d8262&lang=en-he&text='.$name);

        $obj = json_decode($json);

// Decode the JSON string into an object


return $obj->text[0];

    }
}
