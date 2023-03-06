<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

//Notification for Seller
use App\Notifications\CustomerResetPasswordNotification;

class Customer extends Authenticatable
{
    use Notifiable;
    // protected $guard = 'customer';
    protected $table = 'customers';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'city', 'province', 'address', 'postalcode', 'phone', 'email', 'password', 'otherinfo', 'facebookid', 'twitterid',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];

  //Send password reset notification
  public function sendPasswordResetNotification($token)
  {
      $this->notify(new CustomerResetPasswordNotification($token));
  }
  public function orders()
  {
    return $this->hasMany('App\Models\Order');
  }
  public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }
  public function likes()
    {
        return $this->morphMany('App\Models\Like', 'likeable');
    }
}
