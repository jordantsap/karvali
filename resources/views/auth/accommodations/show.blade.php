@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Accommodation : {{$accommodation->title}}
                @can ('update-accommodation', App\Models\Accommodation::class)
                    <small><a class="btn btn-primary" href="{{route('owner.accommodation.edit', $accommodation->id)}}">Edit</a> - <a class="btn btn-warning" href="javascript:history.back()">Go Back</a></small>
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
                            <input type="text" class="form-control" id="title" placeholder="{{$accommodation->title}}" value="{{$accommodation->title}}" >
                        </div>
                        <div class="col-xs-4 form-group">
                            <label for="telephone">Τηλέφωνο</label>
                            <input type="text" class="form-control" id="telephone" placeholder="{{$accommodation->telephone}}" value="{{$accommodation->telephone}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <input type="text" class="form-control" id="meta_description" placeholder="{{$accommodation->meta_description}}" value="{{$accommodation->meta_description}}" >
                    </div>
                    <div class="form-group">
                        <label for="meta_keywords">Meta Keywords</label>
                        <input type="text" class="form-control" id="meta_keywords" placeholder="{{$accommodation->meta_keywords}}" value="{{$accommodation->meta_keywords}}" >
                    </div>

                    <div class="row">
                        <div class="col-xs-2 form-group">
                            <label for="active"> Active
                                <input type="checkbox" name="active" value="1" @if ($accommodation->active == 1)
                                    {{'checked'}}
                                    @endif>
                            </label>
                        </div>
                        <div class="col-xs-6 form-group">
                            <label for="title">Όνομα Υπευθύνου</label>
                            <input type="text" class="form-control" id="manager" placeholder="{{$accommodation->manager}}" value="{{$accommodation->manager}}" >
                        </div>
                        <div class="form-group col-xs-4">
                            <label for="category">Category</label>
                            <div class="form-control" name="category" id="category" disabled>
                                @if( ! empty($accommodation->accommodationType())){{ $accommodation->accommodationType->title }}
                                @else Null
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="header">header</label>
                        <div class="input-group">
                            <img width="200" height="200" src="{{asset('images/companies/'.$accommodation->header)}}" alt="{{$accommodation->title}}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-3 form-group">
                            <label for="logo">Λογότυπο</label>
                            <div class="input-group">
                                <img width="200" height="200" src="{{asset('images/companies/'.$accommodation->logo)}}" alt="{{$accommodation->title}}">
                            </div>
                        </div>
                        <div class="col-xs-3 form-group">
                            <label for="image1">Εικόνα Αρχικης Σελίδας</label>
                            <div class="input-group">
                                <img width="200" height="200" src="{{asset('images/companies/'.$accommodation->image1)}}" alt="{{$accommodation->title}}">
                            </div>
                        </div>
                        <div class="col-xs-3 form-group">
                            <label for="image2">Εικόνα 2</label>
                            <div class="col-xs-3 input-group">
                                <img width="200" height="200" src="{{asset('images/companies/'.$accommodation->image2)}}" alt="{{$accommodation->title}}">
                            </div>
                        </div>
                        <div class="col-xs-3 form-group">
                            <label for="image3">Εικόνες 3</label>
                            <div class="input-group">
                                <img width="200" height="200" src="{{asset('images/companies/'.$accommodation->image3)}}" alt="{{$accommodation->title}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="website">Ιστοσελίδα</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{ $accommodation->website }}" id="website" name="website" placeholder="Website" required>
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
                                    <input type="text" value="{{ $accommodation->email }}" class="form-control" id="email" name="email" placeholder="E-Mail" required>
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
                                    <input type="text" class="form-control" value="{{ $accommodation->facebook }}" id="facebook" name="facebook"
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
                                    <input type="text" class="form-control" value="{{ $accommodation->twitter }}" id="twitter" name="twitter"
                                           placeholder="Twitter">
                                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-heart"></span>
                  </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="editor" class="textarea" name="description" placeholder="Place some text here" style="width: 100%; height:150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$accommodation->description}}</textarea>
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
