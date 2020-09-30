<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Login;
use App\Model\Index;
use App\Model\Category;
class IndexController extends Controller
{
    public function index(){
    	//首页
   // $goods = Index::get()->toArray();
        $goods = Index::orderBy('goods_id')->limit(12)->get()->toArray();
        $nue = Index::orderBy('goods_id','desc')->limit(4)->get()->toArray();
        $word = Index::orderBy('goods_id','desc')->limit(3)->get()->toArray();

        // $category = Category::all()->toArray();
         $good = $this->luobotu();
         // dd($good);
        //获取分类数据
        $catedata = $this->putcate();
        //无限极分类
        $tree = $this->Treecate($catedata);
    	return view('/index',['goods'=>$goods,'nue'=>$nue,'word'=>$word,'tree'=>$tree,'good'=>$good]);
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

    	public function Treecate($catedata,$parent_id=0,$level=0){
        $tree = [];
        foreach($catedata as $k=>$v){
            if($v['parent_id'] == $parent_id){
                $tree[$k] = $v;
                $tree[$k]['son'] =  $this->Treecate($catedata,$v['cat_id'],$level+1);
            }
        }
        return $tree;
    }

    //轮播图
    public function luobotu(){
        $goods = Index::select('goods_id','goods_img')
            ->where('is_show',1)
            ->orderBy('goods_id','desc')
            ->take(3)
            ->get()
            ->toArray();
        return $goods;
    }

    //获取分类数据
    public function putcate(){
        $catedata = Category::get();
        return $catedata;
    }
}
