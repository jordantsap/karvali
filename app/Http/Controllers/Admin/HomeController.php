<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');
    }

    public function users()
    {
      $users = DB::table('users')->get();
      return view('auth.users.index', compact('users'));
    }
    public function blog()
    {
      $blogs = DB::table('blogs')->get();
      return view('auth.blog.index', compact('blogs'));
    }
    public function companies()
    {
      $user_id = auth()->user()->id;
      $user = User::find($user_id);
        return view('auth.companies')->with('companies', $user->companies);
    }
    public function products()
    {
      $user_id = auth()->user()->id;
      $user = User::find($user_id);
        return view('auth.products')->with('products', $user->products);
    }
    public function groups()
    {
      $user_id = auth()->user()->id;
      $user = User::find($user_id);
        return view('auth.groups')->with('groups', $user->groups);
    }
    public function events()
    {
      $user_id = auth()->user()->id;
      $user = User::find($user_id);
        return view('auth.events')->with('events', $user->events);
    }
}
