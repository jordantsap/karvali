
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      New Event
    </h1>
  </section>

  <section class="content">
    <div class="box">
      <form action="<?php echo e(route('events.store')); ?>" method="post" role="form" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <div class="box-body">
          <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
            <label for="title">Ονομασία Εκδήλωσης - Διοργανωτή</label>
            <?php if($errors->has('title')): ?>
            <strong class="text-danger"><?php echo e($errors->first('title')); ?></strong> <?php endif; ?>
            <div class="input-group">
              <input type="text" value="<?php echo e(old('title')); ?>" class="form-control" name="title" id="title"
                placeholder="Enter Name" required>
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-home"></span>
              </span>
            </div>
          </div>

          <div class="form-group<?php echo e($errors->has('meta_description') ? ' has-error' : ''); ?>">
            <label for="meta_description">Meta Description</label>
            <?php if($errors->has('meta_description')): ?>
            <strong class="text-danger"><?php echo e($errors->first('meta_description')); ?></strong> <?php endif; ?>
            <div class="input-group">
              <input type="text" value="<?php echo e(old('meta_description')); ?>" class="form-control" name="meta_description" id="meta_description"
                placeholder="meta_description" required>
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-home"></span>
              </span>
            </div>
          </div>

          <div class="form-group<?php echo e($errors->has('meta_keywords') ? ' has-error' : ''); ?>">
            <label for="meta_keywords">Meta Keywords</label>
            <?php if($errors->has('meta_keywords')): ?>
            <strong class="text-danger"><?php echo e($errors->first('meta_keywords')); ?></strong> <?php endif; ?>
            <div class="input-group">
              <input type="text" value="<?php echo e(old('meta_keywords')); ?>" class="form-control" name="meta_keywords" id="meta_keywords"
                placeholder="meta_keywords" required>
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-home"></span>
              </span>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-2 form-group">
              <label for="active">Publish &nbsp
                <input type="checkbox" name="active" value="1">
              </label>
            </div>
            <div class="col-xs-5">
              <div class="form-group<?php echo e($errors->has('entrance') ? ' has-error' : ''); ?>">
                <label for="entrance">Τιμή Εισόδου</label>
                <?php if($errors->has('entrance')): ?>
                  <strong class="text-danger"><?php echo e($errors->first('entrance')); ?></strong>
                <?php endif; ?>
                <div class="input-group">
                  <input type="text" value="<?php echo e(old('entrance')); ?>" class="form-control" id="entrance"
                    name="entrance" placeholder="Τιμή Εισόδου εάν υπάρχει αλλιώς δωρεάν"
                    required>
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-euro"></span>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-xs-5">
              <div class="form-group<?php echo e($errors->has('telephone') ? ' has-error' : ''); ?>">
                <label for="telephone">Τηλέφωνο</label>
                <?php if($errors->has('telephone')): ?>
                  <strong class="text-danger"><?php echo e($errors->first('telephone')); ?></strong>
                 <?php endif; ?>
                <div class="input-group">
                  <input type="text" value="<?php echo e(old('telephone')); ?>" class="form-control" id="telephone"
                    name="telephone" placeholder="Τηλέφωνο Επικοινωνίας" required>
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-earphone"></span>
                  </span>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-3">
              <div class="form-group<?php echo e($errors->has('start_date') ? ' has-error' : ''); ?>">
                <label for="start_date">Ημερομηνία Έναρξης</label>
                <?php if($errors->has('start_date')): ?>
                <strong class="text-danger"><?php echo e($errors->first('start_date')); ?></strong>                <?php endif; ?>
                <div class="input-group">
                  <input type="date" value="<?php echo e(old('start_date')); ?>" class="form-control" id="start_date"
                    name="start_date" placeholder="Ημερομηνία Εκδήλωσης" required>
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-xs-3">
              <div class="form-group<?php echo e($errors->has('start_time') ? ' has-error' : ''); ?>">
                <label for="start_time">Ώρα Έναρξης</label>
                <?php if($errors->has('start_time')): ?>
                <strong class="text-danger"><?php echo e($errors->first('start_time')); ?></strong>                <?php endif; ?>
                <div class="input-group">
                  <input type="time" value="<?php echo e(old('start_time')); ?>" class="form-control" id="start_time"
                    name="start_time" placeholder="" required>
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-xs-3">
              <div class="form-group<?php echo e($errors->has('end_date') ? ' has-error' : ''); ?>">
                <label for="end_date">Ημερομηνία Λήξης</label>
                <?php if($errors->has('end_date')): ?>
                <strong class="text-danger"><?php echo e($errors->first('end_date')); ?></strong>                <?php endif; ?>
                <div class="input-group">
                  <input type="date" value="<?php echo e(old('end_date')); ?>" class="form-control" id="end_date"
                    name="end_date" placeholder="Ημερομηνία Λήξης" required>
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-xs-3">
              <div class="form-group<?php echo e($errors->has('end_time') ? ' has-error' : ''); ?>">
                <label for="end_time">Ώρα Λήξης</label>
                <?php if($errors->has('end_time')): ?>
                <strong class="text-danger"><?php echo e($errors->first('end_time')); ?></strong>                <?php endif; ?>
                <div class="input-group">
                  <input type="time" value="<?php echo e(old('end_time')); ?>" class="form-control" id="end_time"
                    name="end_time" placeholder="" required>
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                  </span>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group<?php echo e($errors->has('header') ? ' has-error' : ''); ?>">
            <label for="header">header</label>
            <?php if($errors->has('header')): ?>
            <strong class="text-danger"><?php echo e($errors->first('header')); ?></strong>                <?php endif; ?>
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
                <strong class="text-danger"><?php echo e($errors->first('logo')); ?></strong>                <?php endif; ?>
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
                <strong class="text-danger"><?php echo e($errors->first('image1')); ?></strong>                <?php endif; ?>
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
                <strong class="text-danger"><?php echo e($errors->first('image2')); ?></strong>                <?php endif; ?>
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
                <strong class="text-danger"><?php echo e($errors->first('image3')); ?></strong>                <?php endif; ?>
                <div class="input-group">
                  <input type="file" name="image3">
                  <p class="help-block">Επιτρέπονται όλα τα είδη εικόνων.</p>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-6 form-group<?php echo e($errors->has('website') ? ' has-error' : ''); ?>">
              <label for="website">Ιστοσελίδα</label>
              <?php if($errors->has('website')): ?>
              <strong class="text-danger"><?php echo e($errors->first('website')); ?></strong>              <?php endif; ?>
              <div class="input-group">
                <input type="text" value="<?php echo e(old('website')); ?>" class="form-control" id="website"
                  name="website" placeholder="Website">
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-globe"></span>
                </span>
              </div>
            </div>
            <div class="col-xs-6 form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
              <label for="email">E-Mail</label>
              <?php if($errors->has('email')): ?>
              <strong class="text-danger"><?php echo e($errors->first('email')); ?></strong>              <?php endif; ?>
              <div class="input-group">
                <input type="email" value="<?php echo e(old('email')); ?>" class="form-control" id="email" name="email"
                  placeholder="E-Mail" required>
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
              <strong class="text-danger"><?php echo e($errors->first('facebook')); ?></strong>              <?php endif; ?>
              <div class="input-group">
                <input type="text" value="<?php echo e(old('facebook')); ?>" class="form-control" id="facebook"
                  name="facebook" placeholder="facebook">
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-thumbs-up"></span>
                </span>
              </div>
            </div>
            <div class="col-xs-6 form-group<?php echo e($errors->has('twitter') ? ' has-error' : ''); ?>">
              <label for="twitter">Twitter</label>
              <?php if($errors->has('twitter')): ?>
              <strong class="text-danger"><?php echo e($errors->first('twitter')); ?></strong>              <?php endif; ?>
              <div class="input-group">
                <input type="text" value="<?php echo e(old('twitter')); ?>" class="form-control" id="twitter"
                  name="twitter" placeholder="Twitter">
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-heart"></span>
                </span>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-xs-12">
              <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                <label for="description">Περιγραφή</label>
                <?php if($errors->has('description')): ?>
                <strong class="text-danger"><?php echo e($errors->first('description')); ?></strong>                <?php endif; ?>
                <div class="input-group">
                  <textarea name="description" placeholder="Description" id="description" class="form-control"
                    rows="5" required><?php echo e(old('description')); ?></textarea>
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-info-sign"></span>
                  </span>
                </div>
                <input type="submit" name="submit" id="submit" value="Submit" class="col-xs-12 btn btn-info btn-block">
              </div>
            </div>
      </form>
      
      </div>
    </div>
</div>
<!-- /.box -->

</section>
<!-- /.content -->
</div>
</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\wamp64\www\karvali\resources\views/admin/events/create.blade.php ENDPATH**/ ?>