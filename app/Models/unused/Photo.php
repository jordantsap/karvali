<?php

namespace App\Models\unused;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
  protected $fillable = [
  'album_id',
  'alt',
  'title',
  'photo',
];
  public function album()
  {
      return $this->belongsTo('App\Models\useless\Album', 'album_id');
  }
}
