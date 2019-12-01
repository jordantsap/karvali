@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      {{-- Edit Photo : {{$albumphoto->title}} --}}
      <a class="btn btn-primary" href="javascript:history.back()">Go Back</a>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <form method="POST" action="{{ route('photos.update', $albumphoto->id) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="box-body">

          <div class="row">
            <div class="col-xs-2 form-group">
              <label for="active"> Active
                <input type="checkbox" name="active" value="1" @if ($albumphoto->active == 1)
                  {{'checked'}}
                @endif>
              </label>
            </div>

            <div class="form-group col-xs-4">
              <label for="image">Image</label><br>
              <img width="150" height="150" src="{{asset('images/albumphotos/'.$albumphoto->file)}}" alt="{{$albumphoto->title}}">
              <br>
              <label for="image">Update Image</label>
              <input type="file" id="file" name="file" value="{{asset('images/albumphotos/'.$albumphoto->file)}}">
              <p class="help-block">Example block-level help text here.</p>
            </div>

            <div class="form-group col-xs-6">
              <label for="album_id">Album</label>
              <select class="form-control" name="album_id" id="album_id">
                @foreach ($albums as $album)
                  <option value="{{$album->id}}" @if( $albumphoto->album_id == $album->id){{'selected'}}
                  @else None
                  @endif>{{$album->title}}</option>
                @endforeach
              </select>
            </div>

          </div>
          <div class="form-group{{ $errors->has('alt') ? ' has-error' : '' }}">
            <label for="title" class="control-label">{{ __('Alternative image title') }}</label>
            <input id="alt" type="text" class="form-control" name="alt" value="{{ $albumphoto->alt}}" required>

            @if ($errors->has('alt'))
              <span class="help-block">
                <strong>{{ $errors->first('alt') }}</strong>
              </span>
            @endif
          </div>


        </div>
        <!-- /.box-body -->

        <div class="row">
          <div class="col-xs-6">
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </div>
          <div class="col-xs-6">
            <a class="btn btn-default btn-block" href="javascript:history.back()">Go Back</a>
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
