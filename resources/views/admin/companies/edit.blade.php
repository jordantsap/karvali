@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Edit Company: <small>{{$company->title}}</small>
      <a class="btn btn-warning" href="javascript:history.back()">Go Back</a>
    </h1>
  </section>
  <section class="content">
    <div class="box">
      <form method="post" action="{{ route('company.update', $company->id) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="box-body">
          <div class="row">
            <div class="col-xs-8">
              <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="title">Επωνυμία</label>
                @if ($errors->has('title'))
                  <strong class="text-danger">{{ $errors->first('title') }}</strong>
                @endif
                <div class="input-group">
                  <input type="text" class="form-control" name="title" value="{{ $company->title }}" id="title" placeholder="{{ $company->title }}">
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-home"></span>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-xs-4 form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
              <label for="telephone">Τηλέφωνο</label>
              @if ($errors->has('telephone'))
                <strong class="text-danger">{{ $errors->first('telephone') }}</strong>
              @endif
              <div class="input-group">
                <input type="text" class="form-control" value="{{ $company->telephone }}" id="telephone" name="telephone" placeholder="Τηλέφωνο" >
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-user"></span>
                </span>
              </div>
            </div>
          </div>

          <div class="form-group{{ $errors->has('meta_description') ? ' has-error' : '' }}">
            <label for="meta_description">Meta Description</label>
            @if ($errors->has('meta_description'))
              <strong class="text-danger">{{ $errors->first('meta_description') }}</strong>
            @endif
            <div class="input-group">
              <input type="text" class="form-control" name="meta_description" value="{{ $company->meta_description }}" id="title" placeholder="{{ $company->meta_description }}">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-home"></span>
              </span>
            </div>
          </div>

          <div class="form-group{{ $errors->has('meta_keywords') ? ' has-error' : '' }}">
            <label for="title">MetaKeywords</label>
            @if ($errors->has('title'))
              <strong class="text-danger">{{ $errors->first('meta_keywords') }}</strong>
            @endif
            <div class="input-group">
              <input type="text" class="form-control" name="meta_keywords" value="{{ $company->meta_keywords }}" id="title" placeholder="{{ $company->meta_keywords }}">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-home"></span>
              </span>
            </div>
          </div>

            <div class="row">
              <div class="col-xs-2 form-group">
                <label for="active"> Active
                  <input type="checkbox" name="active" value="1" @if ($company->active == 1)
                    {{'checked'}}
                  @endif>
                </label>
              </div>

              <div class="col-xs-6 form-group{{ $errors->has('manager') ? ' has-error' : '' }}">
                <label for="manager">Όνομα Υπευθύνου</label>
                @if ($errors->has('manager'))
                  <strong class="text-danger">{{ $errors->first('manager') }}</strong>
                @endif
                <div class="input-group">
                  <input type="text" class="form-control" value="{{ $company->manager }}" id="manager" name="manager" placeholder="Manager Name" >
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-user"></span>
                  </span>
                </div>
              </div>
              <div class="col-xs-4 form-group{{ $errors->has('companytype') ? ' has-error' : '' }}">
                <label for="company_type">Κατηγορία Καταστήματος</label>
                @if ($errors->has('company_type'))
                  <strong class="text-danger">{{ $errors->first('company_type') }}</strong>
                @endif
                <div class="input-group">
                  <select id="company_type" value="{{ $company->company_type }}" name="company_type" class="form-control" >
                    <option value="">Επιλέξτε</option>
                    @foreach ($categories as $category)
                      <option value="{{$category->id}}" @if( $company->company_type == $category->id){{'selected'}}
                      @else None
                      @endif>{{$category->name}}</option>
                    @endforeach
                  </select>
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-list"></span>
                  </span>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="header">header</label>
              <img width="100%" height="200" src="{{asset('images/companies/'.$company->header)}}" alt="{{$company->title}}">
            </div>
            <div class="form-group{{ $errors->has('header') ? ' has-error' : '' }}">
              {{-- <label for="logo">Λογότυπο</label> --}}
              @if ($errors->has('header'))
                <strong class="text-danger">{{ $errors->first('header') }}</strong>
              @endif
              <div class="input-group">
                <input type="file" value="{{asset('images/companies/'.$company->header)}}" name="header">
                <p class="help-block">Help text here.</p>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-3">
                <div class="form-group">
                  <label for="logo">Λογοτυπο</label>
                  <img width="200" height="200" src="{{asset('images/companies/'.$company->logo)}}" alt="{{$company->title}}">
                </div>
                <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                  {{-- <label for="logo">Λογότυπο</label> --}}
                  @if ($errors->has('logo'))
                    <strong class="text-danger">{{ $errors->first('logo') }}</strong>
                  @endif
                  <div class="input-group">
                    <input type="file" value="{{asset('images/companies/'.$company->logo)}}" name="logo">
                    <p class="help-block">Help text here.</p>
                  </div>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="form-group{{ $errors->has('image1') ? ' has-error' : '' }}">
                  <label for="image1">Εικόνα 1</label>
                  @if ($errors->has('image1'))
                    <strong class="text-danger">{{ $errors->first('image1') }}</strong>
                  @endif
                  <div class="input-group">
                    <input type="file" value="{{asset('images/companies/'.$company->image1)}}" name="image1">
                    <p class="help-block">Help text here.</p>
                  </div>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="form-group{{ $errors->has('image2') ? ' has-error' : '' }}">
                  <label for="image2">Εικόνα 2</label>
                  @if ($errors->has('image2'))
                    <strong class="text-danger">{{ $errors->first('image2') }}</strong>
                  @endif
                  <div class="input-group">
                    <input type="file" value="{{asset('images/companies/'.$company->image2)}}" name="image2">
                    <p class="help-block">Help text here.</p>
                  </div>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="form-group{{ $errors->has('image3') ? ' has-error' : '' }}">
                  <label for="image3">Εικόνες σελίδας Καταστήματος</label>
                  @if ($errors->has('image3'))
                    <strong class="text-danger">{{ $errors->first('image3') }}</strong>
                  @endif
                  <div class="input-group">
                    <input type="file" value="{{asset('images/companies/'.$company->image3)}}" name="image3">
                    <p class="help-block">Image 3.</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-6 text-center{{ $errors->has('days') ? ' has-error' : '' }}">
                <label for="days" class="bold">Ημερες εργασιας</label>
                @if ($errors->has('days'))
                  <strong class="text-danger">{{ $errors->first('days') }}</strong>
                @endif
                <br>
                <label class="checkbox-inline">
                  <input type="checkbox" multiple name="days[]" value="Weekdays" {{ $company->days == 'Weekdays' ? 'checked' : ''}}> Καθημερινα
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" multiple name="days[]" value="Saturday" {{ $company->days == 'Suturday' ? 'checked' : ''}}> Σαββατο
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" multiple name="days[]" value="Sunday" {{$company->days == 'Sunday' ? 'checked' : ''}}> Κυριακη
                </label>
              </div>
              <div class="col-xs-3">
                <div class="form-group{{ $errors->has('morningtime') ? ' has-error' : '' }}">
                  <label for="morningtime">Πρωινές Ώρες</label>
                  @if ($errors->has('morningtime'))
                    <strong class="text-danger">{{ $errors->first('morningtime') }}</strong>
                  @endif
                  <div class="input-group">
                    <input type="time" class="form-control" value="{{ $company->morningtime }}" id="morningtime" name="morningtime" placeholder="Πρωινές Ώρες" >
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-time"></span>
                    </span>
                  </div>
                </div>
              </div>

              <div class="col-xs-3">
                <div class="form-group{{ $errors->has('afternoontime') ? ' has-error' : '' }}">
                  <label for="afternoontime">Απογευματινές ώρες</label>
                  @if ($errors->has('afternoontime'))
                    <strong class="text-danger">{{ $errors->first('afternoontime') }}</strong>
                  @endif
                  <div class="input-group">
                    <input type="time" class="form-control" value="{{ $company->afternoontime }}" id="afternoontime" name="afternoontime" placeholder="Απογευματινές Ώρες" >
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
                    <input type="text" class="form-control" value="{{ $company->website }}" id="website" name="website" placeholder="Website" >
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
                      <input type="text" value="{{ $company->email }}" class="form-control" id="email" name="email" placeholder="E-Mail" >
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-envelope"></span>
                      </span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-6">
                  <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
                    <label for="facebook">Facebook</label>
                    @if ($errors->has('facebook'))
                      <strong class="text-danger">{{ $errors->first('facebook') }}</strong>
                    @endif
                    <div class="input-group">
                      <input type="text" class="form-control" value="{{ $company->facebook }}" id="facebook" name="facebook"
                        placeholder="facebook">
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
                      <input type="text" class="form-control" value="{{ $company->twitter }}" id="twitter" name="twitter"
                        placeholder="Twitter">
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-heart"></span>
                      </span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
								<div class="col-xs-3 form-group{{ $errors->has('pos') ? ' has-error' : '' }}">
									<label for="pos" class="bold">POS:</label>
									@if ($errors->has('pos'))
	  								<strong class="text-danger">{{ $errors->first('pos') }}</strong>
	  							@endif
									<br>
									<label class="radio-inline">
										<input type="radio" name="pos" value="No" {{ $company->pos == 'No' ? 'checked' : ''}} > No
									</label>
									<label class="radio-inline">
										<input type="radio" name="pos" value="Yes" {{ $company->pos == 'Yes' ? 'checked' : ''}} > Yes
									</label>
								</div>

								<div class="col-xs-6 form-group text-center{{ $errors->has('creditcard') ? ' has-error' : '' }}">
									<label for="creditcard" class="bold">Χρεωστικές Κάρτες:</label>
									@if ($errors->has('creditcard'))
	  								<strong class="text-danger">{{ $errors->first('creditcard') }}</strong>
	  							@endif
									<br>
									<label class="checkbox-inline">
										<input type="checkbox" name="creditcard[]" value="Nocard"
                    {{ $company->creditcard == 'Nocard' ? 'checked' : ''}}> Not
									</label>
									<label class="checkbox-inline">
										<input type="checkbox" name="creditcard[]" value="Visa"
                    {{ $company->creditcard == 'Visa' ? 'checked' : ''}}> Visa
									</label>
									<label class="checkbox-inline">
										<input type="checkbox" name="creditcard[]" value="Mastercard"
                    {{ $company->creditcard == 'Mastercard' ? 'checked' : ''}}> Mastercard
									</label>
									<label class="checkbox-inline">
										<input type="checkbox" name="creditcard[]" value="American Express"
                    {{ $company->creditcard == 'American Express' ? 'checked' : ''}}> American Express
									</label>
								</div>
                <div class="col-xs-3 form-group{{ $errors->has('delivery') ? ' has-error' : '' }}">
									<label for="delivery" class="bold">Delivery:</label>
									@if ($errors->has('pos'))
	  								<strong class="text-danger">{{ $errors->first('delivery') }}</strong>
	  							@endif
									<br>
									<label class="radio-inline">
										<input type="radio" name="delivery" value="No" {{ $company->delivery == 'No' ? 'checked' : ''}} > No
									</label>
									<label class="radio-inline">
										<input type="radio" name="delivery" value="Yes" {{ $company->delivery == 'Yes' ? 'checked' : ''}} > Yes
									</label>
								</div>
							</div>

            <div class="form-group">
              <label for="description">Description</label>
              <textarea id="editor" class="textarea" name="description" placeholder="Place some text here" style="width: 100%; height:150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$company->description}}</textarea>
            </div>
          </div>
          <!-- /.box-body -->

          <div class="row">
            <div class="col-xs-6">
              <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
            <div class="col-xs-6">
              <a class="btn btn-default btn-block" href="javascript:history.back()">Go Back</a>
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
