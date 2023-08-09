<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Accommodation extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected array $translatedAttributes = [
        'title',
        'slug',
        'meta_description',
        'meta_keywords',
        'manager',
        'description',
    ];
//    public function getRouteKeyName()

    protected $fillable = [
        'user_id',
        'active',
        'total_rooms',
        'accommodation_type_id',
        'website',
        'email',
        'telephone',
        'facebook',
        'twitter',
        'header',
        'logo',
        'image1',
        'image2',
        'image3',
        'uploads',
    ];

//    public function getRouteKeyName(): string
//    {
//        return 'slug';
//    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function accommodationType(): BelongsTo
    {
        return $this->belongsTo(AccommodationType::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function images(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function amenities()
    {
        return $this->morphToMany(Amenity::class, 'amenitable');
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
