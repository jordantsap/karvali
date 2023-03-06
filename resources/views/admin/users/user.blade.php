@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      User : {{$user->username}}
      @can ('update_users', App\User::class)
        <small><a class="btn btn-primary" href="{{route('users.edit', $user->id)}}">Edit</a></small>
      @endcan
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-body">
        <div class="form-group">
          <label for="username">UserName</label>
          <input type="text" value="{{$user->username}}" class="form-control" id="username" placeholder="Enter UserName" disabled>
        </div>
        <div class="form-group">
          <label for="fullname">FullName</label>
          <input type="text" value="{{$user->fullname}}" class="form-control" id="fullname" placeholder="FullName" disabled>
        </div>

        <div class="form-group">
          <label for="email">E-Mail</label>
          <input type="email" value="{{$user->email}}" class="form-control" id="email" placeholder="Email" disabled>
        </div>

        <div class="form-group">
          <label for="tel">Τηλέφωνο</label>
          <input type="text" value="{{$user->tel}}" class="form-control" id="tel" placeholder="Enter telephone" disabled>
        </div>

        <div class="form-group">
          <label for="mobile">Κινητό τηλ</label>
          <input type="text" value="{{$user->mobile}}" class="form-control" id="mobile" placeholder="Enter mobile" disabled>
        </div>

        <div class="form-group">
          <label for="roles">User Roles</label>
          @foreach ($user->roles->chunk(4) as $chunk)
            <div class="row">
              @foreach ($chunk as $role)
                <div class="col-xs-3">
                  {{ $role->name }}
                </div>
              @endforeach
            </div>
          @endforeach
        </div>

      </div>

      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
