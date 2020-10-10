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

        return view('index.order.confrimorder',['address'=>$address,'region'=>$region]);
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
              return redirect('/confrimorder');
        }
    }


}
