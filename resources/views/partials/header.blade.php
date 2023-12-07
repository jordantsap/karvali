<header class="main-header">
    <nav class="navbar navbar-inverse navbar-fixed-top" style="border-radius:0px;">
        {{-- @include('partials.top') --}}
        <div class="container-fluid">
            <div class="">

                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ route('front.homepage') }}">
                        <span class="glyphicon glyphicon-map-marker" style="font-size:19px;" aria-hidden="true"></span>
                        {{ config('app.name') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        {{-- <ul class="nav navbar-nav"> --}}
                            <li>
                                <a href="{{ route('front.accommodations') }}">{{ __('header.accommodation') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.companies') }}">{{ __('header.companies') }}
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            {{-- <li>--}}
                                {{-- <a href="{{ route('front.products') }}">{{ __('header.products') }}</a>--}}
                                {{-- </li>--}}
                            <li>
                                <a href="{{ route('front.venues') }}">{{ __('header.venues') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('front.events.index') }}">{{ __('header.events') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('front.news') }}">{{ __('header.posts') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('front.groups') }}">{{ __('header.groups') }}</a>
                            </li>
                            <li>
                                <a title="Camera Views" href="{{ route('online-cameras') }}">
                                    <span class="glyphicon glyphicon-camera" style="font-size:19px;"
                                        aria-hidden="true"></span>
                                </a>
                            </li>

                            <li class="dropdown">
                                <a id="infoMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <span class="glyphicon glyphicon-info-sign" style="font-size:19px;"
                                        aria-hidden="true"></span>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="infoMenu">
                                    <li class="list-group-item">
                                        <a href="{{ route('contact') }}">{{ __('header.contact') }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{ route('about') }}">{{ __('sidebar.aboutus') }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{ route('services')}}">{{ __('sidebar.services') }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{ route('termsofuse')}}">{{ __('sidebar.termsofuse') }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{ route('privacy')}}">{{ __('sidebar.privacy') }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{ route('personaldata')}}">{{ __('sidebar.personaldata') }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{ route('help')}}">{{ __('sidebar.help') }}</a>
                                    </li>
                                </ul>
                            </li>
                            {{--
                        </ul>--------------- --}}
                        <li class="dropdown">
                            @guest()
                            {{-- @guest('customer') --}}
                            <a href="{{url('manage')}}">
                                {{-- data-toggle="dropdown" aria-expanded="false"
                                aria-haspopup="true" id="user"> --}}
                                {{-- {{ __('header.account') }} --}}
                                <span class="glyphicon glyphicon-user" style="font-size:19px;"
                                    aria-hidden="true"></span>

                                <span class="caret"></span>
                            </a>
                            {{-- @endguest --}}
                            @endguest
                            @auth ('web')
                            <a href="{{url('manage')}}">
                                {{-- class="dropdown-toggle" data-toggle="dropdown web" aria-expanded="false"
                                aria-haspopup="true" id="web"> --}}
                                {{-- {{ str_limit(Auth::user()->username, 7) }} --}}
                                <span class="glyphicon glyphicon-user" style="font-size:19px;"
                                    aria-hidden="true"></span>
                                <span class="caret"></span>
                            </a>
                            @endauth
                            {{-- @auth ('customer')
                            <a class="dropdown-toggle" data-toggle="dropdown customer" role="button"
                                aria-expanded="false" aria-haspopup="true" id="customer">
                                {{ Auth::guard('customer')->user()->name }}
                                <span class="caret"></span>
                            </a>
                            @endauth --}}
                            <!------------------------>
                            <ul class="dropdown-menu">
                                {{-- <li>
                                    <a>{{ __('header.admin') }}:</a>
                                </li> --}}
                                @guest('web')
                                <li>
                                    <a href="{{ route('userlogin') }}">{{ __('header.login') }}</a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="{{ route('register.customer') }}">{{ __('header.register') }}</a>
                                </li>
                                @endguest
                                @auth('web')
                                <li>
                                    <a href="{{ route('admin.dashboard') }}">{{ __('header.account') }}</a>
                                </li>

                                <li>
                                    <a href="{{ route('front.bookings.booking_cart') }}">{{ __('Your Bookings') }}</a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="{{ route('help') }}">Οδηγίες</a>
                                </li>
                                <li>
                                    <a href="{{ route('termsofuse') }}">Όροι</a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
            																					 document.getElementById('logout-form').submit();">Αποσύνδεση
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                @endauth

                                {{-- <li role="separator" class="double divider"></li>
                                <li>
                                    <a>{{ __('header.client') }}:</a>
                                </li>
                                <li role="separator" class="divider"></li> --}}
                                {{-- @guest('customer')
                                <li>
                                    <a href="{{ route('customer.login') }}">{{ __('header.login') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('customer.register') }}">{{ __('header.register') }}</a>
                                </li>
                                @endguest @auth('customer')
                                <li>
                                    <a href="{{ route('customer.index') }}">Λογαριασμός</a>
                                </li>
                                <li>
                                    <a href="{{ route('customer.edit') }}">Προφίλ</a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="{{ route('customer.logout') }}"
                                        onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">Αποσύνδεση
                                    </a>

                                    <form id="logout-form" action="{{ route('customer.logout') }}" method="POST"
                                        style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                @endauth --}}
                            </ul>
                        </li>
                        {{--
                    </ul> --}}
                    <li class="dropdown">
                        <a href="{{ route('cart.index') }}" class="dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="true">
                            <span class="glyphicon glyphicon-shopping-cart" style="font-size:19px;"
                                aria-hidden="true"></span>
                            @if (Cart::count() >= 1)
                            <span class="badge">{{ Cart::count() }}</span>
                            @endif
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="cart">
                            @if(Cart::count() == 1)
                            <li class="list-group-item">{{ Cart::count() }} {{ __('cart.productincart') }}</li>
                            <li class="list-group-item">{{ __('cart.total') }} {{ Cart::total() }}€</li>
                            <a class="list-group-item" href="{{ route('cart.index') }}">{{ __('cart.cart') }}</a>
                            <li class="list-group-item">
                                <form action="{{ route('cart.clean')}}" method="post">
                                    {{ csrf_field() }}
                                    <button title="{{__('cart.cleantitle')}}" type="submit" class="btn btn-danger"
                                        value="Remove">{{__('cart.clean')}}</button>
                                </form>
                            </li>
                            @elseif(Cart::count() > 1)
                            <li class="list-group-item">{{ Cart::count() }} {{ __('cart.productsincart') }}</li>
                            <li class="list-group-item">{{ __('cart.total') }} {{ Cart::total() }}</li>
                            <a class="list-group-item" href="{{ route('cart.index') }}">{{ __('cart.cart') }}</a>
                            <li class="list-group-item">
                                <form action="{{ route('cart.clean')}}" method="post">
                                    {{ csrf_field() }}
                                    <button title="{{__('cart.cleantitle')}}" type="submit" class="btn btn-danger"
                                        value="Remove">{{__('cart.clean')}}</button>
                                </form>
                            </li>
                            @else
                            <li class="list-group-item">{{ __('cart.nocart') }}</li>
                            {{-- <a href="{{route('front.products')}}" class="list-group-item">{{
                                __('cart.gotoproducts') }}</a>--}}
                            <a href="{{route('front.companies')}}" class="list-group-item">{{ __('cart.gotocompanies')
                                }}</a>
                            @endif
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-bed" style="font-size:19px;" aria-hidden="true"></span>
                        </a>
                        <ul class="dropdown-menu">
                            @foreach(App\Models\Booking::all() as $booking)
                            {{$booking->count()}}
                            @endforeach
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            {{ app()->getLocale() }}
                            <i class="fas fa-lg fa-globe"></i>
                        </a>
                        <ul class="dropdown-menu">
                            @foreach (config('translatable.locales') as $lang => $language)
                            @if ($lang != app()->getLocale())
                            <li>
                                <a href="{{ route('lang.switch', $lang) }}">
                                    {{ $language }}
                                </a>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
{{-- @include('modals.new') --}}