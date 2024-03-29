<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    protected $table = 'images';

    protected $fillable = [
        'imageable_id',
        'imageable_type',
        'path',
    ];

    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Get all of the posts that are assigned this tag.
     */
    public function accommodations()
    {
        return $this->morphedByMany(Accommodation::class, 'imageable');
    }
    public function rooms()
    {
        return $this->morphedByMany(Room::class, 'imageable');
    }
    public function products()
    {
        return $this->morphedByMany(Product::class, 'imageable');
    }
    public function events()
    {
        return $this->morphedByMany(Event::class, 'imageable');
    }
}
