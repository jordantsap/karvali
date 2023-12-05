@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>
        {{__('Edit field')}}: <small>{{$field->title}}</small>
      <a class="btn btn-warning" href="javascript:history.back()">Go Back</a>
    </h1>
  </section>

  <section class="content">
    <div class="box">
      <form method="post" action="{{ route('owner.fields.update', $field->id) }}">
        @method('PUT')
        @csrf
        <div class="box-body">
          <div class="row">
              <div class="col-xs-4 form-group{{ $errors->has('companytype') ? ' has-error' : '' }}">
                  <label for="company_type">Κατηγορία Καταστήματος</label>
                  @if ($errors->has('company_type'))
                      <strong class="text-danger">{{ $errors->first('company_type') }}</strong>
                  @endif
                  <div class="input-group">
                      <select id="product_type_id" name="product_type_id" class="form-control" >
                          <option value="">Επιλέξτε</option>
                          @foreach ($productTypes as $category)
                              <option value="{{$category->id}}" @if( $field->productType->id == $category->id){{'selected'}}
                              @else None
                                  @endif>{{$category->title}}</option>
                          @endforeach
                      </select>
                      <span class="input-group-addon">
                    <span class="glyphicon glyphicon-list"></span>
                  </span>
                  </div>
              </div>
            @foreach(config('translatable.locales') as $locale => $lang)
                  <div class="col-xs-8">
                      <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                          <label for="title">{{ __('form.title'). ' - '. $lang }}</label>
                          @if ($errors->has('title'))
                              <strong class="text-danger">{{ $errors->first('title') }}</strong>
                          @endif
                          <div class="input-group">
                              <input type="text" class="form-control" name="{{$locale}}[title]" value="{{ $field->title }}" id="title" placeholder="{{ $field->title }}">
                              <span class="input-group-addon">
                    <span class="glyphicon glyphicon-home"></span>
                  </span>
                          </div>
                      </div>
                  </div>
            @endforeach

          </div>


          <!-- /.box-body -->

          <div class="row">
            <div class="col-xs-6">
              <button type="submit" class="btn btn-primary btn-block">{{__("Submit")}}</button>
            </div>
            <div class="col-xs-6">
              <a class="btn btn-default btn-block" href="javascript:history.back()">{{__("Go Back")}}</a>
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
