<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    public $table='users';
    
  // 一对一
     public function userdetail()
     {
          return $this->hasOne('App\Models\Home\UserDetail','uid');

     }
      public function articles()
     {
        return $this->hasMany('App\Models\Admin\Articles','uid');
     }

}
