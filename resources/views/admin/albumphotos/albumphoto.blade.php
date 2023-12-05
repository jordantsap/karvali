@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Album Photo : {{$albumphoto->title}}
      @can ('update_albums', App\Post::class)
        <a class="btn btn-primary" href="{{route('photos.edit', $albumphoto->id)}}">Edit</a> - <a class="btn btn-warning" href="javascript:history.back()">Go Back</a>
          {{-- <small><a class="btn btn-primary" href="{{route('photos.create', $albumphoto->id)}}">Add Photos to album</a></small> --}}
        @endcan
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-body">

          <div class="col-xs-2 form-group">
            <label for="active"> Active
              &nbsp<input type="checkbox" name="active" value="1">
            </label>
          </div>

            <div class="row">
              <div class="col-xs-8 form-group">
                <label for="image">Image</label>
                <br>
                <img width="100%" height="150" src="{{asset('images/albumphotos/'.$albumphoto->file)}}" alt="{{$albumphoto->title}}">
              </div>

              <div class="form-group col-xs-4">
                <label for="category">Category</label>
                <div class="form-control" name="album_id" id="album_id" disabled>
                  @if( ! empty($albumphoto->album_id)){{ $albumphoto->album->title }}
                      @else Null
                  @endif
                </div>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-xs-6">
                <label for="alt">Alternative Image title</label>
                <input type="text" value="{{$albumphoto->alt}}" class="form-control" id="alt" placeholder="Enter Altewrnative image Title" disabled>
              </div>

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
