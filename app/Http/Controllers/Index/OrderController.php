<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\Region;

class OrderController extends Controller
{
    
    public function confrimorder(Request $request){
    	$user = session('user_id');
        if(!$user){
            return redirect('/login');
        }
        $rec_id = $request->rec_id;
        $address = Order::where('user_id',$user)->get();
       dd($address);
    return view('index.order.confrimorder');

    }

}
