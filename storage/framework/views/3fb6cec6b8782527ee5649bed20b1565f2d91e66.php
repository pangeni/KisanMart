<?php $__env->startSection('content'); ?>

<h1 class="text-bold text-center mt-5 pt-md-5 bold">OOPS!</h1>
<h1 class="text-dark text-center mt-1 bold">Error 419: Page Expired</h1><br><br>
<div class="text-center">
    <a href="<?php echo e(url()->previous()); ?>" class="btn btn-secondary ml-auto mb-4">Go Back</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\pange\Desktop\mart\resources\views/errors/419.blade.php ENDPATH**/ ?>