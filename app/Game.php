<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    //

        protected $guarded = [];

    //one game , have many user
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    //one game, one court
    public function court()
    {
        return $this->belongsTo('App\Court');
    }

    //one game, many community
    public function communities()
    {
        return $this->belongsToMany('App\Community');
    }
}
