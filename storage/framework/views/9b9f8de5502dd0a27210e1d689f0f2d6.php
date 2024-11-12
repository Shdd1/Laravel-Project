

<?php $__env->startSection('title', 'Overtime Request'); ?>

<?php $__env->startSection('content'); ?>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<div class="container mt-5">
    <h1 class="mb-4">Overtime Request</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('overtimes.store')); ?>" method="POST" class="needs-validation" novalidate>
        <?php echo csrf_field(); ?>
             <!-- حقل اختيار الموقع -->
             
        <!-- حقل اختيار الموقع -->
        <div class="form-group mb-3">
            <label for="location_id" class="form-label">Location</label>
            <select class="form-control" name="location_id" id="location_id" required>
                <option value="" disabled selected>Select Location</option>
                <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($location->id); ?>"><?php echo e($location->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <!-- حقل اختيار المشروع -->
        <div class="form-group mb-3">
            <label for="project_id" class="form-label">Project</label>
            <select class="form-control" name="project_id" id="project_id" required>
                <option value="" disabled selected>Select Project</option>
                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($project->id); ?>"><?php echo e($project->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <!-- الحقول الأخرى مثل عدد الساعات والتاريخ والسبب -->
        <div class="form-group mb-3">
            <label for="hours" class="form-label">Number of Overtime Hours</label>
            <input type="number" step="0.01" class="form-control" name="hours" id="hours" required>
        </div>

        <div class="form-group mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" name="date" id="date" required>
        </div>

        <div class="form-group mb-3">
            <label for="reason" class="form-label">Notes</label>
            <textarea class="form-control" name="reason" id="reason" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit Request</button>
    </form>
</div>
<!-- Bootstrap JS (Optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-mQ93kq49VKCmE8syBy/3Ock5F4hLrgL/1u7dJr59Wk5UwUs5EAA1+pfp4U0yjdrs" crossorigin="anonymous"></script>

<script>
    // Form validation script
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            var forms = document.getElementsByClassName('needs-validation');
            Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        flatpickr("#date", {
            dateFormat: "Y-m-d",
            altInput: true,
            altFormat: "F j, Y",
            locale: "en"
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sample-laravel-app\projectLaravel\resources\views/overtimes/create.blade.php ENDPATH**/ ?>