<?php if(session()): ?>
<div class="container">
  <div class="row">
    <div class="col-xs-12 errors">
      <?php if(session()->has('status')): ?>
      <div class="alert alert-info">
        <?php echo e(session()->get('status')); ?>

      </div>
      <?php endif; ?>
      <?php if(session()->has('success')): ?> <br>
      <div class="alert alert-success">
        <?php echo e(session()->get('success')); ?>

      </div>
      <?php endif; ?>
      <?php if(session()->has('warning')): ?> <br>
      <div class="alert alert-danger">
        <?php echo e(session()->get('warning')); ?>

      </div>
      <?php endif; ?>
      <?php if(session()->has('error')): ?>
      <div class="alert alert-danger">
        <?php echo e(session()->get('error')); ?>

      </div>
      <?php endif; ?>
      <?php if(session()->has('errors')): ?>
        <div class="alert alert-danger">
            <ul class="list-group">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item"><?php echo $error; ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php endif; ?>
<?php /**PATH L:\2.2.drive\xampp\htdocs\karvali\resources\views/partials/alerts.blade.php ENDPATH**/ ?>