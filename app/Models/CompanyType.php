<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class CompanyType extends Model implements TranslatableContract
{
    use Translatable;

    protected $fillable = ['name', 'slug'];
//     public $primaryKey = 'slug';



    protected $translatedAttributes = [
      'name',
      'slug',
    ];


    public function getRouteKeyName(): string
    {
        return 'slug';
    }


    public function companies()
    {
        return $this->hasMany('App\Models\Company', 'company_type');
    }
}
