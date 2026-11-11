<?php

namespace App\Models;

use App\Enums\HouseListing;
use App\Enums\Status;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class House extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public const STATUS_AVAILABLE = 'available';
    public const STATUS_SOLD = 'sold';
    public const PERIOD_NIGHT = 'night';
    public const PERIOD_MONTH = 'month';

    protected $fillable = [
        'company_id',
        'listing_type',
        'price',
        'price_period',
        'bedrooms',
        'bathrooms',
        'area_sqm',
        'address',
        'city',
        'status',
        'active',
        'header',
        'logo',
        'image1',
        'image2',
        'image3',
    ];

    protected $translatedAttributes = [
        'title',
        'slug',
        'meta_description',
        'meta_keywords',
        'description',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'area_sqm' => 'decimal:2',
        'active' => 'boolean',
        'bedrooms' => 'integer',
        'bathrooms' => 'integer',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(HouseBooking::class);
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    public function scopeAvailable($query)
    {
        return $query->where('status', self::STATUS_AVAILABLE);
    }

    public function scopeForRent($query)
    {
        return $query->where('listing_type', HouseListing::RENT);
    }

    public function scopeForSale($query)
    {
        return $query->where('listing_type', HouseListing::SALE);
    }

    public function isForRent(): bool
    {
        return $this->listing_type === HouseListing::RENT;
    }

    public function isForSale(): bool
    {
        return $this->listing_type === HouseListing::SALE;
    }

    public function isListed(): bool
    {
        return $this->active && $this->status === self::STATUS_AVAILABLE;
    }

    public function priceLabel(): string
    {
        $amount = '€'.number_format((float) $this->price, 2);

        if ($this->isForSale() || empty($this->price_period)) {
            return $amount;
        }

        return $amount.' / '.$this->price_period;
    }

    /**
     * A rental stay is free when no pending or accepted booking covers the range.
     * The check-out day is open for the next arrival.
     */
    public function isAvailable($checkInDate, $checkOutDate, ?int $ignoreBookingId = null): bool
    {
        if (!$this->isForRent() || !$this->isListed()) {
            return false;
        }

        $checkIn = Carbon::parse($checkInDate)->toDateString();
        $checkOut = Carbon::parse($checkOutDate)->toDateString();

        return !$this->blockingBookings($ignoreBookingId)
            ->whereDate('check_in_date', '<', $checkOut)
            ->whereDate('check_out_date', '>', $checkIn)
            ->exists();
    }

    public function blockingBookings(?int $ignoreBookingId = null)
    {
        return $this->bookings()
            ->when($ignoreBookingId, function ($query) use ($ignoreBookingId) {
                $query->where('id', '!=', $ignoreBookingId);
            })
            ->whereIn('status', [Status::PENDING, Status::COMPLETED]);
    }
}
