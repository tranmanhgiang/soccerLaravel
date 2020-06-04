<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class findAmatch extends Model
{
    protected $table = 'find_amatch';
    public function clubs()
    {
        return $this->belongsTo('App\Clubs','c_id','id');
    }
}
