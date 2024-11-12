

<?php $__env->startSection('title', 'Edit Location'); ?>

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<div class="container mt-5">
    <h1 class="mb-4 text-center">Edit Location</h1>

    <form action="<?php echo e(route('admin.locations.update', $location->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="form-group mb-3">
            <label for="name" class="form-label">Location Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo e($location->name); ?>" required>
        </div>

        <button type="submit" class="btn btn-success">Update Location</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sample-laravel-app\projectLaravel\resources\views/admin/locations/edit.blade.php ENDPATH**/ ?>