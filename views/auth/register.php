<?php require APPROOT . '/views/layouts/header.php'; ?>

<!-- Registration Hero -->
<section style="background: linear-gradient(135deg, var(--primary-bg) 0%, #ffffff 50%, var(--primary-light) 100%); min-height: 80vh; display: flex; align-items: center; padding: 5rem 0;">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-5 col-md-8 mb-6 mb-lg-0">
                <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=800&q=80" 
                     class="img-fluid shadow-lg rounded-4" 
                     alt="Fresh ingredients">
            </div>
            <div class="col-lg-6">
                <div class="text-center text-lg-start mb-4">
                    <span class="badge px-4 py-2 mb-3" style="background: #ffebee; color: #e74c3c; border-radius: 30px;">
                        <i class="fas fa-user-plus me-2"></i> Join Us
                    </span>
                    <h1 class="display-4 fw-bold mb-3" style="color: #2c3e50;">
                        Create Your Account
                    </h1>
                    <p class="lead text-muted mb-0" style="max-width: 450px;">
                        Sign up to enjoy our delicious food, book catering services, and track your orders easily!
                    </p>
                </div>
                <div class="card shadow-lg border-0" style="border-radius: 24px;">
                    <div class="card-body p-5">
                        <form action="<?php echo URLROOT; ?>/register" method="POST">
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label for="name" class="form-label fw-medium" style="color: #2c3e50;">Full Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background: #fff5f5; border: 2px solid #ffebee; border-radius: 12px 0 0 12px;">
                                            <i class="fas fa-user" style="color: #e74c3c;"></i>
                                        </span>
                                        <input type="text" name="name" id="name" class="form-control" required 
                                               style="border: 2px solid #ffebee; border-left: none; border-radius: 0 12px 12px 0; padding: 0.9rem 1rem;">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label for="email" class="form-label fw-medium" style="color: #2c3e50;">Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background: #fff5f5; border: 2px solid #ffebee; border-radius: 12px 0 0 12px;">
                                            <i class="fas fa-envelope" style="color: #e74c3c;"></i>
                                        </span>
                                        <input type="email" name="email" id="email" class="form-control" required 
                                               style="border: 2px solid #ffebee; border-left: none; border-radius: 0 12px 12px 0; padding: 0.9rem 1rem;">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label for="password" class="form-label fw-medium" style="color: #2c3e50;">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background: #fff5f5; border: 2px solid #ffebee; border-radius: 12px 0 0 12px;">
                                            <i class="fas fa-lock" style="color: #e74c3c;"></i>
                                        </span>
                                        <input type="password" name="password" id="password" class="form-control" required 
                                               style="border: 2px solid #ffebee; border-left: none; border-radius: 0 12px 12px 0; padding: 0.9rem 1rem;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="confirm_password" class="form-label fw-medium" style="color: #2c3e50;">Confirm Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background: #fff5f5; border: 2px solid #ffebee; border-radius: 12px 0 0 12px;">
                                            <i class="fas fa-lock" style="color: #e74c3c;"></i>
                                        </span>
                                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" required 
                                               style="border: 2px solid #ffebee; border-left: none; border-radius: 0 12px 12px 0; padding: 0.9rem 1rem;">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label for="phone" class="form-label fw-medium" style="color: #2c3e50;">Phone Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background: #fff5f5; border: 2px solid #ffebee; border-radius: 12px 0 0 12px;">
                                            <i class="fas fa-phone" style="color: #e74c3c;"></i>
                                        </span>
                                        <input type="text" name="phone" id="phone" class="form-control" 
                                               style="border: 2px solid #ffebee; border-left: none; border-radius: 0 12px 12px 0; padding: 0.9rem 1rem;">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-12">
                                    <label for="address" class="form-label fw-medium" style="color: #2c3e50;">Address</label>
                                    <div class="mb-2">
                                        <button type="button" id="detectAddressBtn" class="btn btn-outline-secondary rounded-pill px-4">
                                            <i class="fas fa-location-arrow me-2"></i> Auto-Detect My Location
                                        </button>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background: #fff5f5; border: 2px solid #ffebee; border-radius: 12px 0 0 12px; align-items: flex-start; padding-top: 1rem;">
                                            <i class="fas fa-map-marker-alt" style="color: #e74c3c;"></i>
                                        </span>
                                        <textarea name="address" id="address" class="form-control" rows="3" 
                                                  style="border: 2px solid #ffebee; border-left: none; border-radius: 0 12px 12px 0; padding: 0.9rem 1rem;"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 rounded-pill py-3 fw-medium" style="font-size: 1.05rem;">
                                <i class="fas fa-user-plus me-2"></i> Create Account
                            </button>
                        </form>
                        <hr class="my-5" style="border-color: #ffebee;">
                        <p class="text-center text-muted mb-0">
                            Already have an account? 
                            <a href="<?php echo URLROOT; ?>/login" class="fw-medium" style="color: #e74c3c;">
                                Login Here <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const detectBtn = document.getElementById('detectAddressBtn');
    const addressInput = document.getElementById('address');
    
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
