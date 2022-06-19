

<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Create Permission
      
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <form method="post" action="<?php echo e(route('permissions.store')); ?>">
        <?php echo csrf_field(); ?>
        <div class="box-body">
          <div class="form-group">
            <label for="name">Permission Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required>
          </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\wamp64\www\karvali\resources\views/admin/permissions/create.blade.php ENDPATH**/ ?>