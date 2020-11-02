<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Model\GoodsModel;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\BrandModel;
use App\Model\Goodsattr;
class HomeController extends Controller
{
    public function myorder(){
    	 $g = GoodsModel::orderBy('goods_id')->limit(4)->get()->toArray();
    	 $goods = GoodsModel::orderBy('goods_id')->limit(4)->get()->toArray();
    	 $goods_id = 1;
    	 // dd($goods);
    	  $guige = $this->guige($goods_id);
        return view('index.user.myorder',['g'=>$g,'goods'=>$goods,'$guige'=>$guige]);
    }

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
       public function getattrprice(){
         $goods_attr_id = request()->goods_attr_id;
         $goods_id = request()->goods_id;

        $attr_price = GoodsAttr::whereIn('goods_attr_id',$goods_attr_id)
                     ->sum('attr_price');
                    //  dd($attr_price);
        $end_price = GoodsModel::where('goods_id',$goods_id)->value('shop_price')+$attr_price;
        $end_price = number_format($end_price,2,".","");
        return json_encode(['code'=>0,'msg'=>'OK','data'=>$end_price]);
        // dd($end_price);
     }
}
