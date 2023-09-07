<?php

namespace App\Models\unused;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
  protected $fillable = [
    'user_id',
    'active',
    'link_title',
    'banner_alt',
    'banner',
    'advertable_id',
    'advertable_type',
    'url',
  ];

  public function advertable()
    {
        return $this->morphTo();
    }

}
