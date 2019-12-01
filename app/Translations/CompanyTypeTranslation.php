<?php

namespace App\Translations;

use Illuminate\Database\Eloquent\Model;

class CompanyTypeTranslation extends Model
{
    protected $fillable = ['name', 'slug'];

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
}
