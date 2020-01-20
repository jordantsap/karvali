<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\PostType;

class PostController extends Controller
{
    public function index()
    {
      // $posttypes = PostType::all();
      $posts = Post::with(['category','likes','comments'])
      ->active()
      ->orderBy('id', 'DESC')->paginate(6);
        return view('posts.index', compact('posts'));
    }

    public function show($slug)
    {
      $post = Post::whereTranslation('slug', $slug)
      ->with(['category','likes','comments'])->first();
      
        return view('posts.show', compact('post'));
    }
    public function category($slug)
      {
        $posttype = PostType::whereTranslation('slug', $slug)->first();
        $posts = $posttype->posts()
        ->with(['category','likes','comments'])
        ->active()
        ->orderBy('id', 'DESC')->paginate(6);
        
        return view('posts.category', compact('posts', 'posttype'));
      }

}
