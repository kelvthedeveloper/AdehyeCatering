<?php require APPROOT . '/views/layouts/header.php'; ?>

<!-- Hero Section -->
<section class="py-5 position-relative overflow-hidden" style="background: linear-gradient(135deg, #fff5f5 0%, #ffffff 50%, #ffebee 100%);">
    <div class="container position-relative" style="z-index: 2;">
        <div class="text-center">
            <span class="badge px-4 py-2 mb-3" style="background: #ffebee; color: #e74c3c; border-radius: 30px; font-size: 0.9rem;">
                <i class="fas fa-shopping-bag me-2"></i> My Orders
            </span>
            <h1 class="display-4 fw-bold mb-3" style="color: #2c3e50;">
                Order History
            </h1>
            <p class="lead text-muted mb-0" style="max-width: 600px; margin: 0 auto;">
                View and track all your catering orders
            </p>
        </div>
    </div>
</section>

<!-- Orders List -->
<section class="py-5">
    <div class="container">
        <?php if (count($data['orders']) > 0): ?>
            <div class="row g-4">
                <?php foreach ($data['orders'] as $order): ?>
                    <div class="col-12">
                        <div class="card shadow-sm border-0" style="border-radius: 24px; overflow: hidden;">
                            <div class="card-body p-5">
                                <div class="d-flex justify-content-between align-items-start mb-4 flex-wrap gap-3">
                                    <div>
                                        <h5 class="fw-bold mb-1" style="color: #2c3e50;">Order #<?php echo $order->id; ?></h5>
                                        <small class="text-muted">
                                            <i class="fas fa-calendar me-1"></i> <?php echo date('M d, Y', strtotime($order->created_at)); ?>
                                        </small>
                                    </div>
                                    <span class="badge rounded-pill py-2 px-4" style="background: <?php echo $order->status == 'completed' ? '#d4edda' : ($order->status == 'cancelled' ? '#f8d7da' : '#fff3cd'); ?>; color: <?php echo $order->status == 'completed' ? '#155724' : ($order->status == 'cancelled' ? '#721c24' : '#856404'); ?>; font-size: 1rem;">
                                        <?php echo ucfirst($order->status); ?>
                                    </span>
                                </div>
                                <hr class="mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="text-muted mb-1">Total Amount</p>
                                        <h3 class="fw-bold mb-0" style="color: #e74c3c;">GH₵ <?php echo number_format($order->total_amount, 2); ?></h3>
                                    </div>
                                    <a href="<?php echo URLROOT; ?>/customer/dashboard" class="btn btn-outline-primary rounded-pill px-4">
                                        <i class="fas fa-arrow-left me-2"></i> Back to Dashboard
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="text-center py-10">
                <i class="fas fa-shopping-bag text-muted" style="font-size: 5rem; margin-bottom: 1.5rem;"></i>
                <h4 class="fw-bold mb-2" style="color: #2c3e50;">No orders yet</h4>
                <p class="text-muted mb-4" style="max-width: 400px; margin: 0 auto;">You haven't placed any orders yet. Explore our delicious menu and place your first order!</p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="<?php echo URLROOT; ?>/menu" class="btn btn-primary rounded-pill px-5 py-3">
                        <i class="fas fa-utensils me-2"></i> Browse Menu
                    </a>
                    <a href="<?php echo URLROOT; ?>/customer/dashboard" class="btn btn-outline-secondary rounded-pill px-5 py-3">
                        <i class="fas fa-home me-2"></i> Back to Dashboard
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
