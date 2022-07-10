<?php $__env->startSection('content'); ?>
# Hello <?php echo e(ucfirst(strtolower($user))); ?>


To complete your registration, please verify your email:

<?php $__env->startComponent('mail::button', ['url' => $link, 'color' => 'success']); ?>
Verify Now
<?php echo $__env->renderComponent(); ?>

If you did not create account with us, please ignore this mail.

Thanks,<br>
<?php echo e(config('app.name')); ?>


<div style="border-top: 1px solid #b2b0c7; padding-top: 1em;"></div>
<small>If you are having trouble with button above, copy and paste this link
    <a href="<?php echo e($link); ?>"> <?php echo e($link); ?> </a>
</small>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.email', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\pange\Desktop\hudders-market\resources\views/emails/verify.blade.php ENDPATH**/ ?>