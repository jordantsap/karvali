

<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Create New User
      
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <form action="<?php echo e(route('users.store')); ?>" method="POST" role="form">
        <?php echo e(csrf_field()); ?>

        <div class="box-body">
          <div class="row">
            <div class="col-xs-6">

              <div class="form-group">
                <label for="fullname">FullName</label>
                <input type="text" name="fullname" class="form-control" id="fullname" placeholder="FullName" value="<?php echo e(old('fullname')); ?>" required>
              </div>
              <div class="form-group">
                <label for="username">UserName</label>
                <input type="text" name="username" value="<?php echo e(old('username')); ?>" class="form-control" id="username" placeholder="Enter UserName">
              </div>

              <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo e(old('email')); ?>" required>
              </div>
            </div>
          <div class="col-xs-6">
            <div class="form-group">
              <label for="tel">Τηλέφωνο</label>
              <input type="text" name="tel" class="form-control" id="tel" placeholder="π.χ. 2510316362" value="<?php echo e(old('tel')); ?>" required>
            </div>
            <div class="form-group">
              <label for="mobile">Κινητό τηλ</label>
              <input type="text" name="mobile" class="form-control" id="tel" placeholder="Κινητό τηλ" value="<?php echo e(old('mobile')); ?>" required>
            </div>

            <div class="form-group">
              <label for="active">Activate</label>
              <div class="col-xs-12">
                <div class="checkbox">
                  <input type="checkbox" name="active" value="1" class="minimal"> Active
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="roles">Assign Role</label>
              <div class="col-xs-12">
              <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="checkbox">
                      <input type="checkbox" name="role[]" value="<?php echo e($role->id); ?>" <?php if(old('role')): ?>
                        <?php echo e('checked'); ?>

                      <?php endif; ?>>
                      <?php echo e($role->name); ?>

                    </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\wamp64\www\karvali\resources\views/admin/users/create.blade.php ENDPATH**/ ?>