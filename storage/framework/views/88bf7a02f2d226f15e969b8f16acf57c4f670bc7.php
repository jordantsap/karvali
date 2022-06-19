

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      New Company
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <form method="post" action="<?php echo e(route('company.store')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="box-body">
          <div class="row">
            <div class="col-xs-8 form-group">
              <label for="title">Title</label>
              <input type="text" value="<?php echo e(old('title')); ?>" name="title" class="form-control" id="title" placeholder="Enter Title" >
            </div>
            <div class="col-xs-4 form-group">
              <label for="telephone">Τηλέφωνο</label>
              <input type="text" value="<?php echo e(old('title')); ?>" name="telephone" class="form-control" id="telephone" placeholder="Τηλέφωνο Επιχείρησης" >
            </div>
          </div>

          <div class="form-group<?php echo e($errors->has('meta_description') ? ' has-error' : ''); ?>">
            <label for="meta_description">Meta Description</label>
            <?php if($errors->has('meta_description')): ?>
              <strong class="text-danger"><?php echo e($errors->first('meta_description')); ?></strong>
            <?php endif; ?>
            <div class="input-group">
              <input type="text" class="form-control" value="<?php echo e(old('meta_description')); ?>" id="manager" name="meta_description" placeholder="Meta Description" >
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-user"></span>
              </span>
            </div>
          </div>

          <div class="form-group<?php echo e($errors->has('meta_keywords') ? ' has-error' : ''); ?>">
            <label for="meta_keywords">Meta Keywords</label>
            <?php if($errors->has('meta_keywords')): ?>
              <strong class="text-danger"><?php echo e($errors->first('meta_keywords')); ?></strong>
            <?php endif; ?>
            <div class="input-group">
              <input type="text" class="form-control" value="<?php echo e(old('meta_keywords')); ?>" id="meta_keywords" name="meta_keywords" placeholder="Meta keywords comma separated" >
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-user"></span>
              </span>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-2 form-group">
              <label for="active"> Active
                &nbsp<input type="checkbox" name="active" value="1" class="minimal">
              </label>
            </div>
              <div class="col-xs-3 form-group<?php echo e($errors->has('company_type') ? ' has-error' : ''); ?>">
                <label for="company_type">Κατηγορία Καταστήματος</label>
                <?php if($errors->has('company_type')): ?>
                  <strong class="text-danger"><?php echo e($errors->first('company_type')); ?></strong>
                <?php endif; ?>
                <div class="">
                  <select id="company_type" value="<?php echo e(old('company_type')); ?>" name="company_type" class="form-control" >
                    <option value="<?php echo e(old('company_type')); ?>">Επιλέξτε</option>
                    <?php $__currentLoopData = $companytypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $companytype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($companytype->id); ?> <?php echo e(old('company_type')); ?>" <?php echo e(old('company_type')?"selected":""); ?>><?php echo e($companytype->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>
              <div class="col-xs-7 form-group<?php echo e($errors->has('manager') ? ' has-error' : ''); ?>">
                <label for="manager">Όνομα Υπευθύνου</label>
                <?php if($errors->has('manager')): ?>
                  <strong class="text-danger"><?php echo e($errors->first('manager')); ?></strong>
                <?php endif; ?>
                <div class="input-group">
                  <input type="text" class="form-control" value="<?php echo e(old('manager')); ?>" id="manager" name="manager" placeholder="Manager Name" >
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-user"></span>
                  </span>
                </div>
              </div>
          </div>


          <div class="form-group<?php echo e($errors->has('header') ? ' has-error' : ''); ?>">
            <label for="header">header</label>
            <?php if($errors->has('header')): ?>
              <strong class="text-danger"><?php echo e($errors->first('header')); ?></strong>
            <?php endif; ?>
            <div class="input-group">
              <?php if( old('header')): ?>
                <img src="<?php echo e(old('header')); ?>" alt="">
              <?php endif; ?>
              <input type="file" name="header" value="<?php echo e(old('header')); ?>" >
              <p class="help-block">Help text here.</p>
            </div>
          </div>
          <div class="row">
                <div class="col-xs-3 form-group<?php echo e($errors->has('logo') ? ' has-error' : ''); ?>">
                  <label for="logo">Λογότυπο</label>
                  <?php if($errors->has('logo')): ?>
                    <strong class="text-danger"><?php echo e($errors->first('logo')); ?></strong>
                  <?php endif; ?>
                  <div class="input-group">
                    <?php if( old('logo')): ?>
                      <img src="<?php echo e(old('logo')); ?>" alt="">
                    <?php endif; ?>
                    <input type="file" name="logo" value="<?php echo e(old('logo')); ?>" >
                    <p class="help-block">Help text here.</p>
                  </div>
                </div>
                <div class="col-xs-3 form-group<?php echo e($errors->has('image1') ? ' has-error' : ''); ?>">
                  <label for="image1">Εικόνα Αρχικης Σελίδας</label>
                  <?php if($errors->has('image1')): ?>
                    <strong class="text-danger"><?php echo e($errors->first('image1')); ?></strong>
                  <?php endif; ?>
                  <div class="input-group">
                    <?php if( old('image1')): ?>
                      <img src="<?php echo e(old('image1')); ?>" alt="">
                    <?php endif; ?>
                    <input type="file" name="image1" value="<?php echo e(old('image1')); ?>" >
                    <p class="help-block">Help text here.</p>
                  </div>
                </div>
                <div class="col-xs-3 form-group<?php echo e($errors->has('image2') ? ' has-error' : ''); ?>">
                  <label for="image2">Εικόνα λίστας καταχωρήσεων</label>
                  <?php if($errors->has('image2')): ?>
                    <strong class="text-danger"><?php echo e($errors->first('image2')); ?></strong>
                  <?php endif; ?>
                  <div class="col-xs-3 input-group">
                    <?php if( old('image2')): ?>
                      <img src="<?php echo e(old('image2')); ?>" alt="">
                    <?php endif; ?>
                    <input type="file" name="image2" value="<?php echo e(old('image2')); ?>" >
                    <p class="help-block">Help text here.</p>
                  </div>
                </div>
                <div class="col-xs-3 form-group<?php echo e($errors->has('image3') ? ' has-error' : ''); ?>">
                  <label for="image3">Εικόνες σελίδας Καταστήματος</label>
                  <?php if($errors->has('image3')): ?>
                    <strong class="text-danger"><?php echo e($errors->first('image3')); ?></strong>
                  <?php endif; ?>
                  <div class="input-group">
                    <?php if( old('image3')): ?>
                      <img src="<?php echo e(old('image3')); ?>" alt="">
                    <?php endif; ?>
                    <input type="file" name="image3" value="<?php echo e(old('image3')); ?>">
                    <p class="help-block">Help text here.</p>
                  </div>
                </div>
              </div>

            <div class="row">
              <div class="col-xs-6 text-center<?php echo e($errors->has('days') ? ' has-error' : ''); ?>">
                <label for="days" class="bold">Ημερες εργασιας</label>
                <?php if($errors->has('days')): ?>
                  <strong class="text-danger"><?php echo e($errors->first('days')); ?></strong>
                <?php endif; ?>
                <br>
                <label class="checkbox-inline">
                  <input type="checkbox" multiple name="days[]" value="Weekdays" <?php echo e(old('days') == 'Weekdays' ? 'checked' : ''); ?>> Καθημερινα
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" multiple name="days[]" value="Saturday" <?php echo e(old('days') == 'Suturday' ? 'checked' : ''); ?>> Σαββατο
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" multiple name="days[]" value="Sunday" <?php echo e(old('days') == 'Sunday' ? 'checked' : ''); ?>> Κυριακη
                </label>
              </div>

                <div class="col-xs-3 form-group<?php echo e($errors->has('morningtime') ? ' has-error' : ''); ?>">
                  <label for="morningtime">Πρωινές Ώρες</label>
                  <?php if($errors->has('morningtime')): ?>
                    <strong class="text-danger"><?php echo e($errors->first('morningtime')); ?></strong>
                  <?php endif; ?>
                  <div class="input-group">
                    <input type="time" class="form-control" value="<?php echo e(old('morningtime')); ?>" id="morningtime" name="morningtime" placeholder="" >
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-time"></span>
                    </span>
                  </div>
                </div>

                <div class="col-xs-3 form-group<?php echo e($errors->has('afternoontime') ? ' has-error' : ''); ?>">
                  <label for="afternoontime">Απογευματινές ώρες</label>
                  <?php if($errors->has('afternoontime')): ?>
                    <strong class="text-danger"><?php echo e($errors->first('afternoontime')); ?></strong>
                  <?php endif; ?>
                  <div class="input-group">
                    <input type="time" class="form-control" value="<?php echo e(old('afternoontime')); ?>" id="afternoontime" name="afternoontime" placeholder="" >
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-time"></span>
                    </span>
                  </div>
                </div>
            </div>

            <div class="row">
                  <div class="col-xs-6 form-group<?php echo e($errors->has('website') ? ' has-error' : ''); ?>">
                    <label for="website">Ιστοσελίδα</label>
                    <?php if($errors->has('website')): ?>
                      <strong class="text-danger"><?php echo e($errors->first('website')); ?></strong>
                    <?php endif; ?>
                    <div class="input-group">
                      <input type="text" class="form-control" value="<?php echo e(old('website')); ?>" id="website" name="website"
                        placeholder="Website">
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-globe"></span>
                      </span>
                    </div>
                  </div>

                  <div class="col-xs-6 form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                    <label for="email">E-Mail</label>
                    <?php if($errors->has('email')): ?>
                      <strong class="text-danger"><?php echo e($errors->first('email')); ?></strong>
                    <?php endif; ?>
                    <div class="input-group">
                      <input type="text" value="<?php echo e(old('email')); ?>" class="form-control" id="email" name="email" placeholder="E-Mail" >
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-envelope"></span>
                      </span>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-6 form-group<?php echo e($errors->has('facebook') ? ' has-error' : ''); ?>">
                    <label for="facebook">Facebook</label>
                    <?php if($errors->has('facebook')): ?>
                      <strong class="text-danger"><?php echo e($errors->first('facebook')); ?></strong>
                    <?php endif; ?>
                    <div class="input-group">
                      <input type="text" class="form-control" value="<?php echo e(old('facebook')); ?>" id="facebook" name="facebook"
                        placeholder="facebook">
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-thumbs-up"></span>
                      </span>
                    </div>
                  </div>
                  <div class="col-xs-6 form-group<?php echo e($errors->has('twitter') ? ' has-error' : ''); ?>">
                    <label for="twitter">Twitter</label>
                    <?php if($errors->has('twitter')): ?>
                      <strong class="text-danger"><?php echo e($errors->first('twitter')); ?></strong>
                    <?php endif; ?>
                    <div class="input-group">
                      <input type="text" class="form-control" value="<?php echo e(old('twitter')); ?>" id="twitter" name="twitter"
                        placeholder="Twitter">
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-heart"></span>
                      </span>
                    </div>
                  </div>
              </div>

              <div class="row">
                <div class="col-xs-2 form-group<?php echo e($errors->has('pos') ? ' has-error' : ''); ?>">
                  <label for="pos" class="bold">POS:</label>
                  <?php if($errors->has('pos')): ?>
                    <strong class="text-danger"><?php echo e($errors->first('pos')); ?></strong>
                  <?php endif; ?>
                  <br>
                  <label class="radio-inline">
                    <input type="radio" name="pos" value="No" <?php echo e(old('pos') == 'No' ? 'checked' : ''); ?> > No
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="pos" value="Yes" <?php echo e(old('pos') == 'Yes' ? 'checked' : ''); ?> > Yes
                  </label>
                </div>

                <div class="col-xs-7 form-group text-center<?php echo e($errors->has('creditcard') ? ' has-error' : ''); ?>">
                  <label for="creditcard" class="bold">Χρεωστικές Κάρτες:</label>
                  <?php if($errors->has('creditcard')): ?>
                    <strong class="text-danger"><?php echo e($errors->first('creditcard')); ?></strong>
                  <?php endif; ?>
                  <br>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="creditcard[]" value="Νone" <?php echo e(old('creditcard') == 'Νone' ? 'checked' : ''); ?>> None
                  </label>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="creditcard[]" value="Visa" <?php echo e(old('creditcard') == 'Visa' ? 'checked' : ''); ?>> Visa
                  </label>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="creditcard[]" value="Μastercard" <?php echo e(old('creditcard') == 'Mastercard' ? 'checked' : ''); ?>> Mastercard
                  </label>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="creditcard[]" value="Αmerican express" <?php echo e(old('creditcard') == 'American Express' ? 'checked' : ''); ?>> American Express
                  </label>
                </div>
                <div class="col-xs-3 form-group<?php echo e($errors->has('delivery') ? ' has-error' : ''); ?>">
                  <label for="delivery" class="bold">Delivery:</label>
                  <?php if($errors->has('delivery')): ?>
                    <strong class="text-danger"><?php echo e($errors->first('delivery')); ?></strong>
                  <?php endif; ?>
                  <br>
                  <label class="radio-inline">
                    <input type="radio" name="delivery" value="No" <?php echo e(old('delivery') == 'No' ? 'checked' : ''); ?> > No
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="delivery" value="Yes" <?php echo e(old('delivery') == 'Yes' ? 'checked' : ''); ?> > Yes
                  </label>
                </div>
              </div>

          <div class="form-group">
            <label for="description">Description</label>
            <textarea class="textarea" name="description" placeholder="Place some text here" style="width: 100%; height:150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ><?php echo e(old('description')); ?></textarea>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\wamp64\www\karvali\resources\views/admin/companies/create.blade.php ENDPATH**/ ?>