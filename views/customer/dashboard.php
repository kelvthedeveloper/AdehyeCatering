<?php require APPROOT . '/views/layouts/header.php'; ?>

<!-- Hero Section -->
<section class="py-5 position-relative overflow-hidden" style="background: linear-gradient(135deg, #fff5f5 0%, #ffffff 50%, #ffebee 100%);">
    <div class="container position-relative" style="z-index: 2;">
        <div class="text-center">
            <span class="badge px-4 py-2 mb-3" style="background: #ffebee; color: #e74c3c; border-radius: 30px; font-size: 0.9rem;">
                <i class="fas fa-home me-2"></i> Welcome Back!
            </span>
            <h1 class="display-4 fw-bold mb-3" style="color: #2c3e50;">
                My Dashboard
            </h1>
            <p class="lead text-muted mb-0" style="max-width: 600px; margin: 0 auto;">
                Manage your orders, bookings, and catering services with ease
            </p>
        </div>
    </div>
</section>

<!-- Quick Actions -->
<section class="py-4">
    <div class="container">
        <div class="row g-3">
            <div class="col-md-3">
                <a href="<?php echo URLROOT; ?>/customer/orders" class="btn btn-lg btn-outline-primary w-100 rounded-3 py-3" style="border-width: 2px;">
                    <i class="fas fa-shopping-bag me-2"></i> My Orders
                </a>
            </div>
            <div class="col-md-3">
                <a href="<?php echo URLROOT; ?>/customer/bookings" class="btn btn-lg btn-outline-primary w-100 rounded-3 py-3" style="border-width: 2px;">
                    <i class="fas fa-calendar-check me-2"></i> My Bookings
                </a>
            </div>
            <div class="col-md-3">
                <a href="<?php echo URLROOT; ?>/customer/book" class="btn btn-lg btn-primary w-100 rounded-3 py-3">
                    <i class="fas fa-calendar-plus me-2"></i> Book Catering
                </a>
            </div>
            <div class="col-md-3">
                <a href="<?php echo URLROOT; ?>/menu" class="btn btn-lg btn-outline-secondary w-100 rounded-3 py-3" style="border-width: 2px;">
                    <i class="fas fa-utensils me-2"></i> Browse Menu
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Stats Cards -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-3">
                <div class="card h-100 shadow-sm border-0" style="border-radius: 24px; overflow: hidden;">
                    <div class="card-body p-4 text-center">
                        <div class="mb-3" style="width: 70px; height: 70px; background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%); border-radius: 20px; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                            <i class="fas fa-shopping-bag text-white" style="font-size: 1.8rem;"></i>
                        </div>
                        <h2 class="fw-bold mb-1" style="color: #2c3e50;"><?php echo $data['total_orders']; ?></h2>
                        <p class="text-muted mb-0">Total Orders</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 shadow-sm border-0" style="border-radius: 24px; overflow: hidden;">
                    <div class="card-body p-4 text-center">
                        <div class="mb-3" style="width: 70px; height: 70px; background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%); border-radius: 20px; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                            <i class="fas fa-wallet text-white" style="font-size: 1.8rem;"></i>
                        </div>
                        <h2 class="fw-bold mb-1" style="color: #2c3e50;">GH₵ <?php echo number_format($data['total_spent'], 2); ?></h2>
                        <p class="text-muted mb-0">Total Spent</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 shadow-sm border-0" style="border-radius: 24px; overflow: hidden;">
                    <div class="card-body p-4 text-center">
                        <div class="mb-3" style="width: 70px; height: 70px; background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%); border-radius: 20px; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                            <i class="fas fa-clock text-white" style="font-size: 1.8rem;"></i>
                        </div>
                        <h2 class="fw-bold mb-1" style="color: #2c3e50;"><?php echo $data['pending_orders']; ?></h2>
                        <p class="text-muted mb-0">Pending Orders</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 shadow-sm border-0" style="border-radius: 24px; overflow: hidden;">
                    <div class="card-body p-4 text-center">
                        <div class="mb-3" style="width: 70px; height: 70px; background: linear-gradient(135deg, #3498db 0%, #2980b9 100%); border-radius: 20px; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                            <i class="fas fa-calendar-check text-white" style="font-size: 1.8rem;"></i>
                        </div>
                        <h2 class="fw-bold mb-1" style="color: #2c3e50;"><?php echo $data['total_bookings']; ?></h2>
                        <p class="text-muted mb-0">Total Bookings</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Recent Orders and Bookings -->
<section class="py-5" style="background: #fff5f5;">
    <div class="container">
        <div class="row g-5">
            <!-- Recent Orders -->
            <div class="col-lg-6">
                <div class="card shadow-sm border-0" style="border-radius: 24px;">
                    <div class="card-header bg-white border-0 pb-0 pt-4 px-4">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="fw-bold mb-0" style="color: #2c3e50;">
                                <i class="fas fa-shopping-bag me-2" style="color: #e74c3c;"></i> Recent Orders
                            </h5>
                            <a href="<?php echo URLROOT; ?>/customer/orders" class="text-decoration-none" style="color: #e74c3c;">
                                View All <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body pt-3 px-4 pb-4">
                        <?php if (count($data['orders']) > 0): ?>
                            <div class="row g-3">
                                <?php foreach (array_slice($data['orders'], 0, 3) as $order): ?>
                                    <div class="col-12">
                                        <div class="card border-0" style="background: #fff; border-radius: 16px;">
                                            <div class="card-body p-4">
                                                <div class="d-flex justify-content-between align-items-start mb-3">
                                                    <div>
                                                        <h6 class="fw-bold mb-0" style="color: #2c3e50;">Order #<?php echo $order->id; ?></h6>
                                                        <small class="text-muted"><?php echo date('M d, Y', strtotime($order->created_at)); ?></small>
                                                    </div>
                                                    <span class="badge rounded-pill py-2 px-3" style="background: <?php echo $order->status == 'completed' ? '#d4edda' : ($order->status == 'cancelled' ? '#f8d7da' : '#fff3cd'); ?>; color: <?php echo $order->status == 'completed' ? '#155724' : ($order->status == 'cancelled' ? '#721c24' : '#856404'); ?>; font-size: 0.85rem;">
                                                        <?php echo ucfirst($order->status); ?>
                                                    </span>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="fw-bold" style="color: #e74c3c; font-size: 1.2rem;">GH₵ <?php echo number_format($order->total_amount, 2); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <div class="text-center py-5">
                                <i class="fas fa-shopping-bag text-muted" style="font-size: 4rem; margin-bottom: 1rem;"></i>
                                <h6 class="text-muted fw-bold mb-1">No orders yet</h6>
                                <p class="text-muted mb-3">Start exploring our delicious menu</p>
                                <a href="<?php echo URLROOT; ?>/menu" class="btn btn-primary rounded-pill px-4">Browse Menu</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <!-- Recent Bookings -->
            <div class="col-lg-6">
                <div class="card shadow-sm border-0" style="border-radius: 24px;">
                    <div class="card-header bg-white border-0 pb-0 pt-4 px-4">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="fw-bold mb-0" style="color: #2c3e50;">
                                <i class="fas fa-calendar-check me-2" style="color: #e74c3c;"></i> Recent Bookings
                            </h5>
                            <a href="<?php echo URLROOT; ?>/customer/bookings" class="text-decoration-none" style="color: #e74c3c;">
                                View All <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body pt-3 px-4 pb-4">
                        <?php if (count($data['bookings']) > 0): ?>
                            <div class="row g-3">
                                <?php foreach (array_slice($data['bookings'], 0, 3) as $booking): ?>
                                    <div class="col-12">
                                        <div class="card border-0" style="background: #fff; border-radius: 16px;">
                                            <div class="card-body p-4">
                                                <div class="d-flex justify-content-between align-items-start mb-3">
                                                    <div>
                                                        <h6 class="fw-bold mb-0" style="color: #2c3e50;">Booking #<?php echo $booking->id; ?></h6>
                                                        <small class="text-muted"><?php echo htmlspecialchars($booking->event_type); ?></small>
                                                    </div>
                                                    <span class="badge rounded-pill py-2 px-3" style="background: <?php echo $booking->status == 'confirmed' ? '#d4edda' : ($booking->status == 'cancelled' ? '#f8d7da' : '#fff3cd'); ?>; color: <?php echo $booking->status == 'confirmed' ? '#155724' : ($booking->status == 'cancelled' ? '#721c24' : '#856404'); ?>; font-size: 0.85rem;">
                                                        <?php echo ucfirst($booking->status); ?>
                                                    </span>
                                                </div>
                                                <div class="d-flex flex-wrap gap-3 mb-2">
                                                    <small class="text-muted">
                                                        <i class="fas fa-calendar me-1"></i> 
                                                        <?php echo date('M d, Y', strtotime($booking->event_date)); ?>
                                                    </small>
                                                    <small class="text-muted">
                                                        <i class="fas fa-users me-1"></i> 
                                                        <?php echo $booking->guest_count; ?> Guests
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <div class="text-center py-5">
                                <i class="fas fa-calendar text-muted" style="font-size: 4rem; margin-bottom: 1rem;"></i>
                                <h6 class="text-muted fw-bold mb-1">No bookings yet</h6>
                                <p class="text-muted mb-3">Book your first catering service now</p>
                                <a href="<?php echo URLROOT; ?>/customer/book" class="btn btn-primary rounded-pill px-4">Book Now</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
