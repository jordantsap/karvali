
<div class="modal fade" id="roomModal" tabindex="-1" role="dialog" aria-labelledby="roomModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="roomModalLabel">Room Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
                            @if( ! empty($room->category)){{ $room->category->name }}
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
                                <select id="accommodation_id" value="{{ $room->accommodation_id }}" name="accommodation_id" class="form-control" required>
                                    <option value="">Επιλέξτε</option>
                                    {{--                                    @foreach($room->accommodation() as $company)--}}
                                    {{--                                        <option value="{{ $company->id }}" {{$room->accommodation_id == $company->id? "selected" : ''}}>{{ $company->title }}</option>--}}
                                    {{--                                    @endforeach--}}
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
                        <img width="100%" height="200" src="{{asset('images/rooms/'.$room->header)}}" alt="{{$room->title}}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6 form-group">
                        <label for="logo">Λογότυπο</label>
                        <div class="input-group">
                            <img width="200" height="200" src="{{asset('images/rooms/'.$room->logo)}}" alt="{{$room->title}}">
                        </div>
                    </div>
                    <div class="col-xs-6 form-group">
                        <label for="image1">Εικόνα Αρχικης Σελίδας</label>
                        <div class="input-group">
                            <img width="200" height="200" src="{{asset('images/rooms/'.$room->image1)}}" alt="{{$room->title}}">
                        </div>
                    </div>
                    <div class="col-xs-6 form-group">
                        <label for="image2">Εικόνα 2</label>
                        <div class="col-xs-3 input-group">
                            <img width="200" height="200" src="{{asset('images/rooms/'.$room->image2)}}" alt="{{$room->title}}">
                        </div>
                    </div>
                    <div class="col-xs-6 form-group">
                        <label for="image3">Εικόνες 3</label>
                        <div class="input-group">
                            <img width="200" height="200" src="{{asset('images/rooms/'.$room->image3)}}" alt="{{$room->title}}">
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
                                    <a href="{{ asset($upload->path) }}" data-lightbox="accommodation-images">
                                        <img width="100%" height="100%" src="{{ asset($upload->path) }}" alt="{{$upload->id}}">
                                    </a>
                                </div>
                            @endforeach
                            dsfagedthfyuhdj
                            @else
                                No more images available
                        </div>
                    </div>
                @endif

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

