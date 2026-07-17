<?php require APPROOT . '/views/layouts/header.php'; ?>

<!-- Hero Section -->
<section style="background: linear-gradient(135deg, var(--primary-bg) 0%, #ffffff 50%, var(--primary-light) 100%); padding: 4rem 0;">
    <div class="container">
        <div class="text-center">
            <span class="badge px-4 py-2 mb-3" style="background: var(--primary-light); color: var(--primary); border-radius: 30px; font-size: 0.9rem;">
                <i class="fas fa-shopping-cart me-2"></i> Your Cart
            </span>
            <h1 class="display-4 fw-bold mb-3" style="color: var(--text-primary);">
                Shopping Cart
            </h1>
            <p class="lead text-muted mb-0" style="max-width: 600px; margin: 0 auto;">
                Review your items and proceed to checkout
            </p>
        </div>
    </div>
</section>

<!-- Cart Section -->
<section class="py-5">
    <div class="container">
        <?php if (count($data['cartItems']) > 0): ?>
            <div class="row">
                <!-- Cart Items -->
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="fw-bold mb-0" style="color: var(--text-primary);">
                                <i class="fas fa-shopping-bag me-2" style="color: var(--primary);"></i> Cart Items
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-4">
                                <?php foreach ($data['cartItems'] as $item): ?>
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row align-items-center g-3">
                                                    <div class="col-12 col-md-2">
                                                        <img src="<?php echo URLROOT; ?>/<?php echo $item->image ?: 'assets/images/default-food.svg'; ?>" 
                                                             alt="<?php echo htmlspecialchars($item->name); ?>" 
                                                             class="img-fluid rounded-3" 
                                                             style="width: 100%; height: 100px; object-fit: cover;">
                                                    </div>
                                                    <div class="col-12 col-md-4">
                                                        <h6 class="fw-bold mb-1" style="color: var(--text-primary);"><?php echo htmlspecialchars($item->name); ?></h6>
                                                        <p class="text-muted mb-0 small">GH₵ <?php echo number_format($item->price, 2); ?> each</p>
                                                    </div>
                                                    <div class="col-12 col-md-3">
                                                        <form action="<?php echo URLROOT; ?>/cart/update" method="POST" class="d-flex align-items-center gap-2 flex-wrap">
                                                            <input type="hidden" name="item_id" value="<?php echo $item->id; ?>">
                                                            <div class="input-group" style="max-width: 140px; min-width: 120px;">
                                                                <button type="button" class="btn btn-outline-secondary decrease-qty" style="border-top-left-radius: 50px; border-bottom-left-radius: 50px;">
                                                                    <i class="fas fa-minus"></i>
                                                                </button>
                                                                <input type="number" name="quantity" value="<?php echo $item->quantity; ?>" min="1" class="form-control text-center" style="border-radius: 0;">
                                                                <button type="button" class="btn btn-outline-secondary increase-qty" style="border-top-right-radius: 50px; border-bottom-right-radius: 50px;">
                                                                    <i class="fas fa-plus"></i>
                                                                </button>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary rounded-pill px-3 py-2">
                                                                <i class="fas fa-sync-alt me-1"></i> Update
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div class="col-6 col-md-2 text-center">
                                                        <span class="fw-bold" style="color: var(--primary); font-size: 1.2rem;">GH₵ <?php echo number_format($item->price * $item->quantity, 2); ?></span>
                                                    </div>
                                                    <div class="col-6 col-md-1 text-center">
                                                        <form action="<?php echo URLROOT; ?>/cart/remove" method="POST">
                                                            <input type="hidden" name="item_id" value="<?php echo $item->id; ?>">
                                                            <button type="submit" class="btn btn-outline-danger rounded-pill px-2 py-2">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="col-lg-4">
                    <div class="card sticky-top" style="top: 80px;">
                        <div class="card-header">
                            <h5 class="fw-bold mb-0" style="color: var(--text-primary);">
                                <i class="fas fa-calculator me-2" style="color: var(--primary);"></i> Order Summary
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">Subtotal</span>
                                <span class="fw-medium">GH₵ <?php echo number_format($data['total'], 2); ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">Delivery</span>
                                <span class="fw-medium text-success">Free</span>
                            </div>
                            <hr class="my-3">
                            <div class="d-flex justify-content-between mb-4">
                                <span class="fw-bold" style="color: var(--text-primary); font-size: 1.2rem;">Total</span>
                                <span class="fw-bold" style="color: var(--primary); font-size: 1.5rem;">GH₵ <?php echo number_format($data['total'], 2); ?></span>
                            </div>
                            <div class="d-flex gap-2 flex-wrap">
                                <a href="<?php echo URLROOT; ?>/menu" class="btn btn-outline-secondary rounded-pill px-4 py-3 flex-grow-1">
                                    <i class="fas fa-arrow-left me-2"></i> Continue Shopping
                                </a>
                                <a href="<?php echo URLROOT; ?>/checkout" class="btn btn-primary rounded-pill px-4 py-3 flex-grow-1">
                                    <i class="fas fa-check me-2"></i> Proceed to Checkout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="text-center py-10">
                <i class="fas fa-shopping-cart text-muted" style="font-size: 6rem; margin-bottom: 1.5rem;"></i>
                <h4 class="fw-bold mb-2" style="color: var(--text-primary);">Your cart is empty!</h4>
                <p class="text-muted mb-5" style="max-width: 400px; margin: 0 auto;">Looks like you haven't added anything to your cart yet. Start exploring our delicious menu!</p>
                <a href="<?php echo URLROOT; ?>/menu" class="btn btn-primary rounded-pill px-6 py-3">
                    <i class="fas fa-utensils me-2"></i> Start Shopping
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const decreaseBtns = document.querySelectorAll('.decrease-qty');
    const increaseBtns = document.querySelectorAll('.increase-qty');
    
    decreaseBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const input = this.parentElement.querySelector('input');
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
            }
        });
    });
    
    increaseBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const input = this.parentElement.querySelector('input');
            input.value = parseInt(input.value) + 1;
        });
    });
});
</script>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
