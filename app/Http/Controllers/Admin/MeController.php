<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Model\Article;
use App\Model\Draft;

class MeController extends Controller
{
    //IDE
    public function editor(Request $request)
    {
        $draft_data = array(
            'topic' => null,
            'content' => null,
            'type' => null
        );
        $a_id = $request -> input('id');
        if($a_id) //草稿箱点击继续编辑
        {
            //获取草稿箱中选中的文章数据
            $data = Draft::where('id','=',$a_id)->first();
            $draft_data['topic'] = $data->topic;
            $draft_data['content'] = $data->content;
            if($data->type)
            {
                $draft_data['type'] = DB::table('article_type') -> where('id','=', $data->type) -> first()->type;
            }
            //删除草稿箱中该数据
             Draft::find($a_id)->delete();
        }
        //获取所有文章分类
        $article_type = DB::table('article_type') -> get();
        return view('admin.me.editor',compact('article_type','draft_data'));
    }

    //对IDE提交的内容进行处理
    public function doEditor(Request $request)
    {
        //获取当前登录用户的id topic content
        $res = false;
        $user_id = session()->get('user_id');
        $topic = $request -> input('topic');
        $content = $request -> input('content');
        $type = $request -> input('type');
        if($topic && $content && $type) //都有数据才能提交成功
        {
            //获取type的id
            $type_id = DB::table('article_type')->where('type','=',$type)->first()->id;
            //将数据存到数据库(文章待审核 没有auditor)
            $article = new Article();
            $article->content = $content;
            $article->type = $type_id;
            $article->author = $user_id;
            $article->topic = $topic;
            $article->status = "working";
            $res = $article->save();
        }

        if($res)
        {
            $data = [
                'status' => 0,
                'message' => '提交成功'
            ];
        }
        else
        {
            $data = [
                'status' => 1,
                'message' => '提交失败'
            ];
        }
        return $data;
    }
    public function saveDraft(Request $request)
    {
        $res = false;
        $user_id = session()->get('user_id');
        $topic = $request -> input('topic');
        $content = $request -> input('content');
        $type = $request -> input('type');
        $type_id = null;
        if($type)
        {
            $type_id = DB::table('article_type')->where('type','=',$type)->first()->id;
        }

        if($topic || $content || $type)
        {
            $draft = new Draft();
            $draft->author = $user_id;
            $draft->topic = $topic;
            $draft->content = $content;
            $draft->type = $type_id;
            $res = $draft->save();
        }
        if($res)
        {
            $data = [
                'status' => 2,
                'message' => '存入草稿箱成功'
            ];
        }
        else
        {
            $data = [
                'status' => 3,
                'message' => '存入草稿箱失败'
            ];
        }
        return $data;
    }
    public function draft()
    {
        //获取当前用户草稿箱的内容
        $data = Draft::where('author','=',session()->get('user_id'))->get();
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
            if($d->type)
            {
                $article[$i]['type'] = DB::table('article_type')->where('id','=',$d->type)->first()->type;
            }
            else
                $article[$i]['type'] = "";
            $i++;
        }
        $count = $i;
        return view('admin.me.draft',compact('article','count'));
    }
    public function draftToEdit(Request $request)
    {
        $res = 0;
        $a_id = $request -> input('id');
        return redirect()->action('Admin\MeController@editor', ['id'=>$a_id]);
    }

}
