@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Role : {{$role->name}}
      @can ('update_roles', App\Role::class)
        <small><a class="btn btn-primary" href="{{route('roles.edit', $role->id)}}">Edit</a></small>
      @endcan
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-body">
        <div class="form-group">
          <label for="roleid">Role id</label>
          <input type="text" value="{{$role->id}}" class="form-control" id="roleid" placeholder="Role id">
        </div>
        <div class="form-group">
          <label for="rolename">Role Name</label>
          <input type="text" class="form-control" value="{{$role->name}}" id="rolename" placeholder="Rokle Name">
        </div>
        <div class="form-group">
          <label for="permissions">Permissions</label>
          @foreach ($permissions->chunk(4) as $chunk)
            <div class="row">
                @foreach ($chunk as $permission)
                    <div class="col-xs-3">
                      <input type="checkbox" name='permission[]' value="{{ $permission->id }}"
                      @foreach ($role->permissions as $role_permit)
                        @if ($role_permit->id == $permission->id)
                          checked
                        @endif
                      @endforeach
                      >{{ $permission->name }}
                    </div>
                @endforeach
            </div>
          @endforeach
        </div>
      </div>
      <!-- /.box-body -->
      {{-- <div class="box-footer">
        Footer
      </div> --}}
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
