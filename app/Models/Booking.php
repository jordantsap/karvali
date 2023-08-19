<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Booking extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $dates = ['check_in_date', 'check_out_date','check_in_time','check_out_time'];
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'check_out_date' => 'date:d-m-Y',
        'check_in_date' => 'date:d-m-Y',
//        'check_out_time' => 'date:d-m-Y',
//        'check_in_time' => 'date:d-m-Y',
    ];
    protected $fillable = ['check_in_date', 'check_out_date','check_in_time','check_out_time','room_id'];

    protected $translatedAttributes = [
        'title',
        'slug',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
