@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Advert : {{'$advert'}}
      @can ('update_adverts', App\Advert::class)
        <small><a class="btn btn-primary" href="{{route('adverts.edit', $advert->id)}}">Edit</a> - <a class="btn btn-warning" href="javascript:history.back()">Go Back</a></small>
      @endcan
    </h1>
  </section>

  <section class="content">

    <div class="box">
      <div class="box-body">
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" placeholder="{{$advert->link_title}}" value="{{$advert->link_title}}" >
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox" name="active" value="1" @if ($advert->active == 1)
              {{'checked'}}
            @endif> Active
          </label>
        </div>

        <div class="col-xs-6">
          <div class="form-group">
            <label for="advertable_type">Τύπος Διαφήμισης</label>
            <div class="col-xs-12 input-group">
                  <option value="{{ $advert->advertable_type }}" @if ($advert->advertable_type)
                    {{'selected'}}
                  @endif>{{ $advert->advertable_type }}</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="advertable_id">Κωδικός Αναγνωριστικού</label>
            <div class="col-xs-12 input-group">
              <select id="advertable_id" value="{{ $advert->advertable_id }}" name="advertable_id" class="form-control" >
                <option value="">Επιλέξτε</option>
                {{-- @foreach($adverts as $advert) --}}
                  <option value="{{ $advert->advertable_id }}">{{ $advert->advertable_id }}</option>
                {{-- @endforeach --}}
              </select>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="banner">Ad banner</label>
          <img width="200" height="200" src="{{asset('images/adverts/'.$advert->banner)}}" alt="{{$advert->banner_alt}}">

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
