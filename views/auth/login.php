<?php require APPROOT . '/views/layouts/header.php'; ?>

<!-- Login Hero -->
<section style="background: linear-gradient(135deg, var(--primary-bg) 0%, #ffffff 50%, var(--primary-light) 100%); min-height: 80vh; display: flex; align-items: center; padding: 5rem 0;">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 order-2 order-lg-1 mb-6 mb-lg-0">
                <div class="text-center text-lg-start mb-4">
                    <span class="badge px-4 py-2 mb-3" style="background: #ffebee; color: #e74c3c; border-radius: 30px;">
                        <i class="fas fa-sign-in-alt me-2"></i> Welcome Back
                    </span>
                    <h1 class="display-4 fw-bold mb-3" style="color: #2c3e50;">
                        Login to Your Account
                    </h1>
                    <p class="lead text-muted mb-0" style="max-width: 450px;">
                        Access your orders, bookings, and manage your catering preferences with ease.
                    </p>
                </div>
                <div class="card shadow-lg border-0" style="border-radius: 24px;">
                    <div class="card-body p-5">
                        <form action="<?php echo URLROOT; ?>/login" method="POST">
                            <div class="mb-4">
                                <label for="email" class="form-label fw-medium" style="color: #2c3e50;">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background: #fff5f5; border: 2px solid #ffebee; border-radius: 12px 0 0 12px;">
                                        <i class="fas fa-envelope" style="color: #e74c3c;"></i>
                                    </span>
                                    <input type="email" name="email" id="email" class="form-control" required 
                                           style="border: 2px solid #ffebee; border-left: none; border-radius: 0 12px 12px 0; padding: 0.9rem 1rem;">
                                </div>
                            </div>
                            <div class="mb-5">
                                <label for="password" class="form-label fw-medium" style="color: #2c3e50;">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background: #fff5f5; border: 2px solid #ffebee; border-radius: 12px 0 0 12px;">
                                        <i class="fas fa-lock" style="color: #e74c3c;"></i>
                                    </span>
                                    <input type="password" name="password" id="password" class="form-control" required 
                                           style="border: 2px solid #ffebee; border-left: none; border-radius: 0 12px 12px 0; padding: 0.9rem 1rem;">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 rounded-pill py-3 fw-medium" style="font-size: 1.05rem;">
                                <i class="fas fa-sign-in-alt me-2"></i> Login Now
                            </button>
                        </form>
                        <hr class="my-5" style="border-color: #ffebee;">
                        <p class="text-center text-muted mb-0">
                            Don't have an account? 
                            <a href="<?php echo URLROOT; ?>/register" class="fw-medium" style="color: #e74c3c;">
                                Create an Account <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-8 order-1 order-lg-2">
                <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?auto=format&fit=crop&w=800&q=80" 
                     class="img-fluid shadow-lg rounded-4" 
                     alt="Delicious food">
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
