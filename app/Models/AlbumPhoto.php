<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlbumPhoto extends Model
{
  protected $fillable = [
  'active',
  'album_id',
  'alt',
  'file',
];
  public function album()
  {
      return $this->belongsTo('App\Album');
  }
}
