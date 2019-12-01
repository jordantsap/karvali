@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Edit Advert: <small>{{$advert->title}}</small>
      <a href="javascript:history.back()">Go Back</a>
    </h1>
  </section>
  <section class="content">
    <div class="box">
      <form method="post" action="{{ route('adverts.update', $advert->id) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="box-body">
          <div class="row">
            <div class="col-xs-6 form-group{{ $errors->has('link_title') ? ' has-error' : '' }}">
              <label for="link_title">Όνομα Διαφήμισης</label>
              @if ($errors->has('link_title'))
                <strong class="text-danger">{{ $errors->first('link_title') }}</strong>
              @endif
              <div class="input-group">
                <span>(Βοηθάει στις μηχανες αναζήτησης)</span>
                <input type="text" class="form-control" value="{{ $advert->link_title }}" id="link_title" name="link_title">
              </div>
            </div>
            <div class="col-xs-6 form-group{{ $errors->has('banner_alt') ? ' has-error' : '' }}">
              <label for="banner_alt">Εναλλακτικό κείμενο φωτογραφίας</label>
              @if ($errors->has('banner_alt'))
                <strong class="text-danger">{{ $errors->first('banner_alt') }}</strong>
              @endif
              <div class="input-group">
                <span>(Βοηθάει στις μηχανες αναζήτησης)</span>
                <input type="text" class="form-control" value="{{ $advert->banner_alt }}" id="banner_alt" name="banner_alt" placeholder="π.χ. Ρούχο για το βαρύ χειμώνα" >
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-2 form-group">
              <label for="publish">Publish <br>
                &nbsp<input type="checkbox" name="active" value="1">
              </label>
            </div>
            <div class="col-xs-4 form-group{{ $errors->has('banner') ? ' has-error' : '' }}">
              <label for="banner">Εικόνα Διαφήμισης</label>
              @if ($errors->has('banner'))
                <strong class="text-danger">{{ $errors->first('banner') }}</strong>
              @endif
              <img width="200" height="200" src="{{asset('images/adverts/'.$advert->banner)}}" alt="{{$advert->banner_alt}}">
              <div class="input-group">
                <input type="file" value="{{ old('banner') }}" name="banner" >
              </div>
            </div>
            <div class="col-xs-6">
              <div class="form-group{{ $errors->has('advertable_type') ? ' has-error' : '' }}">
                <label for="advertable_type">Τύπος Διαφήμισης</label>
                @if ($errors->has('advertable_type'))
                  <strong class="text-danger">{{ $errors->first('advertable_type') }}</strong>
                @endif
                <div class="col-xs-12 input-group">
                  <select id="advertable_type" value="{{ old('advertable_type') }}" name="advertable_type" class="form-control" >
                    <option value="">Επιλέξτε</option>
                    <option value="App\Company">Company</option>
                    <option value="App\Group">Group</option>
                    <option value="App\Event">Event</option>
                    <option value="App\Product">Product</option>
                  </select>
                </div>
              </div>
              <div class="form-group{{ $errors->has('advertable_id') ? ' has-error' : '' }}">
                <label for="advertable_id">Κωδικός Αναγνωριστικού</label>
                @if ($errors->has('advertable_id'))
                  <strong class="text-danger">{{ $errors->first('advertable_id') }}</strong>
                @endif
                <div class="col-xs-12 input-group">
                  <select id="advertable_id" value="{{ old('advertable_id') }}" name="advertable_id" class="form-control" >
                    <option value="">Επιλέξτε</option>
                    {{-- @foreach($advert as $advert) --}}
                      <option value="{{ $advert->advertable_id }}">{{ $advert->advertable_id }}</option>
                    {{-- @endforeach --}}
                  </select>
                </div>
              </div>
            </div>
          </div>
            <div class="row">
              <div class="col-xs-6">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
              </div>
              <div class="col-xs-6">
                <a class="btn btn-default btn-block" href="javascript:history.back()">Go Back</a>
              </div>
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
