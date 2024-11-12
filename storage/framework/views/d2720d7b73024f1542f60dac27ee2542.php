

<?php $__env->startSection('title', 'Filtered Projects'); ?>

<?php $__env->startSection(section: 'content'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<div class="container">
    <h1>Filtered Projects</h1>
    <form action="<?php echo e(route('projects.filter')); ?>" method="GET" class="mb-3">
        <div class="mb-3">
            <label for="project_type" class="form-label">Project Type</label>
            <select class="form-select" id="project_type" name="project_type" required>
    <option value="">Select Project Type</option>
    <option value="all" <?php echo e(request('project_type') == 'all' ? 'selected' : ''); ?>>جميع الأنواع</option>
    <option value="1" <?php echo e(request('project_type') == '1' ? 'selected' : ''); ?>>تكييف</option>
    <option value="2" <?php echo e(request('project_type') == '2' ? 'selected' : ''); ?>>كهرباء</option>
    <option value="3" <?php echo e(request('project_type') == '3' ? 'selected' : ''); ?>>سباكة</option>
</select>


        </div>
        <button type="submit" class="btn btn-info">Filter</button>
    </form>

    <?php if($projects->isEmpty()): ?>
        <div class="alert alert-info">
            No projects found.
        </div>
    <?php else: ?>
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
        <form action="<?php echo e(route('projects.updateProgress')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Project Name</th>
                        <th>Client Name</th>
                    
                        <!-- Loop through the phases to display them as columns -->
                        <?php $__currentLoopData = $fixedPhases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <th><?php echo e($phase->phase_name); ?></th>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($project->name); ?></td>
                            <td><?php echo e($project->client_name); ?></td>
                

                            <!-- Loop through phases for each project -->
                            <?php $__currentLoopData = $fixedPhases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td>
                                <input 
    type="number" 
    name="progress[<?php echo e($project->id); ?>][<?php echo e($phase->id); ?>]" 
    value="<?php echo e($project->phases->where('fixed_phase_id', $phase->id)->first()->progress_percentage ?? 0); ?>" 
    min="0" max="100"
    class="form-control"
    placeholder="Progress (%)"
>

                                </td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <button type="submit" class="btn btn-info">Update Progress</button>
            
        </form>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sample-laravel-app\projectLaravel\resources\views/admin/projects/filter.blade.php ENDPATH**/ ?>