@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Post : {{$post->title}}
      @can ('update_posts', App\Post::class)
        <small><a class="btn btn-primary" href="{{route('posts.edit', $post->id)}}">Edit</a> - <a class="btn btn-warning" href="javascript:history.back()">Go Back</a></small>
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
            <input type="text" value="{{$post->title}}" class="form-control" id="title" placeholder="Enter Title" disabled>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="active" value="{{$post->active?1 == 'checked':''}}" @if ($post->active == 1)
                {{'checked'}}
              @endif> Active
            </label>
          </div>
          <div class="row">
            <div class="form-group col-xs-6">
              <label for="category">Category</label>
              <div class="form-control" name="category" id="category" disabled>
                @if( ! empty($post->category)){{ $post->category->name }}
                    @else Null
                @endif
              </div>
            </div>
            <div class="form-group col-xs-6">
              <label for="image">Image</label>
              <br>
              <img width="150" height="150" src="{{asset('images/posts/'.$post->image)}}" alt="{{$post->title}}">
            </div>
          </div>

          <div class="form-group">
            <label for="description">Description</label>
            <textarea id="editor" class="textarea" name="description" placeholder="Place some text here" style="width: 100%; height:150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" disabled>{{$post->description}}</textarea>
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
