<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
class RoomType extends Model implements TranslatableContract
{

    use Translatable;

    protected $translatedAttributes = [
        'title',
        'slug',
    ];

    protected $guarded = [];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

//    public function getRouteKeyName()
//    {
//        return 'slug';
//    }
}
