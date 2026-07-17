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
                                    <div class="col-12 cart-item" data-item-id="<?php echo $item->id; ?>" data-price="<?php echo $item->price; ?>">
                                        <div class="card shadow-sm" style="transition: all 0.3s ease;">
                                            <div class="card-body py-3">
                                                <div class="row align-items-center g-2">
                                                    <div class="col-12 col-md-2">
                                                        <img src="<?php echo URLROOT; ?>/<?php echo $item->image ?: 'assets/images/default-food.svg'; ?>" 
                                                             alt="<?php echo htmlspecialchars($item->name); ?>" 
                                                             class="img-fluid rounded-3" 
                                                             style="width: 100%; height: 80px; object-fit: cover;">
                                                    </div>
                                                    <div class="col-12 col-md-4">
                                                        <h6 class="fw-bold mb-0" style="color: var(--text-primary); font-size: 1rem;"><?php echo htmlspecialchars($item->name); ?></h6>
                                                        <p class="text-muted mb-0 small">GH₵ <?php echo number_format($item->price, 2); ?> each</p>
                                                    </div>
                                                    <div class="col-12 col-md-3">
                                                        <div class="input-group" style="max-width: 130px;">
                                                            <button type="button" class="btn btn-outline-secondary decrease-qty px-2" style="border-top-left-radius: 50px; border-bottom-left-radius: 50px; border-color: var(--primary); color: var(--primary);">
                                                                <i class="fas fa-minus"></i>
                                                            </button>
                                                            <input type="number" name="quantity" value="<?php echo $item->quantity; ?>" min="1" class="form-control text-center qty-input px-1 py-1" style="border-radius: 0; border-color: var(--primary); font-size: 0.9rem;">
                                                            <button type="button" class="btn btn-outline-secondary increase-qty px-2" style="border-top-right-radius: 50px; border-bottom-right-radius: 50px; border-color: var(--primary); color: var(--primary);">
                                                                <i class="fas fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-md-2 text-center">
                                                        <span class="fw-bold item-subtotal" style="color: var(--primary); font-size: 1.1rem;">GH₵ <?php echo number_format($item->price * $item->quantity, 2); ?></span>
                                                    </div>
                                                    <div class="col-6 col-md-1 text-center">
                                                        <form action="<?php echo URLROOT; ?>/cart/remove" method="POST" class="remove-form">
                                                            <input type="hidden" name="item_id" value="<?php echo $item->id; ?>">
                                                            <button type="submit" class="btn btn-outline-danger rounded-pill px-2 py-1" style="border-width: 1px;">
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
                    <div class="card sticky-top shadow-lg" style="top: 80px; border: none;">
                        <div class="card-header py-3" style="background: linear-gradient(135deg, var(--primary-light) 0%, #ffffff 100%); border-bottom: none;">
                            <h5 class="fw-bold mb-0" style="color: var(--text-primary);">
                                <i class="fas fa-calculator me-2" style="color: var(--primary);"></i> Order Summary
                            </h5>
                        </div>
                        <div class="card-body py-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Subtotal</span>
                                <span class="fw-medium" id="subtotal">GH₵ <?php echo number_format($data['total'], 2); ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Delivery</span>
                                <span class="fw-medium text-success">Free</span>
                            </div>
                            <hr class="my-2" style="border-color: var(--primary-light);">
                            <div class="d-flex justify-content-between mb-3">
                                <span class="fw-bold" style="color: var(--text-primary); font-size: 1.2rem;">Total</span>
                                <span class="fw-bold" id="total" style="color: var(--primary); font-size: 1.5rem;">GH₵ <?php echo number_format($data['total'], 2); ?></span>
                            </div>
                            <div class="d-flex gap-2 flex-wrap">
                                <a href="<?php echo URLROOT; ?>/menu" class="btn btn-outline-secondary rounded-pill px-3 py-2 flex-grow-1" style="border-color: var(--primary); color: var(--primary);">
                                    <i class="fas fa-arrow-left me-2"></i> Continue Shopping
                                </a>
                                <a href="<?php echo URLROOT; ?>/checkout" class="btn btn-primary rounded-pill px-3 py-2 flex-grow-1">
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
    // Function to update subtotal and total
    function updateTotals() {
        let total = 0;
        document.querySelectorAll('.cart-item').forEach(function(item) {
            const price = parseFloat(item.dataset.price);
            const qty = parseInt(item.querySelector('.qty-input').value);
            const subtotal = price * qty;
            item.querySelector('.item-subtotal').textContent = 'GH₵ ' + subtotal.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
            total += subtotal;
        });
        document.getElementById('subtotal').textContent = 'GH₵ ' + total.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        document.getElementById('total').textContent = 'GH₵ ' + total.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    }

    // Function to update cart item via AJAX
    function updateCartItem(itemId, quantity) {
        fetch('<?php echo URLROOT; ?>/cart/update', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'item_id=' + itemId + '&quantity=' + quantity
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                updateTotals();
                // Update cart count badge in header
                const cartBadge = document.getElementById('cart-count-badge');
                if (cartBadge) {
                    cartBadge.textContent = data.cartCount;
                }
            } else {
                alert('Error updating cart');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error updating cart');
        });
    }

    // Decrease quantity
    document.querySelectorAll('.decrease-qty').forEach(btn => {
        btn.addEventListener('click', function() {
            const item = this.closest('.cart-item');
            const input = item.querySelector('.qty-input');
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
                updateCartItem(item.dataset.itemId, input.value);
            }
        });
    });

    // Increase quantity
    document.querySelectorAll('.increase-qty').forEach(btn => {
        btn.addEventListener('click', function() {
            const item = this.closest('.cart-item');
            const input = item.querySelector('.qty-input');
            input.value = parseInt(input.value) + 1;
            updateCartItem(item.dataset.itemId, input.value);
        });
    });

    // Quantity input change
    document.querySelectorAll('.qty-input').forEach(input => {
        input.addEventListener('change', function() {
            const item = this.closest('.cart-item');
            let qty = parseInt(this.value);
            if (qty < 1) {
                qty = 1;
                this.value = 1;
            }
            updateCartItem(item.dataset.itemId, qty);
        });
    });
});
</script>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
