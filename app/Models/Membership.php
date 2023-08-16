<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'plan_id', 'start_date', 'end_date', 'status'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

//    protected static function boot()
//    {
//        parent::boot();
//
//        static::retrieved(function ($membership) {
//            if ($membership->end_date < now() && $membership->status == 'active') {
//                $membership->status = 'inactive';
//                $membership->save();
//            }
//        });
//    }
}
