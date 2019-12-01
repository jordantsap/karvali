
<?php $__env->startSection('title', 'Εγγραφή Πελάτη'); ?>

<?php $__env->startSection('content'); ?>
  <div class="container-fluid" style="margin-bottom:70px;">
    <div class="row">
  <div class="col-xs-11 col-xs-offset-1">



        <h1 class="text-center"><?php echo e(__('register.maintitle')); ?><br>
          <small class="text-center"><?php echo e(__('register.subtitle')); ?></small>
        </h1>
        <form class="form-group" method="POST" action="<?php echo e(route('register')); ?>">
        <div class="col-xs-10">
            <?php echo e(csrf_field()); ?>


            <div class="row">
              <div class="col-xs-12 text-center">
                <h1><?php echo e(__('register.requestdetails')); ?></h1>
                <li class="divider"></li>
                <br>
              </div>
              <div class="col-xs-12 col-xs-6 form-group">
                <label for="category" class="control-label"><?php echo e(__('register.requestpackagelabel')); ?></label>
                <div class="">
                  <select class="form-control" name="role">
                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($role->name); ?>"><?php echo e($role->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>
              <div class="col-xs-12 col-md-6 form-group<?php echo e($errors->has("category") ? ' has-error' : ''); ?>">
                <label for="category" class="control-label"><?php echo e(__('register.requestcategorylabel')); ?></label>

                <select class="form-control" id="category" name="category" value="<?php echo e(old("category")); ?>">
                  <option value="0">Διαλέξτε κατηγορία Καταχώρησης</option>
                  <option value="company <?php if(count($errors)): ?><?php echo e('selected'); ?><?php endif; ?>">Κατάστημα</option>
                    <option value="product <?php if(count($errors)): ?><?php echo e('selected'); ?><?php endif; ?>">Προϊόντα</option>
                    </select>
                    <?php if($errors->has("category")): ?>
                      <span class="help-block">
                        <strong><?php echo e($errors->first("category")); ?></strong>
                      </span>
                    <?php endif; ?>
                  </div>

                  <div class="col-xs-12 form-group<?php echo e($errors->has('requestname') ? ' has-error' : ''); ?>">
                    <label for="requestname" class="control-label"><?php echo e(__('register.requestname')); ?></label>

                    <input id="requestname" type="text" class="form-control" name="requestname" value="<?php echo e(old('requestname')); ?>" placeholder="<?php echo e(__('register.reqnameplaceholder')); ?>"> <?php if($errors->has('requestname')): ?>
                      <span class="help-block">
                        <strong><?php echo e($errors->first('requestname')); ?></strong>
                      </span>
                    <?php endif; ?>
                  </div>

                  <div class="col-xs-12 form-group">
                    <label for="description"><?php echo e(__('register.additionallabel')); ?></label>
                    <textarea class="textarea" name="description" placeholder="<?php echo e(__('register.additionalplaceholder')); ?>" style="width: 100%; height:150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo e(old('description')); ?></textarea>
                  </div>
                  

            <div class="row">
              <div id="details-reg" class="col-xs-12 text-center">
                <h1><?php echo e(__('register.usrdetails')); ?></h1>
                <li class="divider"></li>
                <br>
              </div>

              <div class="col-xs-12 col-md-6 form-group<?php echo e($errors->has('fullname') ? ' has-error' : ''); ?>">
                <label for="fullname" class="control-label"><?php echo e(__('register.fullnamelabel')); ?></label>

                <input id="fullname" type="text" class="form-control" name="fullname" value="<?php echo e(old('fullname')); ?>" placeholder="<?php echo e(__('register.fullnameplaceholder')); ?>"> <?php if($errors->has('fullname')): ?>
                <span class="help-block">
                  <strong><?php echo e($errors->first('fullname')); ?></strong>
                </span>
                <?php endif; ?>
              </div>
              <div class="col-xs-12 col-md-6 form-group<?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
                <label for="username" class="control-label"><?php echo e(__('register.usernamelabel')); ?></label>

                <input id="username" type="text" class="form-control" name="username" value="<?php echo e(old('username')); ?>" placeholder="<?php echo e(__('register.usernameplaceholder')); ?>"> <?php if($errors->has('username')): ?>
                <span class="help-block">
                  <strong><?php echo e($errors->first('username')); ?></strong>
                </span>
                <?php endif; ?>
              </div>

              <div class="col-xs-12 col-md-6 form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                <label for="email" class="control-label"><?php echo e(__('register.emaillabel')); ?></label>

                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(__('register.emailplaceholder')); ?>"> <?php if($errors->has('email')): ?>
                <span class="help-block">
                  <strong><?php echo e($errors->first('email')); ?></strong>
                </span>
                <?php endif; ?>
              </div>

              <div class="col-xs-12 col-sm-6 col-md-3 form-group<?php echo e($errors->has('tel') ? ' has-error' : ''); ?>">
                <label for="tel" class="control-label"><?php echo e(__('register.tellabel')); ?></label>

                <input id="tel" type="text" class="form-control" name="tel" value="<?php echo e(old('tel')); ?>" placeholder="<?php echo e(__('register.telplaceholder')); ?>"> <?php if($errors->has('tel')): ?>
                <span class="help-block">
                  <strong><?php echo e($errors->first('tel')); ?></strong>
                </span>
                <?php endif; ?>
              </div>

              <div class="col-xs-12 col-sm-6 col-md-3 form-group<?php echo e($errors->has('mobile') ? ' has-error' : ''); ?>">
                <label for="mobile" class="control-label"><?php echo e(__('register.mobilelabel')); ?></label>

                <input id="mobile" type="text" class="form-control" name="mobile" value="<?php echo e(old('mobile')); ?>" placeholder="<?php echo e(__('register.mobileplaceholder')); ?>">
                <?php if($errors->has('mobile')): ?>
                <span class="help-block">
                  <strong><?php echo e($errors->first('mobile')); ?></strong>
                </span>
                <?php endif; ?>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-12 col-md-6 form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                <label for="password" class="control-label"><?php echo e(__('register.passlabel')); ?></label>
                  <input id="password" type="password" class="form-control" name="password" value="<?php echo e(old('password')); ?>" placeholder="<?php echo e(__('register.passplaceholder')); ?>">
                  <?php if($errors->has('password')): ?>
                  <span class="help-block">
                    <strong><?php echo e($errors->first('password')); ?></strong>
                  </span>
                  <?php endif; ?>
              </div>

              <div class="col-xs-12 col-md-6 form-group">
                <label for="password-confirm" class="control-label"><?php echo e(__('register.passconlabel')); ?></label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="<?php echo e(__('register.passconplaceholder')); ?>">

              </div>
            </div>

            </div>

            <div class="row">

              <div class="col-xs-12 col-sm-6 form-group">
                <div class="checkbox">
                  <label for="newsletter" class="checkbox-inline">
                    <input type="checkbox" id="newsletter" name="newsletter" value="1" checked> <?php echo e(__('register.newsletter')); ?>

                  </label>
                </div>
              </div>

              <div class="col-xs-12 col-sm-6 form-group">
                <button type="submit" class="btn btn-primary btn-block">
                  Αποστολή Αίτησης
                </button>
              </div>
            </div>
          </form>
        </div>


            <div class="col-xs-2" style="padding-top:150px;">
              

                <h3 class="text-center"><?php echo e(__('Πολιτική απορρήτου')); ?></h3>
                
                <a id="btn" href="<?php echo e(route('privacy')); ?>" class="btn btn-info btn-block" target="_blank"><?php echo e(__('Περισσότερα')); ?></a>
                
                <h3 class="text-center"><?php echo e(__('Προσωπικά Δεδομένα')); ?></h3>
                
                <a id="btn" href="<?php echo e(route('personaldata')); ?>" class="btn btn-info btn-block" target="_blank"><?php echo e(__('Περισσότερα')); ?></a>
                
                <h3 class="text-center"><?php echo e(__('Υπηρεσίες')); ?></h3>
                
                <a id="btn" href="<?php echo e(route('services')); ?>" class="btn btn-info btn-block" target="_blank"><?php echo e(__('Περισσότερα')); ?></a>
              
            </div>

      </div>
    </div>
    

  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/karvali/resources/views/auth/auth-request.blade.php ENDPATH**/ ?>