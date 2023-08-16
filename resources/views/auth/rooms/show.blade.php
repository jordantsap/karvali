@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Room : {{$room->title}}
                @can ('update-rooms', App\Models\Room::class)
                    <small><a class="btn btn-primary" href="{{route('owner.rooms.edit', $room->id)}}">Edit</a>
                        @endcan
                        - <a class="btn btn-warning" href="javascript:history.back()">Go Back</a></small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title">Ονομασία:</label>
                                <div class="input-group">
                                    <input type="text" value="{{ $room->title }}" class="form-control" name="title" placeholder="{{ $room->title }}">
                                    <span class="input-group-addon">
                <span class="glyphicon glyphicon-home"></span>
              </span>
                                </div>
                            </div>
                        </div>
{{--                        <div class="row">--}}
                            <div class="col-xs-12">
                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label for="description">Περιγραφή</label>
                                    <div class="input-group">
              <textarea name="description" id="description" class="form-control"
                        rows="5" required>{{ $room->description }}</textarea>
                                        <span class="input-group-addon">
                <span class="glyphicon glyphicon-info-sign"></span>
              </span>
                                    </div>
                                </div>
                            </div>
{{--                        </div>--}}

                        <div class="form-group col-xs-4">
                            <label for="category">Category</label>
                            <div class="form-control" name="category" id="category" disabled>
                                @if( $room->roomType)
                                    {{ $room->roomType->title }}
                                @else Null
                                @endif
                            </div>
                        </div>
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
                                <label for="accommodation_id">Εταιρεία</label>
                                @if ($errors->has('accommodation_id'))
                                    <strong class="text-danger">{{ $errors->first('accommodation_id') }}</strong>
                                @endif
                                <div class="input-group">
                                    <select id="accommodation_id" value="{{ $room->accommodation->id }}" name="accommodation_id" class="form-control" required>
                                        <option value="">Επιλέξτε</option>
                                        @if($room->accommodation)
                                            <option value="{{ $room->accommodation->id }}" {{$room->accommodation_id == $room->accommodation->id? "selected" : ''}} required>{{ $room->accommodation->title }}</option>
                                        @endif
                                    </select>
                                    <span class="input-group-addon">
                <span class="glyphicon glyphicon-list"></span>
              </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="header">header</label>
                        <div class="input-group">
                            <img width="100%" height="200" src="{{asset($room->header)}}" alt="{{$room->title}}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-3 form-group">
                            <label for="logo">Λογότυπο</label>
                            <div class="input-group">
                                <img width="200" height="200" src="{{asset($room->logo)}}" alt="{{$room->title}}">
                            </div>
                        </div>
                        <div class="col-xs-3 form-group">
                            <label for="image1">Εικόνα Αρχικης Σελίδας</label>
                            <div class="input-group">
                                <img width="200" height="200" src="{{asset($room->image1)}}" alt="{{$room->title}}">
                            </div>
                        </div>
                        <div class="col-xs-3 form-group">
                            <label for="image2">Εικόνα 2</label>
                            <div class="col-xs-3 input-group">
                                <img width="200" height="200" src="{{asset($room->image2)}}" alt="{{$room->title}}">
                            </div>
                        </div>
                        <div class="col-xs-3 form-group">
                            <label for="image3">Εικόνες 3</label>
                            <div class="input-group">
                                <img width="200" height="200" src="{{asset($room->image3)}}" alt="{{$room->title}}">
                            </div>
                        </div>
                    </div>
                    @if(count($room->images) > 0)
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label for="image3"> <h1>{{__('Λοιπές Εικόνες')}}</h1></label>
                                </div>
                                @foreach($room->images as $upload)
                                    <div class="col-xs-1 col-md-3">
                                        <a href="{{ asset($upload->path) }}" data-lightbox="room-images">
                                            <img width="100%" height="100%" src="{{ asset($upload->path) }}" alt="{{$room->title}}">
                                        </a>
                                    </div>
                                @endforeach

                                @else
                                    No more images available
                            </div>
                        </div>
                    @endif

                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
