<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
use App\Setting;

class HR extends Model
{

    static public function utf8split($str, $len = 1) {
        $arr = array();
        $strLen = mb_strlen($str, 'UTF-8');
        for ($i = 0; $i < $strLen; $i++)
        {
            $arr[] = mb_substr($str, $i, $len, 'UTF-8');
        }
        return $arr;
    }

    static public function tr($name, $tr = null)
    {


        $name = str_replace(' ', '%20', $name);
        if (!empty($tr)) {
            $tr = 'he-en';
        } else {
            $tr = 'en-he';
        }
        $acsiletters = ['א' => '90' , 'ב' => '91' , 'ג' => '92' , 'ד' => '93' , 'ה' => '94' , 'ו' => '95' , 'ז' => '96' , 'ח' => '97' , 'ט' => '98' , 'י' => '99' , 'כ' => '9B' , 'ל' => '9C' , 'מ' => '9E' , 'נ' => 'A0' , 'ס' => 'A1' , 'ע' => 'A2' , 'פ' => 'A4' , 'צ' => 'A6' , 'ק' => 'A7' , 'ר' => 'A8' , 'ש' => 'A9' , 'ת' => 'AA' , 'ך' => '9A', 'ף' => 'A3', 'ץ' => 'A5', 'ם' => '9D', 'ן' => '9F'];
        $replace = ['א','ב','ג','ד','ה','ו','ז','ח','ט','י','כ','ל','מ','נ','ס','ע','פ','צ','ק','ר','ש','ת'];
        $name = HR::utf8split($name);
        $fullname = '';
        foreach($name as $key=>$value) {
            if(array_key_exists($value, $acsiletters)) {
                $fullname .= '%D7%'.$acsiletters[$value];
            } else {
                $fullname .= $value;
            }
        }
        $endurl = 'https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20170515T201931Z.81feb83504237273.e3a9d813c265d85d19aea47e4028c5c5c47d8262&text=' . $fullname .'&lang=' . $tr;
        $json = file_get_contents($endurl);
        $obj = json_decode($json);

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
