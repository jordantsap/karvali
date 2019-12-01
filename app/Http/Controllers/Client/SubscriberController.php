<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         return redirect()->back();
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
      if ( $request->email )//! Newsletter::isSubscribed($request->email) )
      {
      // Newsletter::subscribe($request->email);
      $subscriber = new Subscriber;
      $subscriber->name = $request->name;
      $subscriber->email = $request->email;
      $subscriber->save();
      $notification = array(
      'message' => 'Ευχαριστούμε για την εγγραφή σας στη λίστα μας!',
      'alert-type' => 'info'
      );
      return back()->with($notification);
      }
      else {
        $notification = array(
        'message' => 'You are already subscribed to our list!',
        'alert-type' => 'info'
        );
        return back()->with($notification);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function show(Subscriber $subscriber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscriber $subscriber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscriber $subscriber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscriber $subscriber)
    {
        //
    }
}
