@extends('admin.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
        @can ('create_users', App\User::class)
          <small><a class="btn btn-primary" href="{{route('users.create')}}">New User</a></small>
        @endcan
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="">
        <div class="">
          <div class="box">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Roles</th>
                  <th>Active</th>
                  <th>FullName</th>
                  <th>UserName</th>
                  <th>Email</th>
                  <th>Created</th>
                  <th>Verified</th>
                  @can ('view_users','update_users', App\User::class)
                    <th>Actions</th>
                  @endcan
                </tr>
                </thead>
                @foreach ($users as $user)
                  <tbody>
                  <tr>
                    <td>{{$user->id}}</td>
                    <td>
                      @foreach ($user->roles as $role)
                        {{$role->name}}<br>
                      @endforeach
                    </td>
                    <td>{{$user->active?"yes":'no'}}</td>
                    <td>{{str_limit($user->fullname,10)}}</td>
                    <td>{{str_limit($user->username,10)}}</td>
                    <td>{{str_limit($user->email,10)}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->email_verified_at}}</td>
                    <td>
                    @can ('update_users', App\User::class)
                        <a class="btn btn-primary" href="{{route('users.edit', $user->id)}}">Edit</a> -
                      @endcan
                      @can ('view_users', App\Role::class)
                        <a class="btn btn-primary" href="{{route('users.show', $user->id)}}">View</a>
                      @endcan
                    </td>
                  </tr>
                  </tbody>
                @endforeach
                <tfoot>
                  <tr>
                    <th>id</th>
                    <th>Active</th>
                    <th>Created at</th>
                    <th>Verified</th>
                    <th>FullName</th>
                    <th>UserName</th>
                    <th>Email</th>
                    @can ('view_users','update_users', App\User::class)
                      <th>Actions</th>
                    @endcan
                  </tr>
                </tfoot>
              </table>
              {{$users->links()}}
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
