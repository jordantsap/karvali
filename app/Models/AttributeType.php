<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeType extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
    ];

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }
}
