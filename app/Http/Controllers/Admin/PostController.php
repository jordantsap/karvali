<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostType;
use Auth;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Post::orderBy('id', 'DESC')->paginate(10);
      return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $this->authorize('create_posts', 'App\Post');
        $categories = PostType::all();
        return view('admin.posts.create', compact('categories'));
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
          'image' =>'nullable',
          'meta_description' =>'max:160',
          'meta_keywords' =>'',
          'post_type'=>'required',
          'description' =>'required',
          'active' => '',
          ]);
      $post = new Post;
      $post->title = $request->title;
      $post->meta_description = $request->input('meta_description');
      $post->meta_keywords = $request->input('meta_keywords');
      $post->slug = str_slug($post->title);
      $post->image = $request->image;
      $post->post_type = $request->post_type;
      $post->active = $request->input('active');
      $post->description = $request->description;
      $post->user_id = Auth::user()->id;

      if ($request->hasFile('image')) {
          $image = $request->file('image');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          $location = public_path("images/posts/" . $filename);
          Image::make($image)->resize(800, 400)->save($location);
          $post->image = $filename;
        }
      $post->save();
      $notification = array(
      'message' => 'Post added successfully',
      'alert-type' => 'info'
      );
      return redirect(route('posts.index'))->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $this->authorize('view_posts', 'App\Post');
      // $category = \App\PostType::all();
      $post = Post::find($id);
        return view('admin.posts.post', compact('post', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $this->authorize('update_posts', App\Post::class);
      $categories = \App\PostType::all();
      $post = Post::find($id);
        return view('admin.posts.edit', compact('post','categories'));
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
      $request->validate([
     'title'=>'required|max:100',
     'description' => 'required',
     'meta_description' =>'max:160',
     'meta_keywords' =>'',
     'post_type'=> 'required|integer',
     'active' => 'nullable',
     'image'=> 'image',
     ]);

     $post = Post::find($id);
     $post->title = $request->title;
     $post->meta_description = $request->input('meta_description');
     $post->meta_keywords = $request->input('meta_keywords');
     $post->slug = str_slug($post->title);
     $post->post_type = $request->post_type;
     $post->active = $request->input('active');
     $post->description = $request->description;

     if ($request->hasFile('image')) {
       //add new photo
         $image = $request->file('image');
         $filename = time() . '.' . $image->getClientOriginalExtension();
         $location = public_path("images/posts/" . $filename);
         $oldfile = public_path("images/posts/" . $post->image);
         // dd($oldfile);
         if(\File::exists($oldfile))
         {
            \File::delete($oldfile);
          }
          Image::make($image)->resize(800, 400)->save($location);
         $post->image = $filename;
       }
     $post->save();

     $notification = array(
     'message' => 'Post updated successfully',
     'alert-type' => 'info'
     );
     return redirect(route('posts.show', $post->id))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $this->authorize('delete_posts', App\Post::class);
      $post = Post::find($id);
       $post->delete();
       $notification = array(
       'message' => 'Post deleted successfully',
       'alert-type' => 'info'
       );
       return back()->with($notification);
    }
}
