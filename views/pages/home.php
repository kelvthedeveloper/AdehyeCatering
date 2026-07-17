<?php require APPROOT . '/views/layouts/header.php'; ?>

<!-- Hero Section -->
<section class="py-5 py-md-7" style="background: linear-gradient(to right, #fff5f5, #ffffff);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0 order-2 order-lg-1">
                <div class="mb-3">
                    <span class="badge" style="background: #ffebee; color: #e74c3c; padding: 0.5rem 1rem; border-radius: 20px;">Welcome</span>
                </div>
                <h1 class="display-4 fw-bold mb-3" style="color: #2c3e50;">
                    Enjoy Your <br class="d-none d-md-block">
                    <span style="color: #e74c3c;">Delicious Food</span>
                </h1>
                <p class="lead mb-4" style="color: #6c757d;">
                    Experience the best catering services for your special events and celebrations. Fresh ingredients, delicious flavors!
                </p>
                <div class="d-flex flex-wrap gap-2 mb-5">
                    <a href="<?php echo URLROOT; ?>/menu" class="btn btn-primary btn-lg px-4 py-3" style="border-radius: 30px;">
                        Order Now <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                    <a href="<?php echo URLROOT; ?>/about" class="btn btn-outline-secondary btn-lg px-4 py-3" style="border-radius: 30px;">
                        Learn More
                    </a>
                </div>
                <!-- Mini Stats -->
                <div class="row g-3">
                    <div class="col-4">
                        <h3 class="fw-bold" style="color: #e74c3c; font-size: 1.5rem;">500+</h3>
                        <p class="text-muted mb-0 small">Happy Clients</p>
                    </div>
                    <div class="col-4">
                        <h3 class="fw-bold" style="color: #e74c3c; font-size: 1.5rem;">100+</h3>
                        <p class="text-muted mb-0 small">Menu Items</p>
                    </div>
                    <div class="col-4">
                        <h3 class="fw-bold" style="color: #e74c3c; font-size: 1.5rem;">10+</h3>
                        <p class="text-muted mb-0 small">Years Experience</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center order-1 order-lg-2 mb-4 mb-lg-0">
                <div class="position-relative d-inline-block">
                    <div class="d-none d-md-block" style="background: #e74c3c; width: 300px; height: 300px; border-radius: 50%; position: absolute; right: -30px; top: -30px; z-index: 0;"></div>
                    <img src="https://images.unsplash.com/photo-1512058564366-18510be2db19?auto=format&fit=crop&w=600&q=80" alt="Ghanaian Jollof Rice" class="img-fluid position-relative" style="z-index: 1; border-radius: 30px; max-width: 350px; transform: rotate(-3deg);">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Dishes -->
<section class="py-5 py-md-7">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-4 flex-wrap gap-2">
            <div>
                <h2 class="fw-bold" style="color: #2c3e50;">Best Products</h2>
                <p class="text-muted mb-0">Explore our most popular menu items</p>
            </div>
            <a href="<?php echo URLROOT; ?>/menu" class="text-decoration-none" style="color: #e74c3c;">
                View All <i class="fas fa-arrow-right ms-1"></i>
            </a>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4">
            <?php if (isset($data['foods']) && count($data['foods']) > 0): ?>
                <?php foreach ($data['foods'] as $food): ?>
                    <div class="col">
                        <div class="card h-100" style="border: none; border-radius: 20px; background: #fff5f5; overflow: hidden;">
                            <div class="p-3 d-flex justify-content-center" style="background: white;">
                                <img src="<?php echo URLROOT; ?>/<?php echo $food->image ?: 'assets/images/default-food.svg'; ?>" class="img-fluid" alt="<?php echo htmlspecialchars($food->name); ?>" style="height: 180px; width: 100%; object-fit: cover; border-radius: 15px;">
                            </div>
                            <div class="card-body text-center">
                                <h6 class="fw-bold" style="color: #2c3e50;"><?php echo htmlspecialchars($food->name); ?></h6>
                                <p class="text-muted small mb-2"><?php echo htmlspecialchars(substr($food->description, 0, 50)); ?>...</p>
                                <h4 class="fw-bold mb-3" style="color: #e74c3c;">GH₵ <?php echo number_format($food->price, 2); ?></h4>
                                <?php if (Helpers\Session::isLoggedIn('customer')): ?>
                                    <button class="btn btn-primary add-to-cart" data-food-id="<?php echo $food->id; ?>" style="border-radius: 50%; width: 40px; height: 40px; padding: 0;">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center py-5">
                    <p class="text-muted">No foods available yet.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Special Offer Section -->
<section class="py-5" style="background: #e74c3c;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=600&q=80" alt="Ghanaian Cuisine" class="img-fluid" style="border-radius: 20px;">
            </div>
            <div class="col-lg-6 text-white">
                <h2 class="display-4 fw-bold mb-3">Our Stories Have Adventures</h2>
                <p class="lead mb-4">We bring you the best culinary experiences with fresh, locally-sourced ingredients and traditional recipes passed down through generations.</p>
                <div class="d-flex gap-4 mb-4">
                    <div class="text-center">
                        <h3 class="fw-bold">12k+</h3>
                        <p class="mb-0">Happy Customers</p>
                    </div>
                    <div class="text-center">
                        <h3 class="fw-bold">150+</h3>
                        <p class="mb-0">Menu Items</p>
                    </div>
                    <div class="text-center">
                        <h3 class="fw-bold">30+</h3>
                        <p class="mb-0">Chefs</p>
                    </div>
                </div>
                <a href="<?php echo URLROOT; ?>/contact" class="btn btn-light btn-lg" style="border-radius: 30px;">Book Now</a>
            </div>
        </div>
    </div>
</section>

<!-- Most Popular Items -->
<section class="py-5 py-md-7">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color: #2c3e50;">Most Popular Items</h2>
            <p class="text-muted">Our top-selling dishes loved by all</p>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php if (isset($data['foods']) && count($data['foods']) > 0): ?>
                <?php foreach (array_slice($data['foods'], 0, 3) as $food): ?>
                    <div class="col">
                        <div class="card shadow h-100" style="border: none; border-radius: 20px;">
                            <img src="<?php echo URLROOT; ?>/<?php echo $food->image ?: 'assets/images/default-food.svg'; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($food->name); ?>" style="height: 220px; object-fit: cover; border-top-left-radius: 20px; border-top-right-radius: 20px;">
                            <div class="card-body">
                                <h5 class="fw-bold mb-2" style="color: #2c3e50;"><?php echo htmlspecialchars($food->name); ?></h5>
                                <p class="text-muted mb-3 small"><?php echo htmlspecialchars($food->description); ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="h4 fw-bold mb-0" style="color: #e74c3c; font-size: 1.3rem;">GH₵ <?php echo number_format($food->price, 2); ?></span>
                                    <?php if (Helpers\Session::isLoggedIn('customer')): ?>
                                        <button class="btn btn-primary add-to-cart" data-food-id="<?php echo $food->id; ?>" style="border-radius: 50%; width: 45px; height: 45px; padding: 0;">
                                            <i class="fas fa-shopping-cart"></i>
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
