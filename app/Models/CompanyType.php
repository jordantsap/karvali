<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class CompanyType extends Model implements TranslatableContract
{
    protected $fillable = ['name', 'slug'];
    // public $primaryKey = 'slug';

    use Translatable;


    protected $translatedAttributes = [
      'name',
      'slug',
    ];


    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function companies()
    {
        return $this->hasMany('App\Models\Company', 'company_type');
    }
}
