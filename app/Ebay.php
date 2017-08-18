<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use HR;
use App\Category;

class Ebay extends Model
{

    static public $devID = 'd2bf1432-3cb8-4fd1-b55d-b158f5c0f4d3';
    static public $appID = 'orhanabb-ebayonpl-PRD-308fe9d67-14c9c5e0';
    static public $certID = 'PRD-08fe9d679bbd-c857-41f4-8903-2aa8';
    static public $serverUrl = 'https://api.ebay.com/ws/api.dll';
    static public $userToken = 'AgAAAA**AQAAAA**aAAAAA**wScSWQ**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6AEkoGmAZOBpwydj6x9nY+seQ**troDAA**AAMAAA**ZAiGwt4p1/ZuF47hjIx/u/CeIinYimnVBSO1+dA+cHp3ZOtg+1gMOzztKt7xY5RaLBT2sXISS9Eq9exAN5KAjPx7h7iEupHq8xTfvkvvrhTDOA66sn1BCkKCVfUioT7O7k3gcbWrCm1dsrnUK/GvVw//EzckOpVlKf6Y1ZjrXs7rPO9phfBJrIrMGvhnkqWIikRy8EmBUjnPA2T9LDhP0yeiy4gWVJgnR7Rl6LLREtM3vUIkvnsTjvpbttlF8NIUdjeeqJFDV/ytKp5rktYZengrFADtwiHi8NMuJL/kpOE8A7udKqNfW4m6NmHtctyqnUjuKDt+XN1w0jjlBrA6YN9YTZc3cZBDMt3NJvXWY0n2lRHv3v96OQjrA1Ps+LBIETIxZKNv5k3Kr/GVo/a7mdEv6gzDVgTHdibj6YKDYLYchkyTM7o4Ua/uXO4kHEUwp9bQ0BFAW39L1fU8Xz7ETsouKSJUb67e7Uuzd5t3PlyczcxnGuB6iGSx/cjYzXgCO592/RRuW1RmL5DBTTcBumwmwY0oxWGnXAADws+f7POY1QNjXGrYkqQIdJsfKxQYVHnqVJPWIh5VZADpU4BYMrVuT6PEJ45GGpMhNVKIYfeTvjbLu6Fjq5I8SHSdYPxZlQlRYMdVR4tg7/MsdOYA9QAywX7A45MTYLB+vH3Vr+KD7i8mBz3lqB0U4mvzFAoCsNs500YEpwz8XB+dM45641AzBdGQ2HA8L45coyOWlXu/GUq4JR0+kSNa9EzmWCqL';

    static public function search($keyword, &$data, $input)
    {

        error_reporting(E_ALL);
        $compatabilityLevel = 825;    // eBay API version

        $version = '1.13.0';  // API version supported by your application
        $globalid = 'EBAY-US';  // Global ID of the eBay site you want to search (e.g., EBAY-DE)
        $query = $keyword;  // You may want to supply your own query
        $safequery = urlencode($query);


        $endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // URL to call
        $apicall = "$endpoint?";
        $apicall .= "OPERATION-NAME=findItemsByKeywords";
        $apicall .= "&SERVICE-VERSION=$version";
        $apicall .= "&RESPONSE-DATA-FORMAT=XML";
        $apicall .= "&SECURITY-APPNAME=" . self::$appID;
        $apicall .= "&GLOBAL-ID=$globalid";
        $apicall .= "&keywords=$safequery";
        $apicall .= "&sortOrder=BestMatch";
        $apicall .= "&itemFilter(0).name=ListingType";
        $apicall .= "&itemFilter(0).value(1)=FixedPrice";
        $apicall .= "&itemFilter(0).value(2)=StoreInventory";

        if ($input->has('min') && $input->has('max')) {
            if ($input->get('min') < $input->get('max')) {
                $min = $input->get('min');
                $max = $input->get('max');

                $apicall .= "&itemFilter(1).name=MinPrice";
                $apicall .= "&itemFilter(1).value=$min";
                $apicall .= "&itemFilter(2).name=MaxPrice";
                $apicall .= "&itemFilter(2).value=$max";

            }


        }
        if ($input->has('order')) {
            if ($input->get('order') == 'new') {
                $apicall .= "&sortOrder=StartTimeNewest"; //מוצרים חדשים
            } elseif ($input->get('order') == 'max') {
                $apicall .= "&sortOrder=PricePlusShippingHighest";  //מהמחיר הגבוה לנמוך
            } elseif ($input->get('order') == 'min') {
                $apicall .= "&sortOrder=PricePlusShippingLowest";     //מהמחיר הנמוך לגבוה
            }
        }
        $apicall .= "&itemFilter(3).paramName=Currency";
        $apicall .= "&itemFilter(3).paramValue=USD";

        $apicall .= "&paginationInput.entriesPerPage=10";
        $apicall .= "&filter=deliveryCountry:IL";
        $apicall .= "&filter=topRatedListing";
        $apicall .= "&outputSelector[0]=PictureURLSuperSize";
        $apicall .= "&outputSelector[1]=CategoryHistogram";
        $apicall .= "&outputSelector[2]=ConditionHistogram";
        $apicall .= "&outputSelector[3]=PictureURLLarge";
        $apicall .= "&outputSelector[4]=SellerInfo";
        $apicall .= "&outputSelector[5]=StoreInfo";


        $resp = simplexml_load_file($apicall);
        $json = json_encode($resp);
        $resp = json_decode($json, TRUE);

        $data['cat'] = $resp['categoryHistogramContainer']['categoryHistogram'];

        $data['info'] = $resp['paginationOutput'];
        $data['item'] = isset($resp['searchResult']['item']) ? $resp['searchResult']['item'] : '';


    }

    static public function getItem($id, &$data)
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
        $data['it'] = $resp['Item'];

    }

}
