<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ebay;
use App\Category;
use App\HR;

class PageController extends MainController
{

    static public $info = '';

    public function index()
    {
        return view('content.home', self::$data);
    }

    public function catsJson()
    {
        $cat = Category::all();
        $cat = $cat->toArray();
        $cats = '{';
        foreach ($cat as $key => $ca) {
            if ($key + 1 == count($cat))
                $cats .= '"' . $ca['catid_ebay'] . '" : "' . trim($ca['heb']) . '"';
            else
                $cats .= '"' . $ca['catid_ebay'] . '" : "' . trim($ca['heb']) . '",';
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

        if (empty(self::$data['shippnginfo']['ShippingCostSummary'])) {
            return view('content.i404', self::$data);
        }

        return view('content.i', self::$data);
    }
    public function getifame($id)
    {


        $endpoint = 'http://open.api.ebay.com/shopping';
        $apicall = $endpoint;
        $apicall .= '?callname=GetSingleItem';
        $apicall .= '&responseencoding=XML';
        $apicall .= '&appid=orhanabb-ebayonpl-PRD-308fe9d67-14c9c5e0';
        $apicall .= '&siteid=0';

        $apicall .= '&version=967';

        $apicall .= '&IncludeSelector=Description,ItemSpecifics,Variations,Compatibility,ShippingCosts,Details';

        $apicall .= '&ItemID=' . $id;


        $resp = simplexml_load_file($apicall);
        $json = json_encode($resp);
        $resp = json_decode($json, TRUE);

        self::$data['ifram'] =$resp['Item']['Description'];



        return view('content.ifram', self::$data);
    }



}

