<?php require APPROOT . '/views/layouts/header.php'; ?>

<!-- Hero Section -->
<section style="background: linear-gradient(135deg, var(--primary-bg) 0%, #ffffff 50%, var(--primary-light) 100%); padding: 4rem 0;">
    <div class="container position-relative" style="z-index: 2;">
        <div class="text-center">
            <span class="badge px-4 py-2 mb-3" style="background: #ffebee; color: #e74c3c; border-radius: 30px; font-size: 0.9rem;">
                <i class="fas fa-check-circle me-2"></i> Checkout
            </span>
            <h1 class="display-4 fw-bold mb-3" style="color: #2c3e50;">
                Complete Your Order
            </h1>
            <p class="lead text-muted mb-0" style="max-width: 600px; margin: 0 auto;">
                Enter your delivery details and confirm your order
            </p>
        </div>
    </div>
</section>

<!-- Checkout Section -->
<section class="py-6">
    <div class="container">
        <div class="row">
            <!-- Delivery Details -->
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="card shadow border-0" style="border-radius: 24px;">
                    <div class="card-header bg-white border-0 pb-0 pt-4 px-4">
                        <h5 class="fw-bold mb-0" style="color: #2c3e50;">
                            <i class="fas fa-truck me-2" style="color: #e74c3c;"></i> Delivery Details
                        </h5>
                    </div>
                    <div class="card-body pt-3 px-4 pb-4">
                        <form action="<?php echo URLROOT; ?>/checkout" method="POST">
                            <div class="mb-4">
                <label for="delivery_address" class="form-label fw-medium">Delivery Address</label>
                <div class="mb-2">
                    <button type="button" id="detectAddressBtn" class="btn btn-outline-secondary rounded-pill px-4">
                        <i class="fas fa-location-arrow me-2"></i> Auto-Detect My Location
                    </button>
                </div>
                <textarea name="delivery_address" id="delivery_address" class="form-control" rows="3" required><?php echo htmlspecialchars($data['user']->address ?? ''); ?></textarea>
            </div>
            <div class="mb-4">
                <label for="delivery_date" class="form-label fw-medium">Delivery Date & Time</label>
                <input type="datetime-local" name="delivery_date" id="delivery_date" class="form-control" required>
            </div>
                            <hr class="my-4">
                            <button type="submit" class="btn btn-primary rounded-pill w-100 py-3" style="font-size: 1.1rem;">
                                <i class="fas fa-credit-card me-2"></i> Place Order
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="col-lg-4">
                <div class="card shadow border-0 sticky-top" style="border-radius: 24px; top: 80px;">
                    <div class="card-header bg-white border-0 pb-0 pt-4 px-4">
                        <h5 class="fw-bold mb-0" style="color: #2c3e50;">
                            <i class="fas fa-calculator me-2" style="color: #e74c3c;"></i> Order Summary
                        </h5>
                    </div>
                    <div class="card-body pt-3 px-4 pb-4">
                        <div class="row g-3 mb-4">
                            <?php foreach ($data['cartItems'] as $item): ?>
                            <div class="col-12">
                                <div class="d-flex gap-3 align-items-center">
                                    <img src="<?php echo URLROOT; ?>/<?php echo $item->image ?: 'assets/images/default-food.svg'; ?>" 
                                         alt="<?php echo htmlspecialchars($item->name); ?>" 
                                         class="img-fluid" 
                                         style="width: 60px; height: 60px; object-fit: cover; border-radius: 12px;">
                                    <div class="flex-grow-1">
                                        <h6 class="fw-bold mb-0" style="color: #2c3e50;"><?php echo htmlspecialchars($item->name); ?></h6>
                                        <p class="text-muted small mb-0">x<?php echo $item->quantity; ?></p>
                                    </div>
                                    <span class="fw-medium" style="color: #2c3e50;">GH₵ <?php echo number_format($item->price * $item->quantity, 2); ?></span>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <hr class="my-3">
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
                            <span class="fw-bold" style="color: #2c3e50; font-size: 1.2rem;">Total</span>
                            <span class="fw-bold" style="color: #e74c3c; font-size: 1.5rem;">GH₵ <?php echo number_format($data['total'], 2); ?></span>
                        </div>
                        <div class="d-grid gap-2">
                            <a href="<?php echo URLROOT; ?>/customer/cart" class="btn btn-outline-secondary rounded-pill py-3">
                                <i class="fas fa-arrow-left me-2"></i> Back to Cart
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Set minimum date to now
    const deliveryDateInput = document.getElementById('delivery_date');
    const now = new Date();
    const timezoneOffset = now.getTimezoneOffset() * 60000;
    const localISOTime = (new Date(now - timezoneOffset)).toISOString().slice(0, 16);
    deliveryDateInput.min = localISOTime;
    
    // Auto-detect address
    const detectBtn = document.getElementById('detectAddressBtn');
    const addressInput = document.getElementById('delivery_address');
    
    detectBtn.addEventListener('click', function() {
        if (!navigator.geolocation) {
            alert('Geolocation is not supported by your browser.');
            return;
        }
        
        detectBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Detecting...';
        detectBtn.disabled = true;
        
        navigator.geolocation.getCurrentPosition(
            async function(position) {
                const { latitude, longitude } = position.coords;
                
                try {
                    const response = await fetch(
                        `https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}&zoom=18&addressdetails=1`,
                        {
                            headers: {
                                'User-Agent': 'AdehyeCatering/1.0 (your-email@example.com)'
                            }
                        }
                    );
                    
                    const data = await response.json();
                    
                    if (data.display_name) {
                        addressInput.value = data.display_name;
                    } else {
                        alert('Could not retrieve address.');
                    }
                } catch (error) {
                    console.error('Error fetching address:', error);
                    alert('Failed to get address. Please enter it manually.');
                }
                
                detectBtn.innerHTML = '<i class="fas fa-location-arrow me-2"></i> Auto-Detect My Location';
                detectBtn.disabled = false;
            },
            function(error) {
                let errorMessage = 'Could not retrieve location.';
                switch(error.code) {
                    case error.PERMISSION_DENIED:
                        errorMessage = 'Location access denied by user.';
                        break;
                    case error.POSITION_UNAVAILABLE:
                        errorMessage = 'Location information unavailable.';
                        break;
                    case error.TIMEOUT:
                        errorMessage = 'Location request timed out.';
                        break;
                }
                alert(errorMessage);
                
                detectBtn.innerHTML = '<i class="fas fa-location-arrow me-2"></i> Auto-Detect My Location';
                detectBtn.disabled = false;
            },
            {
                enableHighAccuracy: true,
                timeout: 10000,
                maximumAge: 0
            }
        );
    });
});
</script>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
