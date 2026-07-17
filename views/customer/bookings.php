<?php require APPROOT . '/views/layouts/header.php'; ?>

<!-- Hero Section -->
<section class="py-5 position-relative overflow-hidden" style="background: linear-gradient(135deg, #fff5f5 0%, #ffffff 50%, #ffebee 100%);">
    <div class="container position-relative" style="z-index: 2;">
        <div class="text-center">
            <span class="badge px-4 py-2 mb-3" style="background: #ffebee; color: #e74c3c; border-radius: 30px; font-size: 0.9rem;">
                <i class="fas fa-calendar-check me-2"></i> My Bookings
            </span>
            <h1 class="display-4 fw-bold mb-3" style="color: #2c3e50;">
                Booking History
            </h1>
            <p class="lead text-muted mb-0" style="max-width: 600px; margin: 0 auto;">
                View and track all your catering service bookings
            </p>
        </div>
    </div>
</section>

<!-- Bookings List -->
<section class="py-5">
    <div class="container">
        <?php if (count($data['bookings']) > 0): ?>
            <div class="row g-4">
                <?php foreach ($data['bookings'] as $booking): ?>
                    <div class="col-12">
                        <div class="card shadow-sm border-0" style="border-radius: 24px; overflow: hidden;">
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
                                <div class="d-flex justify-content-end">
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
                <i class="fas fa-calendar text-muted" style="font-size: 5rem; margin-bottom: 1.5rem;"></i>
                <h4 class="fw-bold mb-2" style="color: #2c3e50;">No bookings yet</h4>
                <p class="text-muted mb-4" style="max-width: 400px; margin: 0 auto;">You haven't made any catering bookings yet. Book your first event now!</p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="<?php echo URLROOT; ?>/customer/book" class="btn btn-primary rounded-pill px-5 py-3">
                        <i class="fas fa-calendar-plus me-2"></i> Book Now
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
