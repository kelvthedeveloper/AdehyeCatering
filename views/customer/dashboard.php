<?php require APPROOT . '/views/layouts/header.php'; ?>

<!-- Hero Section -->
<section class="py-5 position-relative overflow-hidden" style="background: linear-gradient(135deg, #fff5f5 0%, #ffffff 50%, #ffebee 100%);">
    <div class="container position-relative" style="z-index: 2;">
        <div class="text-center">
            <span class="badge px-4 py-2 mb-3" style="background: #ffebee; color: #e74c3c; border-radius: 30px; font-size: 0.9rem;">
                <i class="fas fa-home me-2"></i> Welcome Back!
            </span>
            <h1 class="display-4 fw-bold mb-3" style="color: #2c3e50;">
                Hi, <?php echo htmlspecialchars($data['user']->name); ?>
            </h1>
            <p class="lead text-muted mb-0" style="max-width: 600px; margin: 0 auto;">
                Manage your orders, bookings, and account settings
            </p>
        </div>
    </div>
</section>

<!-- Dashboard Content -->
<section class="py-5">
    <div class="container">
        <!-- Stats Cards -->
        <div class="row g-4 mb-5">
            <div class="col-md-3 col-sm-6">
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
            <div class="col-md-3 col-sm-6">
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
            <div class="col-md-3 col-sm-6">
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
            <div class="col-md-3 col-sm-6">
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

        <!-- Tabs Navigation -->
        <ul class="nav nav-pills mb-4 flex-wrap gap-2" id="dashboardTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active rounded-pill px-4" id="overview-tab" data-bs-toggle="pill" data-bs-target="#overview" type="button" role="tab" aria-controls="overview" aria-selected="true">
                    <i class="fas fa-home me-2"></i> Overview
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill px-4" id="orders-tab" data-bs-toggle="pill" data-bs-target="#orders" type="button" role="tab" aria-controls="orders" aria-selected="false">
                    <i class="fas fa-shopping-bag me-2"></i> Orders
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill px-4" id="bookings-tab" data-bs-toggle="pill" data-bs-target="#bookings" type="button" role="tab" aria-controls="bookings" aria-selected="false">
                    <i class="fas fa-calendar-alt me-2"></i> Bookings
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill px-4" id="settings-tab" data-bs-toggle="pill" data-bs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">
                    <i class="fas fa-cog me-2"></i> Settings
                </button>
            </li>
        </ul>

        <!-- Tabs Content -->
        <div class="tab-content" id="dashboardTabsContent">
            <!-- Overview Tab -->
            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                <div class="row g-4">
                    <!-- Recent Orders -->
                    <div class="col-lg-6">
                        <div class="card shadow-sm border-0" style="border-radius: 24px;">
                            <div class="card-header bg-white border-0 pb-0 pt-4 px-4">
                                <h5 class="fw-bold mb-0" style="color: #2c3e50;">
                                    <i class="fas fa-shopping-bag me-2" style="color: #e74c3c;"></i> Recent Orders
                                </h5>
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
                                    <div class="text-center mt-3">
                                        <button class="btn btn-link text-decoration-none" onclick="switchTab('orders')" style="color: #e74c3c;">
                                            View All Orders <i class="fas fa-arrow-right ms-1"></i>
                                        </button>
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
                                <h5 class="fw-bold mb-0" style="color: #2c3e50;">
                                    <i class="fas fa-calendar-check me-2" style="color: #e74c3c;"></i> Recent Bookings
                                </h5>
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
                                    <div class="text-center mt-3">
                                        <button class="btn btn-link text-decoration-none" onclick="switchTab('bookings')" style="color: #e74c3c;">
                                            View All Bookings <i class="fas fa-arrow-right ms-1"></i>
                                        </button>
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

            <!-- Orders Tab -->
            <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                <div class="card shadow-sm border-0" style="border-radius: 24px;">
                    <div class="card-header bg-white border-0 pb-0 pt-4 px-4">
                        <h5 class="fw-bold mb-0" style="color: #2c3e50;">
                            <i class="fas fa-shopping-bag me-2" style="color: #e74c3c;"></i> All Orders
                        </h5>
                    </div>
                    <div class="card-body pt-3 px-4 pb-4">
                        <?php if (count($data['orders']) > 0): ?>
                            <div class="row g-4">
                                <?php foreach ($data['orders'] as $order): ?>
                                    <div class="col-12">
                                        <div class="card border-0" style="background: #fff; border-radius: 24px;">
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
                                                <?php if ($order->delivery_address): ?>
                                                    <p class="text-muted mb-3">
                                                        <i class="fas fa-map-marker-alt me-2"></i> <?php echo htmlspecialchars($order->delivery_address); ?>
                                                    </p>
                                                <?php endif; ?>
                                                <hr class="mb-4">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <p class="text-muted mb-1">Total Amount</p>
                                                        <h3 class="fw-bold mb-0" style="color: #e74c3c;">GH₵ <?php echo number_format($order->total_amount, 2); ?></h3>
                                                    </div>
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
                                <a href="<?php echo URLROOT; ?>/menu" class="btn btn-primary rounded-pill px-5 py-3">
                                    <i class="fas fa-utensils me-2"></i> Browse Menu
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Bookings Tab -->
            <div class="tab-pane fade" id="bookings" role="tabpanel" aria-labelledby="bookings-tab">
                <div class="card shadow-sm border-0" style="border-radius: 24px;">
                    <div class="card-header bg-white border-0 pb-0 pt-4 px-4">
                        <h5 class="fw-bold mb-0" style="color: #2c3e50;">
                            <i class="fas fa-calendar-alt me-2" style="color: #e74c3c;"></i> All Bookings
                        </h5>
                    </div>
                    <div class="card-body pt-3 px-4 pb-4">
                        <?php if (count($data['bookings']) > 0): ?>
                            <div class="row g-4">
                                <?php foreach ($data['bookings'] as $booking): ?>
                                    <div class="col-12">
                                        <div class="card border-0" style="background: #fff; border-radius: 24px;">
                                            <div class="card-body p-5">
                                                <div class="d-flex justify-content-between align-items-start mb-4 flex-wrap gap-3">
                                                    <div>
                                                        <h5 class="fw-bold mb-1" style="color: #2c3e50;">Booking #<?php echo $booking->id; ?></h5>
                                                        <small class="text-muted">
                                                            <i class="fas fa-calendar me-1"></i> <?php echo date('M d, Y H:i', strtotime($booking->event_date)); ?>
                                                        </small>
                                                    </div>
                                                    <span class="badge rounded-pill py-2 px-4" style="background: <?php echo $booking->status == 'confirmed' ? '#d4edda' : ($booking->status == 'cancelled' ? '#f8d7da' : '#fff3cd'); ?>; color: <?php echo $booking->status == 'confirmed' ? '#155724' : ($booking->status == 'cancelled' ? '#721c24' : '#856404'); ?>; font-size: 1rem;">
                                                        <?php echo ucfirst($booking->status); ?>
                                                    </span>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-md-4 mb-3 mb-md-0">
                                                        <p class="text-muted mb-1">Event Type</p>
                                                        <h6 class="fw-bold mb-0" style="color: #2c3e50;"><?php echo htmlspecialchars($booking->event_type); ?></h6>
                                                    </div>
                                                    <div class="col-md-4 mb-3 mb-md-0">
                                                        <p class="text-muted mb-1">Number of Guests</p>
                                                        <h6 class="fw-bold mb-0" style="color: #2c3e50;"><?php echo $booking->guest_count; ?> Guests</h6>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <p class="text-muted mb-1">Venue</p>
                                                        <h6 class="fw-bold mb-0" style="color: #2c3e50;"><?php echo htmlspecialchars($booking->venue); ?></h6>
                                                    </div>
                                                </div>
                                                <?php if ($booking->special_requests): ?>
                                                    <div class="mb-4">
                                                        <p class="text-muted mb-1">Special Requests</p>
                                                        <p class="mb-0" style="color: #2c3e50;"><?php echo htmlspecialchars($booking->special_requests); ?></p>
                                                    </div>
                                                <?php endif; ?>
                                                <hr class="mb-4">
                                                <div class="d-flex justify-content-end gap-2">
                                                    <a href="<?php echo URLROOT; ?>/customer/book" class="btn btn-outline-primary rounded-pill px-4">
                                                        <i class="fas fa-plus me-2"></i> New Booking
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <div class="text-center py-10">
                                <i class="fas fa-calendar text-muted" style="font-size: 5rem; margin-bottom: 1.5rem;"></i>
                                <h4 class="fw-bold mb-2" style="color: #2c3e50;">No bookings yet</h4>
                                <p class="text-muted mb-4" style="max-width: 400px; margin: 0 auto;">You haven't made any catering bookings yet. Book your first event now!</p>
                                <a href="<?php echo URLROOT; ?>/customer/book" class="btn btn-primary rounded-pill px-5 py-3">
                                    <i class="fas fa-calendar-plus me-2"></i> Book Now
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Settings Tab -->
            <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                <div class="row g-4">
                    <!-- Profile Settings -->
                    <div class="col-lg-6">
                        <div class="card shadow-sm border-0" style="border-radius: 24px;">
                            <div class="card-header bg-white border-0 pb-0 pt-4 px-4">
                                <h5 class="fw-bold mb-0" style="color: #2c3e50;">
                                    <i class="fas fa-user-edit me-2" style="color: #e74c3c;"></i> Profile Settings
                                </h5>
                            </div>
                            <div class="card-body pt-3 px-4 pb-4">
                                <form action="<?php echo URLROOT; ?>/customer/dashboard" method="POST">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Full Name</label>
                                        <input type="text" name="name" id="name" class="form-control" value="<?php echo htmlspecialchars($data['user']->name); ?>" required style="border-radius: 12px;">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($data['user']->email); ?>" required style="border-radius: 12px;">
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="text" name="phone" id="phone" class="form-control" value="<?php echo htmlspecialchars($data['user']->phone); ?>" style="border-radius: 12px;">
                                    </div>
                                    <div class="mb-4">
                                        <label for="address" class="form-label">Address</label>
                                        <textarea name="address" id="address" class="form-control" rows="3" style="border-radius: 12px;"><?php echo htmlspecialchars($data['user']->address); ?></textarea>
                                    </div>
                                    <button type="submit" name="update_profile" class="btn btn-primary w-100 rounded-pill py-3">
                                        <i class="fas fa-save me-2"></i> Save Changes
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Password Change -->
                    <div class="col-lg-6">
                        <div class="card shadow-sm border-0" style="border-radius: 24px;">
                            <div class="card-header bg-white border-0 pb-0 pt-4 px-4">
                                <h5 class="fw-bold mb-0" style="color: #2c3e50;">
                                    <i class="fas fa-key me-2" style="color: #e74c3c;"></i> Change Password
                                </h5>
                            </div>
                            <div class="card-body pt-3 px-4 pb-4">
                                <form action="<?php echo URLROOT; ?>/customer/dashboard" method="POST">
                                    <div class="mb-3">
                                        <label for="current_password" class="form-label">Current Password</label>
                                        <input type="password" name="current_password" id="current_password" class="form-control" required style="border-radius: 12px;">
                                    </div>
                                    <div class="mb-3">
                                        <label for="new_password" class="form-label">New Password</label>
                                        <input type="password" name="new_password" id="new_password" class="form-control" required style="border-radius: 12px;">
                                    </div>
                                    <div class="mb-4">
                                        <label for="confirm_password" class="form-label">Confirm New Password</label>
                                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" required style="border-radius: 12px;">
                                    </div>
                                    <button type="submit" name="update_password" class="btn btn-outline-primary w-100 rounded-pill py-3">
                                        <i class="fas fa-sync-alt me-2"></i> Update Password
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function switchTab(tabId) {
    const tabTriggerEl = document.getElementById(tabId + '-tab');
    const tab = new bootstrap.Tab(tabTriggerEl);
    tab.show();
}
</script>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
