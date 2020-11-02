<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CartModel;
use App\Model\GoodsModel;
use App\Model\Category;
use App\Model\BrandModel;
use App\Model\Goodsattr;
use App\Model\ProductModel;
use DB;
class CartController extends Controller
{
    public function addcart(Request $request){
        //判断是否登录
        // $user = session('user_name');
        $user = session('user_id');
        // dd($user);
        if(!$user){
            return json_encode(['code'=>1,'msg'=>'没有登录']);
        }
        //判断商品ID和购买数量
               $goods_id = $request->goods_id;
                $buy_number = $request->buy_number;
                $goods_attr_id = $request->goods_attr_id;
                if(!$goods_id || !$buy_number){
                     return json_encode(['code'=>20000,'msg'=>'缺失参数']);
                }
        //根据商品的ID判断商品是否上下架
        $goods = GoodsModel::select('goods_id','goods_name','goods_sn','shop_price','is_on_sale','goods_number')->find($goods_id);
        if(!$goods->is_on_sale){
            return json_encode(['code'=>30000,'msg'=>'商品已经下架']);
        }
        //判断规格 再根据规格判断库存
        if($goods_attr_id){
            $goods_attr_id = implode('|',$goods_attr_id);
            //查询规格
             $product = ProductModel::select('product_id','product_number')->where(['goods_id'=>$goods_id,'goods_attr'=>$goods_attr_id])->first();
            //  echo $product_number;exit;
            if($product->product_number<$buy_number){
                return json_encode(['code'=>40000,'msg'=>'商品库存不足1']);
            }
        }else{
            if($goods->goods_number<$buy_number){
                return json_encode(['code'=>50000,'msg'=>'商品库存不足']);
            }
        }
        //根据当前用户的ID判断购物车是否有此商品,没有的话商品添加数据库，有的话更改数据库数量
        $cart = CartModel::where(['user_id'=>$user,'goods_id'=>$goods_id,'goods_attr_id'=>$goods_attr_id])->first();
         // dd($cart);
        if($cart){
            //更新数据库
            $buy_number = $cart->buy_number+$buy_number;
            // dd($buy_number);
             if($goods_attr_id){
           //  echo $product_number;exit;
            if($product->product_number<$buy_number){
                // echo '111';
                $buy_number = $product->product_number;
            }
        }else{
            if($goods->goods_number<$buy_number){
                $buy_number = $goods->product_number;
            }
        }
        $res = CartModel::where(['user_id'=>$user,'goods_id'=>$goods_id,'goods_attr_id'=>$goods_attr_id])->update(['buy_number'=>$buy_number]);
        if($res){
            return json_encode(['code'=>60000,'msg'=>'加入购物车成功']);
        }
        }else{
             $data = [
            'user_id'=>$user,
            'product_id'=>$product->product_id??0,
            'buy_number'=>$buy_number,
            'goods_attr_id'=>$goods_attr_id??''
        ];
        $goods = $goods?$goods->toArray():[];
        unset($goods['is_on_sale']);
        unset($goods['goods_number']);
        // dd($goods);
        $data = array_merge($data,$goods);
        $res = CartModel::insert($data);
        }
        if($res){
            return json_encode(['code'=>70000,'msg'=>'成功加入购物车']);
        }
    }
    //购物车列表
    public function cart(){
        $user = session('user_id');
        if(!$user){
           return redirect('/login');
        }

         $cart = CartModel::select('ecs_cart.*','ecs_goods.goods_thumb')->leftjoin('ecs_goods','ecs_cart.goods_id','=','ecs_goods.goods_id')->where('user_id',$user)->get();
         foreach ($cart as $k=>$v){
            if($v->goods_attr_id){
                $goods_attr_id = explode('|', $v->goods_attr_id);
                $goods_attr = Goodsattr::select('attr_name','attr_value')->leftjoin('attribute','ecs_goods_attr.goods_id','=','attribute.attr_id')->whereIn('goods_attr_id',$goods_attr_id)->get();
                $cart[$k]['goods_attr']=$goods_attr?$goods_attr->toArray():[];
            }
         }

          $cnm  = GoodsModel::where('is_new','=','1')->limit(5)->get();

            $act_id = \DB::table('user_activity')->where('user_id',$user)->pluck('act_id');

            $pss = \DB::table('ecs_activity')->get();
            $ps = \DB::table('ecs_activity')->limit(1)->get();

        return view('index.cart.cart',['cart'=>$cart,'cnm'=>$cnm,'act_id'=>$act_id,'pss'=>$pss,'ps'=>$ps]);
    }

    public function getcartprice(){
        $cart_id = request()->cart_id;
        if(!count($cart_id)){
            return json_encode(['code'=>70000,'msg'=>'error','data'=>'0.00']);
        }
        $cart_id = implode(',',$cart_id);
        $total = DB::select("select sum(shop_price*buy_number) as total from ecs_cart where cart_id in ($cart_id)");
        $total = $total?$total[0]->total:0;
         return json_encode(['code'=>80000,'msg'=>'OK','data'=>$total]);

    }

     public function destroy($cart_id)
    {
        $res = CartModel::destroy($cart_id);
        if($res){
            if(request()->ajax()){
                return json_encode(['code'=>'0000','msg'=>'删除成功']);
            }
        return redirect('/cart');

        }
    }

    public function ecs_activity(Request $request){
        $user = session('user_id');
        // dd($user);
        if(!$user){
            return json_encode(['code'=>1,'msg'=>'没有登录']);
        }
         $goods_id = $request->goods_id;
         $act_id = $request->act_id;
        $data = ['user_id'=>$user,'act_id'=>$act_id];
        $count = \DB::table('user_activity')->where($data)->count();
        if($count){
              return json_encode(['code'=>'1','msg'=>'你已经领取过了不能太贪心呦！！！']);

        }
        $res = \DB::table('user_activity')->insert($data);
        if($res){
              return json_encode(['code'=>'0','msg'=>'领取成功']);
        }
            }
}