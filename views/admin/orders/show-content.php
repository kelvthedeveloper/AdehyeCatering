
<h2>Order #<?php echo $data['order']->id; ?></h2>

<div class="row mb-4">
    <div class="col-lg-6">
        <div class="card shadow">
            <div class="card-body">
                <h3>Customer Details</h3>
                <p><strong>Name:</strong> <?php echo htmlspecialchars($data['order']->user_name); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($data['order']->email); ?></p>
                <p><strong>Phone:</strong> <?php echo htmlspecialchars($data['order']->phone); ?></p>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card shadow">
            <div class="card-body">
                <h3>Order Details</h3>
                <p><strong>Date:</strong> <?php echo date('Y-m-d H:i', strtotime($data['order']->created_at)); ?></p>
                <p><strong>Delivery Address:</strong> <?php echo htmlspecialchars($data['order']->delivery_address); ?></p>
                <p><strong>Delivery Date:</strong> <?php echo date('Y-m-d H:i', strtotime($data['order']->delivery_date)); ?></p>
                <p><strong>Status:</strong> <span class="badge bg-<?php echo $data['order']->status == 'completed' ? 'success' : ($data['order']->status == 'cancelled' ? 'danger' : 'warning'); ?>"><?php echo ucfirst($data['order']->status); ?></span></p>
                <form action="<?php echo URLROOT; ?>/admin/orders/<?php echo $data['order']->id; ?>/status" method="POST" class="d-inline">
                    <div class="input-group">
                        <select name="status" class="form-control">
                            <option value="pending" <?php echo $data['order']->status == 'pending' ? 'selected' : ''; ?>>Pending</option>
                            <option value="processing" <?php echo $data['order']->status == 'processing' ? 'selected' : ''; ?>>Processing</option>
                            <option value="completed" <?php echo $data['order']->status == 'completed' ? 'selected' : ''; ?>>Completed</option>
                            <option value="cancelled" <?php echo $data['order']->status == 'cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Update Status</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="card shadow">
    <div class="card-body">
        <h3>Order Items</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Food</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['orderItems'] as $item): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item->name); ?></td>
                            <td><?php echo $item->quantity; ?></td>
                            <td>GH₵ <?php echo number_format($item->price, 2); ?></td>
                            <td>GH₵ <?php echo number_format($item->price * $item->quantity, 2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-right">Total</th>
                        <th>GH₵ <?php echo number_format($data['order']->total_amount, 2); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<div class="mt-4">
    <a href="<?php echo URLROOT; ?>/admin/orders" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back to Orders</a>
</div>
