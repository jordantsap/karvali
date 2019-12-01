<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Image;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $this->authorize('view_events', 'App\Event');
        $events = Event::orderBy('id', 'DESC')->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $this->authorize('create_events', 'App\Event');
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create_events', 'App\Event');
        $this->validate($request, array(
          'user_id' => 'integer|Auth::user()->id',
          'title' => 'required|min:5|max:100',
          'slug' => 'unique:events,title',
          'meta_description' =>'max:160',
          'meta_keywords' =>'',
          'header' => 'sometimes|image',
          'logo' => 'sometimes|image',
          'image1' => 'required|image',
          'image2' => 'required|image',
          'image3' => 'required|image',
          'start_date' => 'required|date|after:now',
          'start_time' => 'required',//|after:tomorrow
          'end_date' => 'required|date',
          'end_time' => 'required',
          'telephone' => 'required',
          'website' => 'nullable',
          'email' => 'required',
          'facebook' => 'nullable',
          'twitter' => 'nullable',
          'active' => 'nullable',
          // 'lat' => 'required',
          // 'lng' => 'required',
          'description' => 'required|min:5',
        ));
        $event = new Event;

        $event->user_id = Auth::user()->id;
        $event->title = $request->title;
        $event->slug = str_slug($request->title, '-');
        $event->active = $request->active;
        $event->meta_description = $request->input('meta_description');
        $event->meta_keywords = $request->input('meta_keywords');
        $event->header = $request->header;
        $event->logo = $request->logo;
        $event->image1 = $request->image1;
        $event->image2 = $request->image2;
        $event->image3 = $request->image3;
        $event->start_date = $request->start_date;
        $event->start_time = $request->start_time;
        $event->end_date = $request->end_date;
        $event->end_time = $request->end_time;
        $event->telephone = $request->telephone;
        $event->website = $request->website;
        $event->email = $request->email;
        $event->facebook = $request->facebook;
        $event->twitter = $request->twitter;
        // $event->address = $request->address;
        // $event->lat = $request->input('lat');
        // $event->lng = $request->input('lng');
        $event->description = $request->description;

        if ($request->hasFile('header')) {
            $header = $request->file('header');
            $filename = time() . '.' . $header->getClientOriginalExtension();
            $location = public_path("images/events/" . $filename);
            Image::make($header)->resize(800, 400)->save($location);
            $event->header = $filename;
          }

          if ($request->hasFile('logo')) {
              $logo = $request->file('logo');
              $filename = time() . '.' . $logo->getClientOriginalExtension();
              $location = public_path("images/events/" . $filename);
              Image::make($logo)->resize(800, 400)->save($location);
              $event->logo = $filename;
            }

          if ($request->hasFile('image1')) {
              $image1 = $request->file('image1');
              $filename = time() . '.' . $image1->getClientOriginalExtension();
              $location = public_path("images/events/" . $filename);
              Image::make($image1)->resize(800, 400)->save($location);
              $event->image1 = $filename;
            }

            if ($request->hasFile('image2')) {
                $image2 = $request->file('image2');
                $filename = time() . '.' . $image2->getClientOriginalExtension();
                $location = public_path("images/events/" . $filename);
                Image::make($image2)->resize(800, 400)->save($location);
                $event->image2 = $filename;
              }

              if ($request->hasFile('image3')) {
                  $image3 = $request->file('image3');
                  $filename = time() . '.' . $image3->getClientOriginalExtension();
                  $location = public_path("images/events/" . $filename);
                  Image::make($image3)->resize(800, 400)->save($location);
                  $event->image3 = $filename;
                }

        $event->save();
        $notification = array(
        'message' => 'Event added successfully',
        'alert-type' => 'info'
        );
        return redirect(route('events.show',$event->id))->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $this->authorize('view_events', 'App\Event');
      $event = Event::find($id);
        return view('admin.events.event', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $this->authorize('update_events', 'App\Event');
      $event = Event::find($id);
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update_events', 'App\Event');
        $this->validate($request, array(
          'user_id' => 'integer|Auth::user()->id',
          'title' => 'required|min:5|max:100',
          'meta_description' =>'max:160',
          'meta_keywords' =>'',
          'active' => 'nullable',
          'slug' => 'unique:events,title',
          'header' => 'image',
          'logo' => 'image',
          'image1' => 'image',
          'image2' => 'image',
          'image3' => 'image',
          'start_date' => 'required',
          'start_time' => 'required',
          'end_date' => 'required',
          'end_time' => 'required',
          'telephone' => 'required',
          'website' => 'nullable',
          'email' => 'required',
          'facebook' => 'nullable',
          'twitter' => 'nullable',
          // // 'address' => 'required',
          // 'lat' => 'required',
          // 'lng' => 'required',
          'description' => 'required|min:5',
      ));
           $event = Event::find($id);

           $event->user_id = Auth::user()->id;
           $event->title = $request->input('title');
           $event->meta_description = $request->input('meta_description');
           $event->meta_keywords = $request->input('meta_keywords');
           $event->slug = str_slug($request->title, '-');
           $event->active = $request->active;
           $event->header = $request->header;
           $event->logo = $request->logo;
           $event->image1 = $request->image1;
           $event->image2 = $request->image2;
           $event->image3 = $request->image3;
           $event->start_date = $request->start_date;
           $event->start_time = $request->start_time;
           $event->end_date = $request->end_date;
           $event->end_time = $request->end_time;
           $event->telephone = $request->telephone;
           $event->website = strtolower($request->website);
           $event->email = strtolower($request->email);
           $event->facebook = strtolower($request->facebook);
           $event->twitter = strtolower($request->twitter);
           // $event->address = $request->address;
           // $event->lat = $request->input('lat');
           // $event->lng = $request->input('lng');
           $event->description = $request->description;

       if ($request->hasFile('header')) {
         //add new photo
           $header = $request->file('header');
           $filename = time() . '.' . $header->getClientOriginalExtension();
           $location = public_path("images/events/" . $filename);
           $oldfile = public_path("images/events/" . $event->header);
           // dd($oldfile);
           if(\File::exists($oldfile))
           {
              \File::delete($oldfile);
            }
            Image::make($header)->resize(800, 400)->save($location);
           $event->header = $filename;
         }

         if ($request->hasFile('logo')) {
           //add new photo
             $logo = $request->file('logo');
             $filename = time() . '.' . $logo->getClientOriginalExtension();
             $location = public_path("images/events/" . $filename);
             $oldfile = public_path("images/events/" . $event->logo);
             // dd($oldfile);
             if(\File::exists($oldfile))
             {
                \File::delete($oldfile);
              }
              Image::make($logo)->resize(800, 400)->save($location);
             $event->logo = $filename;
           }

         if ($request->hasFile('image1')) {
           //add new photo
             $image1 = $request->file('image1');
             $filename = time() . '.' . $image1->getClientOriginalExtension();
             $location = public_path("images/events/" . $filename);
             $oldfile1 = public_path("images/events/" . $event->image1);
             // dd($oldfile);
             if(\File::exists($oldfile1))
             {
                \File::delete($oldfile1);
              }
              Image::make($image1)->resize(800, 400)->save($location);
             $event->image1 = $filename;
           }

           if ($request->hasFile('image2')) {
             //add new photo
               $image2 = $request->file('image2');
               $filename = time() . '.' . $image2->getClientOriginalExtension();
               $location = public_path("images/events/" . $filename);
               $oldfile2 = public_path("images/events/" . $event->image2);
               // dd($oldfile);
               if(\File::exists($oldfile2))
               {
                  \File::delete($oldfile2);
                }
                Image::make($image2)->resize(800, 400)->save($location);
               $event->image2 = $filename;
             }

             if ($request->hasFile('image3')) {
               //add new photo
                 $image3 = $request->file('image3');
                 $filename = time() . '.' . $image3->getClientOriginalExtension();
                 $location = public_path("images/events/" . $filename);
                 $oldfile3 = public_path("images/events/" . $event->image3);
                 // dd($oldfile);
                 if(\File::exists($oldfile3))
                 {
                    \File::delete($oldfile3);
                  }
                  Image::make($image3)->resize(800, 400)->save($location);
                 $event->image3 = $filename;
               }
       $event->save();

       $notification = array(
       'message' => 'Event updated successfully',
       'alert-type' => 'info'
       );
       return redirect(route('events.show', $event->id))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $this->authorize('delete_events', 'App\Event');
          Event::where('id',$id)->delete();
          $notification = array(
          'message' => 'User deleted successfully',
          'alert-type' => 'success'
          );
          return redirect(route('events.index'))->with($notification);
    }
}
