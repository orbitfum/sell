<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;


class Search extends Model
{

    protected $table = 'search_tags';

    static public function AddTag($keyword, $enkeyword)
    {
        if(preg_match('/[א-ת]/', $keyword)) {
            $check = Search::where('searchkey', $keyword)->get()->toArray();


            if (count($check)) {
                $search = Search::find($check[0]['id']);
                $search->numsearch = $check[0]['numsearch'] + 1;
                $search->save();
            } else {
                $search = new Search;
                $search->searchkey = $keyword;
                $search->english_word = $enkeyword;
                $search->numsearch = $search->numsearch + 1;
                $search->save();
            }
        }
    }

}
