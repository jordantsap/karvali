<?php

namespace App\Http\Controllers\Admin;

use App\Models\Advert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Image;

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $adverts = Advert::paginate(10);
        return view('admin.adverts.index', compact('adverts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $adverts = Advert::where('active',1)->get();
      // $adverts = \App\User::;
        return view('admin.adverts.create', compact('adverts', 'adverts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request);
      $this->validate($request, array(
        'active' => 'nullable',
        'link_title' => 'required|max:50',
        'banner' => 'required|image',
        // 'url' => 'required',
        'banner_alt' => 'required|max:50',
        'user_id' => 'integer|Auth::user()->id',
        'advertable_type' => '',
        'advertable_id' => '',

    ));
         $advert = new Advert;

         $advert->active = $request->active;
         $advert->link_title = $request->link_title;
         $advert->url = $request->url;
         $advert->banner = $request->banner;
         $advert->banner_alt = $request->banner_alt;
         $advert->user_id = Auth::user()->id;
         $advert->advertable_type = $request->advertable_type;
         $advert->advertable_id = '1';

      if ($request->hasFile('banner')) {
          $image = $request->file('banner');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          $location = public_path("images/adverts/" . $filename);
          Image::make($image)->resize(800, 400)->save($location);
          $advert->banner = $filename;
        }

      $advert->save();
      $notification = array(
      'message' => 'Advert added successfully',
      'alert-type' => 'info'
      );
      return redirect(route('adverts.show',$advert->id))->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function show(Advert $advert)
    {
        $advert = Advert::find($advert->id);
        return view('admin.adverts.advert', compact('advert'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function edit(Advert $advert)
    {
      $advert = Advert::find($advert->id);
        return view('admin.adverts.edit', compact('advert'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advert $advert)
    {
      $this->authorize('update_adverts', 'App\Advert');
      $this->validate($request, array(
        'active' => 'nullable',
        'link_title' => 'required|max:50',
        'url' => '',
        'banner' => 'required|image',
        'banner_alt' => 'required|max:50',
        'user_id' => 'integer|Auth::user()->id',
        'advertable_type' => '',
        'advertable_id' => '',

    ));
         $advert = Advert::find($advert->id);

         $advert->active = $request->active;
         $advert->link_title = $request->link_title;
         $advert->url = $request->url;
         $advert->banner = $request->banner;
         $advert->banner_alt = $request->banner_alt;
         $advert->user_id = Auth::user()->id;
         $advert->advertable_type = $request->advertable_type;
         $advert->advertable_id = $request->advertable_id;


     if ($request->hasFile('banner')) {
       //add new photo
         $image = $request->file('banner');
         $filename = time() . '.' . $image->getClientOriginalExtension();
         $location = public_path("images/adverts/" . $filename);
         $oldfile = public_path("images/adverts/" . $advert->banner);
         // dd($oldfile);
         if(\File::exists($oldfile))
         {
            \File::delete($oldfile);
          }
          Image::make($image)->resize(800, 400)->save($location);
          $advert->banner = $filename;
       }
     $advert->save();

     $notification = array(
     'message' => 'Advertisement updated successfully',
     'alert-type' => 'info'
     );
     return redirect(route('adverts.show', $advert->id))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advert $advert)
    {
        //
    }
}
