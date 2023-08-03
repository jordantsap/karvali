@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Create Amenity
                {{-- <small>it all starts here</small> --}}
            </h1>
        </section>
        @include('partials.alerts')

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <form method="post" action="{{ route('owner.amenities.store') }}">
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
