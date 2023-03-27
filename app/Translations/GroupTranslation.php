<?php

namespace App\Translations;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class GroupTranslation extends Model
{
    use Sluggable;

  protected $translationForeignKey = 'group_id';

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
    'manager',
  ];
}
