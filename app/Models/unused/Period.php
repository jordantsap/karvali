<?php

namespace App\Models\unused;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_open'
    ];

    public function openHours()
    {
        return $this->hasMany(OpenHour::class);
    }
}
