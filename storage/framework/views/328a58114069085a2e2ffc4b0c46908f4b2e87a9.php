

<?php $__env->startSection('content'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Roles
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_roles', App\Role::class)): ?>
          <small><a class="btn btn-primary" href="<?php echo e(route('roles.create')); ?>">Create</a></small>
        <?php endif; ?>
      </h1>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Title</th>
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_roles','update_roles', App\User::class)): ?>
                    <th>Actions</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tbody>
                  <tr>
                    <td><?php echo e($role->id); ?></td>
                    <td><?php echo e($role->name); ?></td>
                    <td>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update_users', App\Role::class)): ?>
                        <a class="btn btn-primary" href="<?php echo e(route('roles.edit', $role->id)); ?>">Edit</a> -
                      <?php endif; ?>
                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_users', App\Role::class)): ?>
                        <a class="btn btn-primary" href="<?php echo e(route('roles.show', $role->id)); ?>">View</a>
                      <?php endif; ?>
                    </td>
                  </tr>
                  </tbody>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Actions</th>
                  </tr>
                </tfoot>
              </table>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\wamp64\www\karvali\resources\views/admin/roles/index.blade.php ENDPATH**/ ?>