<?php

namespace App\Translations;

use Illuminate\Database\Eloquent\Model;

class ProductTypeTranslation extends Model
{
    protected $fillable = ['name', 'slug'];

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
}
