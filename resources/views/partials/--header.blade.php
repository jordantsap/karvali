@include('partials.top')
<header>
  <nav class="navbar navbar-inverse" style="border-radius: 0px;">
    <div class="container">
      <div class="navbar-header">

        <!-- Collapsed Hamburger -->
        <a type="button" class="btn navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse"
          aria-expanded="false">
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <!-- Branding Image -->
        <a class="navbar-brand" href="{{ url('/') }}">
          {{-- <img src="{{asset('favicon.ico')}}" alt=""> --}} {{ config('app.name')
          }}
        </a>
      </div>

      <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <!-- Left Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="{{ url('companies') }}">{{ __('header.companies') }}
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li>
            <a href="{{ url('products') }}">{{ __('header.products') }}</a>
          </li>
          <li>
            <a href="{{ url('groups') }}">{{ __('header.groups') }}</a>
          </li>
          <li>
            <a href="{{ url('events') }}">{{ __('header.events') }}</a>
          </li>
          {{--
          <li>
            <a href="{{ url('blog') }}">{{ __('header.blog') }}</a>
          </li> --}}
          <li>
            <a href="{{ route('contact') }}">{{ __('header.contact') }}</a>
          </li>
          {{-- </ul>

        <ul class="nav navbar-nav navbar-center" style="margin-top:7px;"> --}} {{--
          <li>
            <a class="btn btn-info" title="Add new" data-toggle="modal" data-target="#newmodal"
              title="new">{{ __('header.addnew') }} <i class="fas fa-lg fa-plus-circle"></i></a>
          </li>
          --}} {{-- </ul>

        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right"> --}}
          <!-- Authentication Links -->
          @guest
          <li>
            <a href="{{ route('login') }}"><i title="Login" class="fas fa-lg fa-sign-in-alt"></i></a>
          </li>

          <li>
            <a href="{{ route('register') }}" title="Register">
				Register
				{{--<i class="fas fa-lg fa-user"></i>--}}
				</a>
          </li>
          @else
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
              aria-haspopup="true">
              {{-- {{ str_limit(Auth::user()->name, 10) }} --}}
              <i class="fas fa-lg fa-user"></i>
              <span class="caret"></span>
            </a>

            <ul class="dropdown-menu">
              <li>
                <a href="{{ route('dashboard') }}">{{ __('header.account') }}</a>
              </li>
              {{--
              <li>
                <a href="{{ url('profile') }}">{{ __('header.profile') }}</a>
              </li> --}} {{--
              <li>
                <a href="{{ url('/payments') }}">{{ __('header.payments') }}</a>
              </li> --}}
              <li role="separator" class="divider"></li>
              <li>
                <a href="{{ route('help') }}">{{ __('header.help') }}</a>
              </li>
              <li>
                <a href="{{ route('termsofuse') }}">{{ __('header.terms') }}</a>
              </li>
              <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
																						 document.getElementById('logout-form').submit();">
                  {{ __('form.logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </li>
          @endguest
            <li class="hidden-xs">
              <a class="" title="New" data-toggle="modal" data-target="#newmodal" title="new">
                <i class="fas fa-lg fa-plus-circle"></i></a>
            </li>
            {{-- <li class="hidden-xs">
              <a class="" title="How to" id="click" onclick="show('top')" name="click">
              <i class="fas fa-lg fa-question-circle"></i></a>
            </li> --}}
            <li class="hidden-xs dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <i class="fa fa-lg fa-shopping-cart" aria-hidden="true"></i>
                @if (Cart::count() >= 1)
                  <span class="badge">{{ Cart::count() }}</span>
                @endif
              </a>
              <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="cart">
                {{-- <div class=""> --}}
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
                  <a href="{{route('products.index')}}" class="list-group-item">{{ __('cart.gotoproducts') }}</a>
                  <a href="{{route('companies.index')}}" class="list-group-item">{{ __('cart.gotocompanies') }}</a>
                  <a href="{{route('groups.index')}}" class="list-group-item">{{ __('cart.gotogroups') }}</a>
                  <a href="{{route('events.index')}}" class="list-group-item">{{ __('cart.gotoevents') }}</a>
                  @endif
                {{-- </div> --}}
              </ul>
            </li>
            <li class="hidden-xs dropdown">
              <a class="dropdown-toggle" type="button" id="language" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="true"><i class="fas fa-lg fa-globe"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="language">
                <li>
                  <a href="#">Ελληνικά</a>
                </li>
                <li role="separator" class="divider"></li>
                <li>
                  <a href="#">English</a>
                </li>
              </ul>
            </li>

        </ul>
      </div>
    </div>
  </nav>
</header>
</div>
