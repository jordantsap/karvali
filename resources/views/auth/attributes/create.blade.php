@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Create New Attribute
                {{-- <small>it all starts here</small> --}}
            </h1>
        </section>
        @include('partials.alerts')

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <form method="post" action="{{ route('owner.attributes.store') }}">
                    @csrf
                    <div class="box-body">
                        <div class="col-sm-3 form-group{{ $errors->has('product_type') ? ' has-error' : '' }}">
                            <label for="product_type">Κατηγορία Προϊόντος</label>
                            @if ($errors->has('product_type'))
                                <strong class="text-danger">{{ $errors->first('product_type') }}</strong>
                            @endif
                            <div class="">
                                <select id="product_type" value="{{ old('product_type') }}" name="product_type" class="form-control" >
                                    <option value="{{ old('product_type') }}">Επιλέξτε</option>
                                    @foreach($productTypes as $productType)
                                        <option value="{{ $productType->id }} {{ old('product_type') }}" {{old('product_type')?"selected":""}}>{{ $productType->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3 form-group{{ $errors->has('attribute_type') ? ' has-error' : '' }}">
                            <label for="attribute_type">Type</label>
                            @if ($errors->has('attribute_type'))
                                <strong class="text-danger">{{ $errors->first('attribute_type') }}</strong>
                            @endif
                            <div class="">
                                <select id="attribute_type" value="{{ old('attribute_type') }}" name="attribute_type"
                                        class="form-control">
                                    <option value="{{ old('attribute_type') }}">Επιλέξτε</option>
                                    @foreach($attributeTypes as $attributeType)
                                        <option value="{{ $attributeType->id }} {{ old('attribute_type') }}" {{old('attribute_type')?"selected":""}}>{{ $attributeType->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    @foreach (config('translatable.locales') as $locale => $lang)

                            <div class="col-sm-3 form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="control-label">{{ __('form.title') }} ({{$lang}})</label>
                                <input id="title" type="text" class="form-control" name="{{$locale}}[title]" value="{{ old('title') }}" required>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                      <strong>{{ $errors->first('title') }}</strong>
                                  </span>
                                @endif
                            </div>

                        @endforeach

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
