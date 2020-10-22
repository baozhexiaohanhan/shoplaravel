<?php

namespace App\Http\Controllers\seckill;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\GoodsModel;
use App\Model\Seckill;
class SeckillController extends Controller
{
    

    public function seckill(){

    	$res = Seckill::where('start_time','<','time()')->where('goods_price','>','goods_qprice')->get()->toArray();
    	return view('index.seckill.seckill',['res'=>$res]);
    }
}
