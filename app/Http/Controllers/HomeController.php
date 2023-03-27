<?php

namespace App\Http\Controllers;

use App\Models\CompanyType;
use App\Models\Event;
use App\Models\GroupType;
use App\Models\ProductType;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return
     */
    public function index()
    {
        return view('auth.home');
    }

    public function homepage()
    {
//        $companytypes = CompanyType::withTranslation()->get();
//        $grouptypes = GroupType::withTranslation()->get();
//        $producttypes = ProductType::withTranslation()->get();
//        $events = Event::withTranslation()->get();
        return view('home'); //, compact('companytypes', 'grouptypes', 'producttypes', 'events'));
    }

    // public function users()
    // {
    //   $users = DB::table('users')->get();
    //   return view('auth.users.index', compact('users'));
    // }
    // public function blog()
    // {
    //   $blogs = DB::table('blogs')->get();
    //   return view('auth.blog.index', compact('blogs'));
    // }
    // public function companies()
    // {
    //   $user_id = auth()->user()->id;
    //   $user = User::find($user_id);
    //     return view('auth.companies')->with('companies', $user->companies);
    // }
    // public function products()
    // {
    //   $user_id = auth()->user()->id;
    //   $user = User::find($user_id);
    //     return view('auth.products')->with('products', $user->products);
    // }
    // public function groups()
    // {
    //   $user_id = auth()->user()->id;
    //   $user = User::find($user_id);
    //     return view('auth.groups')->with('groups', $user->groups);
    // }
    // public function events()
    // {
    //   $user_id = auth()->user()->id;
    //   $user = User::find($user_id);
    //     return view('auth.events')->with('events', $user->events);
    // }
}
