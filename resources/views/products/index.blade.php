@extends('layouts.main')
@section('title', __('head.products'))
@section('meta_description', __('meta.productspagedescription'))
@section('meta_keywords', __('meta.productspagekeywords'))

@section('content')
  <div id="products">
   <div class="container">
     <div class="row">
     <h1 class="">{{ __('page.products') }}</h1>
     <nav class="navbar">
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#producttype-collapse"
       aria-expanded="false">
       <span class="">{{__('page.categories')}}</span>
       <span class="glyphicon glyphicon-transfer" aria-hidden="true"></span>
     </button>
       <div class="row">
         <ul class="nav navbar-nav collapse navbar-collapse" id="producttype-collapse">
            @foreach($producttypes as $producttype)
              <li><a href="{{ route('products-category', $producttype->slug)}}" class="">{{ $producttype->name }}&nbsp<span class="badge">{{$producttype->products->where('active',1)->count()}}</span>
              </a></li>
            @endforeach
            <li><script>
  document.write('<a href="' + document.referrer + '">{{__('page.backlink')}}</a>');
</script></li>
          </ul>
        </div>
        </nav>
          <div class="divider"></div>


       <div class="row">
         @if(count($products) > 0)
           @foreach ($products as $product)
             <div class="col-xs-12 col-sm-4 portfolio-item">
               <div class="card h-100">
                 <a target="_blank" href="{{ route('product',$product->slug) }}">
                   <img class="img-responsive img-fluid rounded" style="width:100%;height:150px;" src="{{ asset('images/products/'.$product->logo) }}" alt="{{ $product->title }}">
                 </a>
               </div>
               <div class="card-body">
                 <div class="card-title">
                   <a target="_blank" href="{{ route('product',$product->slug) }}">
                   <h2>{{ Str::limit($product->title, 20) }}</h2></a>
                 </div>
                 <div class="row" id="likecomment">
                   <div class="col-xs-6 text-center">
                     <i class="fa fa-3x fa-thumbs-up"></i><span class="badge">{{$product->likes->count()}}</span>
                   </div>
                   <div class="col-xs-6 text-center">
                     <i class="fa fa-3x fa-comment"></i><span class="badge">{{$product->comments->count()}}</span>
                   </div>
                 </div>
                   <div class="row col-xs-4 col-sm-12"><h3><b>{{ __('page.category') }}</b> <a href="{{ route('products-category', $product->category->slug)}}">{{$product->category->name}}</a></h3> </div>
                   <div class="row">
                     <div class="col-xs-8"><h4><b>{{ __('page.company') }}</b> <a href="{{route('company',$product->company->slug)}}"><br>{{Str::limit($product->company->title, 10)}}</a></h4></div>
                     <h4 class="col-xs-4"><b>{{ __('page.price') }}</b> <br>€ {{ $product->price }}</h4>
                   </div>
                   <div class="row">
                     <div class="col-xs-6">
                       <form id="cartstore" action="{{ route('cart.store') }}" method="post">
                         {{ csrf_field() }}
                         <input type="hidden" name="id" value="{{ $product->id }}">
                         <input type="hidden" name="title" value="{{ $product->title }}">
                         <input type="hidden" name="price" value="{{ $product->price }}">
                         <input id="btn" type="submit" class="btn btn-primary btn-block" value="{{__('single.addtocart')}}">
                       </form>
                       {{-- <script type="text/javascript">
                       function formSubmit()
        {
          alert("{{__('form.cartconfirm')}}");
            $("#cartstore").submit();
        }
                       </script> --}}
                     </div>
                     <div class="col-xs-6"></div>
                   </div>
               </div>
             </div>
           @endforeach
           <br>
           @else
             <div class="col-xs-12 noresults">
               <h1><b>{{__('page.noresults')}}</b></h1>
             </div>
         @endif

       </div>

      <div class="col-xs-9">
      	{{ $products->links() }}
      </div>

     </div>
     <!-- /.row -->


   </div>
   <!-- /.container -->
</div>
<br>
@endsection
