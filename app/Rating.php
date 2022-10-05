<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'defender', 'right_wing', 'left_wing','striker','user_id'
    ];
    public function user()
    {
        return $this->hasOne('App\User');
    }

}
