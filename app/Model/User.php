<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //关联的数据表
    public $table = 'user';

    //主键
    public $primaryKey = 'id';

    //允许批量操作的字段
    //  public $fillable = ['name','password','email'];
    public $guarded = [];

    //是否维护created_at和updated_at字段
    public $timestamps = false;

    //关联Role模型 1-1
    public function role()
    {
        return $this->belongsTo('App\Model\Role','role_id');
    }

}
