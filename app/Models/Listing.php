<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Listing extends Model implements TranslatableContract
{
    use Translatable, HasFactory;

    protected $fillable = [
        'user_id',
        'listing_type',
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
        // 'description',
    ];

    protected $translatedAttributes = [
        'title',
        'slug',
        'meta_description',
        'meta_keywords',
        'manager',
        'description',
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


    public function listingType(): BelongsTo
    {
        return $this->belongsTo(ListingType::class, 'listing_type');
    }


    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }


    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }


    public function likes()
    {
        return $this->morphMany('App\Models\Like', 'likeable');
    }


    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
