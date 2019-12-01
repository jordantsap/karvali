<?php

namespace App;

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
      return $this->belongsTo('App\Album', 'album_id');
  }
}
