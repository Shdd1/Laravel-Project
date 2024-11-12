

<?php $__env->startSection('title', 'Manage Overtime Requests'); ?>

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<div class="container mt-5">
    <h1 class="mb-4 text-center">Manage Overtime Requests</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if($overtimes->isEmpty()): ?>
        <div class="alert alert-info">
            No overtime requests found.
        </div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Employee Name</th>
                        <th>Project</th> <!-- عمود المشروع -->
                        <th>Location</th> <!-- عمود الموقع -->
                        <th>Hours</th>
                        <th>Date</th>
                        <th>Note</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $overtimes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $overtime): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($overtime->user->name); ?></td> <!-- عرض اسم الموظف -->
                            <td><?php echo e($overtime->project->name ?? 'N/A'); ?></td> <!-- عرض اسم المشروع -->
                            <td><?php echo e($overtime->location->name ?? 'N/A'); ?></td> <!-- عرض اسم الموقع -->
                            <td><?php echo e($overtime->hours); ?></td>
                            <td><?php echo e($overtime->date); ?></td>
                            <td><?php echo e($overtime->reason); ?></td>
                            <td><?php echo e(ucfirst($overtime->status)); ?></td>
                            <td>
                                <a href="<?php echo e(route('admin.overtimes.edit', $overtime->id)); ?>" class="btn btn-sm btn-primary">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sample-laravel-app\projectLaravel\resources\views/admin/overtimes/index.blade.php ENDPATH**/ ?>