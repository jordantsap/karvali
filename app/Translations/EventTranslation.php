<?php

namespace App\Translations;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class EventTranslation extends Model
{
    use Sluggable;

  protected $translationForeignKey = 'event_id';
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

  public function getRouteKeyName()
    {
        return 'slug';
    }

  protected $fillable = [
    'title',
    'slug',
    'meta_description',
    'meta_keywords',
    'description',
  ];
}
