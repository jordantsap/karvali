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
            <div class="col-xs-12">
              <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="title">Επωνυμία</label>
                @if ($errors->has('title'))
                  <strong class="text-danger">{{ $errors->first('title') }}</strong>
                @endif
                <div class="input-group">
                  <input type="text" class="form-control" name="title" value="{{ $company->title }}" id="title" placeholder="" required>
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-home"></span>
                  </span>
                </div>
              </div>
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
                  <input type="text" class="form-control" value="{{ $company->manager }}" id="manager" name="manager" placeholder="Manager Name" required>
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
                  <select id="company_type" value="{{ $company->company_type }}" name="company_type" class="form-control" required>
                    <option value="">Επιλέξτε</option>
                    @if (!empty($company->companytype))
                      @foreach($companytypes as $companytype)
                        <option value="{{ $companytype->id }}">{{ $companytype->name }}</option>
                      @endforeach
                    @endif
                  </select>
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-list"></span>
                  </span>
                </div>
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
                    <input type="file" value="{{ $company->logo }}" name="logo">
                    <p class="help-block">Help text here.</p>
                  </div>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="form-group{{ $errors->has('homeimage') ? ' has-error' : '' }}">
                  <label for="image">Εικόνα Αρχικης Σελίδας</label>
                  @if ($errors->has('homeimage'))
                    <strong class="text-danger">{{ $errors->first('homeimage') }}</strong>
                  @endif
                  <div class="input-group">
                    <input type="file" value="{{ $company->homeimage }}" name="homeimage">
                    <p class="help-block">Help text here.</p>
                  </div>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="form-group{{ $errors->has('pageimage') ? ' has-error' : '' }}">
                  <label for="pageimage">Εικόνα λίστας καταχωρήσεων</label>
                  @if ($errors->has('pageimage'))
                    <strong class="text-danger">{{ $errors->first('pageimage') }}</strong>
                  @endif
                  <div class="input-group">
                    <input type="file" value="{{ $company->pageimage }}" name="pageimage">
                    <p class="help-block">Help text here.</p>
                  </div>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="form-group{{ $errors->has('slides') ? ' has-error' : '' }}">
                  <label for="slides">Εικόνες σελίδας Καταστήματος</label>
                  @if ($errors->has('slides'))
                    <strong class="text-danger">{{ $errors->first('slides') }}</strong>
                  @endif
                  <div class="input-group">
                    <input type="file" value="{{ $company->slides }}" name="slides" multiple>
                    <p class="help-block">Slides.</p>
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
                    <input type="time" class="form-control" value="{{ $company->morningtime }}" id="morningtime" name="morningtime" placeholder="Πρωινές Ώρες" required>
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
                    <input type="time" class="form-control" value="{{ $company->afternoontime }}" id="afternoontime" name="afternoontime" placeholder="Απογευματινές Ώρες" required>
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
                    <input type="text" class="form-control" value="{{ $company->website }}" id="website" name="website" placeholder="Website" required>
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
                      <input type="text" value="{{ $company->email }}" class="form-control" id="email" name="email" placeholder="E-Mail" required>
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
										<input type="radio" name="pos" value="No" {{ $company->pos == 'No' ? 'checked' : ''}} required> No
									</label>
									<label class="radio-inline">
										<input type="radio" name="pos" value="Yes" {{ $company->pos == 'Yes' ? 'checked' : ''}} required> Yes
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
										<input type="radio" name="delivery" value="No" {{ $company->delivery == 'No' ? 'checked' : ''}} required> No
									</label>
									<label class="radio-inline">
										<input type="radio" name="delivery" value="Yes" {{ $company->delivery == 'Yes' ? 'checked' : ''}} required> Yes
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
