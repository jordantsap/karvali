<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $newsletters = Newsletter::paginate(5);

        return view('admin.newsletters.index', compact('newsletters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.newsletters.create');
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
          'email' =>'required|string|email',
          'name' =>'required|string|',
          ]);
      $newsletter = new Newsletter;
      $newsletter->name = $request->name;
      $newsletter->email = $request->email;

      $newsletter->save();

      $notification = array(
      'message' => 'Newsletter added successfully',
      'alert-type' => 'info'
      );
      return redirect(route('newsletters.index'))->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $newsletter = Newsletter::find($id);
        return view('admin.newsletters.newsletter', compact('newsletter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $newsletter = Newsletter::find($id);

        return view('admin.newsletters.edit', compact('newsletter'));
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
      $this->validate($request,[
          'email' =>'required|email',
          'name' =>'required',
          ]);

      $newsletter = Newsletter::find($id);
      $newsletter->email = $request->email;
      $newsletter->name = $request->name;

      $newsletter->save();

      $notification = array(
      'message' => 'Newsletter added successfully',
      'alert-type' => 'info'
      );
      return redirect(route('newsletters.index'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
