

<?php $__env->startSection('content'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Photos
        
          <small><a class="btn btn-primary" href="<?php echo e(route('photos.create')); ?>">Add New</a></small>
        
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
                  <th>Active</th>
                  <th>Album</th>
                  <th>Image</th>
                  
                    <th>Actions</th>
                  
                </tr>
                </thead>
                <?php $__currentLoopData = $albumphotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tbody>
                  <tr>
                    <td><?php echo e($photo->id); ?></td>
                    <td><?php echo e($photo->active?"yes":'no'); ?></td>
                    <td>
                      <?php if( ! empty($photo->album)): ?><?php echo e($photo->album->title); ?>

                      <?php else: ?> None
                      <?php endif; ?>
                    </td>
                    <td><img width="150px" height="150px" src="<?php echo e(asset('images/albumphotos/'.$photo->file)); ?>" alt="<?php echo e($photo->alt); ?>"></td>
                    <td>
                    
                      <a class="btn btn-primary" href="<?php echo e(route('photos.edit', $photo->id)); ?>">Edit</a> -
                    
                    
                    </td>
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
                    
                      <th>Actions</th>
                    
                  </tr>
                </tfoot>
              </table>
              <?php echo e($albumphotos->links()); ?>

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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\wamp64\www\karvali\resources\views/admin/albumphotos/index.blade.php ENDPATH**/ ?>