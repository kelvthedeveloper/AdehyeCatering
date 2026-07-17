    </div>
    <footer class="py-5" style="background: #2c3e50; color: white;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h5 class="mb-3">
                        <i class="fas fa-utensils"></i> Adehye Catering Services
                    </h5>
                    <p class="text-muted">Delicious food for your special events and celebrations. We make your moments unforgettable.</p>
                    <div class="mt-3">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-youtube fa-lg"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 mb-4 mb-lg-0">
                    <h5 class="mb-3">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="<?php echo URLROOT; ?>" class="text-muted text-decoration-none">Home</a></li>
                        <li class="mb-2"><a href="<?php echo URLROOT; ?>/menu" class="text-muted text-decoration-none">Menu</a></li>
                        <li class="mb-2"><a href="<?php echo URLROOT; ?>/about" class="text-muted text-decoration-none">About Us</a></li>
                        <li class="mb-2"><a href="<?php echo URLROOT; ?>/contact" class="text-muted text-decoration-none">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-4 mb-lg-0">
                    <h5 class="mb-3">Contact Info</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2 d-flex align-items-center">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            <span class="text-muted">Iron City, Accra, Ghana</span>
                        </li>
                        <li class="mb-2 d-flex align-items-center">
                            <i class="fas fa-phone me-2"></i>
                            <span class="text-muted"><a href="tel:+233504425002" style="color: #242c33; text-decoration: none; list-style: none;">+233 504 425 002</a></span>
                        </li>
                        <li class="mb-2 d-flex align-items-center">
                            <i class="fas fa-envelope me-2"></i>
                            <span class="text-muted"><a href="mailto:info@adehye.com" style="color: #242c33; text-decoration: none; list-style: none;">info@adehye.com</a></span>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h5 class="mb-3">Subscribe</h5>
                    <p class="text-muted mb-3">Get updates on new menu items and special offers.</p>
                    <form class="input-group">
                        <input type="email" class="form-control" placeholder="Your email">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
            <hr class="mt-5 mb-4" style="border-color: #4a5f73;">
            <div class="text-center">
                <p class="text-muted">&copy; <?php echo date('Y'); ?> Adehye Catering Services. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Search Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content" style="border-radius: 20px;">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="searchModalLabel">
                        <i class="fas fa-search me-2" style="color: #e74c3c;"></i> Search Menu
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo URLROOT; ?>/menu/search" method="GET" id="searchForm">
                        <div class="input-group input-group-lg">
                            <input type="text" name="q" id="searchInput" class="form-control" 
                                   placeholder="Search for jollof, banku, or any menu item..." 
                                   style="border-top-left-radius: 50px; border-bottom-left-radius: 50px; padding-left: 25px;">
                            <button type="submit" class="btn btn-primary" 
                                    style="border-top-right-radius: 50px; border-bottom-right-radius: 50px; padding: 0 30px;">
                                Search
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Focus search input when modal opens
        const searchModal = document.getElementById('searchModal');
        if (searchModal) {
            searchModal.addEventListener('shown.bs.modal', function () {
                const searchInput = document.getElementById('searchInput');
                if (searchInput) {
                    searchInput.focus();
                }
            });
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo URLROOT; ?>/assets/js/main.js"></script>
</body>
</html>
