<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static withTranslation()
 */
class Amenity extends Model implements TranslatableContract
{
    use HasFactory, Translatable;


    protected array $translatedAttributes = [
        'title',
        'slug',
    ];
    protected $fillable = [
        'price'
    ];

    public function accommodations()
    {
        return $this->morphedByMany(Accommodation::class, 'amenitable');
    }

    public function rooms()
    {
        return $this->morphedByMany(Room::class, 'amenitable');
    }
}
