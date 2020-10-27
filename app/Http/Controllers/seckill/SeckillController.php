<?php

namespace App\Http\Controllers\seckill;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\GoodsModel;
use App\Model\Goodsattr;
use App\Model\Seckill;
use App\Model\ProductModel;
use Illuminate\Support\Facades\Redis;

class SeckillController extends Controller
{
    

    public function seckill(){
            $user = session('user_id');
        if(!$user){
           return redirect('/login');
        }

    	$res = Seckill::where('start_time','<','time()')->where('goods_price','>','goods_qprice')->get()->toArray();
    	return view('index.seckill.seckill',['res'=>$res]);

    }


     public function items($goods_id){

       $user = session('user_id');
        if(!$user){
           return redirect('/login');
        }

            if(!$goods_id){
                abort('没有此活动');
            }
        $time = time();
        //统计点击属性
        $hits = Redis::zincrby('item_',1,'item_'.$goods_id);
        //取最高的5条
      
        $attr = $this->putattr($goods_id);
        //简介
        $jianjie = $this->jianjie($goods_id);
        //规格
        $guige = $this->guige($goods_id);
        $goods=Seckill::where('goods_id',$goods_id)->get()->toArray();
        $good = GoodsModel::orderBy('goods_id','desc')->limit(5)->get()->toArray();
        $goo = Seckill::where('goods_id',$goods_id)->get()->toArray();
        // dd($goo);
        return view('index.seckill.items',['goods'=>$goods,'good'=>$good,'goo'=>$goo,'attr'=>$attr,'jianjie'=>$jianjie,'guige'=>$guige,'hits'=>$hits,'time'=>$time,'user_id'=>$user]);
    }
      //属性

    public function putattr($goods_id){
        $goodsattr = Goodsattr::select('goods_attr_id','ecs_goods_attr.attr_id','attribute.attr_name','ecs_goods_attr.attr_value')
                     ->leftjoin('attribute','ecs_goods_attr.attr_id','=','attribute.attr_id')
                     ->where(['goods_id'=>$goods_id,'attribute.attr_type'=>0])
                     ->get();
        return $goodsattr;
     }
     //简介
     public function jianjie($goods_id){
        $janj = GoodsModel::select('goods_id','goods_desc')
                ->where('goods_id',$goods_id)
                ->first();
        return $janj;
     }
     //规格
     public function guige($goods_id){  
        $guige = Goodsattr::select('goods_attr_id','ecs_goods_attr.attr_id','attribute.attr_name','ecs_goods_attr.attr_value')
        ->leftjoin('attribute','ecs_goods_attr.attr_id','=','attribute.attr_id')
        ->where(['goods_id'=>$goods_id,'attribute.attr_type'=>1])
        ->get();

        $data = [];
        if( $guige ){
            foreach($guige as $k=>$v){
                $data[$v['attr_id']]['attr_name'] = $v['attr_name'];
               $data[$v['attr_id']]['attr_value'][$v['goods_attr_id']] =  $v['attr_value'];     
             }
             return $data;
        }
        return $guige;
     }
}
