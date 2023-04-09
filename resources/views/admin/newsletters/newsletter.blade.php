@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Newsletter : {{$newsletter->email}}
      @can ('update_newsletters', App\Models\Newsletter::class)
        <small><a class="btn btn-primary" href="{{route('newsletters.edit', $newsletter->id)}}">Edit</a> - <a class="btn btn-warning" href="javascript:history.back()">Go Back</a></small>
      @endcan
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-body">
        <div class="form-group">
          <label for="title">User Name</label>
          <input type="text" class="form-control" id="title" placeholder="{{$newsletter->name}}" value="{{$newsletter->name}}" readonly>
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
