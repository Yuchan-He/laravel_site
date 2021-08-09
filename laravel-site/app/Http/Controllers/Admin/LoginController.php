<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
    * @param null 
    * @return view login画面
    */
    public function index(){
        //　ユーザーの登録状態を確認、すでにログインのユーザーは直接ログイン画面に行く
        if (auth() ->guard('admin')-> check()){
            return redirect(route('front.article.index'));
        }else{
    	   return view('front.login.login');
        }
        
    }

	/**
	* 検証ログインのデータ
    * @param Request $request 
    * @return login 成功画面
    */
    public function login(Request $request){
        //  提出のデータをチェックする
    	$post = $this ->validate($request,
    		['username' => 'required',
    		 'password' => 'required'
    		
    	]);
        //  提出のデータをDBでチェックする
        $bool = auth() -> guard('admin') -> attempt($post);
        if(!$bool){
            return redirect(route('admin.login')) -> withErrors(['error' => 'ユーザー名か、パスワードが間違っています']);
        }else{
            $data = auth() -> guard('admin') -> user();
            // $roleModel_1 = $data -> role(); // 调用User模型中的role()方法，获得关联模型
            // $roleModel_2 = $data -> role() -> first(); // 获得role模型中第一个数据，user模型
            $roleModel_3 = $data -> role; // 调用role属性,触发方法get, 获得用户角色
            // dump($roleModel_1);
            // dump($roleModel_2);
            // dump($roleModel_3);
            // 从关联模型中，获得用户节点
            $node =  $roleModel_3 -> nodes() -> pluck('name','node_id') -> toArray();
            // dump($node);
            // 权限保存到session中
            session(['admin.node' => $node]);

            return redirect(route('admin.index'));
        }
                


    }


}
