<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="row">

        <div class="col-12 col-lg-3">

            <!-- Side Navigation -->
            <?php echo $__env->make('layouts.sidebar', ['allProduct' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- End of Side Navigation -->

        </div>

        <div class="col-12 col-md-9">
            <div class="table-responsive">

                <?php echo session('message'); ?>


                <table class="table table-bordered table-border-dark text-center">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Product&nbsp;#</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Type</th>
                            <th>Discount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($product->id); ?></td>
                            <td>
                                <p style="width:125px" class="ellipsis-2 mb-0"><?php echo e($product->name); ?></p>
                            </td>
                            <td class="p-1">
                                <img class="table-product-img"
                                    src= "<?php echo e(asset($product->image)); ?>"
                                    alt="<?php echo e($product->name); ?>">
                            </td>
                            <td>£<?php echo e($product->getPrice()); ?></td>
                            <td><?php echo e($product->stock); ?></td>
                            <td>
                                <a class="font-weight-bold ellipsis-2" href="#"><?php echo e($product->productType->name); ?></a>
                            </td>
                            <td><?php echo e($product->discount->first() ? $product->discount->first()->name : ''); ?></td>
                            <td>
                                <?php if($product->status == 0): ?> <span class="badge badge-pill badge-primary">Active</span>
                                <?php endif; ?>
                                <?php if($product->status == 1): ?> <span class="badge badge-pill badge-warning">Pending</span>
                                <?php endif; ?>
                                <?php if($product->status == 2): ?> <span
                                    class="badge badge-pill badge-danger">Deactivated</span> <?php endif; ?>
                            </td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="#" data-toggle="popover" data-trigger="hover" data-placement="top"
                                        data-content="View">
                                        <i class="far fa-eye link-dark"></i>
                                    </a>
                                    <a href="<?php echo e(route('products.edit', $product->id)); ?>" data-toggle="popover"
                                        data-trigger="hover" data-placement="top" data-content="Edit">
                                        <i class="far fa-edit link-dark mx-1"></i>
                                    </a>
                                    <form action="<?php echo e(route('products.destroy', $product->id)); ?>" method="post"
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
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <td colspan="100%">
                            <h5 class="mb-1">No Product Yet</h5>
                            <p class="mb-3 text-text">Click the button below to add a product</p>
                            <a href="<?php echo e(route('products.create')); ?>" class="btn btn-primary">Add New Product</a>
                        </td>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\pange\Desktop\Sanjay\mart\resources\views/products/index.blade.php ENDPATH**/ ?>