<?php $__env->startSection('content'); ?>
<form class="container mt-5" method="post" action="<?php echo e(route('checkouts.store')); ?>">
    <div class="col-lg-6 mt-3">

        <?php echo session('message'); ?>


        <h2 class="text-dark text-left bold">Collection Slot</h2>

        <div class="row">
            <div class="form-group col">
                <label class="mb-0 mt-4" for="day">Collection Day*</label>
                <select class="custom-select <?php $__errorArgs = ['day_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php else: ?> border-text <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="day"
                    name="day_id">
                    <option value="">Choose Day</option>
                    <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($day->id); ?>" <?php if($day->day == get_collection_day()): ?> selected <?php endif; ?>
                        <?php echo e(has_disabled_days($day->day)); ?>>
                        <?php echo e($day->day); ?>

                    </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['day_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"> <?php echo e($message); ?> </div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <div class="row">
            <div class="form-group col">
                <label class="mb-0 mt-2" for="time">Collection Time*</label>
                <select class="custom-select <?php $__errorArgs = ['time_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php else: ?> border-text <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> mb-2" id="time"
                    name="time_id">
                    <option value="">Choose Time</option>
                    <?php $__currentLoopData = $times; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($time->id); ?>" <?php if($time->start_time == get_collection_time()->start_time): ?> selected
                        <?php endif; ?> <?php if($time->start_time < get_collection_time()->start_time): ?> disabled <?php endif; ?>>
                            <?php echo e($time->start_time . '-' . $time->end_time); ?>

                    </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['time_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"> <?php echo e($message); ?> </div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
    </div>
            <div class="col form-group">
                <label class="mb-0" for="first">Delivery Addresses</label>
                <input class="form-control py-4 <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php else: ?> border-dark <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> mb-2" id="address"
                    name="address" type="text" value="<?php echo e(old('address')); ?>">
                <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"> <?php echo e($message); ?> </div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

    <hr>
    <div class="row">
        <div class="col-lg-8 mt-3">
            <h2 class="text-left bold <?php $__errorArgs = ['payment_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> text-danger <?php else: ?> text-dark  <?php endif; ?>">Payment Gateway
            </h2>
            <div id="menu">
                <div class="row">
                    <div class=" col-lg-4 mt-4">
                        <input type="radio" name="payment_method" value="1" class="d-none" id="stripe">
                        <label for="stripe">
                            <img src="<?php echo e(asset('assets/images/stripe.png')); ?>"
                                class="border border-2 cursor-pointer rounded img-fluid" width="200">
                        </label>
                    </div>
                </div>
                
                <?php $__errorArgs = ['payment_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger text-sm"> <?php echo e($message); ?> </div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <?php echo csrf_field(); ?>
                <button class="btn btn-primary btn-block py-2 mt-4 col-lg-3 bold">Place Order</button>
            </div>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    $('#paypal').click(function(){
        $(this).parent().children().children().eq(0).addClass('border-secondary');
        $('#stripe').parent().children().children().eq(0).removeClass('border-secondary');
    });
    $('#stripe').click(function(){
        $(this).parent().children().children().eq(0).addClass('border-secondary');
        $('#paypal').parent().children().children().eq(0).removeClass('border-secondary');
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\pange\Desktop\mart\resources\views/checkouts/index.blade.php ENDPATH**/ ?>