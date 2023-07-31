<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccommodationType extends Model implements TranslatableContract
{
    use Translatable, HasFactory;

    protected $fillable = [
        'title',
        'slug',
    ];
    protected $guarded = [];
//     public $primaryKey = 'slug';

    protected $translatedAttributes  = [
        'title',
        'slug',
//        'meta_keywords',
//        'meta_description',
    ];


    public function getRouteKeyName(): string
    {
        return 'slug';
    }


    public function accommodations()
    {
        return $this->hasMany(Accommodation::class);
    }


    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }


    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }
}
