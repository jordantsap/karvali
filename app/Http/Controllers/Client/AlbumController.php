<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\unused\Album;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $albums = Album::paginate(4);
        return view('albums.index', compact('albums'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
     public function show(Album $album)
     {
         $album = Album::with('photos')->find($album->id);
         return view('albums.show', compact('album'));
     }
}
