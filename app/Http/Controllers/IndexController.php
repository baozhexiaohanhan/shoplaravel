<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Login;
use App\Model\Index;
class IndexController extends Controller
{
    public function index(){
    	//首页
   // $goods = Index::get()->toArray();
        $goods = Index::orderBy('goods_id')->limit(12)->get()->toArray();
        $nue = Index::orderBy('goods_id','desc')->limit(4)->get()->toArray();
        $word = Index::orderBy('goods_id','desc')->limit(3)->get()->toArray();
   // dd($goods);
    	return view('/index',['goods'=>$goods,'nue'=>$nue,'word'=>$word]);
    }

    public function kile($id){
    	//详情
        $key = Index::orderBy('goods_id')->limit(6)->get()->toArray();
    	$aaa=Index::where('goods_id',$id)->get()->toArray();
    	$bbb = Index::orderBy('goods_id','desc')->limit(5)->get()->toArray();
    	$ccc = Index::where('goods_id',$id)->get()->toArray();
    	$ddd=Index::where('goods_id',$id)->get()->toArray();
    	return view('item.item',['aaa'=>$aaa,'bbb'=>$bbb,'ccc'=>$ccc,'key'=>$key,'ddd'=>$ddd]);
    }


}
