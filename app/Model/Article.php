<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //关联的数据表
    public $table = 'article';

    //主键
    public $primaryKey = 'id';

    //允许批量操作的字段
//    protected $fillable = ['content','type','author','auditor','status','topic'];
    public $guarded = [];
//
    //是否维护created_at和updated_at字段
    public $timestamps = false;

    //关联AType模型 1-1
    public function aType()
    {
        return $this->belongsTo('App\Model\AType','type');
    }
}
