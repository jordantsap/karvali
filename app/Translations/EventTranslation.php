<?php

namespace App\Translations;

use Illuminate\Database\Eloquent\Model;

class EventTranslation extends Model
{
  protected $translationForeignKey = 'event_id';
  
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
