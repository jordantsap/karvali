<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 'username', 'email', 'password', 'token', 'tel','mobile', 'newsletter', 'active', 'facebookid', 'twitterid', 'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function identities() {
   return $this->hasMany('App\SocialIdentity');
}

    public function companies()
    {
        return $this->hasMany('App\Models\Company');
    }
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }
    public function accommodations()
    {
        return $this->hasMany(Accommodation::class);
    }
    public function venues()
    {
        return $this->hasMany(Venue::class);
    }
    public function events()
    {
        return $this->hasMany('App\Models\Event');
    }
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    /**
    * The event map for the model.
    *
    * @var array
    */
   // protected $dispatchesEvents = [
   //     'created' => UserCreated::class,
   //     'updated' => UserUpdated::class,
   // ];
}
