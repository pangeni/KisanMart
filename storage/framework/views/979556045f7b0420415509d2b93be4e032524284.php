<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="row">

        <div class="col-12 col-lg-3">

            <!-- Side Navigation -->
            <?php echo $__env->make('layouts.sidebar', ['myOrder' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- End of Side Navigation -->

        </div>

        <div class="col-12 col-md-9">
            <div class="w-lg-90 ml-auto table-responsive">

                <?php echo session('message'); ?>


                <table class="table table-bordered table-border-dark text-center">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Order&nbsp;#</th>
                            <th>Date</th>
                            <th>Items</th>
                            <th>Collection Slot</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($order->id); ?></td>
                            <td><?php echo e($order->payment->paid_date->format('Y/m/d')); ?></td>
                            <td>
                                <a class="bold" href="<?php echo e(route('orders.invoice', $order->id)); ?>" target="_blank">
                                    <?php echo e($order->product()->count()); ?>

                                </a>
                            </td>
                            <td>
                                <?php echo e($order->collectionSlot->collection_date); ?><br />
                                <?php echo e($order->collectionSlot->day->day); ?>(<?php echo e($order->collectionSlot->time->start_time); ?>-<?php echo e($order->collectionSlot->time->end_time); ?>)
                            </td>
                            <td>£<?php echo e(number_format($order->payment->amount, 2, '.', ',')); ?></td>
                            <td>
                                <?php if($order->status == 1): ?>
                                <span class="badge badge-pill badge-dark">Paid</span>
                                <?php elseif($order->status == 2): ?>
                                <span class="badge badge-pill badge-primary">Delivered</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="<?php echo e(route('orders.invoice', $order->id)); ?>" target="_blank"
                                        data-toggle="popover" data-trigger="hover" data-placement="top"
                                        data-content="Invoice">
                                        <i class="fas fa-receipt link-dark"></i>
                                    </a>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\pange\Desktop\hudders-market\resources\views/orders/index.blade.php ENDPATH**/ ?>