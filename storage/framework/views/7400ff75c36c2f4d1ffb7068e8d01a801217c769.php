

<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Create New Post
      
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <form method="post" action="<?php echo e(route('posts.store')); ?>" enctype="multipart/form-data">
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
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" name="status" value="1"> Publish
              </label>
            </div>
          </div>

          <div class="form-group<?php echo e($errors->has('meta_description') ? ' has-error' : ''); ?>">
              <label for="meta_description" class="control-label"><?php echo e(__('Meta Description')); ?></label>
                  <input id="meta_description" type="text" class="form-control" name="meta_description" value="<?php echo e(old('meta_description')); ?>" placeholder="Max 160 Characters" required>

                  <?php if($errors->has('meta_description')): ?>
                      <span class="help-block">
                          <strong><?php echo e($errors->first('meta_description')); ?></strong>
                      </span>
                  <?php endif; ?>
          </div>

          <div class="form-group<?php echo e($errors->has('meta_keywords') ? ' has-error' : ''); ?>">
              <label for="meta_keywords" class="control-label"><?php echo e(__('Meta Keywords')); ?></label>
                  <input id="meta_keywords" type="text" class="form-control" name="meta_keywords" value="<?php echo e(old('meta_keywords')); ?>" placeholder="Comma separated" required>

                  <?php if($errors->has('meta_keywords')): ?>
                      <span class="help-block">
                          <strong><?php echo e($errors->first('meta_keywords')); ?></strong>
                      </span>
                  <?php endif; ?>
          </div>

          <div class="row">
            <div class="form-group col-xs-6">
              <label for="post_type">Category</label>
              <select class="form-control" name="post_type" id="post_type">
                <option value="<?php echo e(old('post_type')); ?>">Select one</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              <?php if($errors->has('post_type')): ?>
                  <span class="help-block">
                      <strong><?php echo e($errors->first('post_type')); ?></strong>
                  </span>
              <?php endif; ?>
            </div>

            <div class="form-group col-xs-6">
              <label for="image">Image</label>
              <input type="file" id="image" name="image" value="<?php echo e(old('image')); ?>" required>
              <p class="help-block">Example block-level help text here.</p>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\wamp64\www\karvali\resources\views/admin/posts/create.blade.php ENDPATH**/ ?>