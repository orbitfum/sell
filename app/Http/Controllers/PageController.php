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
    static public $userToken = 'AgAAAA**AQAAAA**aAAAAA**wScSWQ**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6AEkoGmAZOBpwydj6x9nY+seQ**troDAA**AAMAAA**ZAiGwt4p1/ZuF47hjIx/u/CeIinYimnVBSO1+dA+cHp3ZOtg+1gMOzztKt7xY5RaLBT2sXISS9Eq9exAN5KAjPx7h7iEupHq8xTfvkvvrhTDOA66sn1BCkKCVfUioT7O7k3gcbWrCm1dsrnUK/GvVw//EzckOpVlKf6Y1ZjrXs7rPO9phfBJrIrMGvhnkqWIikRy8EmBUjnPA2T9LDhP0yeiy4gWVJgnR7Rl6LLREtM3vUIkvnsTjvpbttlF8NIUdjeeqJFDV/ytKp5rktYZengrFADtwiHi8NMuJL/kpOE8A7udKqNfW4m6NmHtctyqnUjuKDt+XN1w0jjlBrA6YN9YTZc3cZBDMt3NJvXWY0n2lRHv3v96OQjrA1Ps+LBIETIxZKNv5k3Kr/GVo/a7mdEv6gzDVgTHdibj6YKDYLYchkyTM7o4Ua/uXO4kHEUwp9bQ0BFAW39L1fU8Xz7ETsouKSJUb67e7Uuzd5t3PlyczcxnGuB6iGSx/cjYzXgCO592/RRuW1RmL5DBTTcBumwmwY0oxWGnXAADws+f7POY1QNjXGrYkqQIdJsfKxQYVHnqVJPWIh5VZADpU4BYMrVuT6PEJ45GGpMhNVKIYfeTvjbLu6Fjq5I8SHSdYPxZlQlRYMdVR4tg7/MsdOYA9QAywX7A45MTYLB+vH3Vr+KD7i8mBz3lqB0U4mvzFAoCsNs500YEpwz8XB+dM45641AzBdGQ2HA8L45coyOWlXu/GUq4JR0+kSNa9EzmWCqL';
    //static public $userToken = 'v^1.1#i^1#p^1#I^3#r^0#f^0#t^H4sIAAAAAAAAAOVXa2wUVRTu9gUVCz8ANU0hywAxIjN7Z2d3dmfsLiwtDSV0u7BrUwqk3p250047O7OZO0u7GM1aE4zRKESCWg1piKIlvhNFIYSAxkgxkUBUMMRY3xFjQE3QkBrvTJeyLYRnERL3z2bOPffc833nO2fmglx5xYKNyzaeqXRNKu7PgVyxy8VOARXlZfdOLSmuKisCBQ6u/ty8XGlvyc81GKa0tLgK4bShY+TuSWk6Fh1jiMqYumhArGJRhymERUsS45HGFaKXAWLaNCxDMjTK3VAXojhZkZAiC14JAtkvEaN+LmTCCFEyDAQEgQdCgBf8fj8k6xhnUIOOLahbIcoL2AANgjQbTABe9PpFlmeAL9hKuZuRiVVDJy4MoMJOtqKz1yxI9dKZQoyRaZEgVLghUh9vijTULY0majwFscJ5GuIWtDJ47FOtISN3M9Qy6NLHYMdbjGckCWFMecIjJ4wNKkbOJXMN6TtMB6DMeuVkUg4kJT4oKBNCZb1hpqB16TxsiyrTiuMqIt1SrezlGCVsJDuRZOWfoiREQ53b/luZgZqqqMgMUUuXRFZHYjEqbJgdUIfJJI2SMGvoaY2OraqjORBUkCDzAZr1SYLkRyB/0Ei0PM3jTqo1dFm1ScPuqGEtQSRrNJ4btoAb4tSkN5kRxbIzKvQLnuOQC7TaRR2pYsbq0O26ohQhwu08Xr4Co7sty1STGQuNRhi/4FAUomA6rcrU+EVHi3n59OAQ1WFZadHj6e7uZro5xjDbPV4AWE9L44q41IFSpNmIr93rjr96+Q206kCRENmJVdHKpkkuPUSrJAG9nQp7fT4f4PO8j00rPN56gaEAs2dsR0xUh/iCileWOIGTeR5yXmEiOiScF6nHzsOWJ52CZhey0hqUEC0RnWVSyFRlkfMrXo4IlpZ5QaF9gqLQSb/M06yCEEAomZSE4P+pUa5U6nHJSKOYoalSdmIEP1Fi50w5Bk0rG0eaRgxXqvqLgsQ2yBsPz+71q4Fox8AkCEyrjK0oRjJSHgOSoWab2pysrwu3St6Ht1RRCcARpKo88iJjHLgMXi8xJsJGxiTvcKbJnusJowvppEss09A0ZDaz18XEBE70mzPNL4pK0lRCY9uthuwqx+Q1ahtaNxN1aa+r9ULkrB9wZA772eura61T10T2vxhaV1PYZQa2kHwDPkA8Y29D4SLnx/a63gW9rrfJhQp4wHx2LphTXnJ/acntVVi1EKNChcFqu06+8k3EdKFsGqpmcblrTfVbA20F96/+deCu0RtYRQk7peA6BqrPr5Sx0+6sZAMgyAYB7yU1bAVzz6+WsneUzvhy6Mfhs/unvqDdM/D188IHAx9+9slRUDnq5HKVFRFhFG3jY/38vmf7VhzuOzHw9PbGXPvvKyftLDp85OBrT2xauGFvxexPF3Ou/YnouuEdb24KDayNdgobtr68/8GH+Flcotqzb7lvxsmaH7p+at5bvmfaoa6qRTM337Z+aM1HR/ChB/75qr+6Msqc3P3+i8HXOd8bv8xcbKLlp05UvnN07era+5Qna7Yc0Bc+VSkfmeQaGjg7mW4Z3ro9ZynvzYbfLN/W1rcxMu/oowHuj0Utx+jpw/N3omTmeOMjx56Jfew59evkWYNdB07/2fnbwxHz9Cs9uelVm3rrn/t7sP5QdXhPtKFl/a7HF3x/8ItXj0f/cu2G7OTNc75l68u/e6wzPvg5tWvH3WUv9Q2dGRwp37/kX8fpGQ8AAA==';

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

        $name = $request->get('q');
        Ebay::search($name, self::$data, $request);

        self::$data['q']= $name;
        return view('content.s1', self::$data);
    }

    public function searchcat($namecat,$id,$name ,Request $request){



        Ebay::search($name, self::$data, $request,$id);



        self::$data['q']= $name;

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
        $afterStr = str_ireplace('http://www.ebay.com/itm/', url('ebay') . '/', $newStr);

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

    static public function addCart(request $request)
    {
        Order::addToCart($request);
    }

    static public function cart()
    {
        Order::cartView(self::$data);
        return view('content.cart', self::$data);
    }

    static public function removeItem(request $request){
        Order::removeItem($request['id']);
    }

    static public function updateItem(request $request){
        Order::updateItem($request);
    }

    static public function checkout(request $request){
        $xmlRequest  = "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
        $xmlRequest .= "<PlaceOfferRequest xmlns=\"urn:ebay:apis:eBLBaseComponents\">";
        $xmlRequest .= "<ErrorLanguage>en_US</ErrorLanguage>";
        $xmlRequest .= "<ItemID>" . $request['itemid'] . "</ItemID>";
        $xmlRequest .= "<EndUserIP>192.168.2.118</EndUserIP>";
        if($request['itemAttributes'] != "Null"){
            $xmlRequest .= "<VariationSpecifics>";
            $attriList = explode(',',$request['itemAttributes']);
            for($i = 0; $i < sizeof($attriList); $i++){
                $attri = explode(':',$attriList[$i]);
                $xmlRequest .= "<NameValueList>";
                $xmlRequest .= "<Name>" . $attri[0] . "</Name>";
                $xmlRequest .= "<Value>" . $attri[1] . "</Value>";
                $xmlRequest .= "</NameValueList>";
            }
            $xmlRequest .= "</VariationSpecifics>";
        }
        $xmlRequest .= "<Offer>";
        $xmlRequest .= "<Action>Purchase</Action>";
        $xmlRequest .= "<MaxBid currencyID=\"USD\">" . $request['currentPrice'] . "</MaxBid>";
        $xmlRequest .= "<Quantity>" . $request['count'] . "</Quantity>";
        $xmlRequest .= "</Offer>";
        $xmlRequest .= "<RequesterCredentials>";
        $xmlRequest .= "<eBayAuthToken>" . Self::$userToken . "</eBayAuthToken>";
        $xmlRequest .= "</RequesterCredentials>";
        $xmlRequest .= "</PlaceOfferRequest>";
        $headers = Ebay::buildEbayHeaders('PlaceOffer');
        Ebay::sendHttpRequest($xmlRequest, $headers);
        Order::removeItem($request['itemid']);
        Session::flash('success', 'פריט נמחק בהצלחה');
    }

}

