<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Like;
use App\User;
use App\Customer;
use Auth;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    // public function __construct()
    //  {
    //      $this->middleware('customerauth');
    //  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->back()->with('warning', 'You have to be logged in as a Customer to like!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if (auth()->user()) {
        $notification = array(
          'message' => 'Administrators cannot like!',
          'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
      }
      if (! Auth::guard('customer')->check()) {
        $notification = array(
          'message' => 'Only loggedin Customers can like this!',
          'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
      } else{

      $this->validate($request, array(
        'customer_id' => 'integer|Auth::guard()->user()->id',
        'likeable_id' => 'integer',
        'likeable_type' => '',
      ));

      $like = new Like;

      $like->customer_id = Auth::guard('customer')->user()->id;
      $like->likeable_id = $request->input('likeable_id');
      $like->likeable_type = $request->input('likeable_type');

      $like->save();

      $notification = array(
      	'message' => 'Like success!',
      	'alert-type' => 'info'
      );
      return back()->with($notification);
    }
    // return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        //
    }
}
