<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="row">

        <div class="col-12 col-lg-3">

            <!-- Side Navigation -->
            <?php echo $__env->make('layouts.sidebar', ['myReview' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- End of Side Navigation -->

        </div>

        <div class="col-12 col-md-9">
            <div class="w-lg-90 ml-auto">

                <?php echo session('message'); ?>


                <p class="mt-2 mb-0">Your Ratings</p>
                <div class="text-left cursor-pointer h5" id="rating">
                    <?php for($i = 1; $i <= 5; $i++): ?> <?php if($i <=$review->rating): ?> <i class="fas fa-star text-warning"></i>
                        <?php else: ?>
                        <i class="far fa-star"></i>
                        <?php endif; ?>
                        <?php endfor; ?>
                </div>
                <?php $__errorArgs = ['rating'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback mb-2 d-block"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <form method="post" action="<?php echo e(route('reviews.update', $review->id)); ?>">
                    <div class="form-group">
                        <p class="mt-2 mb-0">Your Review</p>
                        <textarea class="form-control <?php $__errorArgs = ['comments'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php else: ?> border-dark <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            id="Textarea" name="comments" rows="3"><?php echo e(old('comments') ?? $review->comments); ?></textarea>
                        <?php $__errorArgs = ['comments'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mt-1">
                        <div class="d-flex align-items-center">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <input type="hidden" name="rating" id="inputRating" value="<?php echo e($review->rating); ?>">
                            <a class="btn btn-text" href="<?php echo e(url()->previous()); ?>">Cancel</a>
                            <button class="btn btn-secondary ml-auto">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    $('#rating .fa-star').click(function(){
       let index = $(this).index();
       let parent = $(this).parent();
       for(let i = 0; i <= parent.children().length; i++){
            parent.children().eq(i).removeClass('fas text-warning').addClass('far');
       }
       for(let i = 0; i <= index; i++){
            parent.children().eq(i).removeClass('far').addClass('fas text-warning');
            $('#inputRating').val(i+1);
       }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\pange\Desktop\mart\resources\views/reviews/edit.blade.php ENDPATH**/ ?>