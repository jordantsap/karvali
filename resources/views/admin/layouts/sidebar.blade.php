
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->

    <ul class="sidebar-menu">
        <li class="active"><a href="{{ route('dashboard') }}">
          <i class="fas fa-tachometer-alt"></i> <span>{{ Auth::user()->username}} : {{ Auth::user()->id}}</span></a>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                {{__('sidebar.langswitch')}}
                <i class="fas fa-lg fa-globe"></i>
                {{ app()->getLocale() }}
            </a>
            <ul class="dropdown-menu" style="background-color: #0E2231">
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
        </li>

        @hasanyrole('Super-Admin|Admin')

        <li><a href="{{ route('adverts.index') }}">
          <i class="fas fa-puzzle-piece"></i> <span>Adverts!</span></a>
        </li>
        @endhasanyrole
         @can ('view_albums', App\Models\Album::class)
        <li><a href="{{ route('albums.index') }}">
          <i class="fas fa-images"></i> <span>Albums</span></a>
        </li>
         @endcan
         @can ('view_albums', App\Models\AlbumPhoto::class)
        <li><a href="{{ route('photos.index') }}">
          <i class="fas fa-images"></i> <span>Album Photos</span></a>
        </li>
         @endcan
        @can ('view_roles', App\Models\Role::class)
          <li><a href="{{ route('roles.index') }}">
            <i class="fas fa-users-cog"></i> <span>Roles</span></a>
          </li>
        @endcan
        @can ('view_permissions', App\Models\Permissions::class)
          <li><a href="{{ route('permissions.index') }}">
            <i class="fas fa-user-plus"></i> <span>Permissions</span></a></li>
        @endcan
        @can ('view_users', App\Models\User::class)
          <li><a href="{{ route('users.index') }}">
            <i class="fas fa-user"></i> <span>Users</span></a></li>
        @endcan
        @hasanyrole('Super-Admin|Admin')
        <li><a href="{{ route('newsletters.index') }}"><i class="fas fa-book"></i> <span>Newsletters</span></a></li>
        @endhasanyrole
        @can ('view_posts', App\Models\Post::class)
        <li><a href="{{ route('posts.index') }}">
          <i class="fas fa-newspaper"></i> <span>Posts</span></a></li>
        @endcan
        @can ('view_companies', App\Models\Company::class)
        <li><a href="{{ route('companies.index') }}">
          <i class="fas fa-shopping-bag"></i> <span>Companies</span></a></li>
        @endcan
        @can ('view_groups', App\Models\Group::class)
          <li><a href="{{ route('teams.index') }}">
            <i class="fas fa-users" aria-hidden="true"></i> <span>Groups/Teams</span></a></li>
          @endcan
        @can ('view_products', App\Models\Product::class)
          <li><a href="{{ route('prods.index') }}">
            <i class="fas fa-shopping-cart" aria-hidden="true"></i> <span>Products</span></a></li>
        @endcan
        @can ('view_events', App\Models\Event::class)
          <li><a href="{{ route('events.index') }}">
            <i class="fas fa-calendar" aria-hidden="true"></i> <span>Events</span></a></li>
        @endcan

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
