<?php

namespace App\Models\Translations;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeTranslation extends Model
{
    use Sluggable;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'slug',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

//    public function getRouteKeyName()
//    {
//        return 'slug';
//    }
}
