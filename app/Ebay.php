<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use HR;
use App\Category;
use App\Search;


class Ebay extends Model
{

    static public $siteID = '3';
    static public $compatLevel = '681';

    static public $devID = 'd2bf1432-3cb8-4fd1-b55d-b158f5c0f4d3';
    static public $appID = 'orhanabb-ebayonpl-PRD-308fe9d67-14c9c5e0';
    static public $certID = 'PRD-08fe9d679bbd-c857-41f4-8903-2aa8';
    static public $serverUrl = 'https://api.ebay.com/ws/api.dll';
    static public $userToken = 'AgAAAA**AQAAAA**aAAAAA**wScSWQ**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6AEkoGmAZOBpwydj6x9nY+seQ**troDAA**AAMAAA**ZAiGwt4p1/ZuF47hjIx/u/CeIinYimnVBSO1+dA+cHp3ZOtg+1gMOzztKt7xY5RaLBT2sXISS9Eq9exAN5KAjPx7h7iEupHq8xTfvkvvrhTDOA66sn1BCkKCVfUioT7O7k3gcbWrCm1dsrnUK/GvVw//EzckOpVlKf6Y1ZjrXs7rPO9phfBJrIrMGvhnkqWIikRy8EmBUjnPA2T9LDhP0yeiy4gWVJgnR7Rl6LLREtM3vUIkvnsTjvpbttlF8NIUdjeeqJFDV/ytKp5rktYZengrFADtwiHi8NMuJL/kpOE8A7udKqNfW4m6NmHtctyqnUjuKDt+XN1w0jjlBrA6YN9YTZc3cZBDMt3NJvXWY0n2lRHv3v96OQjrA1Ps+LBIETIxZKNv5k3Kr/GVo/a7mdEv6gzDVgTHdibj6YKDYLYchkyTM7o4Ua/uXO4kHEUwp9bQ0BFAW39L1fU8Xz7ETsouKSJUb67e7Uuzd5t3PlyczcxnGuB6iGSx/cjYzXgCO592/RRuW1RmL5DBTTcBumwmwY0oxWGnXAADws+f7POY1QNjXGrYkqQIdJsfKxQYVHnqVJPWIh5VZADpU4BYMrVuT6PEJ45GGpMhNVKIYfeTvjbLu6Fjq5I8SHSdYPxZlQlRYMdVR4tg7/MsdOYA9QAywX7A45MTYLB+vH3Vr+KD7i8mBz3lqB0U4mvzFAoCsNs500YEpwz8XB+dM45641AzBdGQ2HA8L45coyOWlXu/GUq4JR0+kSNa9EzmWCqL';
    static public $shoppingURL = 'http://open.api.ebay.com/shopping';

    /*static public $devID = 'd2bf1432-3cb8-4fd1-b55d-b158f5c0f4d3';
    static public $appID = 'orhanabb-ebayonpl-SBX-408f655c9-0ca00e86';
    static public $certID = 'SBX-08f655c9088f-b267-4024-8cfd-fb4f';
    static public $serverUrl = 'https://api.sandbox.ebay.com/ws/api.dll';
    static public $userToken = 'v^1.1#i^1#p^1#I^3#r^0#f^0#t^H4sIAAAAAAAAAOVXbWwURRi+a6+VBooxIBBQORZDFLJ7s3e3d3ub3sEdLaEptIUrtUBIM7s7267d273s7NKe8lFKaIgkJvpDIdGkgSAaRMQoRiOKiTHBjwSL2kAMESXhywj4p0bBOrvXlmslUKREEu/PZd55553nfd7nndkBnaVl87uXdveXex8o6ukEnUVeLzsRlJWWLJhcXDSzxAMKHLw9nY93+rqKz1dgmNGywkqEs4aOkb8jo+lYcI1xyjZ1wYBYxYIOMwgLliSkk8uXCUEGCFnTsAzJ0Ch/dWWcioTYIM9xCMoSy4k8JFZ9KGaDEaeiisjxPEJICfOA58k0xjaq1rEFdStOBQEbpQFPs9EGNipwEYHjmRAXW0P5G5GJVUMnLgygEi5awV1rFkC9NVKIMTItEoRKVCeXpOuS1ZVVtQ0VgYJYiUEa0ha0bDxytNiQkb8Raja69TbY9RbStiQhjKlAIr/DyKBCcgjMv4CfZ5oNxeRgJMbK4bASBuy4ULnEMDPQujUOx6LKtOK6Cki3VCt3O0YJG+LTSLIGR7UkRHWl3/lbYUNNVVRkxqmqVHJ1sr6eShhmK9ShKNJIhDlDz2p0OtVEhwGvRDhOitFAggAgPjK4UT7aIM2jdlps6LLqkIb9tYaVQgQ1Gs1NuIAb4lSn15lJxXIQFfrFhjgME7/AUBVtq1V36ooyhAi/O7x9BYZXW5apiraFhiOMnnApilMwm1VlavSkq8VB+XTgONVqWVkhEGhvb2faQ4xhtgSCALCBpuXL0lIrypBeJL5Or7v+6u0X0KqbioTISqwKVi5LsHQQrRIAeguVCEbDkdBQFUbCSoy2/sNQkHNgZEeMV4dwkGeDUowFELI8CnLj0SGJQZEGHByOPOkMNNuQldWghGiJ6MzOIFOVhRCnBEO8gmg5ElPocExRaJGTIzSrIAQQEkUpxv+fGmWsUk9LRhbVG5oq5cZH8OMl9pAp10PTyqXsHBmnkaaRv7Fq/6apYifVe5mk0+t3nqgTA5MgMKsyjq4YycgEDEiONsfU7KL2j8UpINo5psVG2CKwZXK7jHmRSiTCkEaRx74k34Z3WxKVXNj3lepIuvm8VTl/0zJu8gxeLzEmwoZtko8Mps65eBqMNqSTNrZMQ9OQ2cjeFRPjeOX8N9fNTbOSNJXQ2Hy/ZXaH5/jNcvd1ef8cg76hdX9lznIgGIsFIyx/V3Vd7Na1IXdvz9M7T2+pgS0k34MvpMDI51rC4/7YLu8R0OX9gLz4QBTQ7ALwZGnxKl/xJAqTI5XBUJdFo4NRocJgtUUnzxETMW0ol4WqWVTqXTvr4sJrBQ/FnnVgxvBTsayYnVjwbgSP3JgpYR+cXs5GAc9G2SgX4fg1YO6NWR87zTd110NxsG3SlDnPnav8ddOFj65seb5uISgfdvJ6SzxEwZ6m2X+1PNX6THnN2Y0Djy4IdryrDLyvNxqrJu/6cCo+saRJvPZsz0uXPNsPHp1woL91a/ybUzVdmX2n7Zk7jyzq23vG2//q7LfPrn1i2+een1Ye3frj9bIDkeUnay5ebaPnDDymvPZieM3uSwNss/FCxaYd4vTU8Td6u5ddvbylou+r7dW/eLRFO35P/rAi8c7J787Tp76snNe467jip/oj518+/V6v7/XeDc2z3nrlzMqfqQnTNn9clt1QM+8T5diE/YdTByXq8PdVb26csdc3/1D/0v2b96z7dPqx1XuZFVXnFn2xW7189rPU9Qf3Xd20vnv+sa9/237xj7WHdk6pmDvzcK72Su/Dly+c+Lavqm/P1nwZ/wYiRNVlwg8AAA==';
    static public $shoppingURL = 'http://open.api.sandbox.ebay.com/shopping';*/

////////////////// ebay cart    /////////////////////////////

    static public function buildEbayHeaders($verb)
    {
        $headers = array(
            //Regulates versioning of the XML interface for the API
            'X-EBAY-API-COMPATIBILITY-LEVEL: ' . Self::$compatLevel,

            //set the keys
            'X-EBAY-API-DEV-NAME: ' . Self::$devID,
            'X-EBAY-API-APP-NAME: ' . Self::$appID,
            'X-EBAY-API-CERT-NAME: ' . Self::$certID,

            //the name of the call we are requesting
            'X-EBAY-API-CALL-NAME: ' . $verb,

            //SiteID must also be set in the Request's XML
            //SiteID = 0  (US) - UK = 3, Canada = 2, Australia = 15, ....
            //SiteID Indicates the eBay site to associate the call with
            'X-EBAY-API-SITEID: ' . Self::$siteID,
        );

        return $headers;
    }

    static public function sendHttpRequest($requestBody, $headers)
    {
        //build eBay headers using variables passed via constructor
        //$headers = buildEbayHeaders($verb);

        //initialise a CURL session
        $connection = curl_init();
        //set the server we are using (could be Sandbox or Production server)
        curl_setopt($connection, CURLOPT_URL, Self::$serverUrl);

        //stop CURL from verifying the peer's certificate
        curl_setopt($connection, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($connection, CURLOPT_SSL_VERIFYHOST, 0);

        //set the headers using the array of headers
        curl_setopt($connection, CURLOPT_HTTPHEADER, $headers);

        //set method as POST
        curl_setopt($connection, CURLOPT_POST, 1);

        //set the XML body of the request
        curl_setopt($connection, CURLOPT_POSTFIELDS, $requestBody);

        //set it to return the transfer as a string from curl_exec
        curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);

        //Send the Request
        $response = curl_exec($connection);

        //print $response;

        //close the connection
        curl_close($connection);

        //return the response
        return $response;
    }


//////////////////////////////////////////////////////////////////////////////////////////////


    static public function search($keyword, &$data, $input,$catname = null)
    {
        $rekey = $keyword;

        if (preg_match('/[א-ת]/', $keyword)) {
            $keyword = HR::tr($keyword, 1);

        }

        if($keyword == false) $keyword = 'error';

        Search::AddTag($rekey, $keyword);


        error_reporting(E_ALL);
        $compatabilityLevel = 825;    // eBay API version

        $version = '1.2.0';  // API version supported by your application
        $globalid = 'EBAY-US';  // Global ID of the eBay site you want to search (e.g., EBAY-DE)
        $query = $keyword;  // You may want to supply your own query
        $safequery = urlencode($query);


        $endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // URL to call
        $apicall = "$endpoint?";
        $apicall .= "OPERATION-NAME=findItemsAdvanced";
        $apicall .= "&SERVICE-VERSION=$version";
        $apicall .= "&RESPONSE-DATA-FORMAT=XML";
        $apicall .= "&SECURITY-APPNAME=" . self::$appID;
        $apicall .= "&GLOBAL-ID=$globalid";
       if($catname){
           $apicall .= "&categoryId=$catname";
       }
        $apicall .= "&keywords=$safequery";

        $apicall .= "&sortOrder=BestMatch";


        $apicall .= "&itemFilter(0).name=ListingType";
        $apicall .= "&itemFilter(0).value(1)=FixedPrice";


        $apicall .= "&itemFilter(1).name=AvailableTo";
        $apicall .= "&itemFilter(1).value(0)=IL";

        $apicall .= "&itemFilter(2).name=HideDuplicateItems";
        $apicall .= "&itemFilter(2).value(0)=true";


        if ($input->has('min') && $input->has('max')) {
            if ($input->get('min') < $input->get('max')) {
                $min = $input->get('min');
                $max = $input->get('max');

                $apicall .= "&itemFilter(3).name=MinPrice";
                $apicall .= "&itemFilter(3).value=$min";
                $apicall .= "&itemFilter(4).name=MaxPrice";
                $apicall .= "&itemFilter(4).value=$max";

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

        $apicall .= "&paginationInput.entriesPerPage=100";
        if($input->has('page')){

            $apicall .= "&paginationInput.pageNumber=".$input->get('page');
        }else{
            $apicall .= "&paginationInput.pageNumber=1";
        }

        $apicall .= "&filter=deliveryCountry:IL";
        $apicall .= "&filter=topRatedListing";

        $apicall .= "&outputSelector[0]=GalleryInfo";
        $apicall .= "&outputSelector[1]=PictureURLLarge";
        $apicall .= "&outputSelector[2]=CategoryHistogram";
        $apicall .= "&outputSelector[3]=ConditionHistogram";


        $apicall .= "&outputSelector[4]=StoreInfo";


            $resp = simplexml_load_file($apicall);
            $json = json_encode($resp);
            $resp = json_decode($json, TRUE);

        $data['cat'] = isset($resp['categoryHistogramContainer']['categoryHistogram']) ? $resp['categoryHistogramContainer']['categoryHistogram'] : [];


        $data['info'] = $resp['paginationOutput'];
        $data['item'] = isset($resp['searchResult']['item']) ? $resp['searchResult']['item'] : '';

        $data['pagenum'] = $resp['paginationOutput']['totalPages'] > 100 ? 100 : $resp['paginationOutput']['totalPages'];

    }



    static public function getItem($id, &$data)
    {
//מוצרים דומים

        $endpoint = 'http://svcs.ebay.com/MerchandisingService';
        $apicall = $endpoint;
        $apicall .= '?OPERATION-NAME=getSimilarItems';
        $apicall .= '&SERVICE-NAME=MerchandisingService';
        $apicall .= '&SERVICE-VERSION=1.1.0';
        $apicall .= '&CONSUMER-ID=orhanabb-ebayonpl-PRD-308fe9d67-14c9c5e0';
        $apicall .= '&RESPONSE-DATA-FORMAT=XML';
        $apicall .= '&REST-PAYLOAD';
        $apicall .= '&listingType=FixedPriceItem';
        $apicall .= '&country=IL';
        $apicall .= '&itemId=' . $id;

        $apicall .= '&maxResults=10';

if(@simplexml_load_file($apicall)){
    $resp = simplexml_load_file($apicall);
    $json = json_encode($resp);
    $resp = json_decode($json, TRUE);
    $data['moreitem'] = $resp;
}else{
    $data['moreitem'] ='';
}


//מידע על המשלוח ------------------------------------------------------------------
        $endpoint = 'http://open.api.ebay.com/shopping';
        $apicall = $endpoint;
        $apicall .= '?callname=GetShippingCosts';
        $apicall .= '&responseencoding=XML';
        $apicall .= '&appid=orhanabb-ebayonpl-PRD-308fe9d67-14c9c5e0';
        $apicall .= '&siteid=0';

        $apicall .= '&version=517';


        $apicall .= '&ItemID=' . $id;
        $apicall .= '&DestinationCountryCode=IL';
        $apicall .= '&DestinationPostalCode=95128';
        $apicall .= '&IncludeDetails=true';
        $apicall .= '&QuantitySold=1';


        $resp = simplexml_load_file($apicall);
        $json = json_encode($resp);
        $resp = json_decode($json, TRUE);

        $data['shippnginfo'] = $resp;

// ---------------------------------------------------------------------------
// פרטים על המוצר
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

        $data['json'] = $json;

        $data['it'] = $resp['Item'];

        if (isset($resp['Item']['Variations']))
            if (0) {

                $data['varpictures'] = json_encode($resp['Item']['Variations']['Pictures']['VariationSpecificPictureSet']);
            }
        if (isset($_GET['dd'])) dd($data['it']);

    }


}
