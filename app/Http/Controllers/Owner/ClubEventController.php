<?php

namespace App\Http\Controllers\Owner;

use App\Helpers\GetInputsHelper;
use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Event;
use App\Models\Group;
use App\Models\GroupType;
use App\Models\Image as ImageModel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ClubEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $events = Event::where('user_id', auth()->user()->id)
            ->withTranslation()
            ->paginate();
        return view('auth.club-events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $grouptypes = GroupType::withTranslation()->get();
        $groups = Group::where('user_id', auth()->id())->get();
        $amenities = Amenity::withTranslation()->get();
        return view('auth.club-events.create',compact('grouptypes','groups','amenities'));
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
        $event->group_id = $request->group_id;
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

        $imageFields = GetInputsHelper::imageFields();

        foreach ($imageFields as $fieldName) {
            if ($request->hasFile($fieldName)) {
                $image = $request->file($fieldName);

                $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('images/club-events', $imageName);
                $location = public_path("images/club-events/" . $imageName);
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
                $imagePath = $image->storeAs('images/club-events', $imageName); // You can specify a custom directory
                $location = public_path("images/club-events/" . $imageName);
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

        return redirect(route('owner.clubevents.show', $event->id));
    }

    /**
     * Display the specified resource.
     *
     * @param Event $clubevent
     * @return Application|Factory|View
     */
    public function show(Event $clubevent)
    {
//        $clubevent = Event::withTranslation()->get();//where('user_id','==', auth()->id());

        return view('auth.club-events.event', compact('clubevent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Event $clubevent)
    {

        return view('auth.club-events.edit', compact('clubevent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, Event $event)
    {
        $imageFields = GetInputsHelper::imageFields();

        $event->update($request->except($imageFields));


        foreach ($imageFields as $fieldName) {
            if ($request->hasFile($fieldName)) {
                $image = $request->file($fieldName);

                $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('images/club-events', $imageName);
                $location = public_path("images/club-events/" . $imageName);
                Image::make($image)->resize(800, 400)->save($location);

                $event->{$fieldName} = $imagePath;
            }
        }
        // Handle multiple image uploads with polymorphic relationship
        if ($request->hasFile('imgfile')) {
            $event->images()->delete();
            $images = $request->file('imgfile');
            foreach ($images as $image) {
//                return $image;
                $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('images/club-events', $imageName); // You can specify a custom directory
                $location = public_path("images/club-events/" . $imageName);
                Image::make($image)->resize(800, 400)->save($location);
                // Save the image path to the database with polymorphic relationship
                $upload = new ImageModel(['path' => $imagePath]);
                $event->images()->save($upload);
//                $image->sync([$upload]);

            }
        }

        $event->save();

        toastr()->addSuccess('Event was Updated successfully.');

        return redirect(route('owner.clubevents.show', $event->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
