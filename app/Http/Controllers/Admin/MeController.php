<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\Handler;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Model\Article;
use App\Model\Draft;
use App\Model\User;
use App\Model\Role;
use App\Model\AType;

class MeController extends Controller
{
    //edit
    public function editor(Request $request)
    {
        $draft_data = array(
            'topic' => null,
            'content' => null,
            'type' => null
        );
        $a_id = $request->input('id');
        if ($a_id) //草稿箱点击继续编辑
        {
            //获取草稿箱中选中的文章数据
            $data = Draft::where('id', '=', $a_id)->first();
            $draft_data['topic'] = $data->topic;
            $draft_data['content'] = $data->content;
            if ($data->type)
            {
                $draft_data['type'] = DB::table('article_type')->where('id', '=', $data->type)->first()->type;
            }
            //删除草稿箱中该数据
            Draft::find($a_id)->delete();
        }
        //获取所有文章分类
        $article_type = DB::table('article_type')->get();
        return view('admin.me.editor', compact('article_type', 'draft_data'));
    }

    public function editorAction(Request $request)
    {
        $input = $request->input('act');
        $res = false;
        //获取当前登录用户的id topic content
        $user_id = session()->get('user_id');
        $topic = $request->input('topic');
        $content = $request->input('content');
        $type = $request->input('type');
        if($input == "submit")
        {
            if ($topic && $content && $type) //都有数据才能提交成功
            {
                //获取type的id
                $type_id = DB::table('article_type')->where('type', '=', $type)->first()->id;
                //将数据存到数据库(文章待审核 没有auditor)
                $article = new Article();
                $article->content = $content;
                $article->type = $type_id;
                $article->author = $user_id;
                $article->topic = $topic;
                $article->status = "working";
                $res = $article->save();
            }

            if ($res)
            {
                $data = [
                    'status' => 0,
                    'message' => '提交成功'
                ];
            } else
            {
                $data = [
                    'status' => 1,
                    'message' => '提交失败'
                ];
            }
        }
        else if($input == "saveDraft")
        {
            $type_id = null;
            if ($type)
            {
                $type_id = DB::table('article_type')->where('type', '=', $type)->first()->id;
            }

            if ($topic || $content || $type)
            {
                $draft = new Draft();
                $draft->author = $user_id;
                $draft->topic = $topic;
                $draft->content = $content;
                $draft->type = $type_id;
                $res = $draft->save();
            }
            if ($res)
            {
                $data = [
                    'status' => 2,
                    'message' => '存入草稿箱成功'
                ];
            } else
            {
                $data = [
                    'status' => 3,
                    'message' => '存入草稿箱失败'
                ];
            }
        }
        return $data;
    }


    //草稿箱
    public function draft()
    {
        //获取当前用户草稿箱的内容
        $data = Draft::where('author', '=', session()->get('user_id'))->get();
        $article = array(
            array(
                'id' => -1,
                "type" => "",
                "content" => "",
                "topic" => ""
            ),
        );
        $i = 0;
        foreach ($data as $d)
        {
            $article[$i]['id'] = $d->id;
            $article[$i]['content'] = $d->content;
            $article[$i]['topic'] = $d->topic;
            if ($d->type)
            {
                $article[$i]['type'] = DB::table('article_type')->where('id', '=', $d->type)->first()->type;
            } else
                $article[$i]['type'] = "";
            $i++;
        }
        $count = $i;
        return view('admin.me.draft', compact('article', 'count'));
    }

    //等待审核（审核员）
    public function auditorWorking()
    {
        //当前用户是审核员，返回全部需要审核的文章
        $data = Article::where('status', '=', 'working')->get();
        for($i=0;$i<count($data);$i++)
        {
            $tmp = User::where('id','=',$data[$i]->author)->first()->name;
            $data[$i]->author = $tmp;
            $data[$i]->type = $data[$i]->aType->type;
        }
        return view('admin.me.auditorWorking', compact('data'));
    }

    //审核员做出审核
    public function auditorWorkingRes($id,$res)
    {
        if($res == "success")
        {
            //auditor字段改为当前用户id，status改为success
            $data = Article::find($id);
            $data -> auditor = session()->get('user_id');
            $data -> status = "success";
            $data -> publish = 'yes';
            $data -> save();
        }
        else
        {
            $data = Article::find($id);
            $data -> auditor = session()->get('user_id');
            $data -> status = "fail";
            $data -> publish = "no";
            $data -> save();
        }
        return redirect()->back();
    }

    //审核员查看审核结果
    public function auditorRes($status)
    {
        $data = array();
        if($status == "success")
        {
            $data = Article::where('status','=','success')->where('auditor','=',session()->get('user_id'))->get();
        }
        else
        {
            $data = Article::where('status','=','fail')->where('auditor','=',session()->get('user_id'))->get();
        }
        for($i=0;$i<count($data);$i++)
        {
            $tmp = User::where('id','=',$data[$i]->author)->first()->name;
            $data[$i]->author = $tmp;
            $data[$i]->type = $data[$i]->aType->type;
        }
        return view('admin.me.auditorRes',compact('data'));
    }

    //正在审核中（编辑员）
    public function authorWorking()
    {
        $data = Article::where('status','=','working')->where('author','=',session()->get('user_id'))->get();
        for($i=0;$i<count($data);$i++)
        {
            $tmp = $data[$i]->aType->type;
            $data[$i]->type = $tmp;
        }
        return view('admin.me.authorWorking',compact('data'));
    }

    //编辑员查看审核结果
    public function authorRes($status)
    {
        $data = array();
        if($status == "success")
        {
            $data = Article::where('status','=','success')->where('author','=',session()->get('user_id'))->get();
        }
        else
        {
            $data = Article::where('status','=','fail')->where('author','=',session()->get('user_id'))->get();
        }
        for ($i=0;$i<count($data);$i++)
        {
            $tmp = User::where('id','=',$data[$i]->auditor)->first()->name;
            $data[$i]->auditor = $tmp;
            $data[$i]->type = $data[$i]->aType->type;
        }
        return view('admin.me.authorRes',compact('data'));
    }

}
