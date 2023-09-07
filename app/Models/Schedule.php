<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsToMany, MorphTo};

class Schedule extends Model
{
    use HasFactory;

    protected $fillable =['day_id','opening_time','closing_time','period_id'];

    public function companies(): BelongsToMany
    {
        return $this->belongsToMany(Company::class);
    }

    public function scheduleable(): MorphTo
    {
        return $this->morphTo();
    }

}
