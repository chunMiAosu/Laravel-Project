<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Role;

class PeopleController extends Controller
{
    public function auditor()
    {
        $role_id = Role::where('type','=','审核员')->first()->id;
        $data = User::where('role_id','=',$role_id)->get();
        $user_name = session()->get('user_name');
        return view('admin.people.auditor',compact('data','user_name'));
    }
    public function author()
    {
        $role_id = Role::where('type','=','编辑员')->first()->id;
        $data = User::where('role_id','=',$role_id)->get();
        $user_name = session()->get('user_name');
        return view('admin.people.author',compact('data','user_name'));
    }
    public function general()
    {
        $role_id = Role::where('type','=','普通用户')->first()->id;
        $data = User::where('role_id','=',$role_id)->get();
        $user_name = session()->get('user_name');
        return view('admin.people.general',compact('data','user_name'));
    }
}
