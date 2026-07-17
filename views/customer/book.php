<?php require APPROOT . '/views/layouts/header.php'; ?>

<!-- Hero Section -->
<section class="py-5 position-relative overflow-hidden" style="background: linear-gradient(135deg, #fff5f5 0%, #ffffff 50%, #ffebee 100%);">
    <div class="container position-relative" style="z-index: 2;">
        <div class="text-center">
            <span class="badge px-4 py-2 mb-3" style="background: #ffebee; color: #e74c3c; border-radius: 30px; font-size: 0.9rem;">
                <i class="fas fa-calendar-plus me-2"></i> Book Now
            </span>
            <h1 class="display-4 fw-bold mb-3" style="color: #2c3e50;">
                Book Catering Service
            </h1>
            <p class="lead text-muted mb-0" style="max-width: 600px; margin: 0 auto;">
                Let us make your special event unforgettable with our delicious catering
            </p>
        </div>
    </div>
</section>

<!-- Booking Form Section -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0" style="border-radius: 24px; overflow: hidden;">
                    <div class="card-body p-5">
                        <form action="<?php echo URLROOT; ?>/customer/book" method="POST">
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label for="event_type" class="form-label fw-medium" style="color: #2c3e50;">Event Type</label>
                                    <input type="text" name="event_type" id="event_type" class="form-control" required placeholder="e.g. Wedding, Birthday, Corporate Event" style="border-radius: 12px; padding: 0.75rem 1rem;">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <label for="event_date" class="form-label fw-medium" style="color: #2c3e50;">Event Date & Time</label>
                                    <input type="datetime-local" name="event_date" id="event_date" class="form-control" required style="border-radius: 12px; padding: 0.75rem 1rem;">
                                </div>
                                <div class="col-md-6">
                                    <label for="guest_count" class="form-label fw-medium" style="color: #2c3e50;">Number of Guests</label>
                                    <input type="number" name="guest_count" id="guest_count" class="form-control" required min="1" style="border-radius: 12px; padding: 0.75rem 1rem;">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label for="venue" class="form-label fw-medium" style="color: #2c3e50;">Venue</label>
                                    <div class="mb-2">
                                        <button type="button" id="detectVenueBtn" class="btn btn-outline-secondary rounded-pill px-4">
                                            <i class="fas fa-location-arrow me-2"></i> Auto-Detect Venue
                                        </button>
                                    </div>
                                    <input type="text" name="venue" id="venue" class="form-control" required style="border-radius: 12px; padding: 0.75rem 1rem;">
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-12">
                                    <label for="special_requests" class="form-label fw-medium" style="color: #2c3e50;">Special Requests</label>
                                    <textarea name="special_requests" id="special_requests" class="form-control" rows="4" placeholder="Any special dietary requirements or preferences?" style="border-radius: 12px; padding: 0.75rem 1rem;"></textarea>
                                </div>
                            </div>
                            <div class="d-flex gap-3 flex-wrap">
                                <a href="<?php echo URLROOT; ?>/customer/dashboard" class="btn btn-outline-secondary rounded-pill px-5 py-3 flex-grow-1">
                                    <i class="fas fa-arrow-left me-2"></i> Back to Dashboard
                                </a>
                                <button type="submit" class="btn btn-primary rounded-pill px-5 py-3 flex-grow-1" style="font-size: 1.1rem;">
                                    <i class="fas fa-calendar-check me-2"></i> Submit Booking
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Set minimum date to now
    const eventDateInput = document.getElementById('event_date');
    const now = new Date();
    const timezoneOffset = now.getTimezoneOffset() * 60000;
    const localISOTime = (new Date(now - timezoneOffset)).toISOString().slice(0, 16);
    eventDateInput.min = localISOTime;
    
    // Auto-detect venue
    const detectBtn = document.getElementById('detectVenueBtn');
    const venueInput = document.getElementById('venue');
    
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
                        venueInput.value = data.display_name;
                    } else {
                        alert('Could not retrieve venue.');
                    }
                } catch (error) {
                    console.error('Error fetching venue:', error);
                    alert('Failed to get venue. Please enter it manually.');
                }
                
                detectBtn.innerHTML = '<i class="fas fa-location-arrow me-2"></i> Auto-Detect Venue';
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
                
                detectBtn.innerHTML = '<i class="fas fa-location-arrow me-2"></i> Auto-Detect Venue';
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
