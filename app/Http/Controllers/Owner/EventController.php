<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Image as ImageModel;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::where('user_id', auth()->user()->id)
            ->withTranslation()
            ->paginate();

        return view('auth.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $event = new Event();
        $event->user_id = auth()->id();
        $event->active = $request->active;
//        $event->accommodation_type_id = $request->accommodation_type_id;
        $event->website = $request->website;
        $event->telephone = $request->telephone;
        $event->facebook = $request->facebook;
        $event->twitter = $request->twitter;
        $event->email = $request->email;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->start_time = $request->start_time;
        $event->end_time = $request->end_time;
        $event->entrance = $request->entrance;
        $imageFields = ['header', 'logo', 'image1', 'image2', 'image3'];

        foreach ($imageFields as $fieldName) {
            if ($request->hasFile($fieldName)) {
                $image = $request->file($fieldName);

                $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('images/events', $imageName);
                $location = public_path("images/events/" . $imageName);
                Image::make($image)->resize(800, 400)->save($location);

                $event->{$fieldName} = $imagePath;
            }
        }

        $event->save();

        // Handle multiple image uploads with polymorphic relationship
        if ($request->hasFile('imgfile')) {
            $images = $request->file('imgfile');
            foreach ($images as $image) {
//                return $image;
                $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('images/venues', $imageName); // You can specify a custom directory
                $location = public_path("images/venues/" . $imageName);
                Image::make($image)->resize(800, 400)->save($location);
                // Save the image path to the database with polymorphic relationship
                $upload = new ImageModel(['path' => $imagePath]);
                $event->images()->save($upload);

            }
        }

        foreach (config('translatable.locales') as $locale => $lang) {
            $event->translateOrNew($locale)->title = $request->{$locale}['title'];
            $event->translateOrNew($locale)->slug = \Str::slug($request->{$locale}['title'], '-');
            $event->translateOrNew($locale)->meta_description = $request->{$locale}['meta_description'];
            $event->translateOrNew($locale)->meta_keywords = $request->{$locale}['meta_keywords'];
            $event->translateOrNew($locale)->manager = $request->{$locale}['manager'];
            $event->translateOrNew($locale)->description = $request->{$locale}['description'];
        }

        $event->save();

        toastr()->addSuccess('Venue was saved successfully.');

        return redirect(route('owner.venues.show', $event->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('auth.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
