<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    //

    protected $fillable = [
        'community_name','description', 'user_id', 'total_users'];

   //one community , many user
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    //one community , many games
    public function games()
    {
        return $this->belongsToMany('App\Game');
    }
}
