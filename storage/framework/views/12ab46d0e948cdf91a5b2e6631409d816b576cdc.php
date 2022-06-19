

<?php $__env->startSection('content'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Newsletters
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_newsletters', App\Newsletter::class)): ?>
          <small><a class="btn btn-primary" href="<?php echo e(route('newsletters.create')); ?>">New</a></small>
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
                  <th>E-mail</th>
                  <th>Created At</th>
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_newsletters','update_newsletters', App\Newsletter::class)): ?>
                    <th>Actions</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <?php $__currentLoopData = $newsletters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newsletter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tbody>
                  <tr>
                    <td><?php echo e($newsletter->id); ?></td>
                    <td><?php echo e($newsletter->email); ?></td>
                    <td><?php echo e($newsletter->created_at); ?></td>
                    <td><?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update_newsletters', App\Newsletter::class)): ?>
                      <a class="btn btn-primary" href="<?php echo e(route('newsletter.edit', $newsletter->id)); ?>">Edit</a> -
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_newsletters', App\Newsletter::class)): ?>
                      <a class="btn btn-primary" href="<?php echo e(route('newsletter.show', $newsletter->id)); ?>">View</a>
                      <?php endif; ?>
                    </td>
                  </tr>
                  </tbody>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tfoot>
                  <tr>
                    <th>id</th>
                    <th>E-Mail</th>
                    <th>Created At</th>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_newsletters','update_newsletters', App\Newsletter::class)): ?>
                      <th>Actions</th>
                    <?php endif; ?>
                  </tr>
                </tfoot>
              </table>
              <?php echo e($newsletters->links()); ?>

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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\wamp64\www\karvali\resources\views/admin/newsletters/index.blade.php ENDPATH**/ ?>