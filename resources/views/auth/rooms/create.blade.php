@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                New Room
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <form method="post" action="{{ route('owner.rooms.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="row">

                            <div class="col-xs-1">
                                <label for="active"> Active
                                    &nbsp<input type="checkbox" name="active" value="1" class="minimal">
                                </label>
                            </div>

                            <div class="col-xs-2 form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                <label for="type">{{__('Καταλλυμα Δωματιου')}}</label>
                                @if ($errors->has('accommodation_id'))
                                    <strong class="text-danger">{{ $errors->first('accommodation_type_id') }}</strong>
                                @endif
                                <div class="">
                                    <select id="accommodation_id" value="{{ old('accommodation_id') }}"
                                            name="accommodation_id" class="form-control" required>
                                        <option value="{{ old('accommodation_id') }}">Επιλέξτε</option>
                                        @foreach($accommodations as $accommodation)
                                            <option
                                                value="{{ $accommodation->id }} {{ old('accommodation_id') }}" {{old('accommodation_id')?"selected":""}}>{{ $accommodation->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- For 'capacity' -->
                            <div class="col-xs-3 form-group{{ $errors->has('capacity') ? ' has-error' : '' }}">
                                <label for="capacity">{{ __('Max Capacity') }}</label>
                                @if ($errors->has('capacity'))
                                    <strong class="text-danger">{{ $errors->first('capacity') }}</strong>
                                @endif
                                <div class="input-group">
                                    <input type="number" class="form-control" value="{{ old('capacity') }}"
                                           id="capacity" name="capacity" placeholder="Capacity">
                                    <span class="input-group-addon">
            <span class="glyphicon glyphicon-user"></span>
        </span>
                                </div>
                            </div>

                            <!-- For 'price' -->
                            <div class="col-xs-3 form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                <label for="price">{{ __('Price')}}</label>
                                @if ($errors->has('price'))
                                    <strong class="text-danger">{{ $errors->first('price') }}</strong>
                                @endif
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{ old('price') }}"
                                           id="price" name="price" placeholder="Price">
                                    <span class="input-group-addon">
            <span class="glyphicon glyphicon-user"></span>
        </span>
                                </div>
                            </div>

                            <!-- For 'beds' -->
                            <div class="col-xs-3 form-group{{ $errors->has('beds') ? ' has-error' : '' }}">
                                <label for="beds">{{ __('Beds')}}</label>
                                @if ($errors->has('beds'))
                                    <strong class="text-danger">{{ $errors->first('beds') }}</strong>
                                @endif
                                <div class="input-group">
                                    <input type="number" class="form-control" value="{{ old('beds') }}"
                                           id="beds" name="beds" placeholder="Beds">
                                    <span class="input-group-addon">
            <span class="glyphicon glyphicon-user"></span>
        </span>
                                </div>
                            </div>

                        </div>

                        @foreach (config('translatable.locales') as $lang => $locale)

                            <div class="row">
                                <div class="col-xs-4 form-group{{ $errors->has('meta_description') ? ' has-error' : '' }}">
                                    <label for="meta_description">{{__('Meta Description'). ' - '."( $locale )"}}</label>
                                    @if ($errors->has('meta_description'))
                                        <strong class="text-danger">{{ $errors->first('meta_description') }}</strong>
                                    @endif
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{ old('meta_description') }}"
                                               id="manager" name="{{$lang}}[meta_description]" placeholder="Meta Description">
                                        <span class="input-group-addon">
                                <span class="glyphicon glyphicon-user"></span>
                              </span>
                                    </div>
                                </div>

                                <div class="col-xs-4 form-group{{ $errors->has('meta_keywords') ? ' has-error' : '' }}">
                                    <label for="meta_keywords">{{__('Meta Keywords'). ' - '."( $locale )"}}</label>
                                    @if ($errors->has('meta_keywords'))
                                        <strong class="text-danger">{{ $errors->first('meta_keywords') }}</strong>
                                    @endif
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{ old('meta_keywords') }}"
                                               id="meta_keywords" name="{{$lang}}[meta_keywords]"
                                               placeholder="Meta keywords comma separated">
                                        <span class="input-group-addon">
                                <span class="glyphicon glyphicon-user"></span>
                              </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-xs-6 form-group">
                                    <label for="title">{{ __('Title'). ' - '."( $locale )"}}</label>
                                    <input type="text" value="{{ old('title') }}" name="{{$lang}}[title]" class="form-control"
                                           id="title" placeholder="Enter Title">
                                </div>

                                <div class="col-xs-3 form-group{{ $errors->has('manager') ? ' has-error' : '' }}">
                                    <label for="manager">{{__('page.manager').' - '."( $locale )"}}</label>
                                    @if ($errors->has('manager'))
                                        <strong class="text-danger">{{ $errors->first('manager') }}</strong>
                                    @endif
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{ old('manager') }}" id="manager"
                                               name="{{$lang}}[manager]" placeholder="Manager Name">
                                        <span class="input-group-addon">
                    <span class="glyphicon glyphicon-user"></span>
                  </span>
                                    </div>
                                </div>

                            </div>

                        <div class="form-group">
                            <label for="description">{{__("Description").' - '."( $locale )"}}</label>
                            <textarea class="textarea" name="{{$lang}}[description]" placeholder="Place some text here"
                                      style="width: 100%; height:150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('description')}}</textarea>
                        </div>
                        @endforeach

                        <input type="hidden" name="user_id" value="{{auth()->id()}}">

                    </div>
                    <!-- /.box-body -->

                    <input type="submit" class="btn btn-primary pull-right" value="Submit">

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
