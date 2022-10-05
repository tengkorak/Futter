<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    use HasMediaTrait;

    // public function registerMediaConversions(Media $media = null)
    // {
    //     $this->addMediaConversion('thumb')
    //         ->width(60)
    //         ->height(60);
    // }

    // attachment
    public function games() //m to m , games .. one to m , game
    {
        return $this->belongsToMany('App\Game');
        
    }
    // macam tu keyup

    public function communities()
    {
        return $this->belongsToMany('App\Community');
    }

    public function attribute()
    {
        return $this->hasOne('App\Attribute');
    }

    public function rating()
    {
        return $this->hasOne('App\Rating');
    }
}


