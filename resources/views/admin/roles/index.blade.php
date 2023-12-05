@extends('admin.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Roles
        @can ('create_roles', App\Role::class)
          <small><a class="btn btn-primary" href="{{route('roles.create')}}">Create</a></small>
        @endcan
      </h1>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Title</th>
                  @can ('view_roles','update_roles', App\User::class)
                    <th>Actions</th>
                  @endcan
                </tr>
                </thead>
                @foreach ($roles as $role)
                  <tbody>
                  <tr>
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                    <td>
                    @can ('update_users', App\Role::class)
                        <a class="btn btn-primary" href="{{route('roles.edit', $role->id)}}">Edit</a> -
                      @endcan
                      @can ('view_users', App\Role::class)
                        <a class="btn btn-primary" href="{{route('roles.show', $role->id)}}">View</a>
                      @endcan
                    </td>
                  </tr>
                  </tbody>
                @endforeach
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Actions</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection
