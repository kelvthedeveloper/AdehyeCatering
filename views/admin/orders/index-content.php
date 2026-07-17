
<h2>Manage Orders</h2>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Date</th>
                <th>Total</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['orders'] as $order): ?>
                <tr>
                    <td>#<?php echo $order->id; ?></td>
                    <td><?php echo htmlspecialchars($order->user_name); ?></td>
                    <td><?php echo date('Y-m-d', strtotime($order->created_at)); ?></td>
                    <td>GH₵ <?php echo number_format($order->total_amount, 2); ?></td>
                    <td><span class="badge bg-<?php echo $order->status == 'completed' ? 'success' : ($order->status == 'cancelled' ? 'danger' : 'warning'); ?>"><?php echo ucfirst($order->status); ?></span></td>
                    <td>
                        <a href="<?php echo URLROOT; ?>/admin/orders/<?php echo $order->id; ?>" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> View</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
