<?php

namespace App\Models\Translations;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class HotelTranslation extends Model
{
    use Sluggable;

//  protected $translationForeignKey = 'company_id';

    protected $fillable = [
        'title',
        'slug',
        'meta_description',
        'meta_keywords',
        'description',
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

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
