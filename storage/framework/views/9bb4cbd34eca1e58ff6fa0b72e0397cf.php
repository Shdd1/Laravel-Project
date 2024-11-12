

<?php $__env->startSection('title', 'Edit Overtime Request'); ?>

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<div class="container mt-5">
    <h1 class="mb-4 text-center">Edit Overtime Request</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('admin.overtimes.update', $overtime->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="form-group mb-3">
            <label for="hours" class="form-label">Overtime Hours</label>
            <input type="number" step="0.01" class="form-control" name="hours" id="hours" value="<?php echo e($overtime->hours); ?>" required>
            <div class="invalid-feedback">Please enter the number of hours.</div>
        </div>

        <div class="form-group mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" name="status" id="status" required>
                <option value="pending" <?php echo e($overtime->status == 'pending' ? 'selected' : ''); ?>>Pending</option>
                <option value="accepted" <?php echo e($overtime->status == 'accepted' ? 'selected' : ''); ?>>Accepted</option>
                <option value="rejected" <?php echo e($overtime->status == 'rejected' ? 'selected' : ''); ?>>Rejected</option>
                <option value="under_review" <?php echo e($overtime->status == 'under_review' ? 'selected' : ''); ?>>Under Review</option>
            </select>
            <div class="invalid-feedback">Please select a valid status.</div>
        </div>

        <button type="submit" class="btn btn-success">Update Request</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sample-laravel-app\projectLaravel\resources\views/admin/overtimes/edit.blade.php ENDPATH**/ ?>