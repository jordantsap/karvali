<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
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
      $this->authorize('view_permissions', 'App\Permission');
        $permissions = Permission::all();
        return view('admin.permissions.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $this->authorize('create_permissions', 'App\Permission');
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->authorize('create_permissions', 'App\Permission');
        $this->validate($request,[
            'name' => 'required|max:50|unique:permissions',
            // 'for'  => 'required'
            ]);
        $permission = new Permission;
        $permission->name = $request->name;
        // $permission->for = $request->for;
        $permission->save();

        return redirect(route('permissions.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
      // $this->authorize('view_permissions', 'App\Permission');
      //   return view('admin.permissions.show',compact('permission'));
      abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
      $this->authorize('update_permissions', 'App\Permission');
        $permission = Permission::find($permission->id);
        return view('admin.permissions.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
      $this->authorize('update_permissions', 'App\Permission');
        $this->validate($request,[
            'name' => 'required|max:50',
            // 'for'  => 'required'
            ]);
        $permission = Permission::find($permission->id);
        $permission->name = $request->name;
        // $permission->for = $request->for;
        $permission->save();

        return redirect(route('permissions.index'))->with('message','Permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
      $this->authorize('delete_permissions', 'App\Permission');
        Permission::where('id',$permission->id)->delete();
        return redirect()->back()->with('message','Permission Deleted Successfully');
    }
}
