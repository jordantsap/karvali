@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
       Edit Attribute : {{$attribute->title}}
      <a class="btn btn-primary" href="javascript:history.back()">Go Back</a>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <form method="POST" action="{{ route('owner.attributes.update', $attribute->id) }}">
        @method('PATCH')
        @csrf
        <div class="box-body">

          <div class="row">
              @foreach (config('translatable.locales') as $locale => $lang)

                  <div class="col-sm-3 form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                      <label for="title" class="control-label">{{ __('form.title') }} ({{$lang}})</label>
                      <input id="title" type="text" class="form-control" name="{{$locale}}[title]" value="{{$attribute->title}} {{ old('title') }}" placeholder="{{ $attribute->title }}">

                      @if ($errors->has('title'))
                          <span class="help-block">
                                      <strong>{{ $errors->first('title') }}</strong>
                                  </span>
                      @endif
                  </div>

              @endforeach

            <div class="form-group col-xs-6">
              <label for="product_type">Product Type</label>
              <select class="form-control" name="product_type_id" id="product_type">
                @foreach ($productTypes as $productType)
                  <option value="{{$productType->id}}" @if( $productType->id == $attribute->productType->id){{'selected'}}
                  @else None
                  @endif>{{$productType->title}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-xs-6">
              <label for="attribute_type">Attribute Type</label>
              <select class="form-control" name="attribute_type_id" id="attribute_type">
                @foreach ($attributeTypes as $attributeType)
                  <option value="{{$attributeType->id}}" @if( $attributeType->id == $attribute->attributeType->id){{'selected'}}
                  @else None
                  @endif>{{$attributeType->type}}</option>
                @endforeach
              </select>
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
