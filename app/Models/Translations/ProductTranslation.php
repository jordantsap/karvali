<?php

namespace App\Models\Translations;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    use Sluggable;

  protected $translationForeignKey = 'product_id';

  protected $fillable = [
    'meta_description',
    'meta_keywords',
    'title',
    'slug',
    'header',
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
