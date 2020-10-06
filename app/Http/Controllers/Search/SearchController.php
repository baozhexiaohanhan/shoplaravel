<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Search;
class SearchController extends Controller
{
    
    public function index(){
    	$key = Search::orderBy('goods_id')->limit(20)->get()->toArray();

    	return view('item.search',['key'=>$key]);
    }

    public function key($id){
    	
    	$key=Search::where('goods_id',$id)->get()->toArray();
        $aaa = Search::orderBy('goods_id','asc')->limit(5)->get()->toArray();

        $App =Search::where('goods_id',$id)->get()->toArray();
    	return view('key.index',['key'=>$key,'aaa'=>$aaa,'App'=>$App]);
    }


}
