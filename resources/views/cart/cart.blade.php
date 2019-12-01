@extends('layouts.main')
@section('title', __('head.cartpagetitle'))
@section('meta_description', __('meta.cartpagedescription'))
@section('meta_keywords', 'shopping cart, product cart,')

@section('content')
<!-- Page Content -->
<div class="container">
  <div id="pages">
    <div class="row">
      <div class="col-xs-12">

        <h1 class="text-center"><a class="btn btn-success" href="javascript:history.back()">{{__('cart.goback')}}</a> - {{__('cart.cart')}}</h1>
        <div class="divider"></div>
        {{-- <h1><img src="{{ asset('images/under_construction.gif') }}" width="100%" height="250px"></h1> --}}
      </div>
      <div class="col-xs-12">
        @if(Cart::count() == 1)
        <h3 class="col-xs-6 text-center">{{__('cart.total')}} {{ Cart::count() }} {{__('cart.productincart')}}</h3>
      @elseif(Cart::count() > 1)
        <h3 class="col-xs-6 text-center">{{__('cart.total')}} {{ Cart::count() }} {{__('cart.productsincart')}}</h3>
      @else
        <h3 class="col-xs-8 col-xs-offset-2">{{__('cart.noproductincart')}}
      @endif
    </div>
    <div class="col-xs-12">
        <div class="col-xs-12">
        <div class="table-responsive">
          <table class="table">
            @foreach(Cart::content() as $item)
            <thead class="bg-primary">
              <tr>
                <th>{{__('cart.image')}}</th>
                <th>{{__('cart.name-company')}}</th>
                <th>{{__('cart.productcode')}}</th>
                <th>{{__('cart.productdescription')}}</th>
                <th>{{__('cart.quantity')}}</th>
                <th>{{__('cart.price')}}</th>
                <th>{{__('Actions')}}</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td><img src="{{ asset('images/products/'.$item->model->logo) }}" alt="{{ $item->model->title }}" width="100px" height="100px"></td>
                <td>{{ $item->model->title }}<br>
                  <div class="divider"></div>
                  <a target="_blank" href="{{route('company',$item->model->company->slug)}}">{{ $item->model->company->title }}</a>
                </td>
                <td>{{ str_limit($item->model->sku, 50) }}</td>
                <td>{{ str_limit($item->model->description,50) }}</td>
                <td class="text-center">
                  <select class="quantity" data-id="{{ $item->rowId }}">
                      <option {{ $item->qty == 1 ? 'selected' : '' }}>1</option>
                      <option {{ $item->qty == 2 ? 'selected' : '' }}>2</option>
                      <option {{ $item->qty == 3 ? 'selected' : '' }}>3</option>
                      <option {{ $item->qty == 4 ? 'selected' : '' }}>4</option>
                      <option {{ $item->qty == 5 ? 'selected' : '' }}>5</option>
                      <option {{ $item->qty == 6 ? 'selected' : '' }}>6</option>
                      <option {{ $item->qty == 7 ? 'selected' : '' }}>7</option>
                      <option {{ $item->qty == 8 ? 'selected' : '' }}>8</option>
                      <option {{ $item->qty == 9 ? 'selected' : '' }}>9</option>
                      <option {{ $item->qty == 10 ? 'selected' : '' }}>10</option>
                  </select>
                </td>
                <td>{{ $item->subtotal }}€</td>
                <td><a target="_blank" href="{{route('product',$item->model->slug) }}" class="btn btn-primary btn-block">{{__('cart.product')}}</a>
                  <br>
                  <form action="{{ route('cart.destroy', $item->rowId)}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger" value="Remove">{{__('cart.remove')}}</button>
                  </form>
                </td>
              </tr>

            </tbody>
            @endforeach
          </table>

        </div>

      </div>
      @if(Cart::count() > 0)
      <div class="col-xs-12">
        <h1 class="text-center">{{__('cart.orderdetails')}}</h1>
        <div class="divider"></div>
        <br>
      </div>
      {{-- CART DETAILS --}}
      <div class="col-xs-8">
        <div class="panel panel-primary">
          <ul class="list-group">
            <li class="list-group-item">{{__('cart.tax').' '.config('cart.tax')}}% : {{ Cart::tax() }} €</li>
            <li class="list-group-item">{{__('cart.subtotal')}}: {{ Cart::subtotal() }} €</li>
            <li class="list-group-item">{{__('cart.finaltotal')}}: {{ Cart::total() }} €</li>
          </ul>
        </div>
      </div>
      <div class="col-xs-4">
        {{-- ACTIONS --}}
        @if(Cart::count() > 0)
        <div class="text-center">
          <div class="btn btn-block">
            <a href="{{route('front.products')}}" class="btn btn-primary">{{__('cart.gotoproductpage')}}</a>
          </div>
          <div class="btn btn-block">
              <form action="{{ route('cart.clean')}}" method="post">
                {{ csrf_field() }}
                <button title="{{__('cart.cleantitle')}}" type="submit" class="btn btn-danger" value="Remove">{{__('cart.clean')}}</button>

              </form>
          </div>
        </div>
        @endif
      </div>
    @endif

      </div>
    </div><br> <!----main row end--->

  </div>
</div>
@include('cart.checkout')
@endsection
@section('extra-js')

  {{-- <script src="{{ asset('js/jquery.min.js') }}"></script> --}}
    <script>
        (function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.quantity').on('change', function() {
                var id = $(this).attr("data-id")
                $.ajax({
                  type: "PATCH",
                  url: '{{ route("cart.index") }}' + '/' + id,
                  data: {
                    'quantity': this.value,
                  },
                  success: function(data) {
                    // console.log(id);
                    window.location.href = '{{ route('cart.index') }}';
                  }
                });

            });

        })();

    </script>

@endsection
