<?php

namespace App\Http\Controllers\Client;

use App\Newsletter as MyNewsletter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Newsletter;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $newsletters = MyNewsletter::paginate();
        return redirect()->back();//view('admin.newsletters.index', compact('newsletters'));
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
      $newsletter = new MyNewsletter;
      $newsletter->name = $request->name;
      $newsletter->email = $request->email;
      $newsletter->save();
      $notification = array(
      'message' => 'Thank you for subscribing to our list!',
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
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function show(Newsletter $newsletter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function edit(Newsletter $newsletter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newsletter $newsletter)
    {
        //
    }
}
