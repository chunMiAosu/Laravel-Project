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

}