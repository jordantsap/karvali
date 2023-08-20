<?php

namespace App\Http\Controllers\Client;

use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class CommentController extends Controller
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
        return view('#comment', ['comment' => $comment]);
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

        'user_id' => 'auth()->user() ? auth()->user()->id : null',
        'comment' => 'min:5|max:500',
        'commentable_id' => '',
        'commentable_type' => '',
      ));
      //dd($request->all());

        $comment = new Comment;

        $comment->user_id = $request->user_id;
        $comment->comment = $request->input('comment');
        $comment->commentable_id = $request->commentable_id;
        $comment->commentable_type = $request->commentable_type;

        $comment->save();

        $notification = array(
        	'message' => 'Το σχόλιο αναρτήθηκε επιτυχώς!',
        	'alert-type' => 'success'
        );
      return back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
