@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Create New Album
      {{-- <small>it all starts here</small> --}}
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <form method="POST" action="{{ route('albums.store') }}" enctype="multipart/form-data">
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

          <div class="form-group{{ $errors->has('meta_description') ? ' has-error' : '' }}">
              <label for="meta_description" class="control-label">{{ __('Meta Description') }}</label>
                  <input id="meta_description" type="text" class="form-control" name="meta_description" value="{{ old('meta_description') }}" required>

                  @if ($errors->has('meta_description'))
                      <span class="help-block">
                          <strong>{{ $errors->first('meta_description') }}</strong>
                      </span>
                  @endif
          </div>

          <div class="form-group{{ $errors->has('meta_keywords') ? ' has-error' : '' }}">
              <label for="meta_keywords" class="control-label">{{ __('Meta Keywords') }}</label>
                  <input id="meta_keywords" type="text" class="form-control" name="meta_keywords" value="{{ old('meta_keywords') }}" required>

                  @if ($errors->has('meta_keywords'))
                      <span class="help-block">
                          <strong>{{ $errors->first('meta_keywords') }}</strong>
                      </span>
                  @endif
          </div>

          <div class="row">
            <div class="col-xs-5 form-group{{ $errors->has('cover_image') ? ' has-error' : '' }}">
              <label for="photos">Εικόνα</label>
              @if ($errors->has('cover_image'))
                <strong class="text-danger">{{ $errors->first('cover_image') }}</strong>
              @endif
              <div class="input-group">
                @if ( old('cover_image'))
                  <img src="{{ old('cover_image') }}" alt="">
                @endif
                <input type="file" name="cover_image" id="cover_image" value="{{ old('cover_image') }}">
              </div>
            </div>

            <div class="col-xs-7 form-group{{ $errors->has('alt') ? ' has-error' : '' }}">
                <label for="alt" class="control-label">{{ __('Εναλλακτικό κείμενο φωτογραφίας') }}</label>
                    <input id="alt" type="text" class="form-control" name="alt" value="{{ old('alt') }}" required>

                    @if ($errors->has('alt'))
                        <span class="help-block">
                            <strong>{{ $errors->first('alt') }}</strong>
                        </span>
                    @endif
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
