<?php $__env->startComponent('mail::layout'); ?>

<?php $__env->slot('header'); ?>
<?php $__env->startComponent('mail::header', ['url' => url('')]); ?>
<img width="250" src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="<?php echo e(config('app.name')); ?>">
<?php echo $__env->renderComponent(); ?>
<?php $__env->endSlot(); ?>


<?php echo $__env->yieldContent('content'); ?>


<?php $__env->slot('footer'); ?>
<?php $__env->startComponent('mail::footer'); ?>
<?php echo e(config('app.name')); ?> © <?php echo e(date('Y')); ?> | <?php echo app('translator')->get('All rights reserved.'); ?>
<?php echo $__env->renderComponent(); ?>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\Users\pange\Desktop\hudders-market\resources\views/layouts/email.blade.php ENDPATH**/ ?>