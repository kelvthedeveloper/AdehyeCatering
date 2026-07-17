<?php require APPROOT . '/views/layouts/header.php'; ?>

<h1 class="mb-4">Checkout</h1>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>Delivery Details</h5>
            </div>
            <div class="card-body">
                <form action="<?php echo URLROOT; ?>/checkout" method="POST">
                    <div class="mb-3">
                        <label>Delivery Address</label>
                        <textarea name="delivery_address" class="form-control" rows="3" required><?php echo htmlspecialchars($data['user']->address ?? ''); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Delivery Date</label>
                        <input type="datetime-local" name="delivery_date" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Place Order</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5>Order Summary</h5>
            </div>
            <div class="card-body">
                <?php foreach ($data['cartItems'] as $item): ?>
                    <div class="d-flex justify-content-between mb-2">
                        <span><?php echo htmlspecialchars($item->name); ?> x <?php echo $item->quantity; ?></span>
                        <span>GH₵ <?php echo number_format($item->price * $item->quantity, 2); ?></span>
                    </div>
                <?php endforeach; ?>
                <hr>
                <div class="d-flex justify-content-between">
                    <strong>Total</strong>
                    <strong>GH₵ <?php echo number_format($data['total'], 2); ?></strong>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
