

<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      New Group
      
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <form action="<?php echo e(route('group.store')); ?>" method="post" role="form" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <div class="box-body">
            <div class="row">
              <div class="col-xs-9">
                <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                <label for="title">Ονομασία Συλλόγου</label>
                <?php if($errors->has('title')): ?>
                  <strong class="text-danger"><?php echo e($errors->first('title')); ?></strong>
                <?php endif; ?>
                  <div class="input-group">
                    <input type="text" value="<?php echo e(old('title')); ?>" class="form-control" name="title" id="title" placeholder="Enter Name" >
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-home"></span>
                    </span>
                  </div>
                </div>
              </div>

            <div class="col-xs-3">
              <div class="form-group<?php echo e($errors->has('group_type') ? ' has-error' : ''); ?>">
                <label for="group_type">Κατηγορία Συλλόγου</label>
                <?php if($errors->has('group_type')): ?>
                  <strong class="text-danger"><?php echo e($errors->first('group_type')); ?></strong>
                <?php endif; ?>
                <div class="input-group">
                  <select name="group_type" id="group_type" class="form-control" >
                    <option value="">Επιλέξτε Τύπο</option>
                    <?php $__currentLoopData = $grouptypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grouptype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($grouptype->id); ?>"><?php echo e($grouptype->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-list"></span>
                  </span>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group<?php echo e($errors->has('meta_description') ? ' has-error' : ''); ?>">
          <label for="meta_description">Meta Description</label>
          <?php if($errors->has('meta_description')): ?>
            <strong class="text-danger"><?php echo e($errors->first('meta_description')); ?></strong>
          <?php endif; ?>
            <div class="input-group">
              <input type="text" value="<?php echo e(old('meta_description')); ?>" class="form-control" name="meta_description" id="meta_description" placeholder="meta_description" >
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-home"></span>
              </span>
            </div>
          </div>

          <div class="form-group<?php echo e($errors->has('meta_keywords') ? ' has-error' : ''); ?>">
          <label for="meta_keywords">Meta Keywords</label>
          <?php if($errors->has('meta_keywords')): ?>
            <strong class="text-danger"><?php echo e($errors->first('meta_keywords')); ?></strong>
          <?php endif; ?>
            <div class="input-group">
              <input type="text" value="<?php echo e(old('meta_keywords')); ?>" class="form-control" name="meta_keywords" id="meta_keywords" placeholder="meta_keywords" >
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-home"></span>
              </span>
            </div>
          </div>

            <div class="row">
              <div class="col-xs-2 form-group">
                <label for="active">Publish
                  &nbsp<input type="checkbox" name="active" value="1" class="minimal">
                </label>
              </div>
              <div class="col-xs-7">
                <div class="form-group<?php echo e($errors->has('manager') ? ' has-error' : ''); ?>">
                  <label for="manager">Όνομα Υπευθύνου</label>
                  <?php if($errors->has('manager')): ?>
                    <strong class="text-danger"><?php echo e($errors->first('manager')); ?></strong>
                  <?php endif; ?>
                  <div class="input-group">
                    <input type="text" class="form-control" id="manager" name="manager" placeholder="Για περαιτέρω διευκρινήσεις" >
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-user"></span>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="form-group<?php echo e($errors->has('telephone') ? ' has-error' : ''); ?>">
                  <label for="telephone">Τηλέφωνο</label>
                  <?php if($errors->has('telephone')): ?>
                    <strong class="text-danger"><?php echo e($errors->first('telephone')); ?></strong>
                  <?php endif; ?>
                  <div class="input-group">
                    <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Κινητό ή Σταθερό" >
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-earphone"></span>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group<?php echo e($errors->has('header') ? ' has-error' : ''); ?>">
              <label for="header">header</label>
              <?php if($errors->has('header')): ?>
                <strong class="text-danger"><?php echo e($errors->first('header')); ?></strong>
              <?php endif; ?>
              <div class="input-group">
                <input type="file" name="header">
                <p class="help-block">Επιτρέπονται όλα τα είδη εικόνων.</p>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-3">
                <div class="form-group<?php echo e($errors->has('logo') ? ' has-error' : ''); ?>">
                  <label for="logo">Λογότυπο</label>
                  <?php if($errors->has('logo')): ?>
                    <strong class="text-danger"><?php echo e($errors->first('logo')); ?></strong>
                  <?php endif; ?>
                  <div class="input-group">
                    <input type="file" name="logo">
                    <p class="help-block">Επιτρέπονται όλα τα είδη εικόνων.</p>
                  </div>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="form-group<?php echo e($errors->has('image1') ? ' has-error' : ''); ?>">
                  <label for="image1">Εικονα Αρχικης</label>
                  <?php if($errors->has('image1')): ?>
                    <strong class="text-danger"><?php echo e($errors->first('image1')); ?></strong>
                  <?php endif; ?>
                  <div class="input-group">
                    <input type="file" name="image1">
                    <p class="help-block">Επιτρέπονται όλα τα είδη εικόνων.</p>
                  </div>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="form-group<?php echo e($errors->has('image2') ? ' has-error' : ''); ?>">
                  <label for="image2">Εικόνα Λίστας Συλλόγων</label>
                  <?php if($errors->has('image2')): ?>
                    <strong class="text-danger"><?php echo e($errors->first('image2')); ?></strong>
                  <?php endif; ?>
                  <div class="input-group">
                    <input type="file" name="image2">
                    <p class="help-block">Επιτρέπονται όλα τα είδη εικόνων.</p>
                  </div>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="form-group<?php echo e($errors->has('image3') ? ' has-error' : ''); ?>">
                  <label for="image3">Εικόνες Σελίδας Συλλόγου</label>
                  <?php if($errors->has('image3')): ?>
                    <strong class="text-danger"><?php echo e($errors->first('image3')); ?></strong>
                  <?php endif; ?>
                  <div class="input-group">
                    <input type="file" name="image3">
                    <p class="help-block">Επιτρέπονται όλα τα είδη εικόνων.</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-6">
                  <div class="form-group<?php echo e($errors->has('website') ? ' has-error' : ''); ?>">
                    <label for="website">Ιστοσελίδα</label>
                    <?php if($errors->has('website')): ?>
                      <strong class="text-danger"><?php echo e($errors->first('website')); ?></strong>
                    <?php endif; ?>
                    <div class="input-group">
                      <input type="text" class="form-control" id="website" name="website" placeholder="Website">
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-globe"></span>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                    <label for="email">E-Mail</label>
                    <?php if($errors->has('email')): ?>
                      <strong class="text-danger"><?php echo e($errors->first('email')); ?></strong>
                    <?php endif; ?>
                    <div class="input-group">
                      <input type="text" class="form-control" id="email" name="email" placeholder="E-Mail" >
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-envelope"></span>
                      </span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-6">
                  <div class="form-group<?php echo e($errors->has('facebook') ? ' has-error' : ''); ?>">
                    <label for="facebook">Facebook</label>
                    <?php if($errors->has('facebook')): ?>
                      <strong class="text-danger"><?php echo e($errors->first('facebook')); ?></strong>
                    <?php endif; ?>
                    <div class="input-group">
                      <input type="text" class="form-control" name="facebook" id="facebook" value=""
                        placeholder="Facebook url">
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-thumbs-up"></span>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="form-group<?php echo e($errors->has('twitter') ? ' has-error' : ''); ?>">
                    <label for="twitter">Twitter</label>
                    <?php if($errors->has('twitter')): ?>
                      <strong class="text-danger"><?php echo e($errors->first('twitter')); ?></strong>
                    <?php endif; ?>
                    <div class="input-group">
                      <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Twitter url">
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-heart"></span>
                      </span>
                    </div>
                  </div>
                </div>
              </div>

                  <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                    <label for="description">Περιγραφή</label>
                    <?php if($errors->has('description')): ?>
                      <strong class="text-danger"><?php echo e($errors->first('description')); ?></strong>
                    <?php endif; ?>
                    <div class="input-group">
                      <textarea name="description" id="description" class="form-control" rows="5" ></textarea>
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-info-sign"></span>
                      </span>
                    </div>
                    <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info btn-block">
                  </div>

      </form>
    </div>
  </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\wamp64\www\karvali\resources\views/admin/groups/create.blade.php ENDPATH**/ ?>