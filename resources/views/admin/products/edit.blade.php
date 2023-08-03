@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Edit Product :
      <small>{{$product->title}}</small>
      <a class="btn btn-warning" href="javascript:history.back()">Go Back</a>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <form action="{{ route('admin.products.update', [$product->slug]) }}" method="post" role="form" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="box-body">
        <div class="row">
          <div class="col-xs-8">
            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="title" class="control-label">{{ __('form.title') }}</label>
                    <input id="title" type="text" class="form-control" name="title" value="{{ $product->title}}" required>

                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
            </div>
          </div>
          <div class="col-xs-4">
            <div class="form-group{{ $errors->has('product_type') ? ' has-error' : '' }}">
              <label for="product_type">Κατηγορία Προϊόντος</label>
              @if ($errors->has('product_type'))
                <strong class="text-danger">{{ $errors->first('product_type') }}</strong>
              @endif
              <div class="input-group">
                <select id="product_type" value="{{ old('product_type') }}" name="product_type" class="form-control" required>
                  <option value="">Επιλέξτε</option>
                  @foreach ($categories as $category)
                    <option value="{{$category->id}}" @if( $product->product_type == $category->id){{'selected'}}
                    @else None
                    @endif>{{$category->name}}</option>
                  @endforeach
                </select>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-list"></span>
                </span>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group{{ $errors->has('meta_description') ? ' has-error' : '' }}">
            <label for="meta_description" class="control-label">{{ __('Meta Description') }}</label>
                <input id="meta_description" type="text" class="form-control" name="meta_description" value="{{ $product->meta_description}}" required>

                @if ($errors->has('meta_description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('meta_description') }}</strong>
                    </span>
                @endif
        </div>

        <div class="form-group{{ $errors->has('meta_keywords') ? ' has-error' : '' }}">
            <label for="meta_keywords" class="control-label">{{ __('Meta Keywords') }}</label>
                <input id="meta_keywords" type="text" class="form-control" name="meta_keywords" value="{{ $product->meta_keywords}}" required>

                @if ($errors->has('meta_keywords'))
                    <span class="help-block">
                        <strong>{{ $errors->first('meta_keywords') }}</strong>
                    </span>
                @endif
        </div>

        <div class="row">
          <div class="col-xs-2 form-group">
            <label for="active"> Active
              <input type="checkbox" name="active" value="1" @if ($product->active == 1)
                {{'checked'}}
              @endif>
            </label>
          </div>
          <div class="col-xs-3">
            <div class="form-group{{ $errors->has('sku') ? ' has-error' : '' }}">
              <label for="sku">Κωδικός προϊόντος</label>
                <div class="input-group">
                <input type="text" value="{{ $product->sku }}" class="form-control" name="sku" placeholder="Τιμή" required>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-euro"></span>
                </span>
              </div>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
              <label for="price">Τιμή</label>
                <div class="input-group">
                <input type="text" value="{{ $product->price }}" class="form-control" name="price" placeholder="Τιμή" required>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-euro"></span>
                </span>
              </div>
            </div>
          </div>

          <div class="col-xs-4">
            <div class="form-group{{ $errors->has('company_id') ? ' has-error' : '' }}">
              <label for="company_id">Εταιρεία</label>
              @if ($errors->has('company_id'))
                <strong class="text-danger">{{ $errors->first('company_id') }}</strong>
              @endif
              <div class="input-group">
                <select id="company_id" value="{{ $product->company_id }}" name="company_id" class="form-control" required>
                  <option value="">Επιλέξτε</option>
                  @foreach(auth()->user()->companies as $company)
                    <option value="{{ $company->id }}" {{$product->company_id == $company->id? "selected" : ''}}>{{ $company->title }}</option>
                  @endforeach
                </select>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-list"></span>
                </span>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group{{ $errors->has('header') ? ' has-error' : '' }}">
          <label for="header">Header: </label>
          <input type="file" value="{{asset('images/products/'.$product->header)}}" name="header">
          <p class="help-block">Example block-level help text here.</p>
        </div>

        <div class="row">
          <div class="col-xs-3">
            <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
              <label for="logo">Λογότυπο: </label>
              <input type="file" value="{{asset('images/products/'.$product->logo)}}" name="logo">
              <p class="help-block">Example block-level help text here.</p>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="form-group{{ $errors->has('image1') ? ' has-error' : '' }}">
              <label for="image1">Εικόνα 1: </label>
              <input type="file" value="{{asset('images/products/'.$product->image1)}}" name="image1">
              <p class="help-block">Example block-level help text here.</p>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="form-group{{ $errors->has('image2') ? ' has-error' : '' }}">
              <label for="image2">Εικόνα 2: </label>
              <input type="file" value="{{asset('images/products/'.$product->image2)}}" name="image2">
              <p class="help-block">Example block-level help text here.</p>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="form-group{{ $errors->has('image3') ? ' has-error' : '' }}">
              <label for="image3">Εικόνα 3: </label>
              <input type="file" value="{{asset('images/products/'.$product->image3)}}" name="image3">
              <p class="help-block">Example block-level help text here.</p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12">
            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
              <label for="description">Περιγραφή</label>
              <div class="input-group">
                <textarea name="description" id="description" class="form-control"
                  rows="5" value="{{ $product->description }}" required>{{ $product->description }}</textarea>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-info-sign"></span>
                </span>
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
      </form>
    </div>
  </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
