{{-- @extends('layouts.main')
@section('title', __('head.checkoutpagetitle'))
@section('meta_description', __('meta.checkoutpagedescription'))
@section('meta_keywords', 'shopping basket, shop checkout, pay with,')

@section('content') --}}

<div class="container">
  <div id="pages">
    <div class="row">
      <div class="col-xs-12">

        <h1 class="text-center">{{__('cart.checkout')}}</h1>
        <div class="divider"></div>
        {{-- <h1><img src="{{ asset('images/under_construction.gif') }}" width="100%" height="250px"></h1> --}}
      </div>
      <div class="col-xs-6">
        <form id="checkout-form" action="{{ route('order.store') }}" method="POST" id="payment-form">
          {{ csrf_field() }}
          <h2>{{__('cart.orderdetails')}}</h2>

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email">Email</label>
            @if (Auth::guard('customer')->user())
            <input type="email" class="form-control" id="email" name="email" value="{{ auth('customer')->user()->email }}"  required readonly>
            @else
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"  required>
            @endif
          </div>
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name">{{__('cart.buyername')}}</label>
            @if ($errors->has('name'))
              <strong class="text-danger">{{ $errors->first('name') }}</strong>
            @endif
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"  required>
          </div>

          <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
            <label for="city">{{__('cart.buyercity')}}</label>
            @if ($errors->has('city'))
              <strong class="text-danger">{{ $errors->first('city') }}</strong>
            @endif
            <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required>
          </div>

          <div class="form-group{{ $errors->has('province') ? ' has-error' : '' }}">
              <label for="province">{{__('cart.buyerarea')}}</label>
              @if ($errors->has('province'))
                <strong class="text-danger">{{ $errors->first('province') }}</strong>
              @endif
              <input type="text" class="form-control" id="province" name="province" value="{{ old('province') }}"  required>
          </div>
          <!-- end half-form -->

          <div class="row">
            <div class="col-xs-12">
              <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                <label for="address">{{__('cart.buyeraddress')}}</label>
                @if ($errors->has('address'))
                  <strong class="text-danger">{{ $errors->first('address') }}</strong>
                @endif
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}"  required>
              </div>
          </div>
          </div>

          <div class="row">
            <div class="col-xs-6">
              <div class="form-group{{ $errors->has('postalcode') ? ' has-error' : '' }}">
                <label for="postalcode">{{__('cart.buyerareacode')}}</label>
                @if ($errors->has('postalcode'))
                  <strong class="text-danger">{{ $errors->first('postalcode') }}</strong>
                @endif
                <input type="text" class="form-control" id="postalcode" name="postalcode" value="{{ old('postalcode') }}"  required>
              </div>
              </div>
              <div class="col-xs-6">
              <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <label for="phone">{{__('cart.buyertelephone')}}</label>
                @if ($errors->has('phone'))
                  <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                @endif
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}"  required>
              </div>
            </div>
          </div>
          <!-- end half-form -->
          <div class="form-group{{ $errors->has('otherinfo') ? ' has-error' : '' }}">
            <label for="otherinfo">{{__('cart.buyerotherinfo')}}</label>
            @if ($errors->has('otherinfo'))
              <strong class="text-danger">{{ $errors->first('otherinfo') }}</strong>
            @endif
            <div class="input-group">
              <textarea name="otherinfo" id="otherinfo" class="form-control"
                rows="5">{{ old('otherinfo') }}</textarea>
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-info-sign"></span>
              </span>
            </div>
          </div>

          <button type="submit" onclick="this.form.submit(); this.disabled=true; this.value='Sending…';" id="complete-order" class="btn btn-default btn-block">{{__('cart.sendorder')}}</button>
        </form>
      </div>

      <div class="col-xs-6">
        <h2>{{__('cart.costs')}}</h2>
          <table class="table">
            <thead>
              <tr>
                <th class="text-center">{{__('cart.tax').' '.config('cart.tax')}}% :</th>
                <th class="text-center">{{__('cart.subtotal')}}:</th>
                <th class="text-center">{{__('cart.finaltotal')}}:</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-center">{{ Cart::tax() }}</td>
                <td class="text-center">{{ Cart::subtotal() }}</td>
                <td class="text-center">{{ Cart::total() }}</td>
              </tr>
            </tbody>
          </table>
          <div class="divider"></div><br>

        <div class="row">
          @foreach (Cart::content() as $item)
          <div class="col-xs-12">
            <div class="col-xs-6">
              <img src="{{ asset('images/products/'.$item->model->logo) }}" class="img-responsive" alt="item">
              <div class=""><br>
                <b>{{__('cart.productdescription')}}:</b></br>{{ str_limit($item->model->description, 100) }}</div>
            </div>
            <div class="col-xs-6">
              <ul class="list-group">
                <li class="list-group-item">{{__('cart.productname')}}: {{ $item->model->title }}</li>
                <li class="list-group-item">{{__('cart.quantity')}}:
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
                </li>
                <li class="list-group-item">{{__('cart.price')}}: {{ $item->model->price }} €</li>
                <li class="list-group-item">{{__('cart.tax').' '.config('cart.tax')}}% : {{ $item->tax() * $item->qty }} €</li>
                <li class="list-group-item">{{__('cart.subtotal')}}: {{ $item->subtotal() }} €</li>
                <li class="list-group-item">{{__('cart.total')}}: {{ $item->total() }} €</li>
              </ul>
            </div>
            <!-- end checkout-table -->

            {{-- <div class="">
              <div class="col-xs-12">{{ $item->model->description }}</div>
            </div> --}}

          </div> <!--COL-XS-12-->

          <div class="col-xs-12"><br>
            <div class="col-xs-6">
              <a href="{{route('front.products')}}" class="btn btn-primary btn-block">{{__('cart.continuebuy')}}</a>
            </div>
            <div class="col-xs-6">
              <form action="{{ route('cart.destroy', $item->rowId)}}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" onclick="this.disabled=true;this.value='Sending, please wait...';this.form.submit();" class="btn btn-danger btn-block" value="Remove">{{__('cart.remove')}}</button>
              </form>
            </div>
          </div>
          <div class="col-xs-12"><br>
            <div class="divider"></div><br>
          </div>
          @endforeach

          <div class="col-xs-12">
            <h2>{{__('cart.costs')}}</h2>
            <div class="">
              <table class="table">
                <thead>
                  <tr>
                    <th class="text-center">{{__('cart.tax').' '.config('cart.tax')}}% :</th>
                    <th class="text-center">{{__('cart.subtotal')}}:</th>
                    <th class="text-center">{{__('cart.total')}}:</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center">{{ Cart::tax() }}</td>
                    <td class="text-center">{{ Cart::subtotal() }}</td>
                    <td class="text-center">{{ Cart::total() }}</td>
                  </tr>
                </tbody>
              </table>
              <div class="divider"></div><br>
            </div>
          </div>

        </div>
        <!-- end checkout-table -->


      </div>

    </div>
  <!-- end checkout-section -->
  </div>
</div>
<br>
{{-- @endsection --}}

{{-- @section('extra-js')
    <script>
        (function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.quantity').on('change', function() {
                var id = $(this).attr('data-id')
                $.ajax({
                  type: "PATCH",
                  url: '{{ url("/cart") }}' + '/' + id,
                  data: {
                    'quantity': this.value,
                  },
                  success: function(data) {
                    window.location.href = '{{ url('/cart') }}';
                  }
                });

            });

        })();

    </script>

@endsection --}}
