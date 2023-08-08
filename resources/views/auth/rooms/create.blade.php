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
                                <label for="type">{{__('form.accommodationid')}}</label>
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

                            <div class="col-xs-2 form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                <label for="type">{{__('form.categorytype')}}</label>
                                @if ($errors->has('category_id'))
                                    <strong class="text-danger">{{ $errors->first('category_id') }}</strong>
                                @endif
                                <div class="">
                                    <select id="category_id" value="{{ old('category_id') }}"
                                            name="category_id" class="form-control" required>
                                        <option value="{{ old('category_id') }}">Επιλέξτε</option>
                                        @foreach($categories as $category)
                                            <option
                                                value="{{ $category->id }} {{ old('category_id') }}" {{old('category_id')?"selected":""}}>{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- For 'capacity' -->
                            <div class="col-xs-3 form-group{{ $errors->has('capacity') ? ' has-error' : '' }}">
                                <label for="capacity">{{ __('form.capacity') }}</label>
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
                                <label for="price">{{ __('form.Price')}}</label>
                                @if ($errors->has('price'))
                                    <strong class="text-danger">{{ $errors->first('price') }}</strong>
                                @endif
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{ old('price') }}"
                                           id="price" name="price" placeholder="{{ __('form.priceplacehold')}}">
                                    <span class="input-group-addon">
            <span class="glyphicon glyphicon-user"></span>
        </span>
                                </div>
                            </div>

                            <!-- For 'beds' -->
                            <div class="col-xs-3 form-group{{ $errors->has('beds') ? ' has-error' : '' }}">
                                <label for="beds">{{ __('form.beds')}}</label>
                                @if ($errors->has('beds'))
                                    <strong class="text-danger">{{ $errors->first('beds') }}</strong>
                                @endif
                                <div class="input-group">
                                    <input type="number" class="form-control" value="{{ old('beds') }}"
                                           id="beds" name="beds" placeholder="{{ __('form.beds')}}">
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
                            <label for="description">{{__("form.description").' - '."( $locale )"}}</label>
                            <textarea class="textarea" name="{{$lang}}[description]" placeholder="Place some text here"
                                      style="width: 100%; height:150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('description')}}</textarea>
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
{{--                                    @if ( old('imgfile'))--}}
{{--                                        <input type="file" name="imgfile[]" id="imgfile" multiple>--}}
{{--                                    @endif--}}
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
