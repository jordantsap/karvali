<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class GroupType extends Model implements TranslatableContract
  {
    use Translatable;

    protected $translatedAttributes = [
      'title',
      'slug',
      'meta_description',
      'meta_keywords',
      'description',
    ];
    // protected $guarded = ['name', 'slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function groups()
    {
        return $this->hasMany('App\Models\Group', 'group_type');
    }
}
