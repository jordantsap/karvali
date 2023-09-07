<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;
    protected $fillable = ['name','is_open'];

    public function openHours(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(OpenHour::class);
    }
}
