@extends('layouts.main')
@section('title', $company->name.' '.$company->title)
@section('meta_description', $company->category->name.' '.__('head.company').' '.$company->meta_description)
@section('meta_keywords', $company->meta_keywords.'  '. $company->category->name.' '.__('head.company'))

@section('head-js')
  <script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5c1ce62ff6809e0011a91cbd&product=inline-share-buttons' async='async'></script>
@endsection

@section('content')

<img width="100%" height="350px" src="{{ asset('images/companies/'.$company->header) }}"
  title="{{ $company->title }}" class="" alt="{{$company->title}}">
<h1 class="text-center">{{ $company->title }}</h1>
<div class="divider"></div>
<br>
<div class="container">
  <div id="companies">

    <div class="row">
      <div class="col-xs-6">
        <img src="{{ asset('images/companies/'.$company->logo) }}" width="100%" height="250"
          alt="{{ $company->title }}" title="{{ $company->title }}">
        </div>

      <div class="col-xs-6">
        <div class="col-xs-9">
          <h3>{{__('single.category')}} {{ $company->category->name }}</h3>
          <h3>{{__('single.manager')}} {{ $company->manager }}</h3>
          <h3>{{__('single.telephone')}} {{ $company->telephone }}</h3>
          <h3>{{__('single.morninghours')}} {{ $company->morningtime }}</h3>
          <h3>{{__('single.afternoonhours')}} {{ $company->afternoontime }}</h3>
        </div>



        <div class="col-xs-3">
          <h3>{{__('single.pos')}} <div class="divider"></div>{{ $company->pos }}</h3>

          <h3>{{__('single.creditcards')}} <div class="divider"></div>{{ $company->creditcard }}</h3>

          <h3>{{__('single.productdelivery')}} <div class="divider"></div>{{ $company->delivery }}</h3>

        </div>

      </div>

      <div class="col-xs-12">
        {{-- <br> --}}
        <div class="col-xs-4  text-center" style="margin-bottom: 10px;">
          <h3 class="col-xs-12">{{__('single.opinion')}}</h3>

          <div id="buttonlink" class="col-xs-6">
            <form action="{{ route('like.store') }}" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="likeable_id" value="{{ $company->id }}">
              <input type="hidden" name="likeable_type" value="App\Models\Event">
              <button type="submit" class="btn btn-link">
                <i class="fa fa-3x fa-thumbs-up"></i>
                <span class="badge">{{$company->likes->count()}}</span>
              </button>
            </form>
          </div>
          <div id="buttonlink" class="col-xs-6">
            <a onclick='window.scrollTo({top: 0, behavior: "smooth"});' href="#comments">
              <i class="fa fa-3x fa-comment"></i>
              <span class="badge">{{$company->comments->count()}}</span>
            </a>
          </div>
        </div>
        <div class="col-xs-4">
          <h3 class="col-xs-12 text-center">{{__('single.moreaboutus')}}: </h3>
          <div class="col-xs-3">
            <a href="//{{ $company->website }}" target="_blank">
              <i class="fa fa-3x fa-home"></i>
            </a>
          </div>
          <div class="col-xs-3">
            <a href="mailto:{{ $company->email }}" target="_top">
              <i class="fa fa-3x fa-envelope"></i>
            </a>
          </div>
          <div class="col-xs-3">
            <a href="//{{ $company->facebook }}" target="_blank">
              <i class="fab fa-3x fa-facebook"></i>
            </a>
          </div>
          <div class="col-xs-3">
            <a href="//{{ $company->twitter }}" target="_blank">
              <i class="fab fa-3x fa-twitter"></i>
            </a>
          </div>
        </div>
        <div id="social-links" class="col-xs-4">
          <h3 class="col-xs-12 text-center">{{__('page.shareit')}}:</h3>
          <div class="row sharethis-inline-share-buttons"></div>
        </div>

      </div>
    </div>


    <div class="row center-block">
      <br>

      <div class="panel panel-primary text-center">
        <div class="panel-heading">
          <h3 class="panel-title">{{__('single.description')}}</p>
							  </div>
							  <div class="panel-body">
							    <h2>{!!$company->description!!}</h2>
							  </div>
							</div>
						</div>


              <div class="row">
                <div class="col-xs-4">
                  <a data-lightbox="company" data-title="{{$company->title}}" data-alt="{{$company->title}}" href="{{ asset('images/companies/'.$company->image1) }}">
                    <img src="{{ asset('images/companies/'.$company->image1) }}" title="{{ $company->title }}" class="img-responsive img-rounded" alt="{{$company->title}}">
                  </a>
                </div>
                <div class="col-xs-4">
                  <a data-lightbox="company" data-title="{{$company->title}}" data-alt="{{$company->title}}" href="{{ asset('images/companies/'.$company->image2) }}">
                    <img src="{{ asset('images/companies/'.$company->image2) }}" title="{{ $company->title }}" class="img-responsive img-rounded" alt="{{$company->title}}">
                  </a>
                </div>
                <div class="col-xs-4">
                  <a data-lightbox="company" data-title="{{$company->title}}" data-alt="{{$company->title}}" href="{{ asset('images/companies/'.$company->image3) }}">
                    <img src="{{ asset('images/companies/'.$company->image3) }}" title="{{ $company->title }}" class="img-responsive img-rounded" alt="{{$company->title}}">
                  </a>
                </div>
              </div>

				<div class="row"><br>

					<div class="col-xs-12">
            <h1 class="text-center">{{__('single.products')}} {{$company->title}}</h1>
  					<div class="divider"></div><br>
          </div>

          @if(count($company->products->where('active',1)) > 0)
            @foreach($company->products->where('active',1) as $company)
              <div class="col-xs-3">
                <ul class="list-group">
                  <li class="list-group-item"><h2>{{ str_limit($company->title, 20)}}</h2>
                  </li>
                  <li class="list-group-item"><img src="{{ asset('images/products/'.$company->logo) }}" width="100%" height="100px" alt="{{$company->title}}" title"{{$company->title}}"></li>
                  {{-- <li class="list-group-item bold">Κατηγορία: <a href="{{ route('products-category', $company->producttype->id)}}">{{ $company->producttype->name }}</a></li> --}}
                  <li class="list-group-item"><h3>Τιμή: {{ $company->price }}</h3></li>
          <li class="list-group-item">
            <h3>{!!str_limit($company->description, 20)!!}</h3>
          </li>
          <li class="list-group-item">
            <a href="{{route('product', $company->slug) }}" class="btn btn-default btn-block">Show</a>
          </li>
          </ul>
        </div>
        @endforeach @else
        <p class="text-center">No published products</p>
        @endif

      </div>
      {{-- comments --}}
      <div class="row">
        <div class="col-xs-12" id="comments">
          <h1 class="text-center">{{__('single.comments')}}</h1>
          <div class="divider"></div>
          <br>
        </div>

        <div class="col-xs-6">
          <label>{{__('single.latestcomments')}}</label>
          @if(count($company->comments) > 0)
          <ul class="list-group">
            @foreach ($company->comments as $comment)
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
            <input type="hidden" name="commentable_id" value="{{$company->id}}">
            <input type="hidden" name="commentable_type" value="App\Company">
            <div class="form-group">
              <label for="email">Email</label>
              @if (Auth::user())
              <input type="email" class="form-control" id="email" name="email" value="{{auth()->user()->email }}"
                required readonly> @elseif (Auth::guard('customer')->user())
              <input type="email" class="form-control" id="email" name="email" value="{{ auth('customer')->user()->email }}"
                required readonly> @else
              <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                required> @endif
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
  <br> @endsection
