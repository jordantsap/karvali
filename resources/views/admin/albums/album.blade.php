@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Album : {{$album->title}}
      @can ('update_albums', App\Post::class)
        <a class="btn btn-primary" href="{{route('albums.edit', $album->id)}}">Edit</a> - <a class="btn btn-warning" href="javascript:history.back()">Go Back</a>
        @endcan
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-body">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" value="{{$album->title}}" class="form-control" id="title" placeholder="Enter Title" disabled>
          </div>

          <div class="form-group">
            <label for="meta_description">Meta Description</label>
            <input type="text" value="{{$album->meta_description}}" class="form-control" id="meta_description" placeholder="meta_description" disabled>
          </div>

          <div class="form-group">
            <label for="meta_keywords">Meta Keywords</label>
            <input type="text" value="{{$album->meta_keywords}}" class="form-control" id="meta_keywords" placeholder="meta_keywords" disabled>
          </div>

            <div class="form-group">
              <label for="image">Cover Image</label>
              <br>
              <img width="100%" height="150" src="{{asset('images/albums/'.$album->cover_image)}}" alt="{{$album->title}}">
            </div>

            <div class="form-group">
              <label for="alt">Alternative Image title</label>
              <input type="text" value="{{$album->alt}}" class="form-control" id="alt" placeholder="Enter Altewrnative image Title" disabled>
            </div>

          <div class="form-group">
            <label for="description">Description</label>
            <textarea id="editor" class="textarea" name="description" placeholder="Place some text here" style="width: 100%; height:150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" disabled>{{$album->description}}</textarea>
          </div>

          <div class="row"><br>

            <div class="col-xs-12">
              <h1 class="text-center">Album photos {{$album->title}}</h1>
              <div class="divider"></div><br>
            </div>

            @if(count($album->photos->where('active',1)) > 0)
              @foreach($album->photos->where('active',1) as $photo)
                <div class="col-xs-3">
                  <img src="{{ asset('images/albumphotos/'.$photo->photo) }}" width="100%" height="100px" title"{{$photo->title}}">
          </div>
          @endforeach @else
          <p class="text-center">No published photos</p>
          @endif

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
