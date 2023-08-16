@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                {{__('Edit Accommodation')}}: <small>{{$accommodation->title}}</small>
                <a class="btn btn-warning" href="javascript:history.back()">Go Back</a>
            </h1>
        </section>

        <section class="content">
            <div class="box">
                <form method="post" action="{{ route('owner.accommodation.update', $accommodation->id) }}"
                      enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="box-body">
                        <div class="row">

                            {{--              <div class="row">--}}
                            <div class="col-xs-1 form-group">
                                <label for="active"> {{ __("Active")}}
                                    <input type="checkbox" name="active" value="1" @if ($accommodation->active == 1)
                                        {{'checked'}}
                                        @endif>
                                </label>
                            </div>

                            <div class="col-xs-3 form-group{{ $errors->has('companytype') ? ' has-error' : '' }}">
                                <label for="company_type">{{__('Κατηγορία Καταστήματος')}}</label>
                                @if ($errors->has('company_type'))
                                    <strong class="text-danger">{{ $errors->first('company_type') }}</strong>
                                @endif
                                <div class="input-group">
                                    <select id="company_type" value="{{ $accommodation->accommodationType }}"
                                            name="accommodation_type_id" class="form-control">
                                        <option value="">{{__("Επιλέξτε")}}</option>
                                        @foreach ($accommodationTypes as $accommodationType)
                                            <option value="{{$accommodationType->id}}"
                                                    @if( $accommodation->accommodationType->id == $accommodationType->id){{'selected'}}
                                                    @else None
                                                @endif>{{$accommodationType->title}}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-list"></span>
                  </span>
                                </div>
                            </div>
                            <div class="col-xs-2 form-group{{ $errors->has('amenity_id') ? ' has-error' : '' }}">
                                <label for="type">{{__('form.amenities')}}</label>
                                @if ($errors->has('amenity_id'))
                                    <strong class="text-danger">{{ $errors->first('amenity_id') }}</strong>
                                @endif
                                <div class="">
                                    <select id="amenities" value="{{ old('amenities') }}"
                                            name="amenities[]" class="form-control" required multiple>
                                        {{--                                        <option value="{{ old('amenity_id') }}">Επιλέξτε</option>--}}
                                        @foreach($amenities as $amenity)
                                            <option value="{{ $amenity->id }}"
                                                {{ in_array($amenity->id, is_array(old('amenities')) ? old('amenities') : ($accommodation->amenities ? $accommodation->amenities->pluck('id')->toArray() : [])) ? 'selected' : '' }}>
                                                {{ $amenity->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{--              </div>--}}

                            <div class="">
                                <div class="col-xs-4">
                                    <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                                        <label for="website">{{__('Ιστοσελίδα')}}</label>
                                        @if ($errors->has('website'))
                                            <strong class="text-danger">{{ $errors->first('website') }}</strong>
                                        @endif
                                        <div class="input-group">
                                            <input type="text" class="form-control"
                                                   value="{{ $accommodation->website }}" id="website" name="website"
                                                   placeholder="Website">
                                            <span class="input-group-addon">
                      <span class="glyphicon glyphicon-globe"></span>
                    </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4">
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email">{{__("E-Mail")}}</label>
                                        @if ($errors->has('email'))
                                            <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                        @endif
                                        <div class="input-group">
                                            <input type="text" value="{{ $accommodation->email }}" class="form-control"
                                                   id="email" name="email" placeholder="E-Mail">
                                            <span class="input-group-addon">
                        <span class="glyphicon glyphicon-envelope"></span>
                      </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-3">
                                    <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
                                        <label for="facebook">{{__('Facebook')}}</label>
                                        @if ($errors->has('facebook'))
                                            <strong class="text-danger">{{ $errors->first('facebook') }}</strong>
                                        @endif
                                        <div class="input-group">
                                            <input type="text" class="form-control"
                                                   value="{{ $accommodation->facebook }}" id="facebook" name="facebook"
                                                   placeholder="facebook">
                                            <span class="input-group-addon">
                        <span class="glyphicon glyphicon-thumbs-up"></span>
                      </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-3">
                                    <div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
                                        <label for="twitter">{{__('Twitter')}}</label>
                                        @if ($errors->has('twitter'))
                                            <strong class="text-danger">{{ $errors->first('twitter') }}</strong>
                                        @endif
                                        <div class="input-group">
                                            <input type="text" class="form-control"
                                                   value="{{ $accommodation->twitter }}" id="twitter" name="twitter"
                                                   placeholder="Twitter">
                                            <span class="input-group-addon">
                        <span class="glyphicon glyphicon-heart"></span>
                      </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3 form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                                <label for="telephone">{{__('Τηλέφωνο')}}</label>
                                @if ($errors->has('telephone'))
                                    <strong class="text-danger">{{ $errors->first('telephone') }}</strong>
                                @endif
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{ $accommodation->telephone }}"
                                           id="telephone" name="telephone" placeholder="Τηλέφωνο">
                                    <span class="input-group-addon">
                  <span class="glyphicon glyphicon-user"></span>
                </span>
                                </div>
                            </div>

                            @foreach(config('translatable.locales') as $locale => $lang)

                                <div class="col-xs-6">
                                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                        <label for="title">{{ __('Επωνυμία') }} - ({{$lang}})</label>
                                        @if ($errors->has('title'))
                                            <strong class="text-danger">{{ $errors->first('title') }}</strong>
                                        @endif
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="{{$locale}}[title]"
                                                   value="{{ $accommodation->title }}" id="title"
                                                   placeholder="{{ $accommodation->title }}">
                                            <span class="input-group-addon">
                    <span class="glyphicon glyphicon-home"></span>
                  </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-6 form-group{{ $errors->has('manager') ? ' has-error' : '' }}">
                                    <label for="manager">{{__('Όνομα Υπευθύνου')}} - ({{$lang}})</label>
                                    @if ($errors->has('manager'))
                                        <strong class="text-danger">{{ $errors->first('manager') }}</strong>
                                    @endif
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{ $accommodation->manager }}"
                                               id="manager" name="{{$locale}}[manager]" placeholder="Manager Name">
                                        <span class="input-group-addon">
                    <span class="glyphicon glyphicon-user"></span>
                  </span>
                                    </div>
                                </div>

                        </div>

                        <div class="">
                            <div class="col-xs-6 form-group{{ $errors->has('meta_description') ? ' has-error' : '' }}">
                                <label for="meta_description">{{__('Meta Description')}} - ({{$locale}})</label>
                                @if ($errors->has('meta_description'))
                                    <strong class="text-danger">{{ $errors->first('meta_description') }}</strong>
                                @endif
                                <div class="input-group">
                                    <input type="text" class="form-control" name="{{$locale}}[meta_description]"
                                           value="{{ $accommodation->meta_description }}" id="title"
                                           placeholder="{{ $accommodation->meta_description }}">
                                    <span class="input-group-addon">
                <span class="glyphicon glyphicon-home"></span>
              </span>
                                </div>
                            </div>

                            <div class="col-xs-6 form-group{{ $errors->has('meta_keywords') ? ' has-error' : '' }}">
                                <label for="title">{{__('MetaKeywords')}}- ({{$lang}})</label>
                                @if ($errors->has('title'))
                                    <strong class="text-danger">{{ $errors->first('meta_keywords') }}</strong>
                                @endif
                                <div class="input-group">
                                    <input type="text" class="form-control" name="{{$locale}}[meta_keywords]"
                                           value="{{ $accommodation->meta_keywords }}" id="title"
                                           placeholder="{{ $accommodation->meta_keywords }}">
                                    <span class="input-group-addon">
                <span class="glyphicon glyphicon-home"></span>
              </span>
                                </div>
                            </div>

                        </div>

                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="description">{{__('Description')}} ({{$lang}})</label>
                                <textarea id="editor" class="textarea" name="{{$locale}}[description]"
                                          placeholder="Place some text here"
                                          style="width: 100%; height:150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$accommodation->description}}</textarea>
                            </div>
                        </div>

                        @endforeach

                        <div class="">
                            <div class="col-xs-3">
                                <div class="form-group{{ $errors->has('header') ? ' has-error' : '' }}">
                                    <label for="header">header</label>
                                    @if ($errors->has('header'))
                                        <strong class="text-danger">{{ $errors->first('header') }}</strong>
                                    @endif
                                    <img width="200" height="200" src="{{asset($accommodation->header)}}"
                                         alt="{{$accommodation->title}}">
                                    <div class="input-group">
                                        @if ( old('header'))
                                            <img src="{{ old('header') }}" alt="">
                                        @endif
                                        <input type="file" id="header" name="header" value="{{ old('header') }}">
                                        <p class="help-block">
                                            <img id="headerPreview" src="#" alt="Image Preview 2"
                                                 style="display: none; max-width: 300px;">
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label for="logo">{{__('Λογοτυπο')}}</label>
                                    <img width="200" height="200" src="{{asset($accommodation->logo)}}"
                                         alt="{{$accommodation->title}}">
                                </div>
                                <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                                    <label for="logo">{{__('Λογοτυπο')}}</label>
                                    @if ($errors->has('logo'))
                                        <strong class="text-danger">{{ $errors->first('logo') }}</strong>
                                    @endif
                                    <div class="input-group">
                                        <input type="file" id="logo" value="{{asset($accommodation->logo)}}"
                                               name="logo">
                                        <p class="help-block">
                                            <img id="logoPreview" src="#" alt="Image Preview 2"
                                                 style="display: none; max-width: 300px;">
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group{{ $errors->has('image1') ? ' has-error' : '' }}">
                                    <label for="image1">{{__('Εικόνα 1')}}</label>
                                    <img width="200" height="200" src="{{asset($accommodation->image1)}}"
                                         alt="{{$accommodation->title}}">
                                    @if ($errors->has('image1'))
                                        <strong class="text-danger">{{ $errors->first('image1') }}</strong>
                                    @endif
                                    <div class="input-group">
                                        <input type="file" id="image1"
                                               value="{{asset('images/accommodations/'.$accommodation->image1)}}"
                                               name="image1">
                                        <p class="help-block">
                                            <img id="image1Preview" src="#" alt="Image Preview 2"
                                                 style="display: none; max-width: 300px;">
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group{{ $errors->has('image2') ? ' has-error' : '' }}">
                                    <label for="image2">{{__('Εικόνα 2')}}</label>
                                    <img width="200" height="200" src="{{asset($accommodation->image2)}}"
                                         alt="{{$accommodation->title}}">
                                    @if ($errors->has('image2'))
                                        <strong class="text-danger">{{ $errors->first('image2') }}</strong>
                                    @endif
                                    <div class="input-group">
                                        <input type="file" id="image2"
                                               value="{{asset('images/accommodations/'.$accommodation->image2)}}"
                                               name="image2">
                                        <p class="help-block">
                                            <img id="image2Preview" src="#" alt="Image Preview 2"
                                                 style="display: none; max-width: 300px;">
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group{{ $errors->has('image3') ? ' has-error' : '' }}">
                                    <label for="image3">{{__('Εικόνες σελίδας Καταστήματος')}}</label>
                                    <img width="200" height="200" src="{{asset($accommodation->image3)}}"
                                         alt="{{$accommodation->title}}">
                                    @if ($errors->has('image3'))
                                        <strong class="text-danger">{{ $errors->first('image3') }}</strong>
                                    @endif
                                    <div class="input-group">
                                        <input type="file" id="image3"
                                               value="{{asset('images/accommodations/'.$accommodation->image3)}}"
                                               name="image3">
                                        <p class="help-block">
                                            <img id="image3Preview" src="#" alt="Image Preview 3"
                                                 style="display: none; max-width: 300px;">
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4 col-lg-offset-4">
                                    <div class="form-group{{ $errors->has('imgfile') ? ' has-error' : '' }}">
                                        <label for="imgfile">{{__('Γενικές Εικόνες')}}</label>
                                        @if($accommodation->images)
                                            @foreach($accommodation->images as $upload)
                                                <div class="col-xs-1 col-md-3">
                                                    <a href="{{ asset($upload->path) }}" data-lightbox="accommodation-images">
                                                        <img width="100%" height="100%" src="{{ asset($upload->path) }}" alt="{{$accommodation->title}}">
                                                    </a>
                                                </div>
                                            @endforeach

                                        @endif
                                        @if ($errors->has('imgfile'))
                                            <strong class="text-danger">{{ $errors->first('imgfile') }}</strong>
                                        @endif
                                        <div>
                                            @if ( old('imgfile'))
                                                <input type="file" name="imgfile[]" id="imgfile" multiple>
                                            @endif
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
                        </div>

                        <div class="row">
                            <div class="col-xs-6">
                                <button type="submit" class="btn btn-primary btn-block">{{__("Submit")}}</button>
                            </div>
                            <div class="col-xs-6">
                                <a class="btn btn-default btn-block"
                                   href="javascript:history.back()">{{__("Go Back")}}</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
