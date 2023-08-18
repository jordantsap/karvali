<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable =['day_of_week','opening_time','closing_time','sessions'];

    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }

    public function scheduleable(): MorphTo
    {
        return $this->morphTo();
    }

}
