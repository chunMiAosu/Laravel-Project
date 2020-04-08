<?php

namespace App\Http\Controllers;

use App\Model\Article;
use App\Model\AType;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Role;
use DB;

class LoginController extends Controller
{
    //注册
    public function register()
    {
        return view('register');
    }

    public function doRegister(Request $request)
    {
        //接受数据 email password repassword
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
            return redirect('/register')
                ->withErrors($validator)
                ->withInput();
        }
        //验证psw和repsw是否一样
        if ($input['password'] != $input['repassword'])
        {
            return redirect('/register')
                ->withErrors('两次密码输入不一致');
        } else
        {
            //查看用户是否已经存在
            $exist = User::where('email', '=', $input['email'])->first();

            if ($exist)
            {
                return redirect('/register')
                    ->withErrors('用户已存在');
            }
            $role_id = Role::where('type', '=', '普通用户')->first()->id;
            $user = new User();
            $user->email = $input['email'];
            $user->password = $input['password'];
            $user->role_id = $role_id;
            $res = $user->save();
            if ($res)
            {
                return redirect('/login');
            }
        }
    }

    //登录页面
    public function login()
    {
//        如果用于已经登录，直接跳转到登录后页面
        if (session()->get('user_id'))
        {
            $route = "App\Http\Controllers\LoginController@index";
            if (in_array($route, session()->get('permission')))
            {
                return redirect('/admin/index');
            } else
            {
                return redirect('/home');
            }
        }
        return view('login');
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
            return redirect('/login')
                ->withErrors($validator)
                ->withInput();
        }

        //验证用户是否存在
        $user = User::where('email', '=', $input['email'])->first();
        if (!$user)
        {
            //用户不存在
            return redirect('/login')
                ->withErrors('用户不存在');
        } else
        {
            //用户存在
            //验证密码是否正确
            if ($input['password'] != $user->password)
            {
                return redirect('/login')
                    ->withErrors('密码错误');
            } else
            {
                //存用户id和用户拥有的权限到session
                session(['user_id' => $user['id']]);
                session(['user_name' => $user['name']]);
                $role = $user->role;
                $arr = [];//存放权限对应的url
                $pers = $role->permission;
                foreach ($pers as $p)
                {
                    $arr[] = $p->per_url;
                }
                session(['permission' => $arr]);
                if ($user->role->type == "普通用户")
                {
                    return redirect('/home');
                } else
                {
                    return redirect('/admin/index');
                }
            }
        }
    }

    //后台首页
    public function index()
    {
        $user_name = session()->get('user_name');
        return view('admin.index',compact('user_name'));
    }

    //退出登录
    public function logout()
    {
        //清空session
        session()->flush();
        return redirect('/login');
    }

    //返回没有权限的提示
    public function noPermission()
    {
        return view('noPermission');
    }

    //返回网站首页
    public function home()
    {
        $user_id = session()->get('user_id');
        $name = User::where('id','=',$user_id)->first()->name;
        $article = Article::where('status','=','success')->get();
        for($i=0;$i<count($article);$i++)
        {
            $tmp = User::where('id','=',$article[$i]->author)->first()->name;
            $article[$i]->author = $tmp;
        }
        return view('home',compact('name','article'));
    }
    public function homeType($type)
    {
        $user_id = session()->get('user_id');
        $name = User::where('id','=',$user_id)->first()->name;
        $a_type = AType::where('type','=',$type)->first()->id;
        $article = Article::where('status','=','success')->where('type','=',$a_type)->get();
        for($i=0;$i<count($article);$i++)
        {
            $tmp = User::where('id','=',$article[$i]->author)->first()->name;
            $article[$i]->author = $tmp;
        }
        return view('home',compact('name','article'));
    }
}
