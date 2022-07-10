<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="row">

        <div class="col-12 col-lg-3">

            <!-- Side Navigation -->
            <?php echo $__env->make('layouts.sidebar', ['allDiscount' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- End of Side Navigation -->

        </div>

        <div class="col-12 col-md-9">
            <div class="w-lg-90 ml-auto table-responsive">

                <?php echo session('message'); ?>


                <table class="table table-bordered table-border-dark text-center">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>S.N.</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Expiry Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $__empty_1 = true; $__currentLoopData = $discounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($discount->name); ?></td>
                            <td>
                                <?php if($discount->type == 0): ?> Fixed <?php endif; ?>
                                <?php if($discount->type == 1): ?> Percentage <?php endif; ?>
                            </td>
                            <td><?php if($discount->type == 0): ?>£<?php endif; ?><?php echo e($discount->amount); ?><?php if($discount->type == 1): ?>%<?php endif; ?></td>
                            <td>
                                <?php if($discount->expiry_date == null): ?>
                                Unlimited
                                <?php elseif($discount->expiry_date >= today()): ?>
                                <?php echo e(\Carbon\Carbon::parse($discount->expiry_date)->format('Y/m/d')); ?>

                                <?php else: ?>
                                Expired
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="<?php echo e(route('discounts.edit', $discount->id)); ?>" data-toggle="popover" data-trigger="hover" data-placement="top"
                                        data-content="Edit">
                                        <i class="far fa-edit link-dark mx-1"></i>
                                    </a>
                                    <form action="<?php echo e(route('discounts.destroy', $discount->id)); ?>" method="post" onsubmit="return confirm('Are you sure you want to delete?')"
                                        class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button class="btn p-0 m-0" data-toggle="popover" data-trigger="hover"
                                            data-placement="top" data-content="Delete">
                                            <i class="far fa-trash-alt link-dark"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <td colspan="100%">
                                <h5 class="mb-1">No Discount Yet</h5>
                                <p class="mb-3 text-text">Click the button below to add a discount</p>
                                <a href="<?php echo e(route('discounts.create')); ?>" class="btn btn-primary">Add New Discount</a>
                            </td>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\pange\Desktop\mart\resources\views/discounts/index.blade.php ENDPATH**/ ?>