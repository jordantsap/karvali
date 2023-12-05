@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Create New Accommodation Type
                {{-- <small>it all starts here</small> --}}
            </h1>
        </section>
        @include('partials.alerts')

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <form method="post" action="{{ route('admin.accommodation-types.store') }}">
                    @csrf
                    <div class="box-body">

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

                            <div class="form-group{{ $errors->has('meta_description') ? ' has-error' : '' }}">
                                <label for="meta_description" class="control-label">{{ __('Meta Description') }} ({{$lang}})</label>
                                <input id="meta_description" type="text" class="form-control" name="{{$locale}}[meta_description]" value="{{ old('meta_description') }}" placeholder="Max 160 Characters" required>

                                @if ($errors->has('meta_description'))
                                    <span class="help-block">
                          <strong>{{ $errors->first('meta_description') }}</strong>
                      </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('meta_keywords') ? ' has-error' : '' }}">
                                <label for="meta_keywords" class="control-label">{{ __('Meta Keywords') }} ({{$lang}})</label>
                                <input id="meta_keywords" type="text" class="form-control" name="{{$locale}}[meta_keywords]" value="{{ old('meta_keywords') }}" placeholder="Comma separated" required>

                                @if ($errors->has('meta_keywords'))
                                    <span class="help-block">
                          <strong>{{ $errors->first('meta_keywords') }}</strong>
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
