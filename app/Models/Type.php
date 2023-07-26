<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $guarded = [];

    protected $translatedAttributes = [
        'title',
        'slug',
    ];

    public function listings(): HasMany
    {
      return $this->hasMany(Listing::class);
    }
}
