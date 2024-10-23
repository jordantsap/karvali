
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->

    <ul class="sidebar-menu">
        <li class="active"><a href="{{ route('admin.dashboard') }}">
          <i class="fas fa-tachometer-alt"></i> <span>{{ Auth::user()->username}} : {{ Auth::user()->id}}</span></a>
        </li>
        <li> <a>
            <i class="fas fa-tachometer-alt"></i>
            <span> {{ auth()->user()->getRoleNames()}}</a> </span></li>

{{--        <li class="dropdown">--}}
{{--            <a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
{{--                {{__('sidebar.langswitch')}}--}}
{{--                <i class="fas fa-lg fa-globe"></i>--}}
{{--                {{ app()->getLocale() }}--}}
{{--            </a>--}}
{{--            <ul class="dropdown-menu" style="background-color: #0E2231">--}}
{{--                @foreach (config('translatable.locales') as $lang => $language)--}}
{{--                    @if ($lang != app()->getLocale())--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('lang.switch', $lang) }}">--}}
{{--                                {{ $language }}--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </li>--}}

        @hasanyrole('Super-Admin|Admin')

        <!-- <li><a href="{{ route('admin.adverts.index') }}">
          <i class="fas fa-puzzle-piece"></i> <span>Adverts!</span></a>
        </li> -->

        <!-- <li><a href="{{ route('admin.albums.index') }}">
          <i class="fas fa-images"></i> <span>Albums</span></a>
        </li> -->

        <!-- <li><a href="{{ route('admin.photos.index') }}">
          <i class="fas fa-images"></i> <span>Album Photos</span></a>
        </li> -->

          <li><a href="{{ route('admin.roles.index') }}">
            <i class="fas fa-users-cog"></i> <span>Roles</span></a>
          </li>

          <li><a href="{{ route('admin.permissions.index') }}">
            <i class="fas fa-user-plus"></i> <span>Permissions</span></a></li>

          <li><a href="{{ route('admin.users.index') }}">
            <i class="fas fa-user"></i> <span>Users</span></a></li>

        <li><a href="{{ route('admin.newsletters.index') }}"><i class="fas fa-book"></i> <span>Newsletters</span></a></li>

        <li><a href="{{ route('admin.accommodations.index') }}"><i class="fas fa-book"></i> <span>Accommodations</span></a></li>

        <li><a href="{{ route('admin.accommodation-types.index') }}"><i class="fas fa-book"></i> <span>Accommodation Types</span></a></li>

        <li><a href="{{ route('admin.posts.index') }}">
          <i class="fas fa-newspaper"></i> <span>Posts</span></a></li>

        <li><a href="{{ route('admin.companies.index') }}">
          <i class="fas fa-shopping-bag"></i> <span>Companies</span></a></li>

        <li><a href="{{ route('admin.company-types.index') }}">
                <i class="fas fa-shopping-cart" aria-hidden="true"></i> <span>Company Types</span></a></li>


          <li><a href="{{ route('admin.products.index') }}">
            <i class="fas fa-shopping-cart" aria-hidden="true"></i> <span>Products</span></a></li>

        <li><a href="{{ route('admin.product-types.index') }}">
                <i class="fas fa-shopping-cart" aria-hidden="true"></i> <span>Product Types</span></a></li>

        <li><a href="{{ route('admin.attributes.index') }}">
                <i class="fas fa-shopping-cart" aria-hidden="true"></i> <span>Attributes</span></a></li>

            <li><a href="{{ route('admin.teams.index') }}">
                    <i class="fas fa-users" aria-hidden="true"></i> <span>Groups/Teams</span></a></li>

          <li><a href="{{ route('admin.events.index') }}">
            <i class="fas fa-calendar" aria-hidden="true"></i> <span>Events</span></a></li>
        @endhasanyrole

        @include('auth.sidebar')

        <li>
          <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt" aria-hidden="true"></i> <span>{{ __('form.logout') }}</span>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
      </li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
