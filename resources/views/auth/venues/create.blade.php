@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                New Venue
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <form method="post" action="{{ route('owner.venues.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">

                        <div class="row">
                            <div class="col-xs-2 form-group">
                                <label for="active"> Active
                                    &nbsp<input type="checkbox" name="active" value="1" class="minimal">
                                </label>
                            </div>

                            <div class="col-xs-3 form-group">
                                <label for="telephone">Τηλέφωνο</label>
                                <input type="text" value="{{ old('telephone') }}" name="telephone" class="form-control" id="telephone" placeholder="Τηλέφωνο Επιχείρησης" >
                            </div>
                            <div class="col-xs-3 form-group">
                                <label for="entrance">{{__('form.entranceprice')}}</label>
                                <div class="input-group">
                                    <input type="text" value="{{ old('entrance') }}" class="form-control" id="entrance" name="entrance" placeholder="{{__('form.entranceprice')}}" required>
                                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-euro"></span>
                  </span>
                                </div>
                            </div>
                            <div class="col-xs-3 text-center{{ $errors->has('days') ? ' has-error' : '' }}">
                                <label for="days" class="bold">Ημερες εργασιας</label>
                                @if ($errors->has('days'))
                                    <strong class="text-danger">{{ $errors->first('days') }}</strong>
                                @endif
                                <br>
                                <label class="checkbox-inline">
                                    <input type="checkbox" multiple name="days[]" value="Weekdays" {{ old('days') == 'Weekdays' ? 'checked' : ''}}> Καθημερινα
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" multiple name="days[]" value="Saturday" {{ old('days') == 'Suturday' ? 'checked' : ''}}> Σαββατο
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" multiple name="days[]" value="Sunday" {{ old('days') == 'Sunday' ? 'checked' : ''}}> Κυριακη
                                </label>
                            </div>

                        </div>

{{--                        <div class="row">--}}

{{--                            <div class="col-xs-2 form-group{{ $errors->has('start_time') ? ' has-error' : '' }}">--}}
{{--                                <label for="start_time">{{__('Ωρα έναρξης')}}</label>--}}
{{--                                @if ($errors->has('start_time'))--}}
{{--                                    <strong class="text-danger">{{ $errors->first('start_time') }}</strong>--}}
{{--                                @endif--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="time" class="form-control" value="{{ old('start_time') }}" id="start_time" name="start_time" placeholder="" >--}}

{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="col-xs-2 form-group{{ $errors->has('end_time') ? ' has-error' : '' }}">--}}
{{--                                <label for="end_time">Ώρα Λήξης</label>--}}
{{--                                @if ($errors->has('end_time'))--}}
{{--                                    <strong class="text-danger">{{ $errors->first('end_time') }}</strong>--}}
{{--                                @endif--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="time" class="form-control" value="{{ old('end_time') }}" id="end_time" name="end_time" placeholder="" >--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-xs-2 form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">--}}
{{--                                <label for="start_date">{{__('Ημερομηνία έναρξης')}}</label>--}}
{{--                                @if ($errors->has('start_date'))--}}
{{--                                    <strong class="text-danger">{{ $errors->first('start_date') }}</strong>--}}
{{--                                @endif--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="date" class="form-control" value="{{ old('start_date') }}" id="start_date" name="start_date" placeholder="" >--}}

{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="col-xs-2 form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">--}}
{{--                                <label for="end_date">Ημερομηνία Λήξης</label>--}}
{{--                                @if ($errors->has('end_date'))--}}
{{--                                    <strong class="text-danger">{{ $errors->first('end_date') }}</strong>--}}
{{--                                @endif--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="date" class="form-control" value="{{ old('end_date') }}" id="end_date" name="end_date" placeholder="" >--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="row">
                            <div class="col-xs-3 form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                                <label for="website">Ιστοσελίδα</label>
                                @if ($errors->has('website'))
                                    <strong class="text-danger">{{ $errors->first('website') }}</strong>
                                @endif
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{ old('website') }}" id="website" name="website"
                                           placeholder="Website">
                                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-globe"></span>
                      </span>
                                </div>
                            </div>

                            <div class="col-xs-3 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">E-Mail</label>
                                @if ($errors->has('email'))
                                    <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                @endif
                                <div class="input-group">
                                    <input type="text" value="{{ old('email') }}" class="form-control" id="email" name="email" placeholder="E-Mail" >
                                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-envelope"></span>
                      </span>
                                </div>
                            </div>
{{--                        </div>--}}

{{--                        <div class="row">--}}
                            <div class="col-xs-3 form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
                                <label for="facebook">Facebook</label>
                                @if ($errors->has('facebook'))
                                    <strong class="text-danger">{{ $errors->first('facebook') }}</strong>
                                @endif
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{ old('facebook') }}" id="facebook" name="facebook"
                                           placeholder="facebook">
                                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-thumbs-up"></span>
                      </span>
                                </div>
                            </div>
                            <div class="col-xs-3 form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
                                <label for="twitter">Twitter</label>
                                @if ($errors->has('twitter'))
                                    <strong class="text-danger">{{ $errors->first('twitter') }}</strong>
                                @endif
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{ old('twitter') }}" id="twitter" name="twitter"
                                           placeholder="Twitter">
                                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-heart"></span>
                      </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 text-center">
                            <h3>{{__('form.langinputs')}}</h3>
                            <hr>
                        </div>

                        @foreach(config('translatable.locales') as $locale => $lang)

                            <div class="row">
                                <div class="col-xs-8 form-group">
                                    <label for="title">Title ({{$lang}})</label>
                                    <input type="text" value="{{ old('title') }}" name="{{$locale}}[title]" class="form-control" id="title" placeholder="Enter Title" >
                                </div>

                                <div class="col-xs-4 form-group{{ $errors->has('manager') ? ' has-error' : '' }}">
                                    <label for="manager">Όνομα Υπευθύνου - ({{$lang}})</label>
                                    @if ($errors->has('manager'))
                                        <strong class="text-danger">{{ $errors->first('manager') }}</strong>
                                    @endif
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{ old('manager') }}" id="manager" name="{{$locale}}[manager]" placeholder="Manager Name" >
                                        <span class="input-group-addon">
                    <span class="glyphicon glyphicon-user"></span>
                  </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('meta_description') ? ' has-error' : '' }}">
                                <label for="meta_description">Meta Description - ({{$lang}})</label>
                                @if ($errors->has('meta_description'))
                                    <strong class="text-danger">{{ $errors->first('meta_description') }}</strong>
                                @endif
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{ old('meta_description') }}" id="manager" name="{{$locale}}[meta_description]" placeholder="Meta Description" >
                                    <span class="input-group-addon">
                <span class="glyphicon glyphicon-user"></span>
              </span>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('meta_keywords') ? ' has-error' : '' }}">
                                <label for="meta_keywords">Meta Keywords - ({{$lang}})</label>
                                @if ($errors->has('meta_keywords'))
                                    <strong class="text-danger">{{ $errors->first('meta_keywords') }}</strong>
                                @endif
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{ old('meta_keywords') }}" id="meta_keywords" name="{{$locale}}[meta_keywords]" placeholder="Meta keywords comma separated" >
                                    <span class="input-group-addon">
                <span class="glyphicon glyphicon-user"></span>
              </span>
                                </div>

                            </div>
                                <div class="form-group">
                                    <label for="description">Description - ({{$lang}})</label>
                                    <textarea class="textarea" name="{{$locale}}[description]" placeholder="Place some text here" style="width: 100%; height:150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" >{{old('description')}}</textarea>
                                </div>

                        @endforeach


                        <div class="col-xs-12 text-center">
                            <h3>{{__('form.imginputs')}}</h3>
                            <hr>
                        </div>

                        <div class="form-group{{ $errors->has('header') ? ' has-error' : '' }}">
                            <label for="header">header</label>
                            @if ($errors->has('header'))
                                <strong class="text-danger">{{ $errors->first('header') }}</strong>
                            @endif
                            <div class="input-group">
                                @if ( old('header'))
                                    <img src="{{ old('header') }}" alt="">
                                @endif
                                <input type="file" id="header" name="header" value="{{ old('header') }}" >
                                <p class="help-block">
                                    <img id="headerPreview" src="#" alt="Image Preview 3" style="display: none; max-width: 300px;">
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-3 form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                                <label for="logo">Λογότυπο</label>
                                @if ($errors->has('logo'))
                                    <strong class="text-danger">{{ $errors->first('logo') }}</strong>
                                @endif
                                <div class="input-group">
                                    @if ( old('logo'))
                                        <img src="{{ old('logo') }}" alt="">
                                    @endif
                                    <input type="file" name="logo" id="logo" value="{{ old('logo') }}" >
                                    <p class="help-block">
                                        <img id="logoPreview" src="#" alt="Image Preview 3" style="display: none; max-width: 300px;">
                                    </p>
                                </div>
                            </div>
                            <div class="col-xs-3 form-group{{ $errors->has('image1') ? ' has-error' : '' }}">
                                <label for="image1">Εικόνα Αρχικης Σελίδας</label>
                                @if ($errors->has('image1'))
                                    <strong class="text-danger">{{ $errors->first('image1') }}</strong>
                                @endif
                                <div class="input-group">
                                    @if ( old('image1'))
                                        <img src="{{ old('image1') }}" alt="">
                                    @endif
                                    <input type="file" name="image1" id="image1" value="{{ old('image1') }}" >
                                    <p class="help-block">
                                        <img id="image1Preview" src="#" alt="Image Preview 3" style="display: none; max-width: 300px;">
                                    </p>
                                </div>
                            </div>
                            <div class="col-xs-3 form-group{{ $errors->has('image2') ? ' has-error' : '' }}">
                                <label for="image2">Εικόνα λίστας καταχωρήσεων</label>
                                @if ($errors->has('image2'))
                                    <strong class="text-danger">{{ $errors->first('image2') }}</strong>
                                @endif
                                <div class="col-xs-3 input-group">
                                    @if ( old('image2'))
                                        <img src="{{ old('image2') }}" alt="">
                                    @endif
                                    <input type="file" id="image2" name="image2" value="{{ old('image2') }}" >
                                    <p class="help-block">
                                        <img id="image2Preview" src="#" alt="Image Preview 3" style="display: none; max-width: 300px;">
                                    </p>
                                </div>
                            </div>
                            <div class="col-xs-3 form-group{{ $errors->has('image3') ? ' has-error' : '' }}">
                                <label for="image3">Εικόνες σελίδας Καταστήματος</label>
                                @if ($errors->has('image3'))
                                    <strong class="text-danger">{{ $errors->first('image3') }}</strong>
                                @endif
                                <div class="input-group">
                                    @if ( old('image3'))
                                        <img src="{{ old('image3') }}" alt="">
                                    @endif
                                    <input type="file" name="image3" id="image3" value="{{ old('image3') }}">
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
                                    <div id="imgfilePreviewContainer">
                                        {{__('Preview')}}
                                    </div>

                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

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
