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
                <form method="POST" action="{{ route('owner.accommodations.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="row">

                            <div class="col-xs-1">
                                <label for="active"> {{__('form.active')}}
                                    &nbsp<input type="checkbox" name="active" value="1" class="minimal">
                                </label>
                            </div>
                            <div class="col-xs-2 form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                <label for="type">{{__("form.comcat")}}</label>
                                @if ($errors->has('accommodation_type_id'))
                                    <strong class="text-danger">{{ $errors->first('accommodation_type_id') }}</strong>
                                @endif
                                <div class="">
                                    <select id="accommodation_type_id" value="{{ old('accommodation_type_id') }}"
                                            name="accommodation_type_id" class="form-control" required>
                                        <option value="{{ old('accommodation_type_id') }}">{{__('form.pleaseselect')}}</option>
                                        @foreach($types as $type)
                                            <option
                                                value="{{ $type->id }} {{ old('accommodation_type_id') }}" {{old('accommodation_type_id')?"selected":""}}>{{ $type->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-2 form-group{{ $errors->has('amenities[]') ? ' has-error' : '' }}">
                                <label for="type">{{__('form.amenities')}}</label>
                                @if ($errors->has('amenities[]'))
                                    <strong class="text-danger">{{ $errors->first('amenities[]') }}</strong>
                                @endif
                                <div class="">
                                    <select id="amenities" value="{{ old('amenities[]') }}"
                                            name="amenities[]" class="form-control" required multiple>
                                        {{--                                        <option value="{{ old('amenities[]') }}">Επιλέξτε</option>--}}
                                        @foreach($amenities as $amenity)
                                            <option
                                                value="{{ $amenity->id }} {{ old('amenities[]') }}" {{old('amenities[]')?"selected":""}}>
                                                {{ $amenity->title }}</option>
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

                        </div>


                        <div class="row">

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


                            <div class="col-xs-4 form-group{{ $errors->has('header') ? ' has-error' : '' }}">
                                <label for="header">header</label>
                                @if ($errors->has('header'))
                                    <strong class="text-danger">{{ $errors->first('header') }}</strong>
                                @endif
                                <div class="input-group">
                                    @if ( old('header'))
                                        <img src="{{ old('header') }}" alt="">
                                    @endif
                                    <input type="file" name="header" id="header" value="{{ old('header') }}" >
                                        <p class="help-block">
                                            <img id="headerPreview" src="#" alt="Header Preview" style="display: none; max-width: 300px;">
                                        </p>
                                </div>

                            </div>
                                <div class="col-xs-4 form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                                    <label for="logo">Λογότυπο</label>
                                    @if ($errors->has('logo'))
                                        <strong class="text-danger">{{ $errors->first('logo') }}</strong>
                                    @endif
                                    <div class="input-group">
                                        @if ( old('logo'))
                                            <img src="{{ old('logo') }}" alt="">
                                        @endif
                                        <input type="file" id="logo" name="logo" value="{{ old('logo') }}" >
                                            <p class="help-block">
                                                <img id="logoPreview" src="#" alt="Logo Preview" style="display: none; max-width: 300px;">
                                            </p>
                                    </div>
                                </div>
                                <div class="col-xs-4 form-group{{ $errors->has('image1') ? ' has-error' : '' }}">
                                    <label for="image1">Εικόνα Αρχικης Σελίδας</label>
                                    @if ($errors->has('image1'))
                                        <strong class="text-danger">{{ $errors->first('image1') }}</strong>
                                    @endif
                                    <div class="input-group">
                                        @if ( old('image1'))
                                            <img src="{{ old('image1') }}" alt="">
                                        @endif
                                        <input type="file" name="image1" id="image1" value="{{ old('image1') }}" >
                                        <p class="help-block"><img id="image1Preview" src="#" alt="Image Preview 1" style="display: none; max-width: 300px;"></p>

                                    </div>
                                </div>
                                <div class="col-xs-4 form-group{{ $errors->has('image2') ? ' has-error' : '' }}">
                                    <label for="image2">Εικόνα λίστας καταχωρήσεων</label>
                                    @if ($errors->has('image2'))
                                        <strong class="text-danger">{{ $errors->first('image2') }}</strong>
                                    @endif
                                    <div class="input-group">
                                        @if ( old('image2'))
                                            <img src="{{ old('image2') }}" alt="">
                                        @endif
                                        <input type="file" id="image2" name="image2" value="{{ old('image2') }}" >
                                        <p class="help-block"><img id="image2Preview" src="#" alt="Image Preview 2" style="display: none; max-width: 300px;"></p>
                                    </div>
                                </div>
                                <div class="col-xs-4 form-group{{ $errors->has('image3') ? ' has-error' : '' }}">
                                    <label for="image3">Εικόνες σελίδας Καταστήματος</label>
                                    @if ($errors->has('image3'))
                                        <strong class="text-danger">{{ $errors->first('image3') }}</strong>
                                    @endif
                                    <div class="input-group">
                                        @if ( old('image3'))
                                            <img src="{{ old('image3') }}" alt="">
                                        @endif
                                        <input type="file" id="image3" name="image3" value="{{ old('image3') }}">
                                        <p class="help-block">
                                            <img id="image3Preview" src="#" alt="Image Preview 3" style="display: none; max-width: 300px;">
                                        </p>

                                    </div>
                                </div>

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

                            <hr>

                            <input type="hidden" name="user_id" value="{{auth()->id()}}">
{{--                            </hr>--}}
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
