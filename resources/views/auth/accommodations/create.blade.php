@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                New Accommodation
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <form method="post" action="{{ route('owner.accommodation.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="row">

                            <div class="col-xs-1">
                                <label for="active"> Active
                                    &nbsp<input type="checkbox" name="active" value="1" class="minimal">
                                </label>
                            </div>
                            <div class="col-xs-2 form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                <label for="type">Κατηγορία Καταστήματος</label>
                                @if ($errors->has('accommodation_type_id'))
                                    <strong class="text-danger">{{ $errors->first('accommodation_type_id') }}</strong>
                                @endif
                                <div class="">
                                    <select id="accommodation_type_id" value="{{ old('accommodation_type_id') }}"
                                            name="accommodation_type_id" class="form-control" required>
                                        <option value="{{ old('accommodation_type_id') }}">Επιλέξτε</option>
                                        @foreach($types as $type)
                                            <option
                                                value="{{ $type->id }} {{ old('accommodation_type_id') }}" {{old('accommodation_type_id')?"selected":""}}>{{ $type->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-xs-3 form-group {{ $errors->has('total_rooms') ? ' has-error' : '' }}">
                                <label for="total_rooms">Total Rooms</label>
                                <input type="number" min="1" value="{{ old('total_rooms') }}" name="total_rooms"
                                       class="form-control"
                                       id="total_rooms" placeholder="Total_rooms Arithmetic">
                            </div>

                                <div class="col-xs-3 form-group">
                                    <label for="telephone">Telephone</label>
                                    <input type="text" value="{{ old('telephone') }}" name="telephone" class="form-control"
                                           id="telephone" placeholder="Τηλέφωνο Επιχείρησης">
                                </div>

                            <div class="col-xs-3 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">E-Mail</label>
                                @if ($errors->has('email'))
                                    <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                @endif
                                <div class="input-group">
                                    <input type="text" value="{{ old('email') }}" class="form-control" id="email"
                                           name="email" placeholder="E-Mail">
                                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-envelope"></span>
                      </span>
                                </div>
                            </div>

                        </div>


                        <div class="row">

                            <div class="col-xs-3 form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                                <label for="website">Ιστοσελίδα</label>
                                @if ($errors->has('website'))
                                    <strong class="text-danger">{{ $errors->first('website') }}</strong>
                                @endif
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{ old('website') }}" id="website"
                                           name="website"
                                           placeholder="Website">
                                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-globe"></span>
                      </span>
                                </div>

                            </div>

                            <div class="col-xs-3 form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
                                <label for="facebook">Facebook</label>
                                @if ($errors->has('facebook'))
                                    <strong class="text-danger">{{ $errors->first('facebook') }}</strong>
                                @endif
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{ old('facebook') }}" id="facebook"
                                           name="facebook"
                                           placeholder="facebook">
                                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-thumbs-up"></span>
                      </span>
                                </div>
                            </div>
                            <div class="col-xs-3 form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
                                <label for="twitter">Twitter Profile</label>
                                @if ($errors->has('twitter'))
                                    <strong class="text-danger">{{ $errors->first('twitter') }}</strong>
                                @endif
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{ old('twitter') }}" id="twitter"
                                           name="twitter"
                                           placeholder="Twitter Profile Link">
                                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-heart"></span>
                      </span>
                                </div>
                            </div>

                            <div class="col-xs-12 text-center">
                                <h3>{{__('form.langinputs')}}</h3>
                                <hr>
                            </div>


                            @foreach(config('translatable.locales') as $locale =>$lang)

                                <div
                                    class="col-xs-6 form-group{{ $errors->has('meta_description') ? ' has-error' : '' }}">
                                    <label for="meta_description">Meta Description ({{$lang}})</label>
                                    @if ($errors->has('meta_description'))
                                        <strong class="text-danger">{{ $errors->first('meta_description') }}</strong>
                                    @endif
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{ old($locale.'meta_description') }}"
                                               id="meta_description_{{ $locale }}" name="{{$locale}}[meta_description]"
                                               placeholder="Meta Description 150-160 length">
                                        <span class="input-group-addon">
                                <span class="glyphicon glyphicon-user"></span>
                              </span>
                                    </div>
                                </div>

                                <div class="col-xs-6 form-group{{ $errors->has('meta_keywords') ? ' has-error' : '' }}">
                                    <label for="meta_keywords">Meta Keywords ({{$lang}})</label>
                                    @if ($errors->has('meta_keywords'))
                                        <strong class="text-danger">{{ $errors->first('meta_keywords') }}</strong>
                                    @endif
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{ old($locale.'meta_keywords') }}"
                                               id="meta_keywords_{{ $locale }}" name="{{$locale}}[meta_keywords]"
                                               placeholder="5 Meta keywords comma separated">
                                        <span class="input-group-addon">
                                <span class="glyphicon glyphicon-user"></span>
                              </span>
                                    </div>
                                </div>

                                {{--                        <div class="row">--}}

                                <div class="col-xs-6 form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="title">Title ({{$lang}})</label>
                                    <input type="text" value="{{ old($locale.'title') }}" name="{{$locale}}[title]"
                                           class="form-control"
                                           id="title_{{ $locale }}" placeholder="Enter Title">
                                </div>

                                <div class="col-xs-6 form-group{{ $errors->has('manager') ? ' has-error' : '' }}">
                                    <label for="manager">{{__('page.manager') . ' '. $lang}}</label>
                                    @if ($errors->has('manager'))
                                        <strong class="text-danger">{{ $errors->first('manager') }}</strong>
                                    @endif
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{ old('manager') }}" id="manager_{{ $locale }}"
                                               name="{{$locale}}[manager]" placeholder="Manager Name">
                                        <span class="input-group-addon">
                                <span class="glyphicon glyphicon-user"></span>
                              </span>
                                    </div>
                                </div>


                                <div class="col-xs-12 form-group">
                                    <label for="description">Description ({{$lang}})</label>
                                    <textarea class="textarea" name="{{$locale}}[description]"
                                              placeholder="Place some text here"
                                              id="description_{{ $locale }}"
                                              style="width: 100%; height:150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old($locale.'description')}}</textarea>
                                </div>
                            @endforeach

                            <hr>

                            <input type="hidden" name="user_id" value="{{auth()->id()}}">
                            </hr>
                            <!-- /.box-body -->

                            <div class="col-xs-12">
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
