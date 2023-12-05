@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Edit User {{$user->username}}
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <form action="{{route('users.update', $user->id)}}" method="POST" role="form">
        {{ csrf_field() }}
        @method('PUT')
        <div class="box-body">
          <div class="form-group">
            <label for="username">UserName</label>
            <input type="text" name="username" value="{{$user->username}}" class="form-control" id="username" placeholder="Enter UserName">
          </div>
          <div class="form-group">
            <label for="fullname">FullName</label>
            <input type="text" name="fullname" value="{{$user->fullname}}" class="form-control" id="fullname" placeholder="FullName">
          </div>

          <div class="form-group">
            <label for="email">E-Mail</label>
            <input type="email" name="email" class="form-control" value="{{$user->email}}" id="email" placeholder="Email">
          </div>

          <div class="form-group">
            <label for="tel">Τηλέφωνο</label>
            <input type="text" name="tel" value="{{$user->tel}}" class="form-control" id="tel" placeholder="Enter UserName">
          </div>

          <div class="form-group">
            <label for="mobile">Κινητό τηλ</label>
            <input type="text" name="mobile" value="{{$user->mobile}}" class="form-control" id="mobile" placeholder="Enter Mobile">
          </div>

          <div class="form-group">
            <label for="roles">User Roles</label>
            @foreach ($roles->chunk(4) as $chunk)
              <div class="row">
                  @foreach ($chunk as $role)
                      <div class="col-xs-3">
                        <input type="checkbox" name='role[]' value="{{ $role->id }}"
                          @if ($role->id == $user->id)
                              {{'checked'}}
                            @endif
                        >{{ $role->name }}
                      </div>
                  @endforeach
              </div>
            @endforeach
          </div>

          </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href='{{ route('users.index') }}' class="btn btn-warning">Back</a>
        </div>
      </form>
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
