<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ebay;

class PageController extends MainController
{

    static public $info ='';

    public function index()
    {

        return view('content.home', self::$data);
    }

    public function search(Request $request)
    {
        Ebay::search($request->get('q'), self::$data, $request);

        return view('content.s', self::$data);
    }

    public function getItem($name, $id)
    {
        Ebay::getItem($id, self::$data);



        return view('content.i', self::$data);
    }



}
