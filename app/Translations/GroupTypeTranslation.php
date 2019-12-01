<?php

namespace App\Translations;

use Illuminate\Database\Eloquent\Model;

class GroupTypeTranslation extends Model
{
  protected $fillable = [
    'name',
    'slug',
    'meta_description',
    'meta_keywords',
    'description',
  ];
}
