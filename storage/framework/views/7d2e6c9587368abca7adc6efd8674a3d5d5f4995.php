<?php if(auth()->check() && auth()->user()->hasRole('Company-Manager')): ?>
  <li><a href="<?php echo e(route('company.create')); ?>"><i class="fas fa-shopping-bag"></i> <span>Create Company</span></a></li>
<?php endif; ?>
<?php if(auth()->check() && auth()->user()->hasRole('Group-Manager')): ?>
  <li><a href="<?php echo e(route('group.create')); ?>"><i class="fas fa-shopping-bag"></i> <span>Create Group</span></a></li>
<?php endif; ?>
<?php if(auth()->check() && auth()->user()->hasRole('Product-Manager')): ?>
  <li><a href="<?php echo e(route('product.create')); ?>"><i class="fas fa-shopping-bag"></i> <span>Create Product</span></a></li>
<?php endif; ?>
<?php if(auth()->check() && auth()->user()->hasRole('Event-Manager')): ?>
  <li><a href="<?php echo e(route('events.create')); ?>"><i class="fas fa-shopping-bag"></i> <span>Create Event</span></a></li>
<?php endif; ?>
<?php /**PATH L:\wamp64\www\karvali\resources\views/auth/sidebar.blade.php ENDPATH**/ ?>