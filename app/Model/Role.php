<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //关联的数据表
    public $table = 'role_type';

    //主键
    public $primaryKey = 'id';

    //允许批量操作的字段
    public $guarded = [];

    //是否维护created_at和updated_at字段
    public $timestamps = false;

    //关联权限模型 多-多
    public function permission()
    {
        return $this -> belongsToMany('App\Model\Permission','role_per','role_id','per_id');
    }
}
