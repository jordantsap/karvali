@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Product : {{$product->title}}
                @can ('update-products', App\Models\Product::class)
                    <small><a class="btn btn-primary" href="{{route('owner.products.edit', $product->id)}}">Edit</a>
                        @endcan
                        - <a class="btn btn-warning" href="javascript:history.back()">Go Back</a></small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title">Ονομασία:</label>
                                <div class="input-group">
                                    <input type="text" value="{{ $product->title }}" class="form-control" name="title" placeholder="{{ $product->title }}">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-home"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-xs-4">
                            <label for="category">Category</label>
                            <div class="form-control" name="category" id="category" disabled>
                                @if( ! empty($product->category))
                                    {{ $product->category->title }}
                                @else
                                    Null
                                @endif
                            </div>
                        </div>
                        @if ($product->attributes)
                            <div class="col-xs-12">
                                <h2>Attributes</h2>

                                @foreach ($product->attributes as $attribute)
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label for="category">Product attribute</label>
                                            <input class="form-control" type="text" placeholder="{{ $attribute->title }}" readonly>
                                        </div>

                                        <div class="col-xs-6">
                                            <label for="{{ $attribute->pivot->value }}">{{ $attribute->pivot->value }}</label>
                                            <input class="" type="{{$attribute->attributeType->type}}" readonly>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                                <hr>
                            </div>
                        @else
                            <p>No fields available for this product.</p>
                        @endif

                    </div>

                    <div class="row">
                        <div class="col-xs-2 form-group">
                            <label for="active"> Active
                                <input type="checkbox" name="active" @if ($product->active == 1)
                                    {{'checked'}}
                                    @endif>
                            </label>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group{{ $errors->has('sku') ? ' has-error' : '' }}">
                                <label for="sku">Κωδικός προϊόντος</label>
                                <div class="input-group">
                                    <input type="text" value="{{ $product->sku }}" class="form-control" name="sku"
                                           placeholder="Τιμή" required>
                                    <span class="input-group-addon">
                <span class="glyphicon glyphicon-euro"></span>
              </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                <label for="price">Τιμή</label>
                                <div class="input-group">
                                    <input type="text" value="{{ $product->price }}" class="form-control" name="price"
                                           placeholder="Τιμή" required>
                                    <span class="input-group-addon">
                <span class="glyphicon glyphicon-euro"></span>
              </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-4">
                            <div class="form-group{{ $errors->has('company_id') ? ' has-error' : '' }}">
                                <label for="company_id">Εταιρεία</label>
                                @if ($errors->has('company_id'))
                                    <strong class="text-danger">{{ $errors->first('company_id') }}</strong>
                                @endif
                                <div class="input-group">
                                    <select id="company_id" value="{{ $product->company_id }}" name="company_id"
                                            class="form-control" required>
                                        <option value="">Επιλέξτε</option>
                                        @foreach(auth()->user()->companies as $company)
                                            <option value="{{ $company->id }}" {{$product->company_id == $company->id? "selected" : ''}}>{{ $company->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="header">header</label>
                        <div class="input-group">
                            <img width="100%" height="200" src="{{asset($product->header)}}" alt="{{$product->title}}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-3 form-group">
                            <label for="logo">Λογότυπο</label>
                            <div class="input-group">
                                <img width="200" height="200" src="{{asset($product->logo)}}" alt="{{$product->title}}">
                            </div>
                        </div>
                        <div class="col-xs-3 form-group">
                            <label for="image1">Εικόνα Αρχικης Σελίδας</label>
                            <div class="input-group">
                                <img width="200" height="200" src="{{asset($product->image1)}}"
                                     alt="{{$product->title}}">
                            </div>
                        </div>
                        <div class="col-xs-3 form-group">
                            <label for="image2">Εικόνα 2</label>
                            <div class="col-xs-3 input-group">
                                <img width="200" height="200" src="{{asset($product->image2)}}"
                                     alt="{{$product->title}}">
                            </div>
                        </div>
                        <div class="col-xs-3 form-group">
                            <label for="image3">Εικόνες 3</label>
                            <div class="input-group">
                                <img width="200" height="200" src="{{asset($product->image3)}}"
                                     alt="{{$product->title}}">
                            </div>
                        </div>
                        @if($product->images)
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <label for="image3"><h1>{{__('Λοιπές Εικόνες')}}</h1></label>
                                    </div>
                                    @foreach($product->images as $upload)
                                        <div class="col-xs-1 col-md-3">
                                            <a href="{{ asset($upload->path) }}" data-lightbox="product-images">
                                                <img width="100%" height="100%" src="{{ asset($upload->path) }}"
                                                     alt="{{$upload->id}}">
                                            </a>
                                        </div>
                                    @endforeach
                                    @else
                                        No images available
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description">Περιγραφή</label>
                                <div class="input-group">
              <textarea name="description" id="description" class="form-control"
                        rows="5" required>{{ $product->description }}</textarea>
                                    <span class="input-group-addon">
                <span class="glyphicon glyphicon-info-sign"></span>
              </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
