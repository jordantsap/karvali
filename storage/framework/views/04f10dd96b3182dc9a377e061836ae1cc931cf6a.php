
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="active"><a href="<?php echo e(route('dashboard')); ?>">
          <i class="fas fa-tachometer-alt"></i> <span><?php echo e(Auth::user()->username); ?> : <?php echo e(Auth::user()->id); ?></span></a>
        </li>
        <?php if(auth()->check() && auth()->user()->hasAnyRole('Super-Admin|Admin')): ?>
        <li><a href="<?php echo e(route('adverts.index')); ?>">
          <i class="fas fa-puzzle-piece"></i> <span>Adverts!</span></a>
        </li>
        <?php endif; ?>
        
        <li><a href="<?php echo e(route('albums.index')); ?>">
          <i class="fas fa-images"></i> <span>Albums</span></a>
        </li>
        
        
        <li><a href="<?php echo e(route('photos.index')); ?>">
          <i class="fas fa-images"></i> <span>Album Photos</span></a>
        </li>
        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_roles', App\Role::class)): ?>
          <li><a href="<?php echo e(route('roles.index')); ?>">
            <i class="fas fa-users-cog"></i> <span>Roles</span></a>
          </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_permissions', App\Permissions::class)): ?>
          <li><a href="<?php echo e(route('permissions.index')); ?>">
            <i class="fas fa-user-plus"></i> <span>Permissions</span></a></li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_users', App\User::class)): ?>
          <li><a href="<?php echo e(route('users.index')); ?>">
            <i class="fas fa-user"></i> <span>Users</span></a></li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_posts', App\Post::class)): ?>
        <li><a href="<?php echo e(route('posts.index')); ?>">
          <i class="fas fa-newspaper"></i> <span>Posts</span></a></li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_companies', App\Company::class)): ?>
        <li><a href="<?php echo e(route('company.index')); ?>">
          <i class="fas fa-shopping-bag"></i> <span>Companies</span></a></li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_groups', App\Group::class)): ?>
          <li><a href="<?php echo e(route('group.index')); ?>">
            <i class="fas fa-users" aria-hidden="true"></i> <span>Groups</span></a></li>
          <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_products', App\Product::class)): ?>
          <li><a href="<?php echo e(route('prod.index')); ?>">
            <i class="fas fa-shopping-cart" aria-hidden="true"></i> <span>Products</span></a></li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_events', App\Event::class)): ?>
          <li><a href="<?php echo e(route('events.index')); ?>">
            <i class="fas fa-calendar" aria-hidden="true"></i> <span>Events</span></a></li>
        <?php endif; ?>
        <?php if(auth()->check() && auth()->user()->hasAnyRole('Super-Admin|Admin')): ?>
        <li><a href="<?php echo e(route('newsletters.index')); ?>"><i class="fas fa-book"></i> <span>Newsletters</span></a></li>
        <?php endif; ?>
        <?php echo $__env->make('auth.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <li>
          <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt" aria-hidden="true"></i> <span><?php echo e(__('form.logout')); ?></span>
          </a>

          <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
            <?php echo e(csrf_field()); ?>

          </form>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
<?php /**PATH L:\wamp64\www\karvali\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>