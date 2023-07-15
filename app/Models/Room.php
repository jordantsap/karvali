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
        'user_id',
        'header',
        'logo',
        'image1',
        'image2',
        'image3',
        'active',
        // 'description',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
