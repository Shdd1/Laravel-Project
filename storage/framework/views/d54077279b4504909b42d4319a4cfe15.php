

<?php $__env->startSection('title', 'Add New Location'); ?>

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<div class="container mt-5">
    <h1 class="mb-4 text-center">Add New Location</h1>

    <form action="<?php echo e(route('admin.locations.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="form-group mb-3">
            <label for="name" class="form-label">Location Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Location</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sample-laravel-app\projectLaravel\resources\views/admin/locations/create.blade.php ENDPATH**/ ?>