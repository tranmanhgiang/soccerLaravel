<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Found extends Model
{
    protected $table = 'found';
    public function find_amatch()
    {
        return $this->hasOne('App\findAmatch','fi_id','id');
    }

}
