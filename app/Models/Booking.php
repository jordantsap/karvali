<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create(array $array)
 */
class Booking extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $dates = ['check_in_date', 'check_out_date'];
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'check_in_date' => 'date:d-m-Y',
        'check_out_date' => 'date:d-m-Y',
//        'check_out_time' => 'date:d-m-Y',
//        'check_in_time' => 'date:d-m-Y',
    ];
    protected $fillable = ['check_in_date', 'check_out_date','room_id','adults','children', 'status','email'];

    protected array $translatedAttributes = [
        'name',
        'slug',
    ];

//    public function getRouteKeyName(): string
//    {
//        return 'slug';
//    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
