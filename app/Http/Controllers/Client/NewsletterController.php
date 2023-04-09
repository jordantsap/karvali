<?php

namespace App\Http\Controllers\Client;

use App\Models\Newsletter as MyNewsletter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Newsletter\Newsletter;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
      // $newsletters = MyNewsletter::paginate();
//        return redirect()->back();//view('admin.newsletters.index', compact('newsletters'));
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
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
     * @param MyNewsletter $newsletter
     * @return Response
     */
    public function show(Newsletter $newsletter)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param MyNewsletter $newsletter
     * @return Response
     */
    public function edit(Newsletter $newsletter)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param MyNewsletter $newsletter
     * @return Response
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Newsletter $newsletter
     * @return void
     */
    public function destroy(Newsletter $newsletter): void
    {
        abort(404);
    }
}
