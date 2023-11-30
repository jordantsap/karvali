<?php

namespace App\Models\unused;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenHour extends Model
{
    use HasFactory;
    protected $fillable = ['day_id', 'period_id', 'open_time', 'close_time'];

    public function weekday()
    {
        return $this->belongsTo(Day::class);
    }

    public function dayPeriod()
    {
        return $this->belongsTo(Period::class);
    }
}
