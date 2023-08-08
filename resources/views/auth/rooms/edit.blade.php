@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Room :
                <small>{{$room->title}}</small>
                <a class="btn btn-warning" href="javascript:history.back()">Go Back</a>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <form action="{{ route('owner.rooms.update', $room->id) }}" method="post" role="form" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-8">
                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="title" class="control-label">{{ __('form.title') }}</label>
                                    <input id="title" type="text" class="form-control" name="title" value="{{ $room->title}}" required>

                                    @if ($errors->has('title'))
                                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group{{ $errors->has('room_type') ? ' has-error' : '' }}">
                                    <label for="room_type">Κατηγορία Δωματίου</label>
                                    @if ($errors->has('room_type'))
                                        <strong class="text-danger">{{ $errors->first('room_type') }}</strong>
                                    @endif
                                    <div class="input-group">
                                        <select id="room_type" value="{{ old('room_type') }}" name="room_type" class="form-control" required>
                                            <option value="">Επιλέξτε</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}" @if( $room->category == $category->id){{'selected'}}
                                                @else None
                                                    @endif>{{$category->title}}</option>
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
                            <input id="meta_description" type="text" class="form-control" name="meta_description" value="{{ $room->meta_description}}" required>

                            @if ($errors->has('meta_description'))
                                <span class="help-block">
                        <strong>{{ $errors->first('meta_description') }}</strong>
                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('meta_keywords') ? ' has-error' : '' }}">
                            <label for="meta_keywords" class="control-label">{{ __('Meta Keywords') }}</label>
                            <input id="meta_keywords" type="text" class="form-control" name="meta_keywords" value="{{ $room->meta_keywords}}" required>

                            @if ($errors->has('meta_keywords'))
                                <span class="help-block">
                        <strong>{{ $errors->first('meta_keywords') }}</strong>
                    </span>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-xs-2 form-group">
                                <label for="active"> Active
                                    <input type="checkbox" name="active" value="1" @if ($room->active == 1)
                                        {{'checked'}}
                                        @endif>
                                </label>
                            </div>

                            <div class="col-xs-3">
                                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                    <label for="price">Τιμή</label>
                                    <div class="input-group">
                                        <input type="text" value="{{ $room->price }}" class="form-control" name="price" placeholder="Τιμή" required>
                                        <span class="input-group-addon">
                  <span class="glyphicon glyphicon-euro"></span>
                </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-4">
                                <div class="form-group{{ $errors->has('accommodation_id') ? ' has-error' : '' }}">
                                    <label for="accommodation_id">{{ __('Κατάλημα') }}</label>
                                    @if ($errors->has('accommodation_id'))
                                        <strong class="text-danger">{{ $errors->first('accommodation_id') }}</strong>
                                    @endif
                                    <div class="input-group">
                                        <select id="accommodation_id" value="{{ $room->accommodation_id }}" name="accommodation_id" class="form-control" required>
                                            <option value="">Επιλέξτε</option>
                                            @if(auth()->user()->has('accommodations'))
                                                <option value="{{ auth()->user()->accommodations }}" {{$room->accommodation_id == $room->id? "selected disabled" : ''}}>{{ $room->accommodation->title }}</option>
                                            @endif
                                        </select>
                                        <span class="input-group-addon">
                  <span class="glyphicon glyphicon-list"></span>
                </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label for="description">Περιγραφή</label>
                                    <div class="input-group">
                <textarea name="description" id="description" class="form-control"
                          rows="5" value="{{ $room->description }}" required>{{ $room->description }}</textarea>
                                        <span class="input-group-addon">
                  <span class="glyphicon glyphicon-info-sign"></span>
                </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('header') ? ' has-error' : '' }}">
                            <label for="header">Header: </label>
                            <input type="file" value="{{asset('images/rooms/'.$room->header)}}" name="header">
                            <p class="help-block">Example block-level help text here.</p>
                        </div>

                        <div class="row">
                            <div class="col-xs-3">
                                <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                                    <label for="logo">Λογότυπο: </label>
                                    <input type="file" value="{{asset('images/rooms/'.$room->logo)}}" name="logo">
                                    <p class="help-block">
                                        <img id="logoPreview" src="#" alt="Logo Preview 3" style="display: none; max-width: 300px;">
                                    </p>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group{{ $errors->has('image1') ? ' has-error' : '' }}">
                                    <label for="image1">Εικόνα 1: </label>
                                    <input type="file" value="{{asset('images/rooms/'.$room->image1)}}" name="image1">
                                    <p class="help-block">
                                        <img id="image1Preview" src="#" alt="Image Preview 1" style="display: none; max-width: 300px;">
                                    </p>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group{{ $errors->has('image2') ? ' has-error' : '' }}">
                                    <label for="image2">Εικόνα 2: </label>
                                    <input type="file" value="{{asset('images/rooms/'.$room->image2)}}" name="image2">
                                    <p class="help-block">
                                        <img id="image2Preview" src="#" alt="Image Preview 2" style="display: none; max-width: 300px;">
                                    </p>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group{{ $errors->has('image3') ? ' has-error' : '' }}">
                                    <label for="image3">Εικόνα 3: </label>
                                    <input type="file" value="{{asset('images/rooms/'.$room->image3)}}" name="image3">
                                    <p class="help-block">
                                        <img id="image3Preview" src="#" alt="Image Preview 3" style="display: none; max-width: 300px;">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
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
