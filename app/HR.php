<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
use App\Setting;

class HR extends Model
{
    static public function tr($name, $tr = null)
    {


        $name = str_replace(' ', '%20', $name);
        if (!empty($tr)) {
            $tr = 'he-en';
        } else {
            $tr = 'en-he';
        }


        $json = file_get_contents('https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20170515T201931Z.81feb83504237273.e3a9d813c265d85d19aea47e4028c5c5c47d8262&lang=' . $tr . '&text=' . $name);

        $obj = json_decode($json);

        // Decode the JSON string into an object


        return $obj->text[0];

    }

    static public function currency($dollar)
    {
        if (!Session::has('dolar')) {
            $dolar = Setting::find(1);
            $dolar = $dolar->dolar;

            Session::put('dolar', $dolar);
        }

        $dol = Session::get('dolar');


        $rate = $dol + '0.4';
        $totalrate = $dollar * $rate;
        $totalrate = $totalrate + 1;
        $totalrate = $totalrate + ($totalrate * 15 / 100);
        return number_format($totalrate, 1);
    }

    static public function currencyShip($dollar)
    {

        if (!Session::has('dolar')) {
            $dolar = Setting::find(1);
            $dolar = $dolar->dolar;

            Session::put('dolar', $dolar);
        }

        $dol = Session::get('dolar');

        $rate = $dol + '0.2';
        $totalrate = $dollar * $rate;
        $totalrate = $totalrate + 5;

        return number_format($totalrate);
    }
}
