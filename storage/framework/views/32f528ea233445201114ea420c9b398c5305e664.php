

<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Create role
      
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <form role="form" action="<?php echo e(route('roles.store')); ?>" method="post">
      <?php echo e(csrf_field()); ?>

        <div class="box-body">
        <div class="col-lg-offset-3 col-lg-6">
          <div class="form-group">
            <label for="name">Role title</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="role Title" required>
          </div>
          <div class="col-xs-12">
            <?php $__currentLoopData = $permissions->chunk(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="row">
                  <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="col-xs-3">
                        <input type="checkbox" name="permission[]" value="<?php echo e($permission->id); ?>"><?php echo e($permission->name); ?>

                      </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        <div class="col-xs-12">
          <br>
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href='<?php echo e(route('roles.index')); ?>' class="btn btn-warning">Back</a>
        </div>

        </div>

  </div>

      </form>
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\wamp64\www\karvali\resources\views/admin/roles/create.blade.php ENDPATH**/ ?>