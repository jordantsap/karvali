

<?php $__env->startSection('content'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Products
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_products', App\Product::class)): ?>
          <small><a class="btn btn-primary" href="<?php echo e(route('prod.create')); ?>">Add New</a></small>
        <?php endif; ?>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Active</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Logo</th>
                    <th>Description</th>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_products','update_products', App\Product::class)): ?>
                      <th>Actions</th>
                    <?php endif; ?>
                  </tr>
                </thead>
                <?php if(count($products) > 0): ?>
                  <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tbody>
                    <tr>
                      <td><?php echo e($product->id); ?></td>
                      <td><?php echo e($product->active?"yes":'no'); ?></td>
                      <td>
                        <?php if( ! empty($product->category)): ?><?php echo e($product->category->name); ?>

                        <?php else: ?> None
                        <?php endif; ?>
                      </td>
                      <td><?php echo e($product->title); ?></td>
                      <td><img width="150px" height="150px" src="<?php echo e(asset('images/products/'.$product->logo)); ?>" alt="<?php echo e($product->title); ?>"></td>
                      <td><?php echo e(Str::limit($product->description, 20)); ?></td>
                      <td>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update_products', App\Product::class)): ?>
                          <a class="btn btn-primary" href="<?php echo e(route('prod.edit', $product->id)); ?>">Edit</a> -
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_products', App\Product::class)): ?>
                          <a class="btn btn-primary" href="<?php echo e(route('prod.show', $product->id)); ?>">View</a>
                        <?php endif; ?>
                      </td>
                    </tr>
                    </tbody>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php else: ?>
                    no products
                <?php endif; ?>
                <tfoot>
                  <tr>
                    <th>id</th>
                    <th>Active</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Description</th>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['view_products','update_products'], App\Product::class)): ?>
                      <th>Actions</th>
                    <?php endif; ?>
                  </tr>
                </tfoot>
              </table>
              <?php echo e($products->links()); ?>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\wamp64\www\karvali\resources\views/admin/products/index.blade.php ENDPATH**/ ?>