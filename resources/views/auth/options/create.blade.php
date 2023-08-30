@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Create New Product Option
                {{-- <small>it all starts here</small> --}}
            </h1>
        </section>
        @include('partials.alerts')

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <form method="post" action="{{ route('owner.options.store') }}">
                    @csrf
                    <div class="box-body">
                        <div class="form-group{{ $errors->has('product_type_id') ? ' has-error' : '' }}">
                            <label for="product_type_id">{{__("form.category")}}</label>
                            @if ($errors->has('product_type_id'))
                                <strong class="text-danger">{{ $errors->first('product_type_id') }}</strong>
                            @endif
                            <div class="">
                                <select id="product_type_id" name="product_type_id" class="form-control" required>
                                    <option value="{{ old('product_type_id') }}">{{__('form.pleaseselect')}}</option>
                                    @foreach($productTypes as $productType)
                                        <option
                                            value="{{ $productType->id }} {{ old('product_type_id') }}" {{old('product_type_id')?"selected":""}}>{{ $productType->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        @foreach (config('translatable.locales') as $locale => $lang)

                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
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
