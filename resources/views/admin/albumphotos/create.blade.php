@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Upload photo to Album
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <form method="POST" action="{{ route('photos.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="box-body">

          <div class="row">
            <div class="col-xs-2 form-group">
              <label for="active"> Active
                &nbsp<input type="checkbox" name="active" value="1" class="minimal">
              </label>
            </div>
            <div class="col-xs-4 form-group{{ $errors->has('file') ? ' has-error' : '' }}">
              <label for="file">Εικόνα</label>
              @if ($errors->has('file'))
                <strong class="text-danger">{{ $errors->first('file') }}</strong>
              @endif
              <div class="input-group">
                @if ( old('file'))
                  <img src="{{ old('file') }}" alt="">
                @endif
                <input type="file" name="file" id="file" value="{{ old('file') }}">
              </div>
            </div>

            <div class="col-xs-3 form-group{{ $errors->has('album_id') ? ' has-error' : '' }}">
              <label for="album_id">Άλμπουμ</label>
              @if ($errors->has('album_id'))
                <strong class="text-danger">{{ $errors->first('album_id') }}</strong>
              @endif
              <div class="">
                <select id="album_id" value="{{ old('album_id') }}" name="album_id" class="form-control" >
                  <option value="{{ old('album_id') }}">Επιλέξτε</option>
                  @foreach($albums as $album)
                    <option value="{{ $album->id }} {{ old('album_id') }}" {{old('album_id')?"selected":""}}>{{ $album->title }}</option>
                  @endforeach
                </select>
              </div>
            </div>

          </div>
          <div class="form-group{{ $errors->has('alt') ? ' has-error' : '' }}">
            <label for="alt" class="control-label">{{ __('Εναλλακτικό κείμενο φωτογραφίας') }}</label>
            <input id="alt" type="text" class="form-control" name="alt" value="{{ old('alt') }}" required>

            @if ($errors->has('alt'))
              <span class="help-block">
                <strong>{{ $errors->first('alt') }}</strong>
              </span>
            @endif
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
