<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\GoodsModel;
class HomeController extends Controller
{
    public function myorder(){
    	 $g = GoodsModel::orderBy('goods_id')->limit(4)->get()->toArray();
    	 $goods = GoodsModel::orderBy('goods_id')->limit(4)->get()->toArray();
    	 // dd($goods);
        return view('index.user.myorder',['g'=>$g,'goods'=>$goods],);
    }
}
