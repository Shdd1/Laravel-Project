<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title','Welcome'); ?>

<!-- السيكشن الي نستخدمه عشان نختصر تكرار الاكواد بالصفحات الاسم عادي اي شي ولازم نضع انه راح يكون extend من اي layout -->
<div class="flex lg:justify-center lg:col-start-2">
                          <h1> THIS is welcome PAGE </h1>
                        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sample-laravel-app\projectLaravel\resources\views/welcome.blade.php ENDPATH**/ ?>