

<?php $__env->startSection('content'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Groups
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_groups', App\Group::class)): ?>
          <small><a class="btn btn-primary" href="<?php echo e(route('group.create')); ?>">New Group</a></small>
        <?php endif; ?>
      </h1>
    </section>

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
                  <th>Active</th>
                  <th>Category</th>
                  <th>Title</th>
                  <th>Logo</th>
                  <th>Description</th>
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_groups','update_groups', App\Group::class)): ?>
                    <th>Actions</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tbody>
                  <tr>
                    <td><?php echo e($group->id); ?></td>
                    <td><?php echo e($group->active?"yes":'no'); ?></td>
                    <td>
                      
                    </td>
                    <td><?php echo e($group->title); ?></td>
                    <td><img width="150px" height="150px" src="<?php echo e(asset('images/groups/'.$group->logo)); ?>" alt="<?php echo e($group->title); ?>"></td>
                    <td><?php echo e(Str::limit($group->description, 20)); ?></td>
                    <td>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update_groups', App\Group::class)): ?>
                        <a class="btn btn-primary" href="<?php echo e(route('group.edit', $group->id)); ?>">Edit</a> -
                      <?php endif; ?>
                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_groups', App\Group::class)): ?>
                        <a class="btn btn-primary" href="<?php echo e(route('group.show', $group->id)); ?>">View</a>
                      <?php endif; ?>
                    </td>
                  </tr>
                  </tbody>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tfoot>
                  <tr>
                    <th>id</th>
                    <th>Active</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Description</th>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_groups','update_groups', App\Group::class)): ?>
                      <th>Actions</th>
                    <?php endif; ?>
                  </tr>
                </tfoot>
              </table>
              <?php echo e($groups->links()); ?>

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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\wamp64\www\karvali\resources\views/admin/groups/index.blade.php ENDPATH**/ ?>