@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Create role
      {{-- <small>it all starts here</small> --}}
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <form role="form" action="{{ route('roles.store') }}" method="post">
      {{ csrf_field() }}
        <div class="box-body">
        <div class="col-lg-offset-3 col-lg-6">
          <div class="form-group">
            <label for="name">Role title</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="role Title" required>
          </div>
          <div class="col-xs-12">
            @foreach ($permissions->chunk(4) as $chunk)
              <div class="row">
                  @foreach ($chunk as $permission)
                      <div class="col-xs-3">
                        <input type="checkbox" name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}
                      </div>
                  @endforeach
              </div>
            @endforeach
          </div>
        <div class="col-xs-12">
          <br>
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href='{{ route('roles.index') }}' class="btn btn-warning">Back</a>
        </div>

        </div>

  </div>

      </form>
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
