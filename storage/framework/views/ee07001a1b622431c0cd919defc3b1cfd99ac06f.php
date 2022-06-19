

<?php $__env->startSection('content'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Events
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_events', App\Event::class)): ?>
          <small><a class="btn btn-primary" href="<?php echo e(route('events.create')); ?>">New</a></small>
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
                  <th>Title</th>
                  <th>Logo</th>
                  <th>Description</th>
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_events','update_events', App\Event::class)): ?>
                    <th>Actions</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tbody>
                  <tr>
                    <td><?php echo e($event->id); ?></td>
                    <td><?php echo e($event->active?"yes":'no'); ?></td>
                    <td><?php echo e($event->title); ?></td>
                    <td><img width="150px" height="150px" src="<?php echo e(asset('images/events/'.$event->logo)); ?>" alt="<?php echo e($event->title); ?>"></td>
                    <td><?php echo e(Str::limit($event->description, 20)); ?></td>
                    <td>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update_events', App\Event::class)): ?>
                        <a class="btn btn-primary" href="<?php echo e(route('events.edit', $event->id)); ?>">Edit</a> -
                      <?php endif; ?>
                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_events', App\Event::class)): ?>
                        <a class="btn btn-primary" href="<?php echo e(route('events.show', $event->id)); ?>">View</a></td>
                      <?php endif; ?>
                  </tr>
                  </tbody>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tfoot>
                  <tr>
                    <th>id</th>
                    <th>Active</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Description</th>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_events','update_events', App\Event::class)): ?>
                      <th>Actions</th>
                    <?php endif; ?>
                  </tr>
                </tfoot>
              </table>
              <?php echo e($events->links()); ?>

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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\wamp64\www\karvali\resources\views/admin/events/index.blade.php ENDPATH**/ ?>