

<?php $__env->startSection('content'); ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Adverts
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_adverts', App\Advert::class)): ?>
          <small><a class="btn btn-primary" href="<?php echo e(route('adverts.create')); ?>">New</a></small>
        <?php endif; ?>
      </h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">

                <?php if(!count($adverts)): ?>
                  <div class="col-xs-12 noresults">
                    <h1><b>Δεν υπάρχει τίποτα εδώ ακόμα!</b></h1>
                  </div>
                <?php else: ?>
                <thead>
                <tr>
                  <th>id</th>
                  <th>Active</th>
                  <th>Banner</th>
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_adverts','update_adverts', App\Advert::class)): ?>
                    <th>Actions</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <?php $__currentLoopData = $adverts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tbody>
                  <tr>
                    <td><?php echo e($advert->id); ?></td>
                    <td><?php echo e($advert->active?"yes":'no'); ?></td>
                    <td><img width="150px" height="150px" src="<?php echo e(asset('images/adverts/'.$advert->banner)); ?>" alt="<?php echo e($advert->title); ?>"></td>
                    <td>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update_adverts', App\Advert::class)): ?>
                      <a class="btn btn-primary" href="<?php echo e(route('adverts.edit', $advert->id)); ?>">Edit</a> -
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_adverts', App\Advert::class)): ?>
                      <a class="btn btn-primary" href="<?php echo e(route('adverts.show', $advert->id)); ?>">View</a>
                      <?php endif; ?>
                    </td>
                  </tr>
                  </tbody>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
                <tfoot>
                  <tr>
                    <th>id</th>
                    <th>Active</th>
                    <th>Banner</th>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_adverts','update_adverts', App\Advert::class)): ?>
                      <th>Actions</th>
                    <?php endif; ?>
                  </tr>
                </tfoot>
              </table>
              <?php echo e($adverts->links()); ?>

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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\wamp64\www\karvali\resources\views/admin/adverts/index.blade.php ENDPATH**/ ?>