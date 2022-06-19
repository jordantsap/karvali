

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      New Newsletter
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <form method="post" action="<?php echo e(route('newsletters.store')); ?>">
        <?php echo csrf_field(); ?>
        <div class="box-body">

                  <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                    <label for="email">E-Mail</label>
                    <?php if($errors->has('email')): ?>
                      <strong class="text-danger"><?php echo e($errors->first('email')); ?></strong>
                    <?php endif; ?>
                    <div class="input-group">
                      <input type="text" value="<?php echo e(old('email')); ?>" class="form-control" id="email" name="email[]" placeholder="E-Mail" multiple required>
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-envelope"></span>
                      </span>
                    </div>
                  </div>




              <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
        <!-- /.box-body -->

      </form>
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\wamp64\www\karvali\resources\views/admin/newsletters/create.blade.php ENDPATH**/ ?>