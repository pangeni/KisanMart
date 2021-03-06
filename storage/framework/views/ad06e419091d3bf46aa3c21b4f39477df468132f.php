<div id="accordionNav" class="bg-white d-flex p-2 px-4 mb-4 align-items-center text-dark border border-dark lg-hide">
    <h5 class="mb-0">Menu</h5>
    <i class="fas fa-bars ml-auto border py-1 px-2"></i>
</div>

<ul class="list-group text-dark rounded-0 sidebar mb-4" id="sidebar">
    <a href="<?php echo e(route('accounts.index')); ?>"
        class="list-group-item list-group-item-action border-0 <?php if(isset($myAccount)): ?> accordion-active <?php endif; ?>">
        <i class="fas fa-user-circle mr-2"></i> Account
    </a>
    <a href="<?php echo e(route('accounts.changePassword')); ?>"
        class="list-group-item list-group-item-action border-0 <?php if(isset($changePassword)): ?> accordion-active <?php endif; ?>">
        <i class="fas fa-key mr-2"></i> Change Password
    </a>

    <?php if(auth()->user()->role == 2): ?>
    <a href="<?php echo e(route('orders.index')); ?>"
        class="list-group-item list-group-item-action border-0 <?php if(isset($myOrder)): ?> accordion-active <?php endif; ?>">
        <i class="fas fa-shopping-cart mr-2"></i> My Orders
    </a>
    <a href="<?php echo e(route('reviews.index')); ?>"
        class="list-group-item list-group-item-action border-0 <?php if(isset($myReview)): ?> accordion-active <?php endif; ?>">
        <i class="fas fa-star mr-2"></i> My Reviews
    </a>
    <?php endif; ?>

    <?php if(auth()->user()->role == 1): ?>
    <!-- Discount -->
    <div class="accordion">
        <button class="list-group-item list-group-item-action border-0 d-flex align-items-center" data-toggle="collapse"
            data-target="#discount">
            <i class="fas fa-tags mr-2"></i> Discount <i class="fas fa-chevron-left ml-auto"></i>
        </button>
        <div id="discount" class="collapse" data-parent="#sidebar">
            <a href="<?php echo e(route('discounts.index')); ?>"
                class="list-group-item list-group-item-action border-0 <?php if(isset($allDiscount)): ?> accordion-active <?php endif; ?>">
                <span class="ml-4">All Discounts</span>
            </a>
        </div>
        <div id="discount" class="collapse" data-parent="#sidebar">
            <a href="<?php echo e(route('discounts.create')); ?>"
                class="list-group-item list-group-item-action border-0 <?php if(isset($addDiscount)): ?> accordion-active <?php endif; ?>">
                <span class="ml-4">Add Discount</span>
            </a>
        </div>
    </div>
    <!-- End of Discount -->

    <!-- Product Type -->
    <div class="accordion">
        <button class="list-group-item list-group-item-action accordion border-0 d-flex align-items-center"
            data-toggle="collapse" data-target="#type">
            <i class="fas fa-th mr-2"></i> Product Type <i class="fas fa-chevron-left ml-auto"></i>
        </button>
        <div id="type" class="collapse" data-parent="#sidebar">
            <a href="<?php echo e(route('product-types.index')); ?>"
                class="list-group-item list-group-item-action border-0 <?php if(isset($allProductType)): ?> accordion-active <?php endif; ?>">
                <span class="ml-4">All Product Types</span>
            </a>
        </div>
        <div id="type" class="collapse" data-parent="#sidebar">
            <a href="<?php echo e(route('product-types.create')); ?>"
                class="list-group-item list-group-item-action border-0 <?php if(isset($addProductType)): ?> accordion-active <?php endif; ?>">
                <span class="ml-4">Add Product Type</span>
            </a>
        </div>
    </div>
    <!-- End of Product Type -->

    <!-- Product -->
    <div class="accordion">
        <button class="list-group-item list-group-item-action border-0 d-flex align-items-center" data-toggle="collapse"
            data-target="#product">
            <i class="fas fa-shopping-bag mr-2"></i> Product <i class="fas fa-chevron-left ml-auto"></i>
        </button>
        <div id="product" class="collapse" data-parent="#sidebar">
            <a href="<?php echo e(route('products.index')); ?>"
                class="list-group-item list-group-item-action border-0 <?php if(isset($allProduct)): ?> accordion-active <?php endif; ?>">
                <span class="ml-4">All Products</span>
            </a>
        </div>
        <div id="product" class="collapse" data-parent="#sidebar">
            <a href="<?php echo e(route('products.create')); ?>"
                class="list-group-item list-group-item-action border-0 <?php if(isset($addProduct)): ?> accordion-active <?php endif; ?>">
                <span class="ml-4">Add Product</span>
            </a>
        </div>
    </div>
    <!--End of Product -->

    <!-- Shop -->
    <div class="accordion">
        <button class="list-group-item list-group-item-action border-0 d-flex align-items-center" data-toggle="collapse"
            data-target="#shop">
            <i class="fas fa-store mr-2"></i> Shop <i class="fas fa-chevron-left ml-auto"></i>
        </button>
        <div id="shop" class="collapse" data-parent="#sidebar">
            <a href="<?php echo e(route('shops.index')); ?>"
                class="list-group-item list-group-item-action border-0 <?php if(isset($allShop)): ?> accordion-active <?php endif; ?>">
                <span class="ml-4">All Shops</span>
            </a>
        </div>
        <div id="shop" class="collapse" data-parent="#sidebar">
            <a href="<?php echo e(route('shops.create')); ?>"
                class="list-group-item list-group-item-action border-0 <?php if(isset($addShop)): ?> accordion-active <?php endif; ?>">
                <span class="ml-4">Add Shop</span>
            </a>
        </div>
    </div>
    <!--End of Shop -->
    <?php endif; ?>

    <form class="d-inline" method="post" action="<?php echo e(route('logout')); ?>">
        <?php echo csrf_field(); ?>
        <button class="list-group-item list-group-item-action danger border-0">
            <i class="fas fa-power-off mr-2"></i>Logout
        </button>
    </form>
</ul>
<?php /**PATH C:\Users\pange\Desktop\hudders-market\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>