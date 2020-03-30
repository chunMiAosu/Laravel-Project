<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Model\User;
use App\Model\Role;

class LoginController extends Controller
{
    //登录页面
    public function login()
    {
//        如果用于已经登录，直接跳转到后台首页
        if (session()->get('user_id'))
        {
            return redirect('/admin/index');
        }
        return view('admin.login');
    }

    //处理登录事件
    public function doLogin(Request $request)
    {
        //接受数据 email password
        $input = $request->except('_token');

        //表单验证
        $rule = [
            'email' => 'required|email:rfc,dns',
            'password' => 'required|max:16|min:6'
        ];
        $msg = [
            'email.required' => '邮箱必须输入',
            'email.email' => '邮箱格式错误',
            'password.required' => '密码必须输入',
            'password.max' => '密码长度必须小于16',
            'password.min' => '密码长度必须大于6'
        ];
        $validator = Validator::make($input, $rule, $msg);
        if ($validator->fails())
        {
            return redirect('/admin/login')
                ->withErrors($validator)
                ->withInput();
        }

        //验证用户是否存在
        $user = User::where('email', '=', $input['email'])->first();
        if (!$user)
        {
            //用户不存在
            return redirect('/admin/login')
                ->withErrors('用户不存在');
        } else
        {
            //用户存在
            //验证密码是否正确
            if ($input['password'] != $user->password)
            {
                return redirect('/admin/login')
                    ->withErrors('密码错误');
            } else
            {
                //存用户到session
                session(['user_id' => $user['id']]);
                return redirect('/admin/index');
            }
        }
    }

    //后台首页
    public function index()
    {
        return view('admin.index');
    }

    //退出登录
    public function logout()
    {
        //清空session
        session()->flush();
        return redirect('/admin/login');
    }
}
