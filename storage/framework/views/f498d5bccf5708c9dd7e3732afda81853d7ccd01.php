<?php $__env->startSection('content'); ?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="carousel-img" src="<?php echo e(asset('assets/images/first-banner.png')); ?>" alt="Banner 1">
        </div>

        <div class="carousel-item">
            <img class="carousel-img" src="<?php echo e(asset('assets/images/second-banner.jpg')); ?>" alt="Banner 2">
        </div>

        <div class="carousel-item">
            <img class="carousel-img" src="<?php echo e(asset('assets/images/third-banner.png')); ?>" alt="Banner 3">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="container mt-4 mb-2">
    <div class="row category-slider">

        <?php $__currentLoopData = $productTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col">
            <a class="link-text" href="<?php echo e(route('search', ['product_type' => $productType->id])); ?>">
                <img class="thumbnail-img rounded border-primary-hover"
                    src="<?php echo e($productType->image ? asset($productType->image) : asset('assets/images/thumbnail.png')); ?>"
                    alt="<?php echo e($productType->image); ?>">
                <p class="bold text-center"><?php echo e(Str::title($productType->name)); ?></p>
            </a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</div>

<!-- Ad Image -->
<div class="container">
    <a href="<?php echo e(route('register')); ?>">
        <img class="ad-img" src="<?php echo e(asset('assets/images/ad.png')); ?>" alt="Ad Image">
    </a>
</div>
<!-- End of Ad Image -->

<!-- Deals -->
<?php if($deals->count()): ?>
<div class="container mt-4">
    <div class="d-flex align-items-center">
        <h3 class="mb-0">Sasto Deals</h3>
        <a href="<?php echo e(route('search', ['filter' => 'deals'])); ?>" class="btn btn-secondary bold btn-sm ml-auto">View
            More</a>
    </div>
</div>

<div class="container mt-4">
    <div class="row slider">

        <?php $__currentLoopData = $deals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col">
            <a class="product-card" href="<?php echo e(route('products.show', $product->id)); ?>">
                <div class="card">
                    <div class="card-body">
                        <img class="thumbnail-img"
                            src="<?php echo e($product->image ? asset($product->image) : asset('assets/images/thumbnail.png')); ?>"
                            alt="Product">
                        <p class="mt-2 mb-0 text-center"><?php echo e(Str::title($product->name)); ?></p>
                        <p class="text-center mb-0">
                            <?php if($product->hasDiscount()): ?> <strike>£<?php echo e($product->price); ?></strike> <?php endif; ?>
                            <strong>£<?php echo e($product->getPrice()); ?></strong>
                        </p>
                        <?php echo $product->getRatingBadge(); ?>

                    </div>
                </div>
            </a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</div>
<?php endif; ?>
<!-- End of Deals -->

<!-- Top Rated -->
<?php if($ratings->count()): ?>
<div class="container mt-4">
    <div class="d-flex align-items-center">
        <h3 class="mb-0">Top Rated</h3>
        <a href="<?php echo e(route('search', ['filter' => 'top_rated'])); ?>" class="btn btn-secondary bold btn-sm ml-auto">View
            More</a>
    </div>
</div>

<div class="container mt-4">
    <div class="row slider">

    <?php $__currentLoopData = $ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col">
            <a class="product-card" href="<?php echo e(route('products.show', $product->id)); ?>">
                <div class="card">
                    <div class="card-body">
                        <img class="thumbnail-img"
                            src="<?php echo e(asset($product->image)); ?>"
                            alt="Product">
                        <p class="mt-2 mb-0 text-center"><?php echo e(Str::title($product->name)); ?></p>
                        <p class="text-center mb-0">
                            <?php if($product->hasDiscount()): ?> <strike>£<?php echo e($product->price); ?></strike> <?php endif; ?>
                            <strong>£<?php echo e($product->getPrice()); ?></strong>
                        </p>
                        <?php echo $product->getRatingBadge(); ?>

                    </div>
                </div>
            </a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</div>
<?php endif; ?>
<!-- End of Top Rated -->

<!-- Latest -->
<?php if($products->count()): ?>
<h3 class="container mt-4 mb-0">Latest Products</h3>
<div class="container mt-4">
    <div class="row row-cols-lg-5">

        <?php $__currentLoopData = $products->take(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-6 col-md-4">
            <a class="product-card" href="<?php echo e(route('products.show', $product->id)); ?>">
                <div class="card mb-4">
                    <div class="card-body">
                        <img class="thumbnail-img"
                            src="<?php echo e(asset($product->image)); ?>"
                            alt="Product">
                        <p class="mt-2 mb-0 text-center"><?php echo e(Str::title($product->name)); ?></p>
                        <p class="text-center mb-0">
                            <?php if($product->hasDiscount()): ?> <strike>£<?php echo e($product->price); ?></strike> <?php endif; ?>
                            <strong>£<?php echo e($product->getPrice()); ?></strong>
                        </p>
                        <?php echo $product->getRatingBadge(); ?>

                    </div>
                </div>
            </a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>

    <div class="text-center mt-2">
        <a href="<?php echo e(route('search')); ?>" class="btn btn-outline-secondary bold">View More</a>
    </div>
</div>
<?php endif; ?>
<!-- End of Latest -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\pange\Desktop\Sanjay\mart\resources\views/landing.blade.php ENDPATH**/ ?>