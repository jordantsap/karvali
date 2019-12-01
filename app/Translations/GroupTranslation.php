<?php

namespace App\Translations;

use Illuminate\Database\Eloquent\Model;

class GroupTranslation extends Model
{
  protected $fillable = [
    'title',
    'slug',
    'meta_description',
    'meta_keywords',
    'description',
    'manager',
  ];
}
