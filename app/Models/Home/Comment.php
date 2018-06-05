<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $table = 'comment';
    public function users()
        {
            return $this->belongsTo('App\User','uid');
        }
}
