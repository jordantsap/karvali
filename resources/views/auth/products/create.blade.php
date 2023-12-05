@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Create New Product
    </h1>
  </section>
  <section class="content">

    <div class="box">
      <form action="{{ route('owner.products.store') }}" method="post" role="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="box-body">
            <div class="row">
                <div class="col-xs-2">
                    <div class="form-group">
                        <label for="active"> Active
                            <input type="checkbox" name="active" value="1">
                        </label>
                    </div>
                </div>
                <div class="col-xs-2">
                    <div class="form-group{{ $errors->has('sku') ? ' has-error' : '' }}">
                        <label for="sku">Κωδικός Προϊόντος</label>
                        @if ($errors->has('sku'))
                            <strong class="text-danger">{{ $errors->first('sku') }}</strong>
                        @endif
                        <div class="input-group">
                            <input type="text" value="{{ old('sku') }}" class="form-control" name="sku" placeholder="Κωδικός Προϊόντος" required>
                            <span class="input-group-addon">
                  <span class="glyphicon glyphicon-qrcode"></span>
                </span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-2">
                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                        <label for="price">Τιμή</label>
                        @if ($errors->has('price'))
                            <strong class="text-danger">{{ $errors->first('price') }}</strong>
                        @endif
                        <div class="input-group">
                            <input type="text" value="{{ old('price') }}" class="form-control" name="price" placeholder="Τιμή" required>
                            <span class="input-group-addon">
                  <span class="glyphicon glyphicon-euro"></span>
                </span>
                        </div>
                    </div>
                </div>

                <div class="col-xs-3">
                    <div class="form-group{{ $errors->has('company_id') ? ' has-error' : '' }}">
                        <label for="company_id">Εταιρεία</label>
                        @if ($errors->has('company_id'))
                            <strong class="text-danger">{{ $errors->first('company_id') }}</strong>
                        @endif
                        <div class="input-group">
                            <select id="company_id" value="{{ old('company_id') }}" name="company_id" class="form-control" required>
                                <option value="">Επιλέξτε</option>
                                @foreach(auth()->user()->companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->title }}</option>
                                @endforeach
                            </select>
                            <span class="input-group-addon">
                  <span class="glyphicon glyphicon-list"></span>
                </span>
                        </div>
                    </div>
                </div>
                @livewire('category-field')
            </div>

            @foreach(config('translatable.locales') as $locale => $lang)
                <h1>{{__($locale .' - '. $lang)}}</h1>
                <div class="row">
                    <div class="col-xs-9">
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title">{{__('form.title') . ' - '. $lang}}</label>
                            @if ($errors->has('title'))
                                <strong class="text-danger">{{ $errors->first('title') }}</strong>
                            @endif
                            <div class="input-group">
                                <input type="text" value="{{ old('title') }}" class="form-control" name="{{$locale}}[title]" placeholder="Ονομασία" required>
                                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-home"></span>
                </span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="form-group{{ $errors->has('meta_description') ? ' has-error' : '' }}">
                    <label for="meta_description">{{__('Meta Description:')}} - {{$lang}}</label>
                    @if ($errors->has('meta_description'))
                        <strong class="text-danger">{{ $errors->first('meta_description') }}</strong>
                    @endif
                    <div class="input-group">
                        <input type="text" value="{{ old('meta_description') }}" class="form-control" name="{{$locale}}[meta_description]" placeholder="meta_description" required>
                        <span class="input-group-addon">
              <span class="glyphicon glyphicon-home"></span>
            </span>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('meta_keywords') ? ' has-error' : '' }}">
                    <label for="meta_keywords">{{__('Meta Keywords:')}} - {{$lang}}</label>
                    @if ($errors->has('meta_keywords'))
                        <strong class="text-danger">{{ $errors->first('meta_keywords') }}</strong>
                    @endif
                    <div class="input-group">
                        <input type="text" value="{{ old('meta_keywords') }}" class="form-control" name="{{$locale}}[meta_keywords]" placeholder="meta_keywords" required>
                        <span class="input-group-addon">
              <span class="glyphicon glyphicon-home"></span>
            </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description">{{__('Περιγραφή')}} - {{ $lang }}</label>
                            @if ($errors->has('description'))
                                <strong class="text-danger">{{ $errors->first('description') }}</strong>
                            @endif
                            <div class="input-group">
                <textarea name="{{$locale}}[description]" id="description" class="form-control"
                          rows="5" required>{{ old('description') }}</textarea>
                                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-info-sign"></span>
                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        <div class="form-group{{ $errors->has('header') ? ' has-error' : '' }}">
          <label for="header">header: </label>
          @if ($errors->has('header'))
            <strong class="text-danger">{{ $errors->first('header') }}</strong>
          @endif
          <input type="file" name="header">
          <p class="help-block">Example block-level help text here.</p>
        </div>

        <div class="row">
          <div class="col-xs-3">
            <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
              <label for="logo">Λογοτυπο: </label>
              @if ($errors->has('logo'))
                <strong class="text-danger">{{ $errors->first('logo') }}</strong>
              @endif
              <input type="file" name="logo">
              <p class="help-block">Example block-level help text here.</p>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="form-group{{ $errors->has('image1') ? ' has-error' : '' }}">
              <label for="homeimage">Εικόνα 1: </label>
              @if ($errors->has('image1'))
                <strong class="text-danger">{{ $errors->first('image1') }}</strong>
              @endif
              <input type="file" name="image1">
              <p class="help-block">Example block-level help text here.</p>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="form-group{{ $errors->has('image2') ? ' has-error' : '' }}">
              <label for="pageimage">Εικόνα 2: </label>
              @if ($errors->has('image2'))
                <strong class="text-danger">{{ $errors->first('image2') }}</strong>
              @endif
              <input type="file" name="image2">
              <p class="help-block">Example block-level help text here.</p>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="form-group{{ $errors->has('image3') ? ' has-error' : '' }}">
              <label for="image3">Εικόνα 3: </label>
              @if ($errors->has('image3'))
                <strong class="text-danger">{{ $errors->first('image3') }}</strong>
              @endif
              <input type="file" name="image3">
              <p class="help-block">Example block-level help text here.</p>
            </div>
          </div>
            <div class="col-xs-4 col-lg-offset-4">
                <div class="form-group{{ $errors->has('imgfile') ? ' has-error' : '' }}">
                    <label for="imgfile">{{__('Γενικές Εικόνες')}}</label>
                    @if ($errors->has('imgfile'))
                        <strong class="text-danger">{{ $errors->first('imgfile') }}</strong>
                    @endif
                    <div>
                        {{--                                            @if ( old('imgfile'))--}}
                        {{--                                                <input type="file" name="imgfile[]" id="imgfile" multiple>--}}
                        {{--                                            @endif--}}
                        <input type="file" name="imgfile[]" id="imgfile" multiple>
                    </div>
                    <p class="help-block">
                    {{__('You can only select up to 5 files.')}}
                    <div id="imgfilePreviewContainer">
                        {{__('Preview')}}
                    </div>

                    </p>
                </div>

            </div>
        </div>


        <button type="submit" class="btn btn-primary btn-block">Submit</button>
      </form>
    </div>
  </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
