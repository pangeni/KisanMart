<?php $__env->startSection('content'); ?>
<form>
    <input type="hidden" name="q" value="<?php echo e(request('q') ?? ''); ?>">

    <div class="container">
        <div class="row">

            <div class="col-lg-3 mt-5">
                <p class="text-dark text-left mt-3">Shop</p>
                <div class="row">
                    <div class="form-group col" id="shop_form">
                        <select class="custom-select border-text" name="shop" id="shop">
                            <option value="">Choose Shop</option>
                            <?php $__currentLoopData = $shops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($shop->id); ?>" <?php if($shop->id == request('shop')): ?> selected
                                <?php endif; ?>>
                                <?php echo e($shop->name); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <hr>
                <p class="text-dark text-left">Product Type</p>
                <div class="row">
                    <div class="form-group col" id="product_type_form">
                        <select class="custom-select border-text" name="product_type" id="product_type">
                            <option value="">Choose Product Type</option>
                            <?php $__currentLoopData = $productTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($productType->id); ?>" <?php if($productType->id == request('product_type')): ?>
                                selected
                                <?php endif; ?>>
                                <?php echo e($productType->name); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <hr>

                <p class="text-dark text-left">Price</p>
                <div class="d-flex align-items-center">
                    <input type="text" class="form-control border-text mr-2" name="minimum"
                        value="<?php echo e(request('minimum') ?? ''); ?>" placeholder="Minimum">
                    <span>-</span>
                    <input type="text" class="form-control border-text mx-2" name="maximum"
                        value="<?php echo e(request('maximum') ?? ''); ?>" placeholder="Maximum">
                    <button class="btn btn-warning"><i class="fas fa-play"></i></button>
                </div>
                <hr>

                <p class="text-dark text-left">Rating</p>

                <div id="rating">
                    <input type="radio" class="rating" name="rating" value="5" id="5" <?php if(request('rating')==5): ?> checked
                        <?php endif; ?>>
                    <label for="5">
                        <div class="text-warning text-left">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </label>
                    <br>

                    <input type="radio" class="rating" name="rating" value="4" id="4" <?php if(request('rating')==4): ?> checked
                        <?php endif; ?>>
                    <label for="4">
                        <div class="text-warning text-left">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </label>
                    <br>

                    <input type="radio" class="rating" name="rating" value="3" id="3" <?php if(request('rating')==3): ?> checked
                        <?php endif; ?>>
                    <label for="3">
                        <div class="text-warning text-left">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </label>
                    <br>

                    <input type="radio" class="rating" name="rating" value="2" id="2" <?php if(request('rating')==2): ?> checked
                        <?php endif; ?>>
                    <label for="2">
                        <div class="text-warning text-left">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </label>
                    <br>

                    <input type="radio" class="rating" name="rating" value="1" id="1" <?php if(request('rating')==1): ?> checked
                        <?php endif; ?>>
                    <label for="1">
                        <div class="text-warning text-left">
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </label>
                </div>
            </div>


            <div class="col">
                <div class="row mt-5">
                    <div class="col d-flex align-items-left">
                        <p class="mt-3">
                            <?php if($products->count() > 0): ?> <?php echo e($products->count()); ?> <?php else: ?> No <?php endif; ?> items found
                            <?php if(!empty(request('q'))): ?> for "<?php echo e(Str::title(request('q'))); ?>" <?php endif; ?>
                        </p>
                    </div>
                    <div class="col d-flex mr-0">
                        <p class="ml-auto mt-3">Sort By: </p>
                        <div class="form-group col-lg-5 mt-2 mr-0">
                            <select class="custom-select border-text" id="first">
                                <option>Best Match</option>
                                <option>Latest</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-3">
                        <a class="product-card" href="<?php echo e(route('products.show', $product->id)); ?>">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <img class="thumbnail-img"
                                        src="<?php echo e(asset($product->image)); ?>"
                                        alt="Product">
                                    <p class="mt-2 mb-0 text-center ellipsis-1"><?php echo e(Str::title($product->name)); ?></p>
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
        </div>
    </div>
    <!-- End of Results -->
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    $('#shop').change(function(){
        $('form').submit();
    });
    $('#product_type').change(function(){
        $('form').submit();
    });
    $('#rating .rating').click(function(){
        $('form').submit();
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['search' => request('q')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\pange\Desktop\mart\resources\views/pages/search.blade.php ENDPATH**/ ?>