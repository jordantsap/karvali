<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model implements TranslatableContract
{
    use Translatable, HasFactory;

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
        // 'description',
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
