

<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Upload photo to Album
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <form method="POST" action="<?php echo e(route('photos.store')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="box-body">

          <div class="row">
            <div class="col-xs-2 form-group">
              <label for="active"> Active
                &nbsp<input type="checkbox" name="active" value="1" class="minimal">
              </label>
            </div>
            <div class="col-xs-4 form-group<?php echo e($errors->has('file') ? ' has-error' : ''); ?>">
              <label for="file">Εικόνα</label>
              <?php if($errors->has('file')): ?>
                <strong class="text-danger"><?php echo e($errors->first('file')); ?></strong>
              <?php endif; ?>
              <div class="input-group">
                <?php if( old('file')): ?>
                  <img src="<?php echo e(old('file')); ?>" alt="">
                <?php endif; ?>
                <input type="file" name="file" id="file" value="<?php echo e(old('file')); ?>">
              </div>
            </div>

            <div class="col-xs-3 form-group<?php echo e($errors->has('album_id') ? ' has-error' : ''); ?>">
              <label for="album_id">Άλμπουμ</label>
              <?php if($errors->has('album_id')): ?>
                <strong class="text-danger"><?php echo e($errors->first('album_id')); ?></strong>
              <?php endif; ?>
              <div class="">
                <select id="album_id" value="<?php echo e(old('album_id')); ?>" name="album_id" class="form-control" >
                  <option value="<?php echo e(old('album_id')); ?>">Επιλέξτε</option>
                  <?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($album->id); ?> <?php echo e(old('album_id')); ?>" <?php echo e(old('album_id')?"selected":""); ?>><?php echo e($album->title); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>

          </div>
          <div class="form-group<?php echo e($errors->has('alt') ? ' has-error' : ''); ?>">
            <label for="alt" class="control-label"><?php echo e(__('Εναλλακτικό κείμενο φωτογραφίας')); ?></label>
            <input id="alt" type="text" class="form-control" name="alt" value="<?php echo e(old('alt')); ?>" required>

            <?php if($errors->has('alt')): ?>
              <span class="help-block">
                <strong><?php echo e($errors->first('alt')); ?></strong>
              </span>
            <?php endif; ?>
          </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\wamp64\www\karvali\resources\views/admin/albumphotos/create.blade.php ENDPATH**/ ?>