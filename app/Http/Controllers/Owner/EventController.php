<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Image as ImageModel;
use App\Models\Venue;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
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
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $venues = Venue::where('user_id', auth()->user()->id)
            ->withTranslation()
            ->get();

        return view('auth.events.create', compact('venues'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $event = new Event();
        $event->user_id = auth()->id();
        $event->venue_id = $request->venue_id;
        $event->active = $request->active;
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
                $imagePath = $image->storeAs('images/events', $imageName); // You can specify a custom directory
                $location = public_path("images/events/" . $imageName);
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

        return redirect(route('owner.events.show', $event->id));
    }

    /**
     * Display the specified resource.
     *
     * @param Event $event
     * @return Response
     */
    public function show(Event $event)
    {
        return view('auth.events.event', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Event $event
     * @return Response
     */
    public function edit(Event $event)
    {
        return view('auth.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Event $event
     * @return Response
     */
    public function update(Request $request, Event $event)
    {
        $event->update($request->all());
        toastr()->addSuccess('Event was Updated successfully.');

        return redirect(route('owner.events.show', $event->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Event $event
     * @return Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
