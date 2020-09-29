<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Login;
class IndexController extends Controller
{
    public function index(){
    	//首页
    // $pwa=Login::where('is_new','1')->orderBy('goods_id','DESC')->limit(4)->get()->toArray();//最新
    // $get=Login::where( 'is_new', '2' )->orderBy( 'goods_id', 'DESC' )->limit(4)->get()->toArray();//热卖


    	return view('/index');
    }


}
