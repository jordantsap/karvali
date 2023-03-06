<?php

namespace App\Models;

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
      return $this->belongsTo('App\Models\Album', 'album_id');
  }
}
