<?php

namespace App\Translations;

use Illuminate\Database\Eloquent\Model;

class GroupTranslation extends Model
{
  protected $translationForeignKey = 'group_id';
  
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
