<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    //
    protected $fillable = [
        'pass','defend','physical','dribbling','pace','shooting','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
