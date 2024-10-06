@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Company : {{$company->title}}
                @can ('update-companies', App\Models\Company::class)
                    <small><a class="btn btn-primary" href="{{route('owner.companies.edit', $company->id)}}">Edit</a> -
                        <a class="btn btn-warning" href="javascript:history.back()">Go Back</a></small>
                @endcan
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-body">
                    <div class="row">
{{--                        <div class="row">--}}
                            <div class="col-xs-2 form-group">
                                <label for="active"> Active
                                    <input type="checkbox" name="active" value="1" @if ($company->active == 1)
                                        {{'checked'}}
                                        @endif>
                                </label>
                            </div>
                            <div class="col-xs-4 form-group">
                                <label for="telephone">Τηλέφωνο</label>
                                <input type="text" class="form-control" id="telephone" placeholder="{{$company->telephone}}"
                                       value="{{$company->telephone}}" readonly>
                            </div>
                            <div class="form-group col-xs-4">
                                <label for="category">Category</label>
                                <div class="form-control" name="category" id="category" disabled>
                                    @if( ! empty($company->category))
                                        {{ $company->category->title }}
                                    @else
                                        Null
                                    @endif
                                </div>
                            </div>
{{--                        </div>--}}
                        <div class="col-xs-8 form-group">
                            <label for="title">Επωνυμία</label>
                            <input type="text" class="form-control" id="title" placeholder="{{$company->title}}"
                                   value="{{$company->title}}" readonly>
                        </div>

                        <div class="col-xs-4 form-group">
                            <label for="title">Όνομα Υπευθύνου</label>
                            <input type="text" class="form-control" id="manager" placeholder="{{$company->manager}}"
                                   value="{{$company->manager}}"readonly>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xs-6 form-group">
                            <label for="meta_description">Meta Description</label>
                            <input type="text" class="form-control" id="meta_description"
                                   placeholder="{{$company->meta_description}}" value="{{$company->meta_description}}"readonly>
                        </div>
                        <div class="col-xs-6 form-group">
                            <label for="meta_keywords">Meta Keywords</label>
                            <input type="text" class="form-control" id="meta_keywords"
                                   placeholder="{{$company->meta_keywords}}" value="{{$company->meta_keywords}}" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="editor" class="textarea" name="description" placeholder="Place some text here"
                                  style="width: 100%; height:150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$company->description}}</textarea>
                    </div>

                            {{--<div class="row">
                                <div class="col-xs-6 text-center">
                                    <label for="days" class="bold">Ημερες εργασιας</label>
                                    <br>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Day</th>
                                            <th>Session</th>
                                            <th>Opening Time</th>
                                            <th>Closing Time</th>
                                            <th>Noun</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach(\App\Helpers\DayTimeHelper::getWeekDaysAttribute() as $openingHour)
                                            <tr>
                                                <td>{{ $openingHour }}</td>
                                                <td>{{ $openingHour->session->name }}</td>
                                                <td>{{ $openingHour->start_time }}</td>
                                                <td>{{ $openingHour->end_time }}</td>
                                                <td>
                                                    @if($openingHour->session->allday)
                                                    {{$openingHour->session->allday}}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>--}}

                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="website">Ιστοσελίδα</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{ $company->website }}" id="website"
                                           name="website" placeholder="Website" required>
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
                                    <input type="text" value="{{ $company->email }}" class="form-control" id="email"
                                           name="email" placeholder="E-Mail" required>
                                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-envelope"></span>
                  </span>
                                </div>
                            </div>
                        </div>
{{--                    </div>--}}

{{--                    <div class="row">--}}
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{ $company->facebook }}"
                                           id="facebook" name="facebook"
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
                                    <input type="text" class="form-control" value="{{ $company->twitter }}" id="twitter"
                                           name="twitter"
                                           placeholder="Twitter">
                                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-heart"></span>
                  </span>
                                </div>
                            </div>
                        </div>
{{--                    </div>--}}

{{--                    <div class="row">--}}

                        {{--            <div class="col-xs-6 form-group text-center">--}}
                        {{--              <label for="creditcard" class="bold">Χρεωστικές Κάρτες:</label>--}}
                        {{--              <br>--}}
                        {{--              <label class="checkbox-inline">--}}
                        {{--                <input type="checkbox" name="creditcard[]" value="Nocard"--}}
                        {{--                {{ $company->creditcard == 'Nocard' ? 'checked' : ''}}> Not--}}
                        {{--              </label>--}}
                        {{--              <label class="checkbox-inline">--}}
                        {{--                <input type="checkbox" name="creditcard[]" value="Visa"--}}
                        {{--                {{ $company->creditcard == 'Visa' ? 'checked' : ''}}> Visa--}}
                        {{--              </label>--}}
                        {{--              <label class="checkbox-inline">--}}
                        {{--                <input type="checkbox" name="creditcard[]" value="Mastercard"--}}
                        {{--                {{ $company->creditcard == 'Mastercard' ? 'checked' : ''}}> Mastercard--}}
                        {{--              </label>--}}
                        {{--              <label class="checkbox-inline">--}}
                        {{--                <input type="checkbox" name="creditcard[]" value="American Express"--}}
                        {{--                {{ $company->creditcard == 'American Express' ? 'checked' : ''}}> American Express--}}
                        {{--              </label>--}}
                        {{--            </div>--}}
                        <div class="col-xs-3 form-group">
                            <label for="delivery" class="bold">Delivery:</label>
                            <br>
                            <label class="radio-inline">
                                <input type="radio" name="delivery" value="No"
                                       {{ $company->delivery == 'No' ? 'checked' : ''}} required> No
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="delivery" value="Yes"
                                       {{ $company->delivery == 'Yes' ? 'checked' : ''}} required> Yes
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-3 form-group">
                            <label for="header">header</label>
                            <div class="input-group">
                                <img width="200" height="200" src="{{asset($company->header)}}"
                                     alt="{{$company->title}}">
                            </div>
                        </div>

                        <div class="col-xs-3 form-group">
                            <label for="logo">Λογότυπο</label>
                            <div class="input-group">
                                <img width="200" height="200" src="{{asset($company->logo)}}"
                                     alt="{{$company->title}}">
                            </div>
                        </div>
                        <div class="col-xs-3 form-group">
                            <label for="image1">Εικόνα Αρχικης Σελίδας</label>
                            <div class="input-group">
                                <img width="200" height="200" src="{{asset($company->image1)}}"
                                     alt="{{$company->title}}">
                            </div>
                        </div>
                        <div class="col-xs-3 form-group">
                            <label for="image2">Εικόνα 2</label>
                            <div class="col-xs-3 input-group">
                                <img width="200" height="200" src="{{asset($company->image2)}}"
                                     alt="{{$company->title}}">
                            </div>
                        </div>
                        <div class="col-xs-3 form-group">
                            <label for="image3">Εικόνες 3</label>
                            <div class="input-group">
                                <img width="200" height="200" src="{{asset($company->image3)}}"
                                     alt="{{$company->title}}">
                            </div>
                        </div>

                        @if($company->images)
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <label for="image3"> <h1>{{__('Λοιπές Εικόνες')}}</h1></label>
                                    </div>
                                    @foreach($company->images as $upload)
                                        <div class="col-xs-1 col-md-3">
                                            <a href="{{ asset($upload->path) }}" data-lightbox="accommodation-images">
                                                <img width="100%" height="100%" src="{{ asset($upload->path) }}" alt="{{$upload->id}}">
                                            </a>
                                        </div>
                                    @endforeach
                                    @else
                                        No images available
                                </div>
                            </div>
                        @endif
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
