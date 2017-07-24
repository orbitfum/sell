<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use App\Ebay;
use App\Category;
use App\HR;
use App\Setting;

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
        $str = $resp['Item']['Description'];

        $newStr = str_ireplace('width=', "width='100%' ", $str);
        $newStr .= '<div id="google_translate_element"></div><script type="text/javascript">function googleTranslateElementInit() {  new google.translate.TranslateElement({pageLanguage: \'en\', includedLanguages: \'iw\', layout: google.translate.TranslateElement.FloatPosition.TOP_LEFT}, \'google_translate_element\');}</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>';
        $afterStr = str_ireplace('http://www.ebay.com/itm/', url('ebay/'), $newStr);

        self::$data['ifram'] = $afterStr;
//        dd(self::$data['ifram'] =$newStr);


        return view('content.ifram', self::$data);
    }

    static public function updtaedolar()
    {

        $add = 'http://www.boi.org.il/currency.xml?curr=01';
        $getcurrencygate = simplexml_load_file($add);
        $json = json_encode($getcurrencygate);
        $curr = json_decode($json, TRUE);
        $curr = $curr['CURRENCY']['RATE'];
        $flight = Setting::find(1);

        $flight->dolar = $curr;

        $flight->save();

    }

    static public function addCart(request $request){
        Order::addToCart($request);
    }

    static public function cart(){
        Order::cartView(self::$data);
        return view('content.cart', self::$data);
    }

}

