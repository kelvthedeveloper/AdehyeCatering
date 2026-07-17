<?php require APPROOT . '/views/layouts/header.php'; ?>

<h1 class="mb-4">Shopping Cart</h1>

<?php if (count($data['cartItems']) > 0): ?>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Food</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['cartItems'] as $item): ?>
                    <tr>
                        <td>
                            <img src="<?php echo URLROOT; ?>/<?php echo $item->image ?: 'assets/images/default-food.svg'; ?>" alt="<?php echo htmlspecialchars($item->name); ?>" style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;">
                            <?php echo htmlspecialchars($item->name); ?>
                        </td>
                        <td>GH₵ <?php echo number_format($item->price, 2); ?></td>
                        <td>
                            <form action="<?php echo URLROOT; ?>/cart/update" method="POST" class="d-inline">
                                <input type="hidden" name="item_id" value="<?php echo $item->id; ?>">
                                <input type="number" name="quantity" value="<?php echo $item->quantity; ?>" min="1" class="form-control" style="width: 80px;">
                                <button type="submit" class="btn btn-sm btn-primary mt-1">Update</button>
                            </form>
                        </td>
                        <td>GH₵ <?php echo number_format($item->price * $item->quantity, 2); ?></td>
                        <td>
                            <form action="<?php echo URLROOT; ?>/cart/remove" method="POST">
                                <input type="hidden" name="item_id" value="<?php echo $item->id; ?>">
                                <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <div class="d-flex justify-content-end">
        <h3>Total: GH₵ <?php echo number_format($data['total'], 2); ?></h3>
    </div>
    
    <div class="d-flex justify-content-end mt-3">
        <a href="<?php echo URLROOT; ?>/menu" class="btn btn-secondary me-2">Continue Shopping</a>
        <a href="<?php echo URLROOT; ?>/checkout" class="btn btn-primary">Proceed to Checkout</a>
    </div>
<?php else: ?>
    <p class="text-center">Your cart is empty!</p>
    <div class="text-center">
        <a href="<?php echo URLROOT; ?>/menu" class="btn btn-primary">Start Shopping</a>
    </div>
<?php endif; ?>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
