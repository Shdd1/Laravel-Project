



<?php $__env->startSection('title', 'All Projects'); ?>

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div class="container">
    <h1>All Projects</h1>

    <form action="<?php echo e(route('projects.filter')); ?>" method="GET" class="mb-3">
        <div class="mb-3">
            <label for="project_type" class="form-label">Project Type</label>
            <select class="form-select" id="project_type" name="project_type" required>
                <option value="">Select Project Type</option>
                <option value="all">جميع الأنواع</option> <!-- خيار "استعراض الكل" -->
                <option value="1">تكييف</option>
                <option value="2">كهرباء</option>
                <option value="3">سباكة</option>
            </select>
        </div>
        <button type="submit" class="btn btn-info">Filter</button>
    </form>

    <?php if($projects->isEmpty()): ?>
        <div class="alert alert-info">
            No projects found.
        </div>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Project Name</th>
                    <th>Client Name</th>
                    <th>Project Type</th>
                    <th>Phases</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($project->name); ?></td>
                        <td><?php echo e($project->client_name); ?></td>
                        <td>
                            <?php if($project->project_type == 1): ?>
                                تكييف
                            <?php elseif($project->project_type == 2): ?>
                                كهرباء
                            <?php elseif($project->project_type == 3): ?>
                                سباكة
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?php echo e(route('projects.filter', ['project_type' => $project->project_type])); ?>" class="btn btn-info">View Phases</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sample-laravel-app\projectLaravel\resources\views/admin/projects/index.blade.php ENDPATH**/ ?>