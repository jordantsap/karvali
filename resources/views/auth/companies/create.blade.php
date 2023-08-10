@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      New Company
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <form method="post" action="{{ route('owner.companies.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="box-body">

            <div class="row">
                <div class="col-xs-1 form-group">
                    <label for="active"> Active
                        &nbsp<input type="checkbox" name="active" value="1" class="minimal">
                    </label>
                </div>
                <div class="col-xs-2 form-group{{ $errors->has('company_type') ? ' has-error' : '' }}">
                    <label for="company_type">Κατηγορία Καταστήματος</label>
                    @if ($errors->has('company_type'))
                        <strong class="text-danger">{{ $errors->first('company_type') }}</strong>
                    @endif
                    <div class="">
                        <select id="company_type" value="{{ old('company_type') }}" name="company_type" class="form-control" >
                            <option value="{{ old('company_type') }}">Επιλέξτε</option>
                            @foreach($companytypes as $companytype)
                                <option value="{{ $companytype->id }} {{ old('company_type') }}" {{old('company_type')?"selected":""}}>
                                    {{ $companytype->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-6 {{ $errors->has('days') ? ' has-error' : '' }}">
                    <label for="days_and_times">Days and Time Ranges of Open Market</label>
                    <br>
{{--                    @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)--}}
{{--                        <label>{{ $day }}</label>--}}
{{--                        <input type="checkbox" name="days[]" value="{{ $day }}">--}}
{{--                        {{__('form.Opening Time')}}: <input type="time" name="opening_times[]">--}}
{{--                        {{__('form.Closing Time')}}: <input type="time" name="closing_times[]">--}}
{{--                        <br>--}}
{{--                    @endforeach--}}
                    @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                        <label>{{ $day }}</label>
                        <input type="checkbox" name="days[]" value="{{ $day }}">
                        Opening Time: <input type="time" name="opening_times[]">
                        Closing Time: <input type="time" name="closing_times[]">
                        <br>
                    @endforeach
                </div>

                <div class="col-xs-2 form-group">
                    <label for="telephone">Τηλέφωνο</label>
                    <input type="text" value="{{ old('telephone') }}" name="telephone" class="form-control" id="telephone" placeholder="Τηλέφωνο Επιχείρησης" >
                </div>
                <div class="col-xs-2 form-group{{ $errors->has('pos') ? ' has-error' : '' }}">
                    <label for="pos" class="bold">POS:</label>
                    @if ($errors->has('pos'))
                        <strong class="text-danger">{{ $errors->first('pos') }}</strong>
                    @endif
                    <br>
                    <label class="radio-inline">
                        <input type="radio" name="pos" value="No" {{ old('pos') == 'No' ? 'checked' : ''}} > No
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="pos" value="Yes" {{ old('pos') == 'Yes' ? 'checked' : ''}} > Yes
                    </label>
                </div>

                <div class="col-xs-2 form-group{{ $errors->has('delivery') ? ' has-error' : '' }}">
                    <label for="delivery" class="bold">Delivery:</label>
                    @if ($errors->has('delivery'))
                        <strong class="text-danger">{{ $errors->first('delivery') }}</strong>
                    @endif
                    <br>
                    <label class="radio-inline">
                        <input type="radio" name="delivery" value="No" {{ old('delivery') == 'No' ? 'checked' : ''}} > No
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="delivery" value="Yes" {{ old('delivery') == 'Yes' ? 'checked' : ''}} > Yes
                    </label>
                </div>

            </div>

            <div class="row">
                <div class="col-xs-6 form-group{{ $errors->has('website') ? ' has-error' : '' }}">
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

                <div class="col-xs-6 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
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
            </div>

            <div class="row">
                <div class="col-xs-6 form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
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
                <div class="col-xs-6 form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
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

{{--            <div class="row">--}}


{{--                <div class="col-xs-7 form-group text-center{{ $errors->has('creditcard') ? ' has-error' : '' }}">--}}
{{--                    <label for="creditcard" class="bold">Χρεωστικές Κάρτες:</label>--}}
{{--                    @if ($errors->has('creditcard'))--}}
{{--                        <strong class="text-danger">{{ $errors->first('creditcard') }}</strong>--}}
{{--                    @endif--}}
{{--                    <br>--}}
{{--                    <label class="checkbox-inline">--}}
{{--                        <input type="checkbox" name="creditcard[]" value="None" {{ old('creditcard') == 'Νone' ? 'checked' : ''}}> None--}}
{{--                    </label>--}}
{{--                    <label class="checkbox-inline">--}}
{{--                        <input type="checkbox" name="creditcard[]" value="Visa" {{ old('creditcard') == 'Visa' ? 'checked' : ''}}> Visa--}}
{{--                    </label>--}}
{{--                    <label class="checkbox-inline">--}}
{{--                        <input type="checkbox" name="creditcard[]" value="Mastercard" {{ old('creditcard') == 'Mastercard' ? 'checked' : ''}}> Mastercard--}}
{{--                    </label>--}}
{{--                    <label class="checkbox-inline">--}}
{{--                        <input type="checkbox" name="creditcard[]" value="American Express" {{ old('creditcard') == 'American Express' ? 'checked' : ''}}> American Express--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--            </div>--}}

            @foreach(config('translatable.locales') as $locale => $lang)

                <div class="row">
                    <div class="col-xs-6 form-group">
                        <label for="title">{{__('form.title').' - '.$lang}}</label>
                        <input type="text" value="{{ old('title') }}" name="{{$locale}}[title]" class="form-control" id="title" placeholder="Enter Title" >
                    </div>
                    <div class="col-xs-3 form-group{{ $errors->has('manager') ? ' has-error' : '' }}">
                        <label for="manager">{{__("form.Όνομα Υπευθύνου"). ' - ' . $lang}}</label>
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
                    <label for="meta_description">{{__('form.Meta Description'). ' - ' . $lang}}</label>
                    @if ($errors->has('meta_description'))
                        <strong class="text-danger">{{ $errors->first('meta_description') }}</strong>
                    @endif
                    <div class="input-group">
                        <input type="text" class="form-control" name="{{$locale}}[meta_description]" value="{{ old('meta_description') }}" id="manager" placeholder="Meta Description" >
                        <span class="input-group-addon">
                <span class="glyphicon glyphicon-user"></span>
              </span>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('meta_keywords') ? ' has-error' : '' }}">
                    <label for="meta_keywords">{{__('form.Meta Keywords').' - '.$lang}}</label>
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
                    <label for="description">{{__('form.Description').' - '.$lang}}</label>
                    <textarea class="textarea" name="{{$locale}}[description]" placeholder="Place some text here" style="width: 100%; height:150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" >{{old('description')}}</textarea>
                </div>
            @endforeach


            <div class="col-xs-12">

                <div class="col-xs-3  form-group{{ $errors->has('header') ? ' has-error' : '' }}">
                    <label for="header">header</label>
                    @if ($errors->has('header'))
                        <strong class="text-danger">{{ $errors->first('header') }}</strong>
                    @endif
                    <div class="input-group">
                        @if ( old('header'))
                            <img src="{{ old('header') }}" alt="">
                        @endif
                        <input type="file" name="header" value="{{ old('header') }}" >
                        <p class="help-block">Help text here.</p>
                    </div>
                </div>

                <div class="col-xs-3 form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                    <label for="logo">Λογότυπο</label>
                    @if ($errors->has('logo'))
                        <strong class="text-danger">{{ $errors->first('logo') }}</strong>
                    @endif
                    <div class="input-group">
                        @if ( old('logo'))
                            <img src="{{ old('logo') }}" alt="">
                        @endif
                        <input type="file" name="logo" value="{{ old('logo') }}" >
                        <p class="help-block">Help text here.</p>
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
                        <input type="file" name="image1" value="{{ old('image1') }}" >
                        <p class="help-block">Help text here.</p>
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
                        <input type="file" name="image2" value="{{ old('image2') }}" >
                        <p class="help-block">Help text here.</p>
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
                        <input type="file" name="image3" value="{{ old('image3') }}">
                        <p class="help-block">Help text here.</p>
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
