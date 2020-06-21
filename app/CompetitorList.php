<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompetitorList extends Model
{
    protected $table = 'competitorsList';

    public function find_amatch()
    {
        return $this->belongsTo('App\findAmatch','fi_id','id');
    }
    public function clubs()
    {
        return $this->belongsTo('App\Clubs','c1_id','id');
    } 
}
