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


                        </div>

                        <div class="col-xs-4 form-group{{ $errors->has('meta_description') ? ' has-error' : '' }}">
                            <label for="meta_description">Meta Description</label>
                            @if ($errors->has('meta_description'))
                                <strong class="text-danger">{{ $errors->first('meta_description') }}</strong>
                            @endif
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{ old('meta_description') }}"
                                       id="manager" name="meta_description" placeholder="Meta Description">
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-user"></span>
                              </span>
                            </div>
                        </div>

                        <div class="col-xs-4 form-group{{ $errors->has('meta_keywords') ? ' has-error' : '' }}">
                            <label for="meta_keywords">Meta Keywords</label>
                            @if ($errors->has('meta_keywords'))
                                <strong class="text-danger">{{ $errors->first('meta_keywords') }}</strong>
                            @endif
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{ old('meta_keywords') }}"
                                       id="meta_keywords" name="meta_keywords"
                                       placeholder="Meta keywords comma separated">
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-user"></span>
                              </span>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-xs-6 form-group">
                                <label for="title">Title</label>
                                <input type="text" value="{{ old('title') }}" name="title" class="form-control"
                                       id="title" placeholder="Enter Title">
                            </div>

                            <div class="col-xs-3 form-group{{ $errors->has('manager') ? ' has-error' : '' }}">
                                <label for="manager">{{__('page.manager')}}</label>
                                @if ($errors->has('manager'))
                                    <strong class="text-danger">{{ $errors->first('manager') }}</strong>
                                @endif
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{ old('manager') }}" id="manager"
                                           name="manager" placeholder="Manager Name">
                                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-user"></span>
                  </span>
                                </div>
                            </div>

                        </div>

                        <input type="hidden" name="user_id" value="{{auth()->id()}}">

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="textarea" name="description" placeholder="Place some text here"
                                      style="width: 100%; height:150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('description')}}</textarea>
                        </div>
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
