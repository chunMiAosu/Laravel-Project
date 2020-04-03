<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Article;
use DB;

class StatisticController extends Controller
{
    //已发布的文章
    public function totalArticle()
    {
        $all = Article::where('status', '=', 'success')->where('publish','=','yes')->get();
        $all_type = DB::table('article_type')->get();
        $num = array();
        $num[0] = count($all_type);
        for ($i = 1; $i <= $num[0]; $i++)
        {
            $num[$i] = 0;
        }
        foreach ($all as $i)
        {
            $num[$i['type']]++;
        }
        return view('admin.statistic', compact('num', 'all_type'));
    }
}
