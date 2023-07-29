<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model implements TranslatableContract
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
        'user_id',
        'header',
        'logo',
        'image1',
        'image2',
        'image3',
        'telephone',
        'website',
        'email',
        'facebook',
        'twitter',
        'active',
        'total_rooms',
        'accommodation_type_id',
        // 'description',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function type()
    {
        return $this->belongsTo(AccommodationType::class);
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
