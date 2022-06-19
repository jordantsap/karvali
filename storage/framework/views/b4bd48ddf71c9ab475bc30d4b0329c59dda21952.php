<?php $__env->startComponent('mail::message'); ?>
# Λάβαμε την παραγγελία σας, ευχαριστούμε!

**Κωδικός παραγγελίας:** <?php echo e($order->id); ?>


**Μέιλ παραγγελίας:** <?php echo e($order->billing_email); ?>


**Όνομα Παραγγελίας:** <?php echo e($order->billing_name); ?>


**Μερικό ποσό:** $<?php echo e(round($order->billing_subtotal, 2)); ?>


**Τελικό ποσό:** $<?php echo e(number_format($order->billing_total, 2)); ?>

<hr>
**Προϊόντα στην παραγγελία**
<hr>
<?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
Προϊόν: <?php echo e($product->title); ?> <br>
Καταστημα: <?php echo e($product->company->title); ?> <br>
Τιμή: $<?php echo e(round($product->price, 2)); ?><br>
Ποσότητα: <?php echo e($product->pivot->quantity); ?> <br>
<hr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

Περαιτέρω λεπτομέρειες στην ιστοσελίδα μας.

<?php $__env->startComponent('mail::button', ['url' => config('app.url'), 'color' => 'green']); ?>
Προς την στοσελίδα
<?php echo $__env->renderComponent(); ?>

Ευχαριστούμε ξανά για την προτίμησή σας.

Με εκτίμηση,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH L:\xampp\htdocs\karvali\resources\views/emails/orderplaced.blade.php ENDPATH**/ ?>