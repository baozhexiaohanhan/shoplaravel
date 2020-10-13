<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\Region;
use App\Model\Goodsattr;
use App\Model\CartModel;
class OrderController extends Controller
{
    
    public function confrimorder(Request $request){
    	$rec_id = $request->rec_id?explode(',',$request->rec_id):[];
        $cart_id  = $request->cart_id;
        $address  = $request->address;
        $user = session()->get('user_id');
        if(!$user){
            return redirect('/login');die;
        }
        $cart = CartModel::select('ecs_cart.*','ecs_goods.goods_thumb')->leftjoin('ecs_goods','ecs_cart.goods_id','=','ecs_goods.goods_id')->whereIn('rec_id',$rec_id)->get();
         foreach ($cart as $k=>$v){
            if($v->goods_attr_id){
                $goods_attr_id = explode('|', $v->goods_attr_id);
                $goods_attr = Goodsattr::select('attr_name','attr_value')->leftjoin('attribute','ecs_goods_attr.goods_id','=','attribute.attr_id')->whereIn('goods_attr_id',$goods_attr_id)->get();
                $cart[$k]['goods_attr']=$goods_attr?$goods_attr->toArray():[];
            }
         }
        $address = Order::where('user_id',$user)->get();
        $address = $address?$address->toArray():[];
        $region = Region::where('parent_id',0)->get();
        $zxp = Order::where('user_id',$user)->get();
        $reg = new Region;
        foreach($zxp as $k=>$v){
            $zxp[$k]['country'] = $reg->where('region_id',$v->country)->value('region_name'); 
            $zxp[$k]['province'] = $reg->where('region_id',$v->province)->value('region_name');
            $zxp[$k]['city'] = $reg->where('region_id',$v->city)->value('region_name');
            $zxp[$k]['district'] = $reg->where('region_id',$v->district)->value('region_name');
            $zxp[$k]['tel'] = substr($v->tel,0,3)."****".substr($v->tel,7,4);
        }
        return view('index.order.confrimorder',['address'=>$address,'region'=>$region,'zxp'=>$zxp,'cart'=>$cart]);

    }

    public function getsondata(Request $request){
        $region_id  = $request->region_id; 
        $region_son = Region::where('parent_id',$region_id)->get();
    
        return json_encode(['code'=>0,'msg'=>'OK','data'=>$region_son]);
        


    }

    public function store(Request $request){
        $rec_id = $request->rec_id;
        $post = $request->except('_token');
        $res = Order::insert($post);
        if($res){
             return  redirect('/confrimorder');
        }
    }


}
