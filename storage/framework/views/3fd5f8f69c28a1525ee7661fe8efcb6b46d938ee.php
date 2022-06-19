

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>New Advert</h1>
  </section>
  <section class="content">
    <div class="box">
      <form method="post" action="<?php echo e(route('adverts.store')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="box-body">
          <div class="row">
            <div class="col-xs-6 form-group<?php echo e($errors->has('link_title') ? ' has-error' : ''); ?>">
              <label for="link_title">Όνομα Διαφήμισης</label>
              <?php if($errors->has('link_title')): ?>
                <strong class="text-danger"><?php echo e($errors->first('link_title')); ?></strong>
              <?php endif; ?>
              <div class="input-group">
                <span>(Βοηθάει στις μηχανες αναζήτησης)</span>
                <input type="text" class="form-control" value="<?php echo e(old('link_title')); ?>" id="link_title" name="link_title" placeholder="π.χ. Κατάστημα αθλητικών ειδών" >
              </div>
            </div>
            <div class="col-xs-6 form-group<?php echo e($errors->has('banner_alt') ? ' has-error' : ''); ?>">
              <label for="banner_alt">Εναλλακτικό κείμενο φωτογραφίας</label>
              <?php if($errors->has('banner_alt')): ?>
                <strong class="text-danger"><?php echo e($errors->first('banner_alt')); ?></strong>
              <?php endif; ?>
              <div class="input-group">
                <span>(Βοηθάει στις μηχανες αναζήτησης)</span>
                <input type="text" class="form-control" value="<?php echo e(old('banner_alt')); ?>" id="banner_alt" name="banner_alt" placeholder="π.χ. Ρούχο για το βαρύ χειμώνα" >
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-2 form-group">
              <label for="publish">Publish <br>
                &nbsp<input type="checkbox" name="active" value="1">
              </label>
            </div>
            <div class="col-xs-4 form-group<?php echo e($errors->has('banner') ? ' has-error' : ''); ?>">
              <label for="banner">Εικόνα Διαφήμισης</label>
              <?php if($errors->has('banner')): ?>
                <strong class="text-danger"><?php echo e($errors->first('banner')); ?></strong>
              <?php endif; ?>
              <div class="input-group">
                <input type="file" value="<?php echo e(old('banner')); ?>" name="banner" >
              </div>
            </div>
            <div class="col-xs-6">
              <div class="form-group<?php echo e($errors->has('advertable_type') ? ' has-error' : ''); ?>">
                <label for="advertable_type">Τύπος Διαφήμισης</label>
                <?php if($errors->has('advertable_type')): ?>
                  <strong class="text-danger"><?php echo e($errors->first('advertable_type')); ?></strong>
                <?php endif; ?>
                <div class="col-xs-12 input-group">
                  <select id="advertable_type" value="<?php echo e(old('advertable_type')); ?>" name="advertable_type" class="form-control" >
                    <option value="">Επιλέξτε</option>
                    <option value="App\Company">Company</option>
                    <option value="App\Group">Group</option>
                    <option value="App\Event">Event</option>
                    <option value="App\Product">Product</option>
                  </select>
                </div>
              </div>
              <div class="form-group<?php echo e($errors->has('advertable_id') ? ' has-error' : ''); ?>">
                <label for="advertable_id">Κωδικός Αναγνωριστικού</label>
                <?php if($errors->has('advertable_id')): ?>
                  <strong class="text-danger"><?php echo e($errors->first('advertable_id')); ?></strong>
                <?php endif; ?>
                <div class="col-xs-12 input-group">
                  <select id="advertable_id" value="<?php echo e(old('advertable_id')); ?>" name="advertable_id" class="form-control" >
                    <option value="">Επιλέξτε</option>
                    <?php $__currentLoopData = $adverts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($advert->advertable_id); ?>"><?php echo e($advert->advertable_id); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
            <div class="row">
              <div class="col-xs-6">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
              </div>
              <div class="col-xs-6">
                <a class="btn btn-default btn-block" href="javascript:history.back()">Go Back</a>
              </div>
            </div>
          </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </form>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\wamp64\www\karvali\resources\views/admin/adverts/create.blade.php ENDPATH**/ ?>