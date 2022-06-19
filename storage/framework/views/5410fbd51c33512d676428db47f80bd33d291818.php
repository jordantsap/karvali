

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Create New Product
    </h1>
  </section>
  <section class="content">

    <div class="box">
      <form action="<?php echo e(route('prod.store')); ?>" method="post" role="form" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <div class="box-body">
        <div class="row">
          <div class="col-xs-9">
            <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
              <label for="title">Ονομασία:</label>
              <?php if($errors->has('title')): ?>
                <strong class="text-danger"><?php echo e($errors->first('title')); ?></strong>
              <?php endif; ?>
              <div class="input-group">
                <input type="text" value="<?php echo e(old('title')); ?>" class="form-control" name="title" placeholder="Ονομασία" required>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-home"></span>
                </span>
              </div>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="form-group<?php echo e($errors->has('product_type') ? ' has-error' : ''); ?>">
              <label for="product_type">Κατηγορία Προϊόντος</label>
              <?php if($errors->has('product_type')): ?>
                <strong class="text-danger"><?php echo e($errors->first('product_type')); ?></strong>
              <?php endif; ?>
              <div class="input-group">
                <select id="product_type" value="<?php echo e(old('product_type')); ?>" name="product_type" class="form-control" required>
                  <option value="">Επιλέξτε</option>
                  <?php $__currentLoopData = $producttypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producttype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($producttype->id); ?>"><?php echo e($producttype->name); ?></option>
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
          <label for="meta_description">Meta Description:</label>
          <?php if($errors->has('meta_description')): ?>
            <strong class="text-danger"><?php echo e($errors->first('meta_description')); ?></strong>
          <?php endif; ?>
          <div class="input-group">
            <input type="text" value="<?php echo e(old('meta_description')); ?>" class="form-control" name="meta_description" placeholder="meta_description" required>
            <span class="input-group-addon">
              <span class="glyphicon glyphicon-home"></span>
            </span>
          </div>
        </div>

        <div class="form-group<?php echo e($errors->has('meta_keywords') ? ' has-error' : ''); ?>">
          <label for="meta_keywords">Meta Keywords:</label>
          <?php if($errors->has('meta_keywords')): ?>
            <strong class="text-danger"><?php echo e($errors->first('meta_keywords')); ?></strong>
          <?php endif; ?>
          <div class="input-group">
            <input type="text" value="<?php echo e(old('meta_keywords')); ?>" class="form-control" name="meta_keywords" placeholder="meta_keywords" required>
            <span class="input-group-addon">
              <span class="glyphicon glyphicon-home"></span>
            </span>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-3">
            <div class="form-group">
                <label for="active"> Active
                  <input type="checkbox" name="active" value="1">
                </label>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="form-group<?php echo e($errors->has('sku') ? ' has-error' : ''); ?>">
              <label for="sku">Κωδικός Προϊόντος</label>
              <?php if($errors->has('sku')): ?>
                <strong class="text-danger"><?php echo e($errors->first('sku')); ?></strong>
              <?php endif; ?>
                <div class="input-group">
                <input type="text" value="<?php echo e(old('sku')); ?>" class="form-control" name="sku" placeholder="Κωδικός Προϊόντος" required>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-qrcode"></span>
                </span>
              </div>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="form-group<?php echo e($errors->has('price') ? ' has-error' : ''); ?>">
              <label for="price">Τιμή</label>
              <?php if($errors->has('price')): ?>
                <strong class="text-danger"><?php echo e($errors->first('price')); ?></strong>
              <?php endif; ?>
                <div class="input-group">
                <input type="text" value="<?php echo e(old('price')); ?>" class="form-control" name="price" placeholder="Τιμή" required>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-euro"></span>
                </span>
              </div>
            </div>
          </div>

          <div class="col-xs-3">
            <div class="form-group<?php echo e($errors->has('company_id') ? ' has-error' : ''); ?>">
              <label for="company_id">Εταιρεία</label>
              <?php if($errors->has('company_id')): ?>
                <strong class="text-danger"><?php echo e($errors->first('company_id')); ?></strong>
              <?php endif; ?>
              <div class="input-group">
                <select id="company_id" value="<?php echo e(old('company_id')); ?>" name="company_id" class="form-control" required>
                  <option value="">Επιλέξτε</option>
                  <?php $__currentLoopData = auth()->user()->companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($company->id); ?>"><?php echo e($company->title); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-list"></span>
                </span>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group<?php echo e($errors->has('header') ? ' has-error' : ''); ?>">
          <label for="header">header: </label>
          <?php if($errors->has('header')): ?>
            <strong class="text-danger"><?php echo e($errors->first('header')); ?></strong>
          <?php endif; ?>
          <input type="file" name="header" required>
          <p class="help-block">Example block-level help text here.</p>
        </div>

        <div class="row">
          <div class="col-xs-3">
            <div class="form-group<?php echo e($errors->has('logo') ? ' has-error' : ''); ?>">
              <label for="logo">Λογοτυπο: </label>
              <?php if($errors->has('logo')): ?>
                <strong class="text-danger"><?php echo e($errors->first('logo')); ?></strong>
              <?php endif; ?>
              <input type="file" name="logo" required>
              <p class="help-block">Example block-level help text here.</p>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="form-group<?php echo e($errors->has('image1') ? ' has-error' : ''); ?>">
              <label for="homeimage">Εικόνα 1: </label>
              <?php if($errors->has('image1')): ?>
                <strong class="text-danger"><?php echo e($errors->first('image1')); ?></strong>
              <?php endif; ?>
              <input type="file" name="image1" required>
              <p class="help-block">Example block-level help text here.</p>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="form-group<?php echo e($errors->has('image2') ? ' has-error' : ''); ?>">
              <label for="pageimage">Εικόνα 2: </label>
              <?php if($errors->has('image2')): ?>
                <strong class="text-danger"><?php echo e($errors->first('image2')); ?></strong>
              <?php endif; ?>
              <input type="file" name="image2" required>
              <p class="help-block">Example block-level help text here.</p>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="form-group<?php echo e($errors->has('image3') ? ' has-error' : ''); ?>">
              <label for="image3">Εικόνα 3: </label>
              <?php if($errors->has('image3')): ?>
                <strong class="text-danger"><?php echo e($errors->first('image3')); ?></strong>
              <?php endif; ?>
              <input type="file" name="image3" required>
              <p class="help-block">Example block-level help text here.</p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12">
            <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
              <label for="description">Περιγραφή</label>
              <?php if($errors->has('description')): ?>
                <strong class="text-danger"><?php echo e($errors->first('description')); ?></strong>
              <?php endif; ?>
              <div class="input-group">
                <textarea name="description" id="description" class="form-control"
                  rows="5" required><?php echo e(old('description')); ?></textarea>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-info-sign"></span>
                </span>
              </div>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
      </form>
    </div>
  </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\wamp64\www\karvali\resources\views/admin/products/create.blade.php ENDPATH**/ ?>