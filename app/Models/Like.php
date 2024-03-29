<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
  protected $fillable = [
    'likeable_id',
    'likeable_type',
    'customer_id',
  ];
  public function likeable()
  {
      return $this->morphTo();
  }
}
