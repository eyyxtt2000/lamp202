<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
     /**
     * 与模型关联的数据表。
     *
     * @var string
     */
    protected $table = 'users_detail';
    
   
     /**
     * 指定是否模型应该被戳记时间。
     *
     * @var bool
     */
    public $timestamps = false;
}
