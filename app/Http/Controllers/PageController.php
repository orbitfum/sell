<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ebay;
use App\Category;
use App\HR;

class PageController extends MainController
{

    static public $info ='';

    public function index()
    {
        return view('content.home', self::$data);
    }

    public function catsJson() {
        $cat = Category::all();
        $cat = $cat->toArray();
        $cats = '{';
        foreach($cat as $key=>$ca) {
            if($key+1 == count($cat))
                $cats .= '"'.$ca['catid_ebay'] . '" : "' . trim($ca['heb']) . '"';
            else
                $cats .= '"'.$ca['catid_ebay'] . '" : "' . trim($ca['heb']) . '",';
        }
        $cats .= '}';
        echo $cats;
    }

    public function search(Request $request)
    {
        Ebay::search($request->get('q'), self::$data, $request);

        return view('content.s1', self::$data);
    }

    public function getItem($name, $id)
    {
        Ebay::getItem($id, self::$data);



        return view('content.i', self::$data);
    }

    public function testit() {
        return HR::currency(2);
    }



}
