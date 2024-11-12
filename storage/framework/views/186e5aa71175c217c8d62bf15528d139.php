

<?php $__env->startSection('title', 'Add Project'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <h1>Add Project</h1>
    <form action="<?php echo e(route('admin.projects.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="name" class="form-label">Project Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="client_name" class="form-label">Client Name</label>
            <input type="text" class="form-control" id="client_name" name="client_name" required>
        </div>
        <div class="mb-3">
            <label for="project_type" class="form-label">Project Type</label>
            <select class="form-select" id="project_type" name="project_type" required>
                <option value="1">تكييف</option>
                <option value="2">كهرباء</option>
                <option value="3">سباكة</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save Project</button>
    </form>
</div>

<script>
    document.getElementById('project_type').addEventListener('change', function() {
        const projectType = this.value;
        const phasesContainer = document.getElementById('phases');
        phasesContainer.innerHTML = ''; // Clear existing phases

        fetch(`/fixed-phases/${projectType}`)
            .then(response => response.json())
            .then(data => {
                data.forEach(phase => {
                    const phaseDiv = document.createElement('div');
                    phaseDiv.classList.add('mb-3');
                    phaseDiv.innerHTML = `
                        <input type="hidden" name="phases[${phase.id}][fixed_phase_id]" value="${phase.id}">
                        <input type="text" class="form-control" value="${phase.phase_name}" readonly>
                        <input type="number" class="form-control" name="phases[${phase.id}][progress_percentage]" placeholder="Progress Percentage (0-100)" min="0" max="100" required>
                    `;
                    phasesContainer.appendChild(phaseDiv);
                });
            });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sample-laravel-app\projectLaravel\resources\views/admin/projects/create.blade.php ENDPATH**/ ?>