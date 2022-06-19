<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<?php echo $__env->make('partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>
    
    <?php echo $__env->make('partials.social', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if(!count($results)): ?>
        No results here
        <?php else: ?>
        <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <h1>efgfssdyhdrtfdyhrt</h1>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
    <?php endif; ?>

    <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH L:\xampp\htdocs\karvali\resources\views/searchresults.blade.php ENDPATH**/ ?>