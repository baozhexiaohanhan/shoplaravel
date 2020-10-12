<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\Region;

class OrderController extends Controller
{
    
    public function confrimorder(Request $request){
    	
        $cart_id  = $request->cart_id;
        $address  = $request->address;
        $user = session()->get('user_id');
        if(!$user){
            return redirect('/login');die;
        }
        $address = Order::where('user_id',$user)->get();
        $address = $address?$address->toArray():[];
        $region = Region::where('parent_id',0)->get();
        $jyl = Order::where('user_id',$user)->get();
        $reg = new Region;
        foreach($jyl as $k=>$v){
            $jyl[$k]['country'] = $reg->where('region_id',$v->country)->value('region_name'); 
            $jyl[$k]['province'] = $reg->where('region_id',$v->province)->value('region_name');
            $jyl[$k]['city'] = $reg->where('region_id',$v->city)->value('region_name');
            $jyl[$k]['district'] = $reg->where('region_id',$v->district)->value('region_name');
            $jyl[$k]['tel'] = substr($v->tel,0,3)."****".substr($v->tel,7,4);
        }
        return view('index.order.confrimorder',['address'=>$address,'region'=>$region,'jyl'=>$jyl]);

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
