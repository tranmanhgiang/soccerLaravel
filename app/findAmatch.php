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
    public function competitor()
    {
        return $this->hasMany('App\CompetitorList','fi_id','id');
    }
}
