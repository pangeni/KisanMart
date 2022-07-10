<?php $__env->startSection('style'); ?>
<style>
    .loupe {
        display: none;
        position: absolute;
        width: 200px;
        height: 200px;
        border: 1px solid black;
        background: rgba(0, 0, 0, 0.25);
        cursor: crosshair;
        overflow: hidden;
    }

    .loupe img {
        position: absolute;
        right: 0;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-4 image">
            <img class="product-img mt-5"
                src="<?php echo e($product->image ? asset($product->image) : asset('assets/images/thumbnail.png')); ?>"
                alt="<?php echo e($product->name); ?>">
        </div>
        <div class="loupe"></div>

        <div class="col-lg-5 mb-4">
            <h4 class="mt-5"><?php echo e($product->name); ?></h4>
            <h5 class="text-dark bold mt-4">Price:
                <?php if($product->hasDiscount()): ?>
                <strike class="text-text font-weight-normal">£<?php echo e($product->price); ?></strike>
                <?php endif; ?>
                £<?php echo e($product->getPrice()); ?>

            </h5>
            <hr>
            <h5 class="<?php if($product->stock > 0): ?> text-dark <?php else: ?> text-danger <?php endif; ?> bold">
                <?php if($product->stock > 0): ?> In Stock <?php else: ?> Out of Stock <?php endif; ?>
            </h5>
            <form action="<?php echo e(route('baskets.store')); ?>" method="post" class="d-inline">
                <div class="d-flex align-items-left mt-3">
                    <p class="ml-0 mt-2">Qty: </p>
                    <div class="form-group col-lg-4">
                        <input class="form-control border-text" name="quantity" type="number"
                            min="<?php echo e($product->minimum); ?>" max="<?php echo e($product->maximum); ?>" value="<?php echo e($product->minimum); ?>"
                            <?php if($product->stock <= 0): ?> disabled <?php endif; ?>>
                    </div>
                </div>
                

                <div class="d-flex align-items-left mt-3">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                    <button class="btn btn-primary bold ml-0" <?php if($product->stock <= 0): ?> disabled <?php endif; ?>>
                            <i class="cart fas fa-shopping-cart mr-1"></i> Add To Basket
                    </button>
            </form>
            <button class="btn btn-secondary bold ml-3" <?php if($product->stock <= 0): ?> disabled <?php endif; ?>>
                    <i class="far fa-credit-card mr-1"></i> Checkout
            </button>
        </div>
    </div>

    <div class="col-lg-3">
        <table class="table mt-2 mt-md-5 mb-0">
            <tbody class="bg-white">
                <tr>
                    <td>
                        <p class="text-muted mb-2 bold">Shop</p>
                        <a class="mb-0 bold"
                            href="<?php echo e(route('search', ['shop' => $product->ProductType->shop->id])); ?>"><?php echo e($product->ProductType->shop->name); ?></a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="text-muted mb-2 bold">Product Type</p>
                        <a class="mb-0 bold"
                            href="<?php echo e(route('search', ['product_type' => $product->ProductType->id])); ?>"><?php echo e($product->ProductType->name); ?></a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="text-muted mb-2 bold">Allergy Info</p>
                        <p class="text-muted mb-0">
                            <?php echo $product->allergy_info ? e($product->allergy_info) : '<i>No Allergy</i>'; ?>

                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<table class="table table-borderless mt-5">
    <thead class="thead py-2 bg-info">
        <th scope="col" class="text-white">Product Details</th>
    </thead>
    <tbody class="bg-white border">
        <tr>
            <td>
                <p class="mb-0"><?php echo nl2br(e($product->description)); ?></p>
            </td>
        </tr>
    </tbody>
</table>

<table class="table mt-4">
    <thead class="thead py-2 bg-info">
        <th scope="col" class="text-white">Product Rating & Review</th>
    </thead>

    <?php if($product->review()->count() > 0): ?>
    <tbody class="bg-white border">
        <tr>
            <td>

                <?php $__currentLoopData = $product->review->sortDesc(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="mt-2 mb-0">
                    <strong class="text-muted"><?php echo e($review->user->first_name); ?> <?php echo e($review->user->last_name); ?></strong>:
                    <?php echo e($review->comments); ?>

                    <?php echo $review->getRatingBadge(); ?>


                    <?php if($review->user == auth()->user()): ?>
                    <div class="d-inline mb-0">
                        <a class="btn p-0 m-0" href="<?php echo e(route('reviews.edit', $review->id)); ?>" data-toggle="popover"
                            data-trigger="hover" data-placement="top" data-content="Edit">
                            <i class="far fa-edit link-dark mx-1"></i>
                        </a>

                        <form action="<?php echo e(route('reviews.destroy', $review->id)); ?>" method="post"
                            onsubmit="return confirm('Are you sure you want to delete?')" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn p-0 m-0" data-toggle="popover" data-trigger="hover" data-placement="top"
                                data-content="Delete">
                                <i class="far fa-trash-alt link-dark"></i>
                            </button>
                        </form>
                    </div>
                    <?php endif; ?>
                </div>

                <?php if(!$loop->last): ?>
                <hr>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </td>
        </tr>
    </tbody>
    <?php endif; ?>
</table>

<?php if($product->review()->count() == 0): ?>
<p class="mt-2 mb-2">There are no reviews yet.</p>
<?php endif; ?>

<?php if(auth()->guard()->check()): ?>
<?php if(auth()->user()->role == 2): ?>
<p class="mt-2 mb-0">Your Ratings</p>
<div class="text-left cursor-pointer h5" id="rating">
    <i class="far fa-star"></i>
    <i class="far fa-star"></i>
    <i class="far fa-star"></i>
    <i class="far fa-star"></i>
    <i class="far fa-star"></i>
</div>

<form method="post" action="<?php echo e(route('reviews.store')); ?>">
    <div class="form-group">
        <p class="mt-2 mb-0">Your Review</p>
        <textarea class="form-control border-dark" id="Textarea" name="comments"
            rows="3"><?php echo e(old('comments')); ?></textarea>
    </div>
    <div class="mt-1">
        <div class="d-flex align-items-center">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="rating" id="inputRating">
            <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
            <button class="btn btn-secondary bold btn-sm ml-auto">Submit</button>
        </div>
    </div>
</form>
<?php endif; ?>
<?php endif; ?>

<!-- Similiar Products -->
<div class="container mt-5">
    <div class="d-flex align-items-center">
        <h3 class="mb-0">Products by same seller</h3>
        <a href="<?php echo e(route('search', ['shop' => $product->ProductType->shop->id])); ?>"
            class="btn btn-secondary bold btn-sm ml-auto">View More</a>
    </div>
</div>

<div class="container mt-4">
    <div class="row slider">

        <?php $__currentLoopData = $similarProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $similarProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col">
            <a class="product-card" href="<?php echo e(route('products.show', $similarProduct->id)); ?>">
                <div class="card mb-4">
                    <div class="card-body">
                        <img class="thumbnail-img"
                            src="<?php echo e($similarProduct->image ? asset($similarProduct->image) : asset('assets/images/thumbnail.png')); ?>"
                            alt="<?php echo e($similarProduct->name); ?>">
                        <p class="mt-2 mb-0 text-center"><?php echo e($similarProduct->name); ?></p>
                        <p class="text-center mb-0">
                            <?php if($similarProduct->hasDiscount()): ?> <strike>£<?php echo e($similarProduct->price); ?></strike> <?php endif; ?>
                            <strong>£<?php echo e($similarProduct->getPrice()); ?></strong>
                        </p>
                        <?php echo $similarProduct->getRatingBadge(); ?>

                    </div>
                </div>
            </a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</div>
<!-- End of Similiar Products -->
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php echo session('message'); ?>

<?php if($errors->count()): ?> {<?php echo toastr($errors->all()[0], '', 'error'); ?>} <?php endif; ?>


<script>
    var $loupe = $(".loupe"),
            loupeWidth = $loupe.width(),
            loupeHeight = $loupe.height();

        $(document).on("mouseenter", ".image", function(e) {
            var $currImage = $(this),
                $img = $('<img/>')
                .attr('src', $('img', this).attr("src"))
                .css({
                    'width': $currImage.width() * 2,
                    'height': $currImage.height() * 2
                });

            $loupe.html($img).fadeIn(100);

            $(document).on("mousemove", moveHandler);

            function moveHandler(e) {
                var imageOffset = $currImage.offset(),
                    fx = imageOffset.left - loupeWidth / 2,
                    fy = imageOffset.top - loupeHeight / 2,
                    fh = imageOffset.top + $currImage.height() + loupeHeight / 2,
                    fw = imageOffset.left + $currImage.width() + loupeWidth / 2;

                $loupe.css({
                    'left': e.pageX - 75,
                    'top': e.pageY - 75
                });

                var loupeOffset = $loupe.offset(),
                    lx = loupeOffset.left,
                    ly = loupeOffset.top,
                    lw = lx + loupeWidth,
                    lh = ly + loupeHeight,
                    bigy = (ly - loupeHeight / 4 - fy) * 2,
                    bigx = (lx - loupeWidth / 4 - fx) * 2;

                $img.css({
                    'left': -bigx,
                    'top': -bigy
                });

                if (lx < fx || lh > fh || ly < fy || lw > fw) {
                    $img.remove();
                    $(document).off("mousemove", moveHandler);
                    $loupe.fadeOut(100);
                }
            }
        });
</script>

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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\pange\Desktop\hudders-market\resources\views/products/show.blade.php ENDPATH**/ ?>