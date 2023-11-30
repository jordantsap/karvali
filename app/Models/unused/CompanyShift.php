<?php

namespace App\Models\unused;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyShift extends Model
{
    use HasFactory;

    protected $fillable = [
        'day',
        'morning_opening_time',
        'afternoon_opening_time',
        'evening_opening_time',
        'morning_closing_time',
        'afternoon_closing_time',
        'evening_closing_time',
        'company_id'
    ];
}
