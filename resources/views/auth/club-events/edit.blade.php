@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Edit Event<small>{{$clubevent->title}}</small>
      <a class="btn btn-warning" href="javascript:history.back()">Go Back</a>
    </h1>
  </section>

  <section class="content">

    <div class="box">
      <form action="{{ route('owner.events.update', $clubevent->id) }}" method="post" role="form" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="box-body">

            <div class="row">
              <div class="col-xs-2 form-group">
                <label for="active">Publish
                  &nbsp<input type="checkbox" name="active" value="1" @if ($clubevent->active == 1)
                    {{'checked'}}
                  @endif>
                </label>
              </div>
              <div class="col-xs-5 form-group{{ $errors->has('entrance') ? ' has-error' : '' }}">
                <label for="entrance">Τιμή Εισόδου</label>
                @if ($errors->has('entrance'))
                  <strong class="text-danger">{{ $errors->first('entrance') }}</strong>
                @endif
                <div class="input-group">
                  <input type="text" value="{{ $clubevent->entrance }}" class="form-control" id="entrance" name="entrance" placeholder="Τιμή Εισόδου" required>
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-euro"></span>
                  </span>
                </div>
              </div>
              <div class="col-xs-5 form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                <label for="telephone">Τηλέφωνο</label>
                @if ($errors->has('telephone'))
                  <strong class="text-danger">{{ $errors->first('telephone') }}</strong>
                @endif
                <div class="input-group">
                  <input type="text" value="{{ $clubevent->telephone }}" class="form-control" id="telephone" name="telephone" placeholder="Τηλέφωνο Επικοινωνίας" required>
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-earphone"></span>
                  </span>
                </div>
              </div>
            </div>

          <div class="row">
            <div class="col-xs-3 form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
              <label for="start_date">Ημερομηνία Έναρξης</label>
              @if ($errors->has('start_date'))
                <strong class="text-danger">{{ $errors->first('start_date') }}</strong>
              @endif
              <div class="input-group">
                <input type="date" value="{{ $clubevent->start_date }}" class="form-control" id="start_date" name="start_date" placeholder="Ημερομηνία Εκδήλωσης" required>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </div>
            <div class="col-xs-3">
              <div class="form-group{{ $errors->has('start_time') ? ' has-error' : '' }}">
                <label for="start_time">Ώρα Έναρξης</label>
                @if ($errors->has('start_time'))
                  <strong class="text-danger">{{ $errors->first('start_time') }}</strong>
                @endif
                <div class="input-group">
                  <input type="time" value="{{ $clubevent->start_time }}" class="form-control" id="start_time" name="start_time" placeholder="" required>
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-xs-3 form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
              <label for="start_date">Ημερομηνία Λήξης</label>
              @if ($errors->has('end_date'))
                <strong class="text-danger">{{ $errors->first('end_date') }}</strong>
              @endif
              <div class="input-group">
                <input type="date" value="{{ $clubevent->end_date }}" class="form-control" id="end_date" name="end_date" placeholder="Ημερομηνία Λήξης" required>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </div>
            <div class="col-xs-3">
              <div class="form-group{{ $errors->has('end_time') ? ' has-error' : '' }}">
                <label for="end_time">Ώρα Λήξης</label>
                @if ($errors->has('end_time'))
                  <strong class="text-danger">{{ $errors->first('end_time') }}</strong>
                @endif
                <div class="input-group">
                  <input type="time" value="{{ $clubevent->end_time }}" class="form-control" id="end_time" name="end_time" placeholder="" required>
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                  </span>
                </div>
              </div>
            </div>
          </div>

          <div class="row">

              <div class="col-xs-6">
                <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                  <label for="website">Ιστοσελίδα</label>
                  @if ($errors->has('website'))
                    <strong class="text-danger">{{ $errors->first('website') }}</strong>
                  @endif
                  <div class="input-group">
                    <input type="text" value="{{ $clubevent->website }}" class="form-control" id="website" name="website" placeholder="Website">
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-globe"></span>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-xs-6">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="email">E-Mail</label>
                  @if ($errors->has('email'))
                    <strong class="text-danger">{{ $errors->first('email') }}</strong>
                  @endif
                  <div class="input-group">
                    <input type="email" value="{{ $clubevent->email }}" class="form-control" id="email" name="email" placeholder="E-Mail">
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-envelope"></span>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-xs-6">
                <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
                  <label for="facebook">Facebook</label>
                  @if ($errors->has('facebook'))
                    <strong class="text-danger">{{ $errors->first('facebook') }}</strong>
                  @endif
                  <div class="input-group">
                    <input type="text" value="{{$clubevent->facebook }}" class="form-control" id="facebook" name="facebook" placeholder="facebook">
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-thumbs-up"></span>
                    </span>
                  </div>
                </div>
                </div>

                <div class="col-xs-6">
                <div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
                  <label for="twitter">Twitter</label>
                  @if ($errors->has('twitter'))
                    <strong class="text-danger">{{ $errors->first('twitter') }}</strong>
                  @endif
                  <div class="input-group">
                    <input type="text" value="{{ $clubevent->twitter }}" class="form-control" id="twitter" name="twitter" placeholder="Twitter">
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-heart"></span>
                    </span>
                  </div>
                </div>
              </div>

          </div><!--row-->

            @foreach(config('translatable.locales') as $locale=>$lang)
                <h1>({{$lang}})</h1>
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title">Ονομασία Εκδήλωσης - ({{$lang}})</label>
                    @if ($errors->has('title'))
                        <strong class="text-danger">{{ $errors->first('title') }}</strong>
                    @endif
                    <div class="input-group">
                        <input type="text" value="{{ $clubevent->title }}" class="form-control" name="{{$locale}}[title]" id="title" placeholder="Enter Name" required>
                        <span class="input-group-addon">
                  <span class="glyphicon glyphicon-home"></span>
                </span>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('meta_description') ? ' has-error' : '' }}">
                    <label for="meta_description">Meta Description - ({{$lang}}</label>
                    @if ($errors->has('meta_description'))
                        <strong class="text-danger">{{ $errors->first('meta_description') }}</strong>
                    @endif
                    <div class="input-group">
                        <input type="text" value="{{ $clubevent->meta_description }}" class="form-control" name="{{$locale}}[meta_description]" id="meta_description" placeholder="meta_description" required>
                        <span class="input-group-addon">
                  <span class="glyphicon glyphicon-home"></span>
                </span>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('meta_keywords') ? ' has-error' : '' }}">
                    <label for="meta_keywords">Meta Keywords - ({{$lang}})</label>
                    @if ($errors->has('meta_keywords'))
                        <strong class="text-danger">{{ $errors->first('meta_keywords') }}</strong>
                    @endif
                    <div class="input-group">
                        <input type="text" value="{{ $clubevent->meta_keywords }}" class="form-control" name="{{$locale}}[meta_keywords]" id="title" placeholder="meta_keywords" required>
                        <span class="input-group-addon">
                  <span class="glyphicon glyphicon-home"></span>
                </span>
                    </div>
                </div>
            @endforeach
            <div class="row">
            <div class="col-xs-12">
              <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                <label for="description">Περιγραφή - ({{$lang}}</label>
                @if ($errors->has('description'))
                  <strong class="text-danger">{{ $errors->first('description') }}</strong>
                @endif
                <div class="input-group">
                  <textarea name="{{$locale}}[description]" placeholder="Description" id="description" class="form-control" rows="5" required>{{ $clubevent->description }}</textarea>
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-info-sign"></span>
                  </span>
                </div>
              </div>
            </div>
          </div>


            <div class="row">
                <div class="col-xs-3">
                    <div class="form-group{{ $errors->has('header') ? ' has-error' : '' }}">
                        <label for="header">header</label>
                        @if ($errors->has('header'))
                            <strong class="text-danger">{{ $errors->first('header') }}</strong>
                        @endif
                        <div class="input-group">
                            <input type="file" id="header" value="{{ asset('images/events/',$clubevent->header) }}" name="header">
                            <p class="help-block">Επιτρέπονται όλα τα είδη εικόνων.
                                <img id="headerPreview" src="#" alt="Header Preview" style="display: none; max-width: 300px;"></p></p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                        <label for="logo">Λογότυπο</label>
                        @if ($errors->has('logo'))
                            <strong class="text-danger">{{ $errors->first('logo') }}</strong>                @endif
                        <div class="input-group">
                            <input type="file" id="logo" value="{{ asset('images/events/',$clubevent->logo) }}" name="logo">
                            <p class="help-block">Επιτρέπονται όλα τα είδη εικόνων.
                                <img id="logoPreview" src="#" alt="Logo Preview" style="display: none; max-width: 300px;"></p></p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="form-group{{ $errors->has('image1') ? ' has-error' : '' }}">
                        <label for="image1">Εικόνα Αρχικης</label>
                        @if ($errors->has('image1'))
                            <strong class="text-danger">{{ $errors->first('image1') }}</strong>                @endif
                        <div class="input-group">
                            <input type="file" id="image1" value="{{ asset('images/events/',$clubevent->image1) }}" name="image1">
                            <p class="help-block">Επιτρέπονται όλα τα είδη εικόνων.
                                <img id="image1Preview" src="#" alt="Image Preview 1" style="display: none; max-width: 300px;"></p></p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="form-group{{ $errors->has('image2') ? ' has-error' : '' }}">
                        <label for="image2">Εικόνα Λίστας Συλλόγων</label>
                        @if ($errors->has('image2'))
                            <strong class="text-danger">{{ $errors->first('image2') }}</strong>                @endif
                        <div class="input-group">
                            <input type="file" id="image2" value="{{ asset('images/events/',$clubevent->image2) }}" name="image2">
                            <p class="help-block">Επιτρέπονται όλα τα είδη εικόνων.
                                <img id="image2Preview" src="#" alt="Image Preview 2" style="display: none; max-width: 300px;"></p></p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="form-group{{ $errors->has('image3') ? ' has-error' : '' }}">
                        <label for="image3">Εικόνες Σελίδας</label>
                        @if ($errors->has('image3'))
                            <strong class="text-danger">{{ $errors->first('image3') }}</strong>                @endif
                        <div class="input-group">
                            <input type="file" id="image3" value="{{ asset('images/events/',$clubevent->image3) }}" name="image3">
                            <p class="help-block">Επιτρέπονται όλα τα είδη εικόνων.
                                <img id="image3Preview" src="#" alt="Image Preview 3" style="display: none; max-width: 300px;"></p></p>
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
                                @if ( old('imgfile'))
                                    <input type="file" name="imgfile[]" id="imgfile" value="{{old('imgfile')}}" multiple>
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
              <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
            <div class="col-xs-6">
              <a class="btn btn-default btn-block" href="javascript:history.back()">Go Back</a>
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
