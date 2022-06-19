

<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Create New Album
      
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <form method="POST" action="<?php echo e(route('albums.store')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="box-body">
          <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
              <label for="title" class="control-label"><?php echo e(__('form.title')); ?></label>
                  <input id="title" type="text" class="form-control" name="title" value="<?php echo e(old('title')); ?>" required>

                  <?php if($errors->has('title')): ?>
                      <span class="help-block">
                          <strong><?php echo e($errors->first('title')); ?></strong>
                      </span>
                  <?php endif; ?>
          </div>

          <div class="form-group<?php echo e($errors->has('meta_description') ? ' has-error' : ''); ?>">
              <label for="meta_description" class="control-label"><?php echo e(__('Meta Description')); ?></label>
                  <input id="meta_description" type="text" class="form-control" name="meta_description" value="<?php echo e(old('meta_description')); ?>" required>

                  <?php if($errors->has('meta_description')): ?>
                      <span class="help-block">
                          <strong><?php echo e($errors->first('meta_description')); ?></strong>
                      </span>
                  <?php endif; ?>
          </div>

          <div class="form-group<?php echo e($errors->has('meta_keywords') ? ' has-error' : ''); ?>">
              <label for="meta_keywords" class="control-label"><?php echo e(__('Meta Keywords')); ?></label>
                  <input id="meta_keywords" type="text" class="form-control" name="meta_keywords" value="<?php echo e(old('meta_keywords')); ?>" required>

                  <?php if($errors->has('meta_keywords')): ?>
                      <span class="help-block">
                          <strong><?php echo e($errors->first('meta_keywords')); ?></strong>
                      </span>
                  <?php endif; ?>
          </div>

          <div class="row">
            <div class="col-xs-5 form-group<?php echo e($errors->has('cover_image') ? ' has-error' : ''); ?>">
              <label for="photos">Εικόνα</label>
              <?php if($errors->has('cover_image')): ?>
                <strong class="text-danger"><?php echo e($errors->first('cover_image')); ?></strong>
              <?php endif; ?>
              <div class="input-group">
                <?php if( old('cover_image')): ?>
                  <img src="<?php echo e(old('cover_image')); ?>" alt="">
                <?php endif; ?>
                <input type="file" name="cover_image" id="cover_image" value="<?php echo e(old('cover_image')); ?>">
              </div>
            </div>

            <div class="col-xs-7 form-group<?php echo e($errors->has('alt') ? ' has-error' : ''); ?>">
                <label for="alt" class="control-label"><?php echo e(__('Εναλλακτικό κείμενο φωτογραφίας')); ?></label>
                    <input id="alt" type="text" class="form-control" name="alt" value="<?php echo e(old('alt')); ?>" required>

                    <?php if($errors->has('alt')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('alt')); ?></strong>
                        </span>
                    <?php endif; ?>
            </div>
          </div>

          <div class="form-group">
            <label for="description">Description</label>
            <textarea class="textarea" name="description" placeholder="Place some text here" style="width: 100%; height:150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required><?php echo e(old('description')); ?></textarea>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\wamp64\www\karvali\resources\views/admin/albums/create.blade.php ENDPATH**/ ?>