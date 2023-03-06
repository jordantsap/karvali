@extends('layouts.main')
@section('title', $product->category->name.' '.$product->title )
@section('meta_description', $product->category->name.' '.$product->meta_description)
@section('meta_keywords', $product->meta_keywords.' '. $product->category->name)

@section('head-js')
  <script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5c1ce62ff6809e0011a91cbd&product=inline-share-buttons' async='async'></script>
@endsection

@section('content')
  <img width="100%" height="350px" src="{{ asset('images/products/'.$product->header) }}" title="{{ $product->title }}" class="" alt="{{$product->title}}">
	<div class="container">
		<div id="products">
			<div class="row">
				<div class="col-xs-12">
					<h1 class="text-center">{{ $product->title }}</h1>
	        <div class="divider"></div><br>
				</div>
				<br>
				<div class="col-xs-8">
					<img src="{{ asset('images/products/'.$product->logo) }}" alt="{{ $product->title }}" width="100%" height="350px">
				</div>


				<div class="col-xs-4 text-center">

          <ul class="list-group">
              <li class="list-group-item bold">
                <h2>{{__('single.company')}}
                  <a href="{{ route('company',$product->company->slug) }}">
                    {{ Str::limit($product->company->title, 200) }}</a></h2></li>

              <li class="list-group-item bold">
                <h2>{{__('single.category')}}
                  <a href="{{ route('products-category', $product->category->slug)}}">
                    {{ $product->category->name }}</a>
                </h2>
              </li>

              <li class="list-group-item bold">
                <h3>{{__('single.productcode')}} {{ $product->sku }}</h3></li>

              <li class="list-group-item bold"><h3>{{__('single.price')}} {{ $product->price }} €</h3></li>

              <li class="list-group-item bold" style="border: none !important;">
                <form id="cartstore" action="{{ route('cart.store') }}" method="post">
                  {{ csrf_field() }}
                  <input type="hidden" name="id" value="{{ $product->id }}">
                  <input type="hidden" name="title" value="{{ $product->title }}">
                  <input type="hidden" name="price" value="{{ $product->price }}">
                  <button id="btn" type="submit" class="btn btn-primary btn-block">{{__('single.addtocart')}}</button>
                  {{-- <script type="text/javascript">
                  function formSubmit()
   {
     alert("{{__('form.cartconfirm')}}");
       $("#cartstore").submit();
   }
                  </script> --}}
                </form>
              </li>
          </ul>
				</div>

        <div class="row col-xs-12">

          <div class="col-xs-4 text-center" style="margin-bottom: 10px;">
            <h3 class="col-xs-12">{{__('single.opinion')}}</h3>
            <div id="buttonlink" class="col-xs-6">
              <form action="{{ route('like.store') }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="likeable_id" value="{{ $product->id }}">
                <input type="hidden" name="likeable_type" value="App\Models\Event">
                <button type="submit" class="btn btn-link">
                  <i class="fa fa-3x fa-thumbs-up"></i>
                  <span class="badge">{{$product->likes->count()}}</span>
                </button>
              </form>
            </div>
            <div id="buttonlink" class="col-xs-6">
              <a href="#comments">
                <i class="fa fa-3x fa-comment"></i>
                <span class="badge">{{$product->comments->count()}}</span>
              </a>
            </div>
          </div>
          <div class="col-xs-4">
            <h3 class="col-xs-12 text-center">{{__('single.moreaboutus')}}: </h3>
            <div class="col-xs-3">
              <a href="//{{ $product->website }}" target="_blank">
                <i class="fa fa-3x fa-home"></i>
              </a>
            </div>
            <div class="col-xs-3">
              <a href="mailto:{{ $product->email }}" target="_top">
                <i class="fa fa-3x fa-envelope"></i>
              </a>
            </div>
            <div class="col-xs-3">
              <a href="//{{ $product->facebook }}" target="_blank">
                <i class="fab fa-3x fa-facebook"></i>
              </a>
            </div>
            <div class="col-xs-3">
              <a href="//{{ $product->twitter }}" target="_blank">
                <i class="fab fa-3x fa-twitter"></i>
              </a>
            </div>
          </div>
          <div id="social-links" class="text-center col-xs-4">
            <h3 class="col-xs-12">{{__('page.shareit')}}:</h3>
            <div class="row sharethis-inline-share-buttons"></div>
          </div>

        </div>

        <div class="col-xs-12 center-block">
          <br>

          <div class="panel panel-primary text-center">
            <div class="panel-heading">
              <h3 class="panel-title">{{__('single.description')}}</p>
    							  </div>
    							  <div class="panel-body">
    							    <h2>{!!$product->description!!}</h2>
    							  </div>
    							</div>
    						</div>

        <div class="row center-block">
          <div class="col-xs-4">
            <a data-lightbox="product" data-title="{{$product->title}}" data-alt="{{$product->title}}" href="{{ asset('images/products/'.$product->image1) }}">
              <img width="100%" height="270px" src="{{ asset('images/products/'.$product->image1) }}" title="{{ $product->title }}" class="img-responsive" alt="{{$product->title}}">
            </a>
          </div>
          <div class="col-xs-4">
            <a data-lightbox="product" data-title="{{$product->title}}" data-alt="{{$product->title}}" href="{{ asset('images/products/'.$product->image2) }}">
              <img width="100%" height="270px" src="{{ asset('images/products/'.$product->image2) }}" title="{{ $product->title }}" class="img-responsive" alt="{{$product->title}}">
            </a>
          </div>
          <div class="col-xs-4">
            <a data-lightbox="product" data-title="{{$product->title}}" data-alt="{{$product->title}}" href="{{ asset('images/products/'.$product->image3) }}">
              <img width="100%" height="270px" src="{{ asset('images/products/'.$product->image3) }}" title="{{ $product->title }}" class="img-responsive" alt="{{$product->title}}">
            </a>
          </div>
        </div>

        <div class="col-xs-12" id="comments">
          <h1 class="text-center">{{__('single.comments')}}</h1>
          <div class="divider"></div><br>
        </div>
        {{-- comments --}}
          <div class="row center-block">
            <div class="col-xs-6">
              <label>{{__('single.latestcomments')}}</label>

              @if(count($product->comments) > 0)
              <ul class="list-group">
                @foreach ($product->comments as $comment)
                <li class="list-group-item">
                  {{$comment->comment}}
                </li>
              @endforeach
            </ul>
            @else
              <li class="list-group-item">{{__('single.nocomments')}}</li>
            @endif
            </div>
            <div class="col-xs-6">
                <form action="{{ route('comment.store') }}" method="post" role="form">
                  {{ csrf_field() }}
                  <input type="hidden" name="commentable_id" value="{{$product->id}}">
                  <input type="hidden" name="commentable_type" value="App\Product">
                  <div class="form-group">
                    <label for="email">Email</label>
                    @if (Auth::user())
                    <input type="email" class="form-control" id="email" name="email" value="{{auth()->user()->email }}" required readonly>
                    @elseif (Auth::guard('customer')->user())
                    <input type="email" class="form-control" id="email" name="email" value="{{ auth('customer')->user()->email }}"  required readonly>
                    @else
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"  required>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="comment">{{__('single.newcomment')}}</label>
                    <textarea class="form-control" name="comment" rows="5" required></textarea>
                  </div>
                  <button id="btn" type="submit" class="btn btn-primary btn-block">{{__('single.addcomment')}}</button>
                </form>
            </div>
          </div>

			</div>
		</div>
	</div>
	<br>
@endsection
