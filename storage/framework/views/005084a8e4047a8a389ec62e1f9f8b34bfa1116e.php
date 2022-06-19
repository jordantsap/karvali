

<?php $__env->startSection('content'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Albums
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_albums', App\Album::class)): ?>
          <small><a class="btn btn-primary" href="<?php echo e(route('albums.create')); ?>">Add New</a></small>
        <?php endif; ?>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Title</th>
                  <th>Cover_Image</th>
                  <th>Description</th>
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_albums','update_albums', App\Album::class)): ?>
                    <th>Actions</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tbody>
                  <tr>
                    <td><?php echo e($album->id); ?></td>
                    
                    <td><?php echo e($album->title); ?></td>
                    <td><img width="150px" height="150px" src="<?php echo e(asset('images/albums/'.$album->cover_image)); ?>" alt="<?php echo e($album->title); ?>"></td>
                    <td><?php echo e(Str::limit($album->description, 20)); ?></td>
                    <td>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update_albums', App\Album::class)): ?>
                      <a class="btn btn-primary" href="<?php echo e(route('albums.edit', $album->id)); ?>">Edit</a> -
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_albums', App\Album::class)): ?>
                      <a class="btn btn-primary" href="<?php echo e(route('albums.show', $album->id)); ?>">View</a>
                    <?php endif; ?>
                    </td>
                  </tr>
                  </tbody>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tfoot>
                  <tr>
                    <th>id</th>
                    <th>Title</th>
                    <th>Cover_Image</th>
                    <th>Description</th>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_albums','update_albums', App\Album::class)): ?>
                      <th>Actions</th>
                    <?php endif; ?>
                  </tr>
                </tfoot>
              </table>
              <?php echo e($albums->links()); ?>

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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\wamp64\www\karvali\resources\views/admin/albums/index.blade.php ENDPATH**/ ?>