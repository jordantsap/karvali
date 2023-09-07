<?php

namespace App\Models\unused;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
      return $this->belongsTo('App\Models\useless\Album');
  }
}
