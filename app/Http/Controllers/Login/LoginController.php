<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
use App\Model\Login;
class LoginController extends Controller
{
    public function login(){


    	return view('/login');
    }

    public function register(){

    	return view('/register');
    }

    public function registerdo(Request $request){
       $admin_name = $request->post('admin_name');
        $admin_pwd = $request->post('admin_pwd');
        $admin_pwds = $request->post('admin_pwds');
        $admin_tel = $request->post('admin_tel');
        $admin_email = $request->post('admin_email');
        $len = strlen($admin_pwd);
        $t = Login::where(['admin_tel'=>$admin_tel])->first();
        $a = Login::where(['admin_name'=>$admin_name])->first();
        if($t){
            return json_encode(['code'=>'00001','msg'=>'手机号已存在']);
        }
        if($a){
            return json_encode(['code'=>'00002','msg'=>'用户名已存在']);
        }
        if($len<6){
            return json_encode(['code'=>'00003','msg'=>'密码长度不能小于六位']);
        }
        if($admin_pwds != $admin_pwd){
            return json_encode(['code'=>'00004','msg'=>'确认密码与密码不一致']);
        }
        $admin_pwd = password_hash($admin_pwd,PASSWORD_BCRYPT);
        $data = [
            'admin_name' => $admin_name,
            'admin_tel' => $admin_tel,
            'admin_pwd'=>$admin_pwd,
            'admin_email'=>$admin_email,
            'time'=>time()
        
        ];
        $res = Login::insert($data);
        // dd($res);
        if(!$res){
            return json_encode(['code'=>'00005','msg'=>'注册失败']);
        }else{
            return json_encode(['code'=>'00000','msg'=>'注册成功']);
        }
    }

    public function logindo(Request $request){
        
        $admin_tel = $request->post('admin_tel');
        $admin_pwd = $request->post('admin_pwd');
        $time_goods = $request->post('time_goods');
        $u = Login::where(['admin_tel'=>$admin_tel])->first();
        if(!$u){
            return json_encode(['code'=>'00002','msg'=>'账号错误']);
        }else{
            $res = password_verify($admin_pwd,$u->admin_pwd);
            if(!$res){
                return json_encode(['code'=>'00001','msg'=>'密码错误']);
            }else{

                session(['admin_tel' => $u['admin_tel']]);
                session(['admin_id' => $u['admin_id']]);
                session(['admin_name' => $u['admin_name']]);
                $request->session()->save();
                $where=[
                    ["admin_id","=",$u['admin_id']]
                ];
                Login::where($where)->update(['time_goods'=>time()]);
                return json_encode(['code'=>'00000','msg'=>'登录成功']);
            }
        }

        }


    }
    




