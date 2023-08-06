<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uploads extends Model
{
    use HasFactory;
    protected $table = 'uploads';

    /**
     * Get all of the posts that are assigned this tag.
     */
    public function accommodations()
    {
        return $this->morphedByMany(Accommodation::class, 'uploadable');
    }
}
