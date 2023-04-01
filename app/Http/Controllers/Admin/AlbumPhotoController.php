<?php

namespace App\Http\Controllers\Admin;

use App\Models\AlbumPhoto;
use App\Models\Album;
use Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlbumPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $this->authorize('view_albums', 'App\Album');
        $albumphotos = AlbumPhoto::paginate(10);
        return view('admin.albumphotos.index', compact('albumphotos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $albums = Album::all();
        return view('admin.albumphotos.create')->with('albums', $albums);
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
          'active' => 'nullable',
          'file'=> 'required|image|mimes:jpeg,bmp,jpg,gif,png',
          'album_id'=>'',
          'alt' => 'required|string|max:125',
          ]);
      $photo = new AlbumPhoto;
      $photo->active = $request->active;
      $photo->album_id = $request->album_id;
      $photo->file = $request->file;
      $photo->alt = $request->input('alt');

      if ($request->hasFile('file')) {
          $image = $request->file('file');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          $location = public_path("images/albumphotos/". $filename);
          Image::make($image)->resize(800, 400)->save($location);
          $photo->file = $filename;
        } else {
          $photo->file = 'noimage.jpg';
        }

      $photo->save();
      $notification = array(
      'message' => 'Album added successfully',
      'alert-type' => 'info'
      );
      return redirect(route('photos.index'))->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AlbumPhoto  $albumPhoto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view_companies', 'App\Company');
        $albumphoto = AlbumPhoto::find($id);
        return view('admin.albumphotos.albumphoto', compact('albumphoto'));
        // return view('admin.companies.company', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AlbumPhoto  $albumPhoto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      // $this->authorize('update_companies', 'App\Company');
      $albums = Album::all();
      $albumphoto = AlbumPhoto::find($id);
      return view('admin.albumphotos.edit', compact('albumphoto', 'albums'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AlbumPhoto  $albumPhoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      // $this->authorize('update_companies', 'App\Company');
      $this->validate($request, array(
        'active' => '',
        'file'=> 'required|image|mimes:jpeg,bmp,jpg,gif,png',
        'album_id'=>'sometimes|integer',
        'alt' => 'required|string|max:125',
    ));
         $photo = Albumphoto::find($id);

         $photo->active = $request->active;
         $photo->album_id = $request->album_id;
         $photo->file = $request->file;
         $photo->alt = $request->input('alt');

         if ($request->hasFile('file')) {
           //add new logo
             $file = $request->file('file');
             $filename = time() . '.' . $file->getClientOriginalExtension();
             $location = public_path("images/albumphotos/" . $filename);
             $oldfile = public_path("images/albumphotos/" . $photo->file);
             // dd($oldfile);
             if(\File::exists($oldfile))
             {
                \File::delete($oldfile);
              }
              Image::make($file)->resize(800, 400)->save($location);
              $photo->file = $filename;
           }

           $photo->save();
           $notification = array(
           'message' => 'Photo added successfully',
           'alert-type' => 'info'
           );
           return redirect(route('photos.index'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AlbumPhoto  $albumPhoto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        $this->authorize('delete_albums', 'App\AlbumPhoto');
        $album = AlbumPhoto::find($id);
        $album->delete();
        $notification = array(
            'message' => 'AlbumPhoto deleted successfully',
            'alert-type' => 'info'
        );
        return back()->with($notification);
    }
}
