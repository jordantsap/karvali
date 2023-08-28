<?php

namespace App\Http\Controllers\Owner;

use App\Helpers\GetInputsHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGroupRequest;
use App\Models\Group;
use App\Models\GroupType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index(Request $request1)
    {
//      $this->authorize('view-groups', 'App\Group');
        $groups = Group::where('user_id', auth()->id())->orderBy('id', 'DESC')->paginate(10);

        return view('auth.groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
      $this->authorize('create-groups', 'App\Models\Group');
      $grouptypes = GroupType::all();
        return view('auth.groups.create', compact('grouptypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
//        dd($request->all());

      $group = new Group;

      $group->user_id = Auth::user()->id;
        $group->active = $request->active;
        $group->group_type = $request->group_type;
        $group->telephone = $request->telephone;
        $group->website = strtolower($request->website);
        $group->email = strtolower($request->email);
        $group->facebook = strtolower($request->facebook);
        $group->twitter = strtolower($request->twitter);
        //$group->address = $request->address;
      // $group->lat = $request->input('lat');
      // $group->lng = $request->input('lng');

        $imageFields = GetInputsHelper::imageFields();

        foreach ($imageFields as $fieldName) {
            if ($request->hasFile($fieldName)) {
                $image = $request->file($fieldName);

                $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('images/groups', $imageName);
                $location = public_path("images/groups/" . $imageName);
                \Intervention\Image\Facades\Image::make($image)->resize(800, 400)->save($location);

                $group->{$fieldName} = $imagePath;
            }
        }


        $group->save();

        foreach (config('translatable.locales') as $locale => $lang) {
            $group->translateOrNew($locale)->title = $request->{$locale}['title'];
            $group->translateOrNew($locale)->meta_description = $request->{$locale}['meta_description'];
            $group->translateOrNew($locale)->meta_keywords = $request->{$locale}['meta_keywords'];
            $group->translateOrNew($locale)->manager = $request->{$locale}['manager'];
            $group->translateOrNew($locale)->description = $request->{$locale}['description'];
        }
        $group->save();

        $notification = array(
        'message' => 'Group added successfully',
        'alert-type' => 'info'
        );
        return redirect(route('owner.groups.show',$group->id))->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Group $group)
    {
      $this->authorize('view-groups', 'App\Models\Group');
      $categories = GroupType::all();
      $group = Group::with('category')->whereTranslation('slug',$group->slug)->first();

        return view('auth.groups.group', compact('group','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
      $this->authorize('update-groups', 'App\Group');
      $categories = GroupType::all();
      $group = Group::find($id);
        return view('auth.groups.edit', compact('group', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, Group $group)
    {
        $this->authorize('update-groups', 'App\Models\Group');
//        dd($request->all());

        $imageFields = GetInputsHelper::imageFields();

        $group->update($request->except($imageFields));


        foreach ($imageFields as $fieldName) {
            if ($request->hasFile($fieldName)) {
                $image = $request->file($fieldName);

                $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('images/groups', $imageName);
                $location = public_path("images/groups/" . $imageName);
                \Intervention\Image\Facades\Image::make($image)->resize(800, 400)->save($location);

                $group->{$fieldName} = $imagePath;
            }
        }
       $group->save();

       $notification = array(
       'message' => 'Group updated successfully',
       'alert-type' => 'info'
       );
       return redirect(route('owner.groups.show', $group->id))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
      $this->authorize('delete-groups', 'App\Group');
          Group::where('id',$id)->delete();
          $notification = array(
          'message' => 'User deleted successfully',
          'alert-type' => 'success'
          );
          return redirect(route('owner.groups.index'))->with($notification);
    }
}
