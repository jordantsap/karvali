<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected array $translatedAttributes = [
        'name',
        'slug',
        'status',
        'description',
    ];
    protected $fillable = [
//        'user_id',
//        'plan_id',
        'price',
        'duration'
    ];

    public function membership()
    {
        return $this->hasMany(Membership::class);
    }

}
