<?php

namespace App\Http\Controllers\unused;

use App\Http\Controllers\Controller;
use App\Models\unused\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $this->authorize('view-albums', 'App\Album');
        $albums = Album::paginate(10);
        return view('admin.albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $this->authorize('create-albums', 'App\Album');
        return view('admin.albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
          'title' =>'required|max:100',
          'meta_description' =>'max:160',
          'meta_keywords' =>'',
          'cover_image'=> 'required|image|mimes:jpeg,bmp,jpg,gif,png',
          'description' =>'required',
          'alt' => 'required|string|max:125',
          ]);
      $album = new Album;
      $album->title = $request->title;
      $album->slug = Str::slug($album->title);
      $album->meta_description = $request->input('meta_description');
      $album->meta_keywords = $request->input('meta_keywords');
      $album->cover_image = $request->cover_image;
      $album->alt = $request->input('alt');
      $album->description = $request->description;

      if ($request->hasFile('cover_image')) {
          $cover_image = $request->file('cover_image');
          $filename = time() . '.' . $cover_image->getClientOriginalExtension();
          $location = public_path("images/albums/" . $filename);
          Image::make($cover_image)->resize(800, 400)->save($location);
          $album->cover_image = $filename;
        } else {
          $album->cover_image = 'noimage.jpg';
        }

      $album->save();
      $notification = array(
      'message' => 'Album added successfully',
      'alert-type' => 'info'
      );
      return redirect(route('albums.index'))->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view-albums', 'App\Album');
        $album = Album::find($id);
        return view('admin.albums.album', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update-albums', 'App\Album');
        $album = Album::find($id);
        return view('admin.albums.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
     'title'=>'required|max:100',
     'description' => 'required',
     'meta_description' =>'max:160',
     'meta_keywords' =>'',
     'alt' => 'nullable|max:125',
     'cover_image'=> 'image|mimes:jpeg,bmp,jpg,gif,png',
     ]);

     $album = Album::find($id);
     $album->title = $request->title;
     $album->meta_description = $request->input('meta_description');
     $album->meta_keywords = $request->input('meta_keywords');
     $album->alt = $request->alt;
     $album->slug = Str::slug($album->title);
     $album->description = $request->description;

     if ($request->hasFile('cover_image')) {
       //add new photo
         $image = $request->file('cover_image');
         $filename = time() . '.' . $image->getClientOriginalExtension();
         $location = public_path("images/albums/" . $filename);
         $oldfile = public_path("images/albums/" . $album->cover_image);
         // dd($oldfile);
         if(File::exists($oldfile))
         {
            File::delete($oldfile);
          }
          Image::make($image)->resize(800, 400)->save($location);
         $album->cover_image = $filename;
       }
     $album->save();

     $notification = array(
     'message' => 'Album updated successfully',
     'alert-type' => 'info'
     );
     return redirect(route('albums.show', $album->id))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//      $this->authorize('delete-albums', 'App\Album');
      $album = Album::find($id);
       $album->delete();
       $notification = array(
       'message' => 'Album deleted successfully',
       'alert-type' => 'info'
       );
       return back()->with($notification);
    }
}
