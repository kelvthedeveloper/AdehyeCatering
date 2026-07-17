<?php require APPROOT . '/views/layouts/header.php'; ?>

<style>
    /* Hero Section Animations */
    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }
    .hero-title { animation: fadeInDown 0.8s ease-out forwards; }
    .hero-subtitle { animation: fadeInDown 0.8s ease-out 0.2s forwards; opacity: 0; }

    /* Food Card Animations */
    .food-card {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        transform: translateY(0);
    }
    .food-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(231, 76, 60, 0.15);
    }
    .food-card img { transition: transform 0.5s ease; }
    .food-card:hover img { transform: scale(1.05); }
    .food-card .add-to-cart {
        transition: all 0.3s ease;
        transform: scale(1);
    }
    .food-card:hover .add-to-cart {
        transform: scale(1.05);
        box-shadow: 0 8px 20px rgba(231, 76, 60, 0.3);
    }
    @keyframes slideInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .food-card { animation: slideInUp 0.5s ease-out forwards; }
    .food-card:nth-child(1) { animation-delay: 0.1s; }
    .food-card:nth-child(2) { animation-delay: 0.2s; }
    .food-card:nth-child(3) { animation-delay: 0.3s; }
    .food-card:nth-child(4) { animation-delay: 0.4s; }
    .food-card:nth-child(5) { animation-delay: 0.5s; }
    .food-card:nth-child(6) { animation-delay: 0.6s; }

    /* Sidebar Styling */
    .sidebar-card {
        transition: all 0.3s ease;
    }
    .category-item {
        transition: all 0.3s ease;
        border: 1px solid transparent;
    }
    .category-item:hover {
        background: linear-gradient(135deg, #fff5f5, #ffebee);
        border-color: #e74c3c;
        transform: translateX(5px);
    }
    .category-item.active {
        background: linear-gradient(135deg, #e74c3c, #c0392b);
    }

    /* Search Bar Animations */
    .search-input {
        transition: all 0.3s ease;
    }
    .search-input:focus {
        border-color: #e74c3c;
        box-shadow: 0 0 0 0.2rem rgba(231, 76, 60, 0.25);
    }
    .search-btn {
        transition: all 0.3s ease;
    }
    .search-btn:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(231, 76, 60, 0.3);
    }
    .clear-search {
        transition: all 0.3s ease;
    }
    .clear-search:hover {
        color: #c0392b;
        transform: scale(1.1);
    }
</style>

<!-- Hero Section -->
<section class="py-7 position-relative overflow-hidden" style="background: linear-gradient(135deg, #fff5f5 0%, #ffffff 50%, #fff5f5 100%);">
    <div class="container position-relative" style="z-index: 2;">
        <div class="text-center">
            <span class="badge px-4 py-2 mb-3" style="background: #ffebee; color: #e74c3c; border-radius: 30px; font-size: 0.9rem;">
                <i class="fas fa-fire me-2"></i> Fresh & Delicious
            </span>
            <h1 class="hero-title display-4 fw-bold mb-3" style="color: #2c3e50;">
                <?php echo isset($data['category']) ? htmlspecialchars($data['category']->name) : (isset($data['query']) ? 'Search Results: "' . htmlspecialchars($data['query']) . '"' : 'Our Delicious Menu'); ?>
            </h1>
            <p class="hero-subtitle lead text-muted mb-0" style="max-width: 600px; margin: 0 auto;">
                Explore our mouth-watering dishes made with fresh, local Ghanaian ingredients
            </p>
        </div>
    </div>
    <!-- Decorative Elements -->
    <div class="position-absolute top-0 end-0" style="z-index: 1;">
        <div class="rounded-circle" style="width: 200px; height: 200px; background: rgba(231, 76, 60, 0.05); margin-top: -50px; margin-right: -50px;"></div>
    </div>
    <div class="position-absolute bottom-0 start-0" style="z-index: 1;">
        <div class="rounded-circle" style="width: 150px; height: 150px; background: rgba(231, 76, 60, 0.05); margin-bottom: -30px; margin-left: -30px;"></div>
    </div>
</section>

<!-- Menu Section -->
<section class="py-6">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3 mb-5 mb-lg-0">
                <!-- Search -->
                <div class="card sidebar-card shadow border-0 mb-4" style="border-radius: 24px;">
                    <div class="card-header bg-white border-0 pb-0 pt-4 px-4">
                        <h6 class="fw-bold mb-0" style="color: #2c3e50;">
                            <i class="fas fa-search text-primary me-2"></i> Search Menu
                        </h6>
                    </div>
                    <div class="card-body pt-3 px-4 pb-4">
                        <form action="<?php echo URLROOT; ?>/menu/search" method="GET" class="mb-0">
                            <div class="input-group">
                                <input type="text" name="q" id="searchInput" class="search-input form-control" placeholder="Search for jollof, banku..." value="<?php echo isset($data['query']) ? htmlspecialchars($data['query']) : ''; ?>" style="border-top-left-radius: 50px; border-bottom-left-radius: 50px; border: 2px solid #ffebee; padding: 0.75rem 1.25rem;">
                                <?php if (isset($data['query']) && $data['query'] != ''): ?>
                                    <a href="<?php echo URLROOT; ?>/menu" class="clear-search btn btn-outline-secondary d-flex align-items-center justify-content-center" style="border-radius: 0; padding: 0.75rem; border-color: #ffebee; border-left: none;">
                                        <i class="fas fa-times"></i>
                                    </a>
                                <?php endif; ?>
                                <button class="search-btn btn btn-primary" type="submit" style="border-top-right-radius: 50px; border-bottom-right-radius: 50px; padding: 0.75rem 1.5rem;">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Categories -->
                <div class="card sidebar-card shadow border-0" style="border-radius: 24px;">
                    <div class="card-header bg-white border-0 pb-0 pt-4 px-4">
                        <h6 class="fw-bold mb-0" style="color: #2c3e50;">
                            <i class="fas fa-list text-primary me-2"></i> Categories
                        </h6>
                    </div>
                    <div class="card-body pt-3 px-4 pb-4">
                        <div class="list-group list-group-flush">
                            <a href="<?php echo URLROOT; ?>/menu" class="category-item list-group-item list-group-item-action d-flex align-items-center mb-2 px-3 py-3 rounded-3 <?php echo !isset($data['category']) ? 'active bg-primary border-primary text-white' : 'border-light'; ?>">
                                <i class="fas fa-utensils me-3" style="font-size: 1.2rem;"></i>
                                <span class="fw-medium">All Foods</span>
                            </a>
                            <?php foreach ($data['categories'] as $category): ?>
                            <a href="<?php echo URLROOT; ?>/menu/category/<?php echo $category->id; ?>" class="category-item list-group-item list-group-item-action d-flex align-items-center mb-2 px-3 py-3 rounded-3 <?php echo isset($data['category']) && $data['category']->id == $category->id ? 'active bg-primary border-primary text-white' : 'border-light'; ?>">
                                <i class="fas fa-tag me-3" style="font-size: 1.2rem;"></i>
                                <span class="fw-medium"><?php echo htmlspecialchars($category->name); ?></span>
                            </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Food Grid -->
            <div class="col-lg-9">
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
                    <?php if (count($data['foods']) > 0): ?>
                        <?php foreach ($data['foods'] as $food): ?>
                        <div class="col">
                            <div class="food-card card h-100 border-0 shadow" style="border-radius: 24px; overflow: hidden;">
                                <!-- Food Image -->
                                <div class="p-3 d-flex justify-content-center" style="background: linear-gradient(135deg, #fff5f5 0%, #ffffff 100%);">
                                    <img src="<?php echo URLROOT; ?>/<?php echo $food->image ?: 'assets/images/default-food.svg'; ?>" class="img-fluid" alt="<?php echo htmlspecialchars($food->name); ?>" style="height: 200px; width: 100%; object-fit: cover; border-radius: 20px;">
                                </div>
                                <!-- Card Body -->
                                <div class="card-body text-center p-4">
                                    <?php if ($food->category_name): ?>
                                        <span class="badge mb-3 px-3 py-1" style="background: #ffebee; color: #e74c3c; border-radius: 30px; font-size: 0.85rem;">
                                            <i class="fas fa-tag me-1"></i> <?php echo htmlspecialchars($food->category_name); ?>
                                        </span>
                                    <?php endif; ?>
                                    <h6 class="fw-bold mb-2" style="color: #2c3e50; font-size: 1.1rem;"><?php echo htmlspecialchars($food->name); ?></h6>
                                    <p class="text-muted small mb-4" style="min-height: 48px; line-height: 1.6;"><?php echo htmlspecialchars(substr($food->description, 0, 80)); ?>...</p>
                                    <!-- Price and Button -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="text-start">
                                            <span class="text-muted small d-block mb-1">Price</span>
                                            <h4 class="fw-bold mb-0" style="color: #e74c3c; font-size: 1.5rem;">GH₵ <?php echo number_format($food->price, 2); ?></h4>
                                        </div>
                                        <?php if (Helpers\Session::isLoggedIn('customer')): ?>
                                            <button class="add-to-cart btn btn-primary rounded-pill" data-food-id="<?php echo $food->id; ?>" style="padding: 0.75rem 1.5rem;">
                                                <i class="fas fa-cart-plus me-1"></i> Add to Cart
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                    <div class="col-12 text-center py-8">
                        <i class="fas fa-utensils text-muted" style="font-size: 5rem; margin-bottom: 1rem;"></i>
                        <h5 class="text-muted fw-bold mb-2">No foods found</h5>
                        <p class="text-muted mb-4">Try adjusting your search or category</p>
                        <a href="<?php echo URLROOT; ?>/menu" class="btn btn-primary rounded-pill px-5">
                            <i class="fas fa-home me-2"></i> View All Foods
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Auto-focus search input on page load
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        if (searchInput) {
            searchInput.focus();
            // Optional: Place cursor at end of text if there's a query
            searchInput.setSelectionRange(searchInput.value.length, searchInput.value.length);
        }

        // Add to Cart functionality
        const addToCartButtons = document.querySelectorAll('.add-to-cart');
        addToCartButtons.forEach(button => {
            button.addEventListener('click', function() {
                const foodId = this.dataset.foodId;
                const originalHTML = this.innerHTML;
                
                // Show loading state
                this.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Adding...';
                this.disabled = true;

                // Send AJAX request
                fetch('<?php echo URLROOT; ?>/cart/add', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'food_id=' + foodId
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        this.innerHTML = '<i class="fas fa-check me-1"></i> Added!';
                        this.style.background = '#28a745';
                        this.style.borderColor = '#28a745';
                        
                        // Reset after 2 seconds
                        setTimeout(() => {
                            this.innerHTML = originalHTML;
                            this.style.background = '';
                            this.style.borderColor = '';
                            this.disabled = false;
                        }, 2000);
                    } else {
                        alert(data.message || 'Failed to add item to cart');
                        this.innerHTML = originalHTML;
                        this.disabled = false;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Something went wrong. Please try again.');
                    this.innerHTML = originalHTML;
                    this.disabled = false;
                });
            });
        });
    });
</script>
<?php require APPROOT . '/views/layouts/footer.php'; ?>
