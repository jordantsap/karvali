<?php

namespace App\Translations;

use Illuminate\Database\Eloquent\Model;

class CompanyTranslation extends Model
{
  protected $translationForeignKey = 'company_id';
    protected $fillable = [
      'title',
      'slug',
      'meta_description',
      'meta_keywords',
      'manager',
      'description',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
