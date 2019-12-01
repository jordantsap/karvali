<?php

namespace App\Http\Controllers\Client;


use App\Event;
use App\Group;
use App\Comment;
use Auth;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class EventController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'eventtype']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $events = Event::with(['likes','comments'])->where('active',1)->paginate(5);//where('date', '>', Carbon::now())->orderBy('date', 'asc')->paginate(10);
      return view('events.index', ['events' => $events]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
      $event = Event::whereTranslation('slug', $slug)
      ->with(['likes','comments'])
      ->firstOrFail();
      // $comments = Comment::all();
      return view('events.show', ['event' => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
      $event = Event::find($event->id);
      if(auth()->user()->id !==$event->user_id){
        return redirect('/events')->with('warning', 'Χρειάζεται Εξουσιοδότηση!');
      }
      return view('edit.event', ['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
      $this->validate($request, array(
        'group_id' => 'nullable|integer',
        'user_id' => 'integer|Auth::user()->id',
        'title' => 'required|min:5|max:100',
        'slug' => 'unique:events,title',
        'image' => 'sometimes|image',
        'date' => 'required',
        'start_time' => 'required',
        'end_time' => 'required',
        'price' => 'required',
        'telephone' => 'required',
        'website' => '',
        'email' => 'required',
        'facebook' => '',
        'twitter' => '',
        // 'address' => 'required',
        'lat' => 'required',
        'lng' => 'required',
        'description' => 'required|min:5|max:500',
    ));
         $event = Event::find($event->id);

         $event->group_id = $request->group_id;
         $event->user_id = Auth::user()->id;
         $event->title = $request->input('title');
         $event->slug = str_slug($request->title, '-');
         $event->date = $request->date;
         $event->start_time = $request->start_time;
         $event->end_time = $request->end_time;
         $event->price = $request->price;
         $event->telephone = $request->telephone;
         $event->website = strtolower($request->website);
         $event->email = strtolower($request->email);
         $event->facebook = strtolower($request->facebook);
         $event->twitter = strtolower($request->twitter);
         // $event->address = $request->address;
         $event->lat = $request->input('lat');
         $event->lng = $request->input('lng');
         $event->description = $request->description;

         if ($request->hasFile('image')) {
         //add new
         $image = $request->file('image');
         $filename = time() . '.' . $image->getClientOriginalExtension();
         $location = public_path('images/events/' . $filename);

         Image::make($image)->resize(800, 400)->save($location);
         $oldFileName = $event->image;

         //delete old
         //unlink(public_path('/events/'. $oldFileName));
         if($oldFileName){
           Storage::delete('/events/' . $oldFileName);
         }
         //exit();
         //public_path('images/events/'
         //update db
         $event->image = $filename;
         }

         $event->save();

         return redirect()->route('events.show', $event->id)->with('success', 'Η εκδήλωση ανανεώθηκε επιτυχώς!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
      if(auth()->user()->id !==$event->user_id){
        return redirect('/events')->with('warning', 'Χρειάζεται Εξουσιοδότηση!');
      }
    }
}
