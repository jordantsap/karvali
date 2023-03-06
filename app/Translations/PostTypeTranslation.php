<?php

namespace App\Translations;

use Illuminate\Database\Eloquent\Model;

class PostTypeTranslation extends Model
{
    protected $fillable = ['name', 'slug'];
}
