<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    //
    protected $guarded= [];

    public function games()
    {
        return $this->hasOne('App\Game');
    }
}
