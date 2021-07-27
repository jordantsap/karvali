<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create',compact('roles'));
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
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            // 'phone' => 'required|numeric',
            // 'password' => 'required|string|min:6|confirmed',
        ]);
        $user = new User;
        $request['password'] = bcrypt($request->password);
        $user = User::create($request->all());
        $user->email_verified_at = Carbon::now();
        $user->roles()->sync($request->role);
        $user->save();
        $notification = array(
        'message' => 'User added successfully',
        'alert-type' => 'info'
        );
        return redirect(route('users.index'))->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $this->authorize('view_users', 'App\User');
      $user = User::find($id);
        return view('admin.users.user', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $this->authorize('update_users', 'App\User');
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.users.edit',compact('user','roles'));
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
      $this->authorize('update_users', 'App\User');
        $this->validate($request,[
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            // 'phone' => 'required|numeric',
        ]);
        $request->active? : $request['active']=0;
        $user = User::where('id',$id)->update($request->except('_token','_method','role'));
        User::find($id)->roles()->sync($request->role);

        $notification = array(
        'message' => 'User updated successfully',
        'alert-type' => 'success'
        );
        return redirect(route('users.index'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  $this->authorize('delete_users', 'App\User');
        User::where('id',$id)->delete();
        $notification = array(
        'message' => 'User deleted successfully',
        'alert-type' => 'success'
        );
        return redirect(route('users.index'))->with($notification);
    }
}
