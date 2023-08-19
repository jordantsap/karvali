<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $translatedAttributes = [
        'title',
        'slug',
        'meta_description',
        'meta_keywords',
        'manager',
        'description',
    ];

    protected $fillable = [
        'active',
        'accommodation_id',
        'room_type_id',
        'capacity',
        'price',
        'beds',
        'adults',
        'kids',
        'header',
        'logo',
        'image1',
        'image2',
        'image3',
    ];

//    public function getRouteKeyName()
//    {
//        return 'slug';
//    }

    public function amenities()
    {
        return $this->morphToMany(Amenity::class, 'amenitable');
    }

    public function images(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function bookings(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function accommodation()
    {
        return $this->belongsTo(Accommodation::class);
    }
    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }


    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }


    public function likes()
    {
        return $this->morphMany('App\Models\Like', 'likeable');
    }

    public function availableTimeSlots()
    {
        $currentDate = Carbon::now()->format('d-m-Y');
        $bookings = $this->bookings()->whereDate('check_in_date', $currentDate)->orderBy('check_in_date')->get();

        $availableTimeSlots = [];
        $lastEndTime = $currentDate . ' 00:00:00';

        foreach ($bookings as $booking) {
            $startTime = $booking->start_date;

            if ($startTime > $lastEndTime) {
                $availableTimeSlots[] = [
                    'start' => $lastEndTime,
                    'end' => $startTime,
                ];
            }

            $lastEndTime = $booking->end_date;
        }

        if ($lastEndTime < $currentDate . ' 23:59:59') {
            $availableTimeSlots[] = [
                'start' => $lastEndTime,
                'end' => $currentDate . ' 23:59:59',
            ];
        }

        return $availableTimeSlots;
    }

}
