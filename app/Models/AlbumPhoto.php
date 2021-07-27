<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AlbumPhoto extends Model
{
    use HasFactory;

  protected $fillable = [
  'active',
  'album_id',
  'alt',
  'file',
];
  public function album()
  {
      return $this->belongsTo('App\Models\Album');
  }
}
