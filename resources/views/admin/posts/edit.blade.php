@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Edit Post : {{$post->title}}
      <a class="btn btn-primary" href="javascript:history.back()">Go Back</a>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <form method="post" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="box-body">
          <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
              <label for="title" class="control-label">{{ __('form.title') }}</label>
                  <input id="title" type="text" class="form-control" name="title" value="{{ $post->title}}" required>

                  @if ($errors->has('title'))
                      <span class="help-block">
                          <strong>{{ $errors->first('title') }}</strong>
                      </span>
                  @endif
          </div>

          <div class="form-group{{ $errors->has('meta_description') ? ' has-error' : '' }}">
              <label for="meta_description" class="control-label">{{ __('Meta Description') }}</label>
                  <input id="meta_description" type="text" class="form-control" name="meta_description" value="{{ $post->meta_description}}" required>

                  @if ($errors->has('meta_description'))
                      <span class="help-block">
                          <strong>{{ $errors->first('meta_description') }}</strong>
                      </span>
                  @endif
          </div>

          <div class="form-group{{ $errors->has('meta_keywords') ? ' has-error' : '' }}">
              <label for="meta_keywords" class="control-label">{{ __('Meta Keywords') }}</label>
                  <input id="meta_keywords" type="text" class="form-control" name="meta_keywords" value="{{ $post->meta_keywords}}" required>

                  @if ($errors->has('meta_keywords'))
                      <span class="help-block">
                          <strong>{{ $errors->first('meta_keywords') }}</strong>
                      </span>
                  @endif
          </div>

          <div class="checkbox">
            <label>
              <input type="checkbox" name="active" value="1" @if ($post->active == 1)
                {{'checked'}}
              @endif> Active
            </label>
          </div>

          <div class="row">
            <div class="form-group col-xs-6">
              <label for="post_type">Category</label>
              <select class="form-control" name="post_type" id="post_type">
                <option value="">Choose</option>
                @foreach ($categories as $category)
                  <option value="{{$category->id}}" @if( $post->post_type == $category->id){{'selected'}}
                  @else None
                  @endif>{{$category->name}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group col-xs-6">
              <label for="image">Image</label><br>
              <img width="150" height="150" src="{{asset('images/posts/'.$post->image)}}" alt="{{$post->title}}">
              <br>
              <label for="image">Update Image</label>
              <input type="file" id="image" name="image" value="{{asset('images/posts/'.$post->image)}}">
              <p class="help-block">Example block-level help text here.</p>
            </div>
          </div>

          <div class="form-group">
            <label for="description">Description</label>
            <textarea id="editor" class="textarea" name="description" placeholder="Place some text here" style="width: 100%; height:150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$post->description}}</textarea>
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
