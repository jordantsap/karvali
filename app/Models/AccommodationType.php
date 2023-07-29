<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccommodationType extends Model implements TranslatableContract
{
    use Translatable, HasFactory;


    protected $fillable = [];
//     public $primaryKey = 'slug';



    protected $translatedAttributes  = [
        'name',
        'slug',
    ];


    public function getRouteKeyName(): string
    {
        return 'slug';
    }


    public function accommodation()
    {
        return $this->hasMany(Accommodation::class);
    }
}
