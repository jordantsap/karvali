<?php

namespace App\Translations;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class PostTranslation extends Model
{
    use Sluggable;

  protected $fillable = [
    'title',
    'meta_description',
    'meta_keywords',
    'slug',
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

  // public function getRouteKeyName()
  // {
  //     return 'slug';
  // }
}
