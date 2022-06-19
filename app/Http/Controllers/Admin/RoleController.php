<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Permission;
use App\Http\Controllers\Controller;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view_roles', 'App\Role');
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Role $role)
    {
        $this->authorize('create_roles', 'App\Role');
        $permissions = Permission::all();
        return view('admin.roles.create',compact('permissions'));
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
          'name' =>'required|max:50|unique:roles',
          ]);
      $role = new Role;
      $role->name = $request->name;
      $role->save();
      $role->permissions()->sync($request->permission);
      $notification = array(
      'message' => 'Role added successfully',
      'alert-type' => 'info'
      );
      return redirect(route('roles.index'))->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
      $this->authorize('view_roles', Role::class);
      $role = Role::find($role->id);
      $permissions = Permission::all();
      return view('admin.roles.role', compact('role', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $this->authorize('update_roles', 'App\Role');
      $role = Role::find($id);
      $permissions = Permission::all();
      return view('admin.roles.edit',compact('role','permissions'));
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
        // $this->authorize('update_roles', 'App\Role');
        $this->validate($request,[
            'name' =>'max:50',
            ]);
        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();
        $role->permissions()->sync($request->permission);
        $notification = array(
        'message' => 'Role updated successfully',
        'alert-type' => 'info'
        );
        return redirect(route('roles.index'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $role =  Role::find($id);
      $role->delete();
      $notification = array(
      'message' => 'Role updated successfully',
      'alert-type' => 'info'
      );
      return redirect('/shares')->with($notification);
    }
}
