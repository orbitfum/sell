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

        if (preg_match('/[א-ת]/', $keyword)) {
            $keyword = HR::tr($keyword, 1);

        }

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

        $apicall .= "&paginationInput.entriesPerPage=50";
        $apicall .= "&filter=deliveryCountry:IL";
        $apicall .= "&filter=topRatedListing";

        $apicall .= "&outputSelector[0]=PictureURLSuperSize";
        $apicall .= "&outputSelector[1]=CategoryHistogram";
        $apicall .= "&outputSelector[2]=ConditionHistogram";
        $apicall .= "&outputSelector[3]=PictureURLLarge";

        $apicall .= "&outputSelector[5]=StoreInfo";


        $resp = simplexml_load_file($apicall);
        $json = json_encode($resp);
        $resp = json_decode($json, TRUE);


        $data['cat'] = isset($resp['categoryHistogramContainer']['categoryHistogram']) ? $resp['categoryHistogramContainer']['categoryHistogram'] : [];


        $data['info'] = $resp['paginationOutput'];
        $data['item'] = isset($resp['searchResult']['item']) ? $resp['searchResult']['item'] : '';


    }

    static public function search1($keyword, &$data, $input)
    {
        $token = 'v^1.1#i^1#p^3#r^0#I^3#f^0#t^H4sIAAAAAAAAAOVXa2wUVRTu9oVQSn2CqSDLIKYRZ/fOzO7O7shusmzbtErbpdvWWizNPO60Q2dnJnNn2m4k0DThEUnUhARoYkh/NCKiCYgoEqIGY5AfiAQiJJJgBBJj6gNI0JhovLPdlm0NpQ9+bOL+2dxzz+s757t37gH9xfOf216z/Y9S17z8oX7Qn+9yUSVgfnHR6kUF+eVFeSBLwTXU/0x/4UDBT2sQn1QNrhEiQ9cQdPclVQ1xaWGYsE2N03mkIE7jkxBxlsglonXrONoDOMPULV3UVcJdWxkmGBDw+wIBCH0SI9MywFJtzGeTHibokBjk/YAN+SUBMoDH+wjZsFZDFq9ZeB9QLAkCJGCbKIajaY5mPT7G10a4W6CJFF3DKh5ARNLpcmlbMyvXqVPlEYKmhZ0QkdpodaIhWltZVd+0xpvlK5KpQ8LiLRtNXMV0CbpbeNWGU4dBaW0uYYsiRIjwRkYjTHTKRceSmUX66VLTAsXQlCRLshwM+aD0QEpZrZtJ3po6D0eiSKScVuWgZilW6n4VxdUQNkHRyqzqsYvaSrfzt97mVUVWoBkmqtZGX2lOVDUS7kQ8buo9igQlBykFaIYNMUwAZ9sn28mM/1EnmepOChDTNUlxaoXc9bq1FuJk4eSSUFklwUoNWoMZlS0nkWw9f6Z0mNdtTi9Hm2dbXZrTTpjE+N3p5f0LP8aEu71/UFyAPASCQLEsE/BDX3AKLjhnffp8iDgticbjXicXKPApMsmb3dAyVF6EpIjLayehqUgc45dpJihDUgqEZNIXkmVS8EsBkpIhBBAKghgK/g9oYVmmItgWHKfG5I00tjCREHUDxnVVEVPEZJX0DZMhQh8KE12WZXBeb29vr6eX8ehmp5cGgPK21q1LiF0wia/QMV3l/sqkkqaECLEVUjgrZeBs+jDjcHCtk4gwphTnTSuVgKqKBWN8nZBbZLL0HiCRAzK34Dn2CDvgDcXj0Nkj6kmvzuPj64g60hm7p6PkRbhAntHDgD17TMhLuqamZmM8AxtF68Gk0s3UtAI6Z/1eDmYQlBdF3das2WDMmM7AQrZVWVFV5+zMJmCW+UzS1Hg1ZSkiGg85J+JHDaNWyi3i62YXBikIpFMIXTNUMt5YSTIAX9khKcCSlE8MiX4I5oRbgj2KCDuUHMOu2ao6J1yVsCfX+inRgkz5GJpkRCFI+mQJn/XlFP7m+iVSoPxB2S8CGb/B54S7rjPXWhkMMD4QDNAhANg5QYupCr4imlK59oGq0ZEFpblBww/D3ALlXDVjN01IECRSDPpZ0kfJPjIYAgxJ83xwupAnCbIeWv95WnsnjrSRvPSPGnAdAwOuI3gqBl6wiloJVhQXNBcWLCxHigU9Ci97kNKp4UnNhJ5umDJ4xcwvdm1YevhgR9YQPdQOnhwfo+cXUCVZMzVYeneniCpbUkqxIABYPK7RNNsGVt7dLaQWFz6+6NnTa2/tZto+27YzvKEs76vQirLLoHRcyeUqyisccOW9SRytWDLy2PF686Otp/4eWMqd+OH0rdvbFj78W/W1xmW3j+4aKSG2X31BO05937p5r0eJvftQj//LfbGLDa2b9StNJftWp/YOl3+6us11YIdeRS24cPbQ69/84+qM/l76yI+DiY+Xw9g7+TXRWHTPoYqTT/88+NKl0hMfNJ1v3vL5E80L9t95+dSyszVvESNnFtw4WMDuqiCM6mvS199uOVmyu7lrVX/70IadIxtbjRubWga3fmdfdctLuovPHrl+pcwefv7cjrcvu0YORw88emPoWMcX89776/32N9TX7vxafqD9l0Pn/3y1JdZ37sULN+ni7nWnhhvq9pypOL5w84cX929MPrX4k+GOm+s3Xro+2r5/Adi4ea/eEAAA';

        $api_endpoint = "https://api.ebay.com/buy/browse/v1/item_summary/search";
        $compat_level = 967;
        $dev_id = "d2bf1432-3cb8-4fd1-b55d-b158f5c0f4d3";
        $cert_id = "PRD-08fe9d679bbd-c857-41f4-8903-2aa8";
        $app_id = "orhanabb-ebayonpl-PRD-308fe9d67-14c9c5e0";
        $auth_token = "AgAAAA**AQAAAA**aAAAAA**8Pw3WQ**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6AEkoGmAZOBpwydj6x9nY+seQ**troDAA**AAMAAA**ZAiGwt4p1/ZuF47hjIx/u/CeIinYimnVBSO1+dA+cHp3ZOtg+1gMOzztKt7xY5RaLBT2sXISS9Eq9exAN5KAjPx7h7iEupHq8xTfvkvvrhTDOA66sn1BCkKCVfUioT7O7k3gcbWrCm1dsrnUK/GvVw//EzckOpVlKf6Y1ZjrXs7rPO9phfBJrIrMGvhnkqWIikRy8EmBUjnPA2T9LDhP0yeiy4gWVJgnR7Rl6LLREtM3vUIkvnsTjvpbttlF8NIUdjeeqJFDV/ytKp5rktYZengrFADtwiHi8NMuJL/kpOE8A7udKqNfW4m6NmHtctyqnUjuKDt+XN1w0jjlBrA6YN9YTZc3cZBDMt3NJvXWY0n2lRHv3v96OQjrA1Ps+LBIETIxZKNv5k3Kr/GVo/a7mdEv6gzDVgTHdibj6YKDYLYchkyTM7o4Ua/uXO4kHEUwp9bQ0BFAW39L1fU8Xz7ETsouKSJUb67e7Uuzd5t3PlyczcxnGuB6iGSx/cjYzXgCO592/RRuW1RmL5DBTTcBumwmwY0oxWGnXAADws+f7POY1QNjXGrYkqQIdJsfKxQYVHnqVJPWIh5VZADpU4BYMrVuT6PEJ45GGpMhNVKIYfeTvjbLu6Fjq5I8SHSdYPxZlQlRYMdVR4tg7/MsdOYA9QAywX7A45MTYLB+vH3Vr+KD7i8mBz3lqB0U4mvzFAoCsNs500YEpwz8XB+dM45641AzBdGQ2HA8L45coyOWlXu/GUq4JR0+kSNa9EzmWCqL";

        $site_id = 0;
        $call_name = 'GetCategories';

        $headers = array
        (
            'Authorization:Bearer ' . $token,
            'Accept:application/json',
            'Content-Type:application/json',

        );

        $apicall = $api_endpoint;
        $apicall .= "?q=$keyword";


        $apicall .= "&sort=max";

        $apicall .= "&limit=10";

        $apicall .= "&offset=10";


        $connection = curl_init();
        curl_setopt($connection, CURLOPT_URL, $apicall);
        curl_setopt($connection, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($connection, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($connection, CURLOPT_POST, 0);

        curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($connection);
        curl_close($connection);


        $json = json_encode($response);
        $array = json_decode($response, TRUE);

        $data['info'] = $array;
        $data['item'] = $array['itemSummaries'];

    }

    static public function getItem($id, &$data)
    {
//מוצרים דומים
        $endpoint = 'http://svcs.ebay.com/MerchandisingService';
        $apicall = $endpoint;
        $apicall .= '?OPERATION-NAME=getSimilarItems';
        $apicall .= '&SERVICE-VERSION=1.1.0';
        $apicall .= '&CONSUMER-ID=orhanabb-ebayonpl-PRD-308fe9d67-14c9c5e0';
        $apicall .= '&RESPONSE-DATA-FORMAT=XML';
        $apicall .= '&REST-PAYLOAD';
        $apicall .= '&listingType=FixedPriceItem';
        $apicall .= '&country=IL';
        $apicall .= '&itemId=' . $id;

        $apicall .= '&maxResults=10';


        $resp = simplexml_load_file($apicall);
        $json = json_encode($resp);
        $resp = json_decode($json, TRUE);

        $data['moreitem'] = $resp;


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
        $data['variname'] = ['ENGLISH' => ['Size', 'Color'], 'Hebrew' => ['מידה', 'צבע']];
        $data['it'] = $resp['Item'];

        if (isset($resp['Item']['Variations']))
            if (0) {

                $data['varpictures'] = json_encode($resp['Item']['Variations']['Pictures']['VariationSpecificPictureSet']);
            }
        if (isset($_GET['dd'])) dd($data['it']);

    }


}
