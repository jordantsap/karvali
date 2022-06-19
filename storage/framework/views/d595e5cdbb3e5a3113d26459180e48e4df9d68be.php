
<?php $__env->startSection('title', __('head.cartpagetitle')); ?>
<?php $__env->startSection('meta_description', __('meta.cartpagedescription')); ?>
<?php $__env->startSection('meta_keywords', 'shopping cart, product cart,'); ?>

<?php $__env->startSection('content'); ?>
<!-- Page Content -->
<div class="container">
  <div id="pages">
    <div class="row">
      <div class="col-xs-12">

        <h1 class="text-center"><a class="btn btn-success" href="javascript:history.back()"><?php echo e(__('cart.goback')); ?></a> - <?php echo e(__('cart.cart')); ?></h1>
        <div class="divider"></div>
        
      </div>
      <div class="col-xs-12">
        <?php if(Cart::count() == 1): ?>
        <h3 class="col-xs-6 text-center"><?php echo e(__('cart.total')); ?> <?php echo e(Cart::count()); ?> <?php echo e(__('cart.productincart')); ?></h3>
      <?php elseif(Cart::count() > 1): ?>
        <h3 class="col-xs-6 text-center"><?php echo e(__('cart.total')); ?> <?php echo e(Cart::count()); ?> <?php echo e(__('cart.productsincart')); ?></h3>
      <?php else: ?>
        <h3 class="col-xs-8 col-xs-offset-2"><?php echo e(__('cart.noproductincart')); ?>

      <?php endif; ?>
    </div>
    <div class="col-xs-12">
        <div class="col-xs-12">
        <div class="table-responsive">
          <table class="table">
            <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <thead class="bg-primary">
              <tr>
                <th><?php echo e(__('cart.image')); ?></th>
                <th><?php echo e(__('cart.name-company')); ?></th>
                <th><?php echo e(__('cart.productcode')); ?></th>
                <th><?php echo e(__('cart.productdescription')); ?></th>
                <th><?php echo e(__('cart.quantity')); ?></th>
                <th><?php echo e(__('cart.price')); ?></th>
                <th><?php echo e(__('Actions')); ?></th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td><img src="<?php echo e(asset('images/products/'.$item->model->logo)); ?>" alt="<?php echo e($item->model->title); ?>" width="100px" height="100px"></td>
                <td><?php echo e($item->model->title); ?><br>
                  <div class="divider"></div>
                  <a target="_blank" href="<?php echo e(route('company',$item->model->company->slug)); ?>"><?php echo e($item->model->company->title); ?></a>
                </td>
                <td><?php echo e(Str::limit($item->model->sku, 50)); ?></td>
                <td><?php echo e(Str::limit($item->model->description,50)); ?></td>
                <td class="text-center">
                  <select class="quantity" data-id="<?php echo e($item->rowId); ?>">
                      <option <?php echo e($item->qty == 1 ? 'selected' : ''); ?>>1</option>
                      <option <?php echo e($item->qty == 2 ? 'selected' : ''); ?>>2</option>
                      <option <?php echo e($item->qty == 3 ? 'selected' : ''); ?>>3</option>
                      <option <?php echo e($item->qty == 4 ? 'selected' : ''); ?>>4</option>
                      <option <?php echo e($item->qty == 5 ? 'selected' : ''); ?>>5</option>
                      <option <?php echo e($item->qty == 6 ? 'selected' : ''); ?>>6</option>
                      <option <?php echo e($item->qty == 7 ? 'selected' : ''); ?>>7</option>
                      <option <?php echo e($item->qty == 8 ? 'selected' : ''); ?>>8</option>
                      <option <?php echo e($item->qty == 9 ? 'selected' : ''); ?>>9</option>
                      <option <?php echo e($item->qty == 10 ? 'selected' : ''); ?>>10</option>
                  </select>
                </td>
                <td><?php echo e($item->subtotal); ?>€</td>
                <td><a target="_blank" href="<?php echo e(route('product',$item->model->slug)); ?>" class="btn btn-primary btn-block">
                  <?php echo e(__('cart.product')); ?></a>
                  <br>
                  <form action="<?php echo e(route('cart.destroy', $item->rowId)); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('DELETE')); ?>

                    <button type="submit" class="btn btn-danger" value="Remove"><?php echo e(__('cart.remove')); ?></button>
                  </form>
                </td>
              </tr>

            </tbody>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </table>

        </div>

      </div>
      <?php if(Cart::count() > 0): ?>
      <div class="col-xs-12">
        <h1 class="text-center"><?php echo e(__('cart.orderdetails')); ?></h1>
        <div class="divider"></div>
        <br>
      </div>
      
      <div class="col-xs-8">
        <div class="panel panel-primary">
          <ul class="list-group">
            <li class="list-group-item"><?php echo e(__('cart.tax').' '.config('cart.tax')); ?>% : <?php echo e(Cart::tax()); ?> €</li>
            <li class="list-group-item"><?php echo e(__('cart.subtotal')); ?>: <?php echo e(Cart::subtotal()); ?> €</li>
            <li class="list-group-item"><?php echo e(__('cart.finaltotal')); ?>: <?php echo e(Cart::total()); ?> €</li>
          </ul>
        </div>
      </div>
      <div class="col-xs-4">
        
        <?php if(Cart::count() > 0): ?>
        <div class="text-center">
          <div class="btn btn-block">
            <a href="<?php echo e(route('front.products')); ?>" class="btn btn-primary"><?php echo e(__('cart.gotoproductpage')); ?></a>
          </div>
          <div class="btn btn-block">
              <form action="<?php echo e(route('cart.clean')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <button title="<?php echo e(__('cart.cleantitle')); ?>" type="submit" class="btn btn-danger" value="Remove"><?php echo e(__('cart.clean')); ?></button>

              </form>
          </div>
        </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>

      </div>
    </div><br> <!----main row end--->

  </div>
</div>
<?php echo $__env->make('cart.checkout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('extra-js'); ?>

  
    <script>
        (function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.quantity').on('change', function() {
                var id = $(this).attr("data-id")
                $.ajax({
                  type: "PATCH",
                  url: '<?php echo e(route("cart.index")); ?>' + '/' + id,
                  data: {
                    'quantity': this.value,
                  },
                  success: function(data) {
                    // console.log(id);
                    window.location.href = '<?php echo e(route('cart.index')); ?>';
                  }
                });

            });

        })();

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\xampp\htdocs\karvali\resources\views/cart/cart.blade.php ENDPATH**/ ?>