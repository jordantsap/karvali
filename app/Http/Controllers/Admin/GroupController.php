<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Group;
use Auth;
use Image;
class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request1)
    {
      $this->authorize('view_groups', 'App\Group');
        $groups = Group::orderBy('id', 'DESC')->paginate(10);
        return view('admin.groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $this->authorize('create_groups', 'App\Group');
      $grouptypes = \App\GroupType::all();
        return view('admin.groups.create', compact('grouptypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, array(
        'user_id' => 'Auth::user()->id',
        'active' => 'integer',
        'title' => 'required|min:5|max:100',
        'slug' => 'unique:groups,title',
        'meta_description' =>'max:160',
        'meta_keywords' =>'',
        'group_type' => 'required|integer',
        'manager' => 'required',
        'header' => 'sometimes|image',
        'logo' => 'sometimes|image',
        'image1' => 'sometimes|image',
        'image2' => 'sometimes|image',
        'image3' => 'sometimes',
        'telephone' => 'required',
        'website' => '',
        'email' => 'required',
        'facebook' => '',
        'twitter' => '',
        //'address' => 'required',
        // 'lat' => 'required',
        // 'lng' => 'required',
        'description' => 'required|min:5',
      ));
      $group = new Group;

      $group->user_id = Auth::user()->id;
      $group->title = $request->title;
      $group->active = $request->active;
      $group->meta_description = $request->input('meta_description');
      $group->meta_keywords = $request->input('meta_keywords');
      $group->slug = str_slug($request->title, '-');
      $group->header = $request->header;
      $group->logo = $request->logo;
      $group->image1 = $request->image1;
      $group->image2 = $request->image2;
      $group->image3 = $request->image3;
      $group->group_type = $request->group_type;
      $group->manager = $request->manager;
      $group->telephone = $request->telephone;
      $group->website = strtolower($request->website);
      $group->email = strtolower($request->email);
      $group->facebook = strtolower($request->facebook);
      $group->twitter = strtolower($request->twitter);
      //$group->address = $request->address;
      // $group->lat = $request->input('lat');
      // $group->lng = $request->input('lng');
      $group->description = $request->description;

        if ($request->hasFile('header')) {
            $header = $request->file('header');
            $filename = time() . '.' . $header->getClientOriginalExtension();
            $location = public_path("images/groups/" . $filename);
            Image::make($header)->resize(800, 400)->save($location);
            $group->header = $filename;
          }

          if ($request->hasFile('logo')) {
              $logo = $request->file('logo');
              $filename = time() . '.' . $logo->getClientOriginalExtension();
              $location = public_path("images/groups/" . $filename);
              Image::make($logo)->resize(800, 400)->save($location);
              $group->logo = $filename;
            }

          if ($request->hasFile('image1')) {
              $image1 = $request->file('image1');
              $filename = time() . '.' . $image1->getClientOriginalExtension();
              $location = public_path("images/groups/" . $filename);
              Image::make($image1)->resize(800, 400)->save($location);
              $group->image1 = $filename;
            }

            if ($request->hasFile('image2')) {
                $image2 = $request->file('image2');
                $filename = time() . '.' . $image2->getClientOriginalExtension();
                $location = public_path("images/groups/" . $filename);
                Image::make($image2)->resize(800, 400)->save($location);
                $group->image2 = $filename;
              }

              if ($request->hasFile('image3')) {
                  $image3 = $request->file('image3');
                  $filename = time() . '.' . $image3->getClientOriginalExtension();
                  $location = public_path("images/groups/" . $filename);
                  Image::make($image3)->resize(800, 400)->save($location);
                  $group->image3 = $filename;
                }
        $group->save();
        $notification = array(
        'message' => 'Group added successfully',
        'alert-type' => 'info'
        );
        return redirect(route('group.show',$group->id))->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $this->authorize('view_groups', 'App\Group');
      $categories = \App\GroupType::all();
      $group = Group::find($id);
        return view('admin.groups.group', compact('group','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $this->authorize('update_groups', 'App\Group');
      $categories = \App\GroupType::all();
      $group = Group::find($id);
        return view('admin.groups.edit', compact('group', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update_groups', 'App\Group');
        $request->validate([
          'user_id' => 'Auth::user()->id',
          'active' => 'integer',
          'title' => 'required|min:5|max:100',
          'slug' => 'unique:groups,title',
          'meta_description' =>'max:160',
          'meta_keywords' =>'',
          'group_type' => 'required|integer',
          'manager' => 'required',
          'header' => 'sometimes|image',
          'logo' => 'sometimes|image',
          'image1' => 'sometimes|image',
          'image2' => 'sometimes|image',
          'image3' => 'sometimes',
          'telephone' => 'required',
          'website' => '',
          'email' => 'required',
          'facebook' => '',
          'twitter' => '',
          //'address' => 'required',
          // 'lat' => 'required',
          // 'lng' => 'required',
          'description' => 'required|min:5',
       ]);

       $group = Group::find($id);
       $group->user_id = Auth::user()->id;
       $group->title = $request->title;
       $group->slug = str_slug($request->title, '-');
       $group->meta_description = $request->input('meta_description');
       $group->meta_keywords = $request->input('meta_keywords');
       $group->active = $request->active;
       $group->header = $request->header;
       $group->logo = $request->logo;
       $group->image1 = $request->image1;
       $group->image2 = $request->image2;
       $group->image3 = $request->image3;
       $group->group_type = $request->group_type;
       $group->manager = $request->manager;
       $group->telephone = $request->telephone;
       $group->website = strtolower($request->website);
       $group->email = strtolower($request->email);
       $group->facebook = strtolower($request->facebook);
       $group->twitter = strtolower($request->twitter);
       //$group->address = $request->address;
       // $group->lat = $request->input('lat');
       // $group->lng = $request->input('lng');
       $group->description = $request->description;

       if ($request->hasFile('header')) {
         //add new photo
           $header = $request->file('header');
           $filename = time() . '.' . $header->getClientOriginalExtension();
           $location = public_path("images/groups/" . $filename);
           $oldfile = public_path("images/groups/" . $group->header);
           // dd($oldfile);
           if(\File::exists($oldfile))
           {
              \File::delete($oldfile);
            }
            Image::make($header)->resize(800, 400)->save($location);
           $group->header = $filename;
         }

         if ($request->hasFile('logo')) {
           //add new photo
             $logo = $request->file('logo');
             $filename = time() . '.' . $logo->getClientOriginalExtension();
             $location = public_path("images/groups/" . $filename);
             $oldfile = public_path("images/groups/" . $group->logo);
             // dd($oldfile);
             if(\File::exists($oldfile))
             {
                \File::delete($oldfile);
              }
              Image::make($logo)->resize(800, 400)->save($location);
             $group->logo = $filename;
           }

         if ($request->hasFile('image1')) {
           //add new photo
             $image1 = $request->file('image1');
             $filename = time() . '.' . $image1->getClientOriginalExtension();
             $location = public_path("images/groups/" . $filename);
             $oldfile1 = public_path("images/groups/" . $group->image1);
             // dd($oldfile);
             if(\File::exists($oldfile1))
             {
                \File::delete($oldfile1);
              }
              Image::make($image1)->resize(800, 400)->save($location);
             $group->image1 = $filename;
           }

           if ($request->hasFile('image2')) {
             //add new photo
               $image2 = $request->file('image2');
               $filename = time() . '.' . $image2->getClientOriginalExtension();
               $location = public_path("images/groups/" . $filename);
               $oldfile2 = public_path("images/groups/" . $group->image2);
               // dd($oldfile);
               if(\File::exists($oldfile2))
               {
                  \File::delete($oldfile2);
                }
                Image::make($image2)->resize(800, 400)->save($location);
               $group->image2 = $filename;
             }

             if ($request->hasFile('image3')) {
               //add new photo
                 $image3 = $request->file('image3');
                 $filename = time() . '.' . $image3->getClientOriginalExtension();
                 $location = public_path("images/groups/" . $filename);
                 $oldfile3 = public_path("images/groups/" . $group->image3);
                 // dd($oldfile);
                 if(\File::exists($oldfile3))
                 {
                    \File::delete($oldfile3);
                  }
                  Image::make($image3)->resize(800, 400)->save($location);
                 $group->image3 = $filename;
               }

       $group->save();

       $notification = array(
       'message' => 'Group updated successfully',
       'alert-type' => 'info'
       );
       return redirect(route('group.show', $group->id))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $this->authorize('delete_groups', 'App\Group');
          Group::where('id',$id)->delete();
          $notification = array(
          'message' => 'User deleted successfully',
          'alert-type' => 'success'
          );
          return redirect(route('groups.index'))->with($notification);
    }
}
