<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class HouseTranslation extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'meta_description',
        'meta_keywords',
        'description',
    ];
}
