@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Create New Post
      {{-- <small>it all starts here</small> --}}
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
          <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
              <label for="title" class="control-label">{{ __('form.title') }}</label>
                  <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required>

                  @if ($errors->has('title'))
                      <span class="help-block">
                          <strong>{{ $errors->first('title') }}</strong>
                      </span>
                  @endif
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" name="status" value="1"> Publish
              </label>
            </div>
          </div>

          <div class="form-group{{ $errors->has('meta_description') ? ' has-error' : '' }}">
              <label for="meta_description" class="control-label">{{ __('Meta Description') }}</label>
                  <input id="meta_description" type="text" class="form-control" name="meta_description" value="{{ old('meta_description') }}" placeholder="Max 160 Characters" required>

                  @if ($errors->has('meta_description'))
                      <span class="help-block">
                          <strong>{{ $errors->first('meta_description') }}</strong>
                      </span>
                  @endif
          </div>

          <div class="form-group{{ $errors->has('meta_keywords') ? ' has-error' : '' }}">
              <label for="meta_keywords" class="control-label">{{ __('Meta Keywords') }}</label>
                  <input id="meta_keywords" type="text" class="form-control" name="meta_keywords" value="{{ old('meta_keywords') }}" placeholder="Comma separated" required>

                  @if ($errors->has('meta_keywords'))
                      <span class="help-block">
                          <strong>{{ $errors->first('meta_keywords') }}</strong>
                      </span>
                  @endif
          </div>

          <div class="row">
            <div class="form-group col-xs-6">
              <label for="post_type">Category</label>
              <select class="form-control" name="post_type" id="post_type">
                <option value="{{old('post_type')}}">Select one</option>
                @foreach ($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              </select>
              @if ($errors->has('post_type'))
                  <span class="help-block">
                      <strong>{{ $errors->first('post_type') }}</strong>
                  </span>
              @endif
            </div>

            <div class="form-group col-xs-6">
              <label for="image">Image</label>
              <input type="file" id="image" name="image" value="{{old('image')}}" required>
              <p class="help-block">Example block-level help text here.</p>
            </div>
          </div>

          <div class="form-group">
            <label for="description">Description</label>
            <textarea class="textarea" name="description" placeholder="Place some text here" style="width: 100%; height:150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>{{old('description')}}</textarea>
          </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
        <!-- /.box-body -->

      </form>
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
