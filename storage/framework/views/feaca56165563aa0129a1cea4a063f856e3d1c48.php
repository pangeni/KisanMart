<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="row">

        <div class="col-12 col-lg-3">

            <!-- Side Navigation -->
            <?php echo $__env->make('layouts.sidebar', ['allProductType' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- End of Side Navigation -->

        </div>

        <div class="col-12 col-md-9">
            <div class="w-lg-90 ml-auto table-responsive">

                <?php echo session('message'); ?>


                <table class="table table-bordered table-border-dark text-center">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Type&nbsp;#</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Shop</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $__currentLoopData = $productTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <td><?php echo e($productType->id); ?></td>
                            <td>
                                <p class="ellipsis-2 mb-0"><?php echo e($productType->name); ?></p>
                            </td>
                            <td class="p-1">
                                <img class="table-type-img"
                                    src="<?php echo e(asset($productType->image)); ?>"
                                    alt="<?php echo e($productType->name); ?>">
                            </td>
                            <td style="min-width:150px">
                                <a href="#" class="font-weight-bold ellipsis-2"><?php echo e($productType->shop->name); ?></a>
                            </td>
                            <td>
                                <?php if($productType->status == 0): ?> <span
                                    class="badge badge-pill badge-primary">Active</span>
                                <?php endif; ?>
                                <?php if($productType->status == 1): ?> <span
                                    class="badge badge-pill badge-warning">Pending</span>
                                <?php endif; ?>
                                <?php if($productType->status == 2): ?> <span
                                    class="badge badge-pill badge-danger">Deactivated</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="#" data-toggle="popover" data-trigger="hover" data-placement="top"
                                        data-content="View">
                                        <i class="far fa-eye link-dark"></i>
                                    </a>
                                    <a href="<?php echo e(route('product-types.edit', $productType->id)); ?>" data-toggle="popover"
                                        data-trigger="hover" data-placement="top" data-content="Edit">
                                        <i class="far fa-edit link-dark mx-1"></i>
                                    </a>
                                    <form action="<?php echo e(route('product-types.destroy', $productType->id)); ?>" method="post"
                                        onsubmit="return confirm('Are you sure you want to delete?')" class="d-inline">
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

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\pange\Desktop\mart\resources\views/product-types/index.blade.php ENDPATH**/ ?>