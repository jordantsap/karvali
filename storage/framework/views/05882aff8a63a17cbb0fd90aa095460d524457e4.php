

<div class="container">
  <div id="pages">
    <div class="row">
      <div class="col-xs-12">

        <h1 class="text-center"><?php echo e(__('cart.checkout')); ?></h1>
        <div class="divider"></div>
        
      </div>
      <div class="col-xs-6">
        <form id="checkout-form" action="<?php echo e(route('order.store')); ?>" method="POST" id="payment-form">
          <?php echo e(csrf_field()); ?>

          <h2><?php echo e(__('cart.orderdetails')); ?></h2>

          <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
            <label for="email">Email</label>
            <?php if(Auth::guard('customer')->user()): ?>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo e(auth('customer')->user()->email); ?>"  required readonly>
            <?php else: ?>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email')); ?>"  required>
            <?php endif; ?>
          </div>
          <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
            <label for="name"><?php echo e(__('cart.buyername')); ?></label>
            <?php if($errors->has('name')): ?>
              <strong class="text-danger"><?php echo e($errors->first('name')); ?></strong>
            <?php endif; ?>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name')); ?>"  required>
          </div>

          <div class="form-group<?php echo e($errors->has('city') ? ' has-error' : ''); ?>">
            <label for="city"><?php echo e(__('cart.buyercity')); ?></label>
            <?php if($errors->has('city')): ?>
              <strong class="text-danger"><?php echo e($errors->first('city')); ?></strong>
            <?php endif; ?>
            <input type="text" class="form-control" id="city" name="city" value="<?php echo e(old('city')); ?>" required>
          </div>

          <div class="form-group<?php echo e($errors->has('province') ? ' has-error' : ''); ?>">
              <label for="province"><?php echo e(__('cart.buyerarea')); ?></label>
              <?php if($errors->has('province')): ?>
                <strong class="text-danger"><?php echo e($errors->first('province')); ?></strong>
              <?php endif; ?>
              <input type="text" class="form-control" id="province" name="province" value="<?php echo e(old('province')); ?>"  required>
          </div>
          <!-- end half-form -->

          <div class="row">
            <div class="col-xs-12">
              <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
                <label for="address"><?php echo e(__('cart.buyeraddress')); ?></label>
                <?php if($errors->has('address')): ?>
                  <strong class="text-danger"><?php echo e($errors->first('address')); ?></strong>
                <?php endif; ?>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo e(old('address')); ?>"  required>
              </div>
          </div>
          </div>

          <div class="row">
            <div class="col-xs-6">
              <div class="form-group<?php echo e($errors->has('postalcode') ? ' has-error' : ''); ?>">
                <label for="postalcode"><?php echo e(__('cart.buyerareacode')); ?></label>
                <?php if($errors->has('postalcode')): ?>
                  <strong class="text-danger"><?php echo e($errors->first('postalcode')); ?></strong>
                <?php endif; ?>
                <input type="text" class="form-control" id="postalcode" name="postalcode" value="<?php echo e(old('postalcode')); ?>"  required>
              </div>
              </div>
              <div class="col-xs-6">
              <div class="form-group<?php echo e($errors->has('phone') ? ' has-error' : ''); ?>">
                <label for="phone"><?php echo e(__('cart.buyertelephone')); ?></label>
                <?php if($errors->has('phone')): ?>
                  <strong class="text-danger"><?php echo e($errors->first('phone')); ?></strong>
                <?php endif; ?>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo e(old('phone')); ?>"  required>
              </div>
            </div>
          </div>
          <!-- end half-form -->
          <div class="form-group<?php echo e($errors->has('otherinfo') ? ' has-error' : ''); ?>">
            <label for="otherinfo"><?php echo e(__('cart.buyerotherinfo')); ?></label>
            <?php if($errors->has('otherinfo')): ?>
              <strong class="text-danger"><?php echo e($errors->first('otherinfo')); ?></strong>
            <?php endif; ?>
            <div class="input-group">
              <textarea name="otherinfo" id="otherinfo" class="form-control"
                rows="5"><?php echo e(old('otherinfo')); ?></textarea>
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-info-sign"></span>
              </span>
            </div>
          </div>

          <button type="submit" onclick="this.form.submit(); this.disabled=true; this.value='Sending…';" id="complete-order" class="btn btn-default btn-block"><?php echo e(__('cart.sendorder')); ?></button>
        </form>
      </div>

      <div class="col-xs-6">
        <h2><?php echo e(__('cart.costs')); ?></h2>
          <table class="table">
            <thead>
              <tr>
                <th class="text-center"><?php echo e(__('cart.tax').' '.config('cart.tax')); ?>% :</th>
                <th class="text-center"><?php echo e(__('cart.subtotal')); ?>:</th>
                <th class="text-center"><?php echo e(__('cart.finaltotal')); ?>:</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-center"><?php echo e(Cart::tax()); ?></td>
                <td class="text-center"><?php echo e(Cart::subtotal()); ?></td>
                <td class="text-center"><?php echo e(Cart::total()); ?></td>
              </tr>
            </tbody>
          </table>
          <div class="divider"></div><br>

        <div class="row">
          <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-xs-12">
            <div class="col-xs-6">
              <img src="<?php echo e(asset('images/products/'.$item->model->logo)); ?>" class="img-responsive" alt="item">
              <div class=""><br>
                <b><?php echo e(__('cart.productdescription')); ?>:</b></br><?php echo e(Str::limit($item->model->description, 100)); ?></div>
            </div>
            <div class="col-xs-6">
              <ul class="list-group">
                <li class="list-group-item"><?php echo e(__('cart.productname')); ?>: <?php echo e($item->model->title); ?></li>
                <li class="list-group-item"><?php echo e(__('cart.quantity')); ?>:
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
                </li>
                <li class="list-group-item"><?php echo e(__('cart.price')); ?>: <?php echo e($item->model->price); ?> €</li>
                <li class="list-group-item"><?php echo e(__('cart.tax').' '.config('cart.tax')); ?>% : <?php echo e($item->tax() * $item->qty); ?> €</li>
                <li class="list-group-item"><?php echo e(__('cart.subtotal')); ?>: <?php echo e($item->subtotal()); ?> €</li>
                <li class="list-group-item"><?php echo e(__('cart.total')); ?>: <?php echo e($item->total()); ?> €</li>
              </ul>
            </div>
            <!-- end checkout-table -->

            

          </div> <!--COL-XS-12-->

          <div class="col-xs-12"><br>
            <div class="col-xs-6">
              <a href="<?php echo e(route('front.products')); ?>" class="btn btn-primary btn-block"><?php echo e(__('cart.continuebuy')); ?></a>
            </div>
            <div class="col-xs-6">
              <form action="<?php echo e(route('cart.destroy', $item->rowId)); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('DELETE')); ?>

                <button type="submit" onclick="this.disabled=true;this.value='Sending, please wait...';this.form.submit();" class="btn btn-danger btn-block" value="Remove"><?php echo e(__('cart.remove')); ?></button>
              </form>
            </div>
          </div>
          <div class="col-xs-12"><br>
            <div class="divider"></div><br>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          <div class="col-xs-12">
            <h2><?php echo e(__('cart.costs')); ?></h2>
            <div class="">
              <table class="table">
                <thead>
                  <tr>
                    <th class="text-center"><?php echo e(__('cart.tax').' '.config('cart.tax')); ?>% :</th>
                    <th class="text-center"><?php echo e(__('cart.subtotal')); ?>:</th>
                    <th class="text-center"><?php echo e(__('cart.total')); ?>:</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center"><?php echo e(Cart::tax()); ?></td>
                    <td class="text-center"><?php echo e(Cart::subtotal()); ?></td>
                    <td class="text-center"><?php echo e(Cart::total()); ?></td>
                  </tr>
                </tbody>
              </table>
              <div class="divider"></div><br>
            </div>
          </div>

        </div>
        <!-- end checkout-table -->


      </div>

    </div>
  <!-- end checkout-section -->
  </div>
</div>
<br>



<?php /**PATH L:\xampp\htdocs\karvali\resources\views/cart/checkout.blade.php ENDPATH**/ ?>