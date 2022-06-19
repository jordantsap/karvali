
<?php $__env->startSection('title', 'Είσοδος Χρήστη'); ?>
<?php $__env->startSection('meta_description', __('meta.loginpagedescription')); ?>
<?php $__env->startSection('meta_keywords', 'login, sign in'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo e(__('form.loginheader')); ?></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label"><?php echo e(__('form.email')); ?></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label"><?php echo e(__('form.password')); ?></label>

                            <div class="col-md-6">
                                <input id="password" autocomplete="off" type="password" class="form-control" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">

                                    <label>
                                        <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> <?php echo e(__('form.rememberme')); ?>

                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button id="btn" type="submit" class="btn btn-primary">
                                    <?php echo e(__('form.login')); ?>

                                </button>
                                <a id="btn" class="btn btn-default" href="<?php echo e(route('password.request')); ?>">
                                    <?php echo e(__('form.passwordrequest')); ?>?
                                </a>
                                
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\wamp64\www\karvali\resources\views/auth/login.blade.php ENDPATH**/ ?>