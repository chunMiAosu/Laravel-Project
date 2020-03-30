<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Article;
use App\Model\User;
use App\Model\Role;
use DB;
use PhpParser\Node\Expr\Cast\Object_;

class ArticleController extends Controller
{
    //根据不同文章分类查找文章并返回给前端
    public function article(Request $request)
    {
        $type = $request -> input('type');
        $article_type = new class{};
        if($type == 'politics')
        {
            $article_type = DB::table('article_type')->where('type','=','时政')->first();
        }
        elseif ($type == 'finance')
        {
            $article_type = DB::table('article_type')->where('type','=','财经')->first();
        }
        elseif ($type == 'military')
        {
            $article_type = DB::table('article_type')->where('type','=','军事')->first();
        }
        elseif ($type == 'education')
        {
            $article_type = DB::table('article_type')->where('type','=','教育')->first();
        }
        elseif ($type == 'sports')
        {
            $article_type = DB::table('article_type')->where('type','=','体育')->first();
        }
        $data = Article::where('type','=',$article_type->id)->where('status','=','success')->get();
        $article = array(
            array(
                "id" => -1,
                "content" => "",
                "author" => "",
                "auditor" => "",
                "topic" => ""
            ),
        );
        $i = 0;
        foreach ($data as $d)
        {
            $article[$i]['id'] = $d->id;
            $article[$i]['content'] = $d->content;
            $article[$i]['author'] = User::where('id','=',$d->author)->first()->name;
            $article[$i]['auditor'] = User::where('id','=',$d->auditor)->first()->name;
            $article[$i]['topic'] = $d->topic;
            $i++;
        }
        if($i == 0)
            $article = [];
        return view('admin.article.'.$type,compact('article'));
    }

    //删除
    public function delete(Request $request)
    {
        $res = 0;
        $article_id = $request->input("id");
        //查看当前登录用户的角色，是审核员才能删除
        $role_id = Role::where('type','=','审核员')->first()->id;
        $userRole_id = User::where('id','=',session()->get('user_id'))->first()->role_id;

        if($role_id == $userRole_id)
        {
            $data = Article::find($article_id);
            $data -> delete();
            $res = 1;
        }
        return $res;
    }
}
