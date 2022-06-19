

<?php $__env->startSection('content'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_users', App\User::class)): ?>
          <small><a class="btn btn-primary" href="<?php echo e(route('users.create')); ?>">New User</a></small>
        <?php endif; ?>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="">
        <div class="">
          <div class="box">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Roles</th>
                  <th>Active</th>
                  <th>FullName</th>
                  <th>UserName</th>
                  <th>Email</th>
                  <th>Created</th>
                  <th>Verified</th>
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_users','update_users', App\User::class)): ?>
                    <th>Actions</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tbody>
                  <tr>
                    <td><?php echo e($user->id); ?></td>
                    <td>
                      <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($role->name); ?><br>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td><?php echo e($user->active?"yes":'no'); ?></td>
                    <td><?php echo e(Str::limit($user->fullname,10)); ?></td>
                    <td><?php echo e(Str::limit($user->username,10)); ?></td>
                    <td><?php echo e(Str::limit($user->email,10)); ?></td>
                    <td><?php echo e($user->created_at); ?></td>
                    <td><?php echo e($user->email_verified_at); ?></td>
                    <td>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update_users', App\User::class)): ?>
                        <a class="btn btn-primary" href="<?php echo e(route('users.edit', $user->id)); ?>">Edit</a> -
                      <?php endif; ?>
                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_users', App\Role::class)): ?>
                        <a class="btn btn-primary" href="<?php echo e(route('users.show', $user->id)); ?>">View</a>
                      <?php endif; ?>
                    </td>
                  </tr>
                  </tbody>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tfoot>
                  <tr>
                    <th>id</th>
                    <th>Active</th>
                    <th>Created at</th>
                    <th>Verified</th>
                    <th>FullName</th>
                    <th>UserName</th>
                    <th>Email</th>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_users','update_users', App\User::class)): ?>
                      <th>Actions</th>
                    <?php endif; ?>
                  </tr>
                </tfoot>
              </table>
              <?php echo e($users->links()); ?>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\wamp64\www\karvali\resources\views/admin/users/index.blade.php ENDPATH**/ ?>