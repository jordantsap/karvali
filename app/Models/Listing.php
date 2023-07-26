<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Listing extends Model implements TranslatableContract
{
    use Translatable, HasFactory;
    protected $guarded = [];

    protected $translatedAttributes = [
        'title',
        'slug',
        'description',
    ];
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
