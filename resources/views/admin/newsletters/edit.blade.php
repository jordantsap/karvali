@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Edit Newsletter: <small>{{$newsletter->email}}</small>
      <a class="btn btn-warning" href="javascript:history.back()">Go Back</a>
    </h1>
  </section>
  <section class="content">
    <div class="box">
      <form method="post" action="{{ route('newsletters.update', $newsletter->id) }}">
        @method('PUT')
        @csrf
        <div class="box-body">
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">Όνομα</label>
                @if ($errors->has('name'))
                  <strong class="text-danger">{{ $errors->first('name') }}</strong>
                @endif
                <div class="input-group">
                  <input type="text" class="form-control" name="name" value="{{ $newsletter->name }}" id="name" placeholder="" required>
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-home"></span>
                  </span>
                </div>
              </div>
            </div>
          </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="name">E-Mail</label>
                @if ($errors->has('email'))
                  <strong class="text-danger">{{ $errors->first('email') }}</strong>
                @endif
                <div class="input-group">
                  <input type="email" class="form-control" name="email" value="{{ $newsletter->email }}" id="email" placeholder="" required>
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-home"></span>
                  </span>
                </div>
              </div>
            </div>
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
