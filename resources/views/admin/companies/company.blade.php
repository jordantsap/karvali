@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Company : {{$company->title}}
      @can ('update_companies', App\Models\Company::class)
        <small><a class="btn btn-primary" href="{{route('companies.edit', $company->id)}}">Edit</a> - <a class="btn btn-warning" href="javascript:history.back()">Go Back</a></small>
      @endcan
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-body">
        <div class="row">
          <div class="col-xs-8 form-group">
            <label for="title">Επωνυμία</label>
            <input type="text" class="form-control" id="title" placeholder="{{$company->title}}" value="{{$company->title}}" >
          </div>
          <div class="col-xs-4 form-group">
            <label for="telephone">Τηλέφωνο</label>
            <input type="text" class="form-control" id="telephone" placeholder="{{$company->telephone}}" value="{{$company->telephone}}">
          </div>
        </div>
          <div class="form-group">
            <label for="meta_description">Meta Description</label>
            <input type="text" class="form-control" id="meta_description" placeholder="{{$company->meta_description}}" value="{{$company->meta_description}}" >
          </div>
          <div class="form-group">
            <label for="meta_keywords">Meta Keywords</label>
            <input type="text" class="form-control" id="meta_keywords" placeholder="{{$company->meta_keywords}}" value="{{$company->meta_keywords}}" >
          </div>

        <div class="row">
          <div class="col-xs-2 form-group">
            <label for="active"> Active
              <input type="checkbox" name="active" value="1" @if ($company->active == 1)
                {{'checked'}}
              @endif>
            </label>
          </div>
          <div class="col-xs-6 form-group">
            <label for="title">Όνομα Υπευθύνου</label>
            <input type="text" class="form-control" id="manager" placeholder="{{$company->manager}}" value="{{$company->manager}}" >
          </div>
          <div class="form-group col-xs-4">
            <label for="category">Category</label>
            <div class="form-control" name="category" id="category" disabled>
              @if( ! empty($company->category)){{ $company->category->title }}
                  @else Null
              @endif
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="header">header</label>
          <div class="input-group">
            <img width="200" height="200" src="{{asset('images/companies/'.$company->header)}}" alt="{{$company->title}}">
          </div>
        </div>

        <div class="row">
          <div class="col-xs-3 form-group">
            <label for="logo">Λογότυπο</label>
            <div class="input-group">
              <img width="200" height="200" src="{{asset('images/companies/'.$company->logo)}}" alt="{{$company->title}}">
            </div>
          </div>
          <div class="col-xs-3 form-group">
            <label for="image1">Εικόνα Αρχικης Σελίδας</label>
            <div class="input-group">
              <img width="200" height="200" src="{{asset('images/companies/'.$company->image1)}}" alt="{{$company->title}}">
            </div>
          </div>
          <div class="col-xs-3 form-group">
            <label for="image2">Εικόνα 2</label>
            <div class="col-xs-3 input-group">
              <img width="200" height="200" src="{{asset('images/companies/'.$company->image2)}}" alt="{{$company->title}}">
            </div>
          </div>
          <div class="col-xs-3 form-group">
            <label for="image3">Εικόνες 3</label>
            <div class="input-group">
              <img width="200" height="200" src="{{asset('images/companies/'.$company->image3)}}" alt="{{$company->title}}">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-6 text-center">
            <label for="days" class="bold">Ημερες εργασιας</label>
            <br>
            <label class="checkbox-inline">
              <input type="checkbox" name="days[]" value="Weekdays" {{ $company->days == 'Weekdays' ? "checked" : ""}}> Καθημερινα
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="days[]" value="Saturday" {{ $company->days == 'Suturday' ? 'checked' : ''}}> Σαββατο
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="days[]" value="Sunday" {{$company->days == 'Sunday' ? 'checked' : ''}}> Κυριακη
            </label>
          </div>
          <div class="col-xs-3">
            <div class="form-group">
              <label for="morningtime">Πρωινές Ώρες</label>
              <div class="input-group">
                <input type="time" class="form-control" value="{{ $company->morningtime }}" id="morningtime" name="morningtime" placeholder="Πρωινές Ώρες" required>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-time"></span>
                </span>
              </div>
            </div>
          </div>

          <div class="col-xs-3">
            <div class="form-group">
              <label for="afternoontime">Απογευματινές ώρες</label>
              <div class="input-group">
                <input type="time" class="form-control" value="{{ $company->afternoontime }}" id="afternoontime" name="afternoontime" placeholder="Απογευματινές Ώρες" required>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-6">
            <div class="form-group">
              <label for="website">Ιστοσελίδα</label>
              <div class="input-group">
                <input type="text" class="form-control" value="{{ $company->website }}" id="website" name="website" placeholder="Website" required>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-globe"></span>
                </span>
              </div>
            </div>
          </div>

            <div class="col-xs-6">
              <div class="form-group">
                <label for="email">E-Mail</label>
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
              <div class="form-group">
                <label for="facebook">Facebook</label>
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
              <div class="form-group">
                <label for="twitter">Twitter</label>
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
            <div class="col-xs-3 form-group">
              <label for="pos" class="bold">POS:</label>
              <br>
              <label class="radio-inline">
                <input type="radio" name="pos" value="No" {{ $company->pos == 'No' ? 'checked' : ''}}> No
              </label>
              <label class="radio-inline">
                <input type="radio" name="pos" value="Yes" {{ $company->pos == 'Yes' ? 'checked' : ''}}> Yes
              </label>
            </div>

            <div class="col-xs-6 form-group text-center">
              <label for="creditcard" class="bold">Χρεωστικές Κάρτες:</label>
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
            <div class="col-xs-3 form-group">
              <label for="delivery" class="bold">Delivery:</label>
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
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
