
<?php $__env->startSection('title', __('head.searchresultspage')); ?>
<?php $__env->startSection('meta_description', __('meta.searchresultspagedescription')); ?>
<?php $__env->startSection('meta_keywords', __('meta.searchresultspagekeywords')); ?>

<?php $__env->startSection('content'); ?>

<div class="container">
    <div id="searchresultsheader">
        <h1>Αναζήτηση για <?php echo e($query); ?></h1>
        <?php echo $__env->make('home.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php if(!count($results)): ?>
    <h1>No results here</h1>
    <?php echo $__env->make('home.categories', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
    <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <h1><?php echo e($result->title); ?></h1>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
    <?php echo $__env->make('home.categories', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\wamp64\www\karvali\resources\views/searchresults.blade.php ENDPATH**/ ?>