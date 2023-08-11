@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Edit Product: <small>{{$product->title}}</small>
                <a class="btn btn-warning" href="javascript:history.back()">Go Back</a>
            </h1>
        </section>
        <section class="content">
            <div class="box">
                <form method="post" action="{{ route('owner.products.update', $product->id) }}"
                      enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="col-xs-2 form-group">
                                    <label for="active"> Active
                                        <input type="checkbox" name="active" value="1" @if ($product->active == 1)
                                            {{'checked'}}
                                            @endif>
                                    </label>
                                </div>
                                <div class="col-xs-2 form-group{{ $errors->has('companytype') ? ' has-error' : '' }}">
                                    <label for="company_type">Κατηγορία Καταστήματος</label>
                                    @if ($errors->has('company_type'))
                                        <strong class="text-danger">{{ $errors->first('company_type') }}</strong>
                                    @endif
                                    <div class="input-group">
                                        <select id="company_type" value="{{ $product->company_type }}"
                                                name="company_type"
                                                class="form-control">
                                            <option value="">Επιλέξτε</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}"
                                                        @if( $product->company_type == $category->id){{'selected'}}
                                                        @else None
                                                    @endif>{{$category->title}}</option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-addon">
                    <span class="glyphicon glyphicon-list"></span>
                  </span>
                                    </div>
                                </div>

                                <div class="col-xs-3 form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                    <label for="telephone">price</label>
                                    @if ($errors->has('price'))
                                        <strong class="text-danger">{{ $errors->first('price') }}</strong>
                                    @endif
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{ $product->price }}"
                                               id="price" name="price" placeholder="price">
                                        <span class="input-group-addon">
                  <span class="glyphicon glyphicon-user"></span>
                </span>
                                    </div>
                                </div>
                                <div class="col-xs-3 form-group{{ $errors->has('sku') ? ' has-error' : '' }}">
                                    <label for="telephone">sku</label>
                                    @if ($errors->has('sku'))
                                        <strong class="text-danger">{{ $errors->first('sku') }}</strong>
                                    @endif
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{ $product->sku }}"
                                               id="sku" name="sku" placeholder="sku">
                                        <span class="input-group-addon">
                  <span class="glyphicon glyphicon-user"></span>
                </span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        @foreach(config('translatable.locales') as $locale => $lang)
                            <div class="row">
                                <div class="col-xs-8">
                                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                        <label for="title">Επωνυμία - {{$lang}}</label>
                                        @if ($errors->has('title'))
                                            <strong class="text-danger">{{ $errors->first('title') }}</strong>
                                        @endif
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="{{$lang}}[title]"
                                                   value="{{ $product->title }}" id="title"
                                                   placeholder="{{ $product->title }}">
                                            <span class="input-group-addon">
                    <span class="glyphicon glyphicon-home"></span>
                  </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-4 form-group{{ $errors->has('manager') ? ' has-error' : '' }}">
                                    <label for="manager">Όνομα Υπευθύνου - {{$lang}}</label>
                                    @if ($errors->has('manager'))
                                        <strong class="text-danger">{{ $errors->first('manager') }}</strong>
                                    @endif
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{ $product->manager }}"
                                               id="manager"
                                               name="{{$locale}}[manager]" placeholder="Manager Name">
                                        <span class="input-group-addon">
                    <span class="glyphicon glyphicon-user"></span>
                  </span>
                                    </div>
                                </div>

                            </div>

                            <div class="col-xs-6 form-group{{ $errors->has('meta_description') ? ' has-error' : '' }}">
                                <label for="meta_description">Meta Description - {{$lang}}</label>
                                @if ($errors->has('meta_description'))
                                    <strong class="text-danger">{{ $errors->first('meta_description') }}</strong>
                                @endif
                                <div class="input-group">
                                    <input type="text" class="form-control" name="{{$locale}}[meta_description]"
                                           value="{{ $product->meta_description }}" id="title"
                                           placeholder="{{ $product->meta_description }}">
                                    <span class="input-group-addon">
                <span class="glyphicon glyphicon-home"></span>
              </span>
                                </div>
                            </div>

                            <div class="col-xs-6 form-group{{ $errors->has('meta_keywords') ? ' has-error' : '' }}">
                                <label for="title">MetaKeywords {{$lang}}</label>
                                @if ($errors->has('title'))
                                    <strong class="text-danger">{{ $errors->first('meta_keywords') }}</strong>
                                @endif
                                <div class="input-group">
                                    <input type="text" class="form-control" name="{{$lang}}[meta_keywords]"
                                           value="{{ $product->meta_keywords }}" id="title"
                                           placeholder="{{ $product->meta_keywords }}">
                                    <span class="input-group-addon">
                <span class="glyphicon glyphicon-home"></span>
              </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Description - {{$lang}}</label>
                                <textarea id="editor" class="textarea" name="{{$locale}}[description]"
                                          placeholder="Place some text here"
                                          style="width: 100%; height:150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$product->description}}</textarea>
                            </div>
                        @endforeach


                        <div class="row">
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label for="header">Product page header</label>
                                    <img width="100%" height="200" src="{{asset('images/products/'.$product->header)}}"
                                         alt="{{$product->title}}">
                                </div>
                                <div class="form-group{{ $errors->has('header') ? ' has-error' : '' }}">
                                    <label for="header">Header</label>
                                    @if ($errors->has('header'))
                                        <strong class="text-danger">{{ $errors->first('header') }}</strong>
                                    @endif
                                    <div class="input-group">
                                        <input type="file" value="{{asset('images/products/'.$product->header)}}"
                                               name="header">
                                        <p class="help-block"><img id="image3Preview" src="#" alt="Header Image Preview" style="display: none; max-width: 300px;"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label for="logo">Λογοτυπο</label>
                                    <img width="200px" height="200px" src="{{asset('images/products/'.$product->logo)}}"
                                         alt="{{$product->title}}">
                                </div>
                                <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                                    {{-- <label for="logo">Λογότυπο</label> --}}
                                    @if ($errors->has('logo'))
                                        <strong class="text-danger">{{ $errors->first('logo') }}</strong>
                                    @endif
                                    <div class="input-group">
                                        <input type="file" value="{{asset('images/products/'.$product->logo)}}"
                                               name="logo">
                                        <p class="help-block"><img id="logoPreview" src="#" alt="Logo Image preview" style="display: none; max-width: 300px;"></p>
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
                                        <input type="file" value="{{asset('images/products/'.$product->image1)}}"
                                               name="image1">
                                        <p class="help-block"><img id="image1Preview" src="#" alt="Image Preview 1" style="display: none; max-width: 300px;"></p>
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
                                        <input type="file" value="{{asset('images/products/'.$product->image2)}}"
                                               name="image2">
                                        <p class="help-block"><img id="image2Preview" src="#" alt="Image Preview 2" style="display: none; max-width: 300px;"></p>
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
                                        <input type="file" value="{{asset('images/products/'.$product->image3)}}"
                                               name="image3">
                                        <p class="help-block"><img id="image3Preview" src="#" alt="Image Preview 3" style="display: none; max-width: 300px;"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="col-xs-4 col-lg-offset-2">
                                    <div class="form-group{{ $errors->has('imgfile') ? ' has-error' : '' }}">
                                        <label for="imgfile">{{__('Γενικές Εικόνες')}}</label>
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
