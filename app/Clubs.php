<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clubs extends Model
{
    protected $table = 'clubs';

    public function find_amatch()
    {
        return $this->hasOne('App\findAmatch','c_id','id');
    }
    public function users()
    {
        return $this->belongsTo('App\User','u_id','id');
    }
    public function competitor()
    {
        return $this->hasMany('App\CompetitorList','c1_id','c_id');
    }
}
