{{-- <div id="top" style="display:none">
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <span class="howtohead text-center">
        <h3>{{ __('page.howtoheader') }}</h3>
        <div class="divider"></div>
      </span>
    </div>
    <a style="position:absolute;top:10px;left:10px;" class="" id="close" onclick="hide('top')"><i class="fa fa-2x fa-window-close"></i></a>
  </div>
  <div class="row howtoinner">
    <div class="col-xs-4">
      <i class="fas fa-6x fa-user"></i>
    </div>
    <div class="col-xs-4 text-center">
      <i class="fas fa-6x fa-globe"></i>
    </div>
    <div class="col-xs-4 text-center">
      <i class="fas fa-6x fa-calendar-check"></i>
    </div>
  </div>
</div>
</div> --}}

<div class="hidden-md hidden-lg" style="background-color:white;">
  <nav class="navbar-inverse" style="border-radius: 0px !important;">
    <div class="container">
      <div class="">
        <div id="followus" class="col-xs-6" style="padding-top: 6px;padding-right: 6px;">
            <a href="https://www.facebook.com/NeaKarvaliGuide/" title="Follow us on Facebook" target="_blank"><i class="fab fa-2x fa-facebook-square"></i></a> |
            <a href="https://twitter.com/nea_karvali_gr" title="Follow us on Twitter" target="_blank"><i class="fab fa-2x fa-twitter"></i></a>
            <a href="https://www.linkedin.com/in/neakarvalicityguide/" title="Follow us on Linkedin" target="_blank"><i class="fab fa-2x fa-linkedin"></i></a> |
            <a href="https://www.instagram.com/nea_karvali_gr/" title="Follow us on Instagram" target="_blank"><i class="fab fa-2x fa-instagram"></i></a> |
        </div>
        {{-- <div class="col-xs-2" style="padding-top:6px;padding-left:5px;">
          <a class="" title="help" id="click" onclick="show('top')" name="click"> <i class="fas fa-2x fa-question-circle"></i></a>
        </div> --}}
        {{-- <div class="col-xs-1" style="padding-top:6px;">
          <a class="" title="New" data-toggle="modal" data-target="#newmodal" title="new"><i class="fas fa-2x fa-plus-circle"></i></a>
        </div> --}}
        <div class="col-xs-4" style="padding-top: 6px;">
          <div class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              <i class="fa fa-2x fa-shopping-cart" aria-hidden="true"></i>
              @if (Cart::count() >= 1)
              <span class="badge">{{ Cart::count() }}</span>
              @endif
            </a>
          <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="cart">
            <div class="">
              @if(Cart::count() == 1)
              <li class="list-group-item">{{ Cart::count() }} {{ __('cart.productincart') }}</li>
              <li class="list-group-item">{{ __('cart.totalcart') }} {{ Cart::total() }}€</li>
              <a class="list-group-item" href="{{ route('cart.index') }}">{{ __('cart.cart') }}</a>
            @elseif(Cart::count() > 1)
              <li class="list-group-item">{{ Cart::count() }} {{ __('cart.productsincart') }}</li>
              <li class="list-group-item">{{ __('cart.totalcart') }} {{ Cart::total() }}</li>
              <a class="list-group-item" href="{{ route('cart.index') }}">{{ __('cart.cart') }}</a>
            @else
              <li class="list-group-item">{{ __('cart.nocart') }}</li>
                <a href="{{route('product.index')}}" class="list-group-item">{{ __('cart.gotoproducts') }}</a>
                <a href="{{route('company.index')}}" class="list-group-item">{{ __('cart.gotocompanies') }}</a>
                <a href="{{route('group.index')}}" class="list-group-item">{{ __('cart.gotogroups') }}</a>
                <a href="{{route('events.index')}}" class="list-group-item">{{ __('cart.gotoevents') }}</a>
            @endif
          </div>
        </ul>
        </div>

        </div>

        <div class="col-xs-2" style="padding-top:6px;padding-left:0px;">
          <div class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  {{ app()->getLocale() }}
                  <i class="fas fa-2x fa-globe"></i>
              </a>
              <ul class="dropdown-menu">
                  @foreach (config('translatable.locales') as $lang => $language)
                      @if ($lang != app()->getLocale())
                          <li>
                              <a href="{{ route('late-lang.switch', $lang) }}">
                                  {{ $language }}
                              </a>
                          </li>
                      @endif
                  @endforeach
              </ul>
          </div>
        </div>

      </div>
    </div>
  </nav>
</div>
