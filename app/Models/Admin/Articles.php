<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    public $table='articles';

    public function column()
        {
            return $this->belongsTo('App\Models\Admin\Column','lanmu');
        }

}
