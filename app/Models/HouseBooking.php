<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HouseBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'house_id',
        'company_id',
        'user_id',
        'name',
        'email',
        'phone',
        'listing_type',
        'check_in_date',
        'check_out_date',
        'guests',
        'offer_price',
        'message',
        'status',
    ];

    protected $casts = [
        'check_in_date' => 'date',
        'check_out_date' => 'date',
        'offer_price' => 'decimal:2',
        'guests' => 'integer',
    ];

    public function house(): BelongsTo
    {
        return $this->belongsTo(House::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
