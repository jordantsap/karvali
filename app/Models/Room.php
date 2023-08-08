<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
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
        'header',
        'logo',
        'image1',
        'image2',
        'image3',
        // 'description',
    ];

//    public function getRouteKeyName()
//    {
//        return 'slug';
//    }

    public function images(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function accommodation()
    {
        return $this->belongsTo(Accommodation::class);
    }
    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }
}
