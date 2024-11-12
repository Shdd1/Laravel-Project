<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<div class="container-fluid mt-5">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="list-group">
                <h3 class="text-center my-3"></h3>

                <!-- Sidebar links for Employee -->
                <?php if(Auth::user()->role === 'employee'): ?>
                    <a href="<?php echo e(route('overtimes.create')); ?>" class="list-group-item list-group-item-action">Request Overtime</a>
                    <a href="<?php echo e(route('overtimes.index')); ?>" class="list-group-item list-group-item-action">View Overtime Requests</a>
                    <a href="<?php echo e(route('projects.index')); ?>" class="list-group-item list-group-item-action">Project stages</a>
                
                <?php endif; ?>

                <!-- Sidebar links for Admin -->
                <?php if(Auth::user()->role === 'admin'): ?>
                    <a href="<?php echo e(route('admin.overtimes.index')); ?>" class="list-group-item list-group-item-action">Manage Overtime Requests</a>
                    <a href="<?php echo e(route('admin.locations.index')); ?>" class="list-group-item list-group-item-action">Manage Locations</a>
                    <a href="<?php echo e(route('admin.projects.create')); ?>" class="list-group-item list-group-item-action">Add Projects</a>
                    <a href="<?php echo e(route('admin.projects.index')); ?>" class="list-group-item list-group-item-action">Manage Projects</a>
                <?php endif; ?>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="col-md-9">
            <div class="content-area">
                <h1 class="mb-4 text-center">Welcome to Your Dashboard</h1>
            
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sample-laravel-app\projectLaravel\resources\views/dashboard.blade.php ENDPATH**/ ?>