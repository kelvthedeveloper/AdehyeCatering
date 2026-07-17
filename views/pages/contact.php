<?php require APPROOT . '/views/layouts/header.php'; ?>

<!-- Hero Section -->
<section class="py-5" style="background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%); color: white;">
    <div class="container text-center">
        <h1 class="display-4">Contact Us</h1>
        <p class="lead">We'd love to hear from you!</p>
    </div>
</section>

<!-- Contact Section -->
<section class="py-5 py-md-7">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6 order-2 order-lg-1">
                <div class="card shadow h-100">
                    <div class="card-body p-4">
                        <h3 class="mb-4">Send Us a Message</h3>
                        <form action="<?php echo URLROOT; ?>/contact" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" name="subject" id="subject" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg w-100">
                                <i class="fas fa-paper-plane"></i> Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2">
                <div class="card shadow h-100">
                    <div class="card-body p-4">
                        <h3 class="mb-4">Get in Touch</h3>
                        <div class="mb-4">
                            <div class="d-flex mb-3">
                                <i class="fas fa-map-marker-alt text-primary me-3 mt-1" style="font-size: 1.5rem;"></i>
                                <div>
                                    <h6 class="mb-1">Address</h6>
                                    <p class="text-muted mb-0">Iron City, Accra, Ghana</p>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <i class="fas fa-phone text-primary me-3 mt-1" style="font-size: 1.5rem;"></i>
                                <div>
                                    <h6 class="mb-1">Phone</h6>
                                    <p class="text-muted mb-0"><a href="tel:+233504425002" style="color: #595c5f; text-decoration: none; list-style: none;">+233 504 425 002</a></p>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <i class="fas fa-envelope text-primary me-3 mt-1" style="font-size: 1.5rem;"></i>
                                <div>
                                    <h6 class="mb-1">Email</h6>
                                    <p class="text-muted mb-0"><a href="mailto:info@adehye.com" style="color: #595c5f; text-decoration: none; list-style: none;">info@adehye.com</a></p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h4 class="mb-3">Business Hours</h4>
                        <p class="text-muted mb-0"><strong>Mon - Fri:</strong> 8:00 AM - 9:00 PM</p>
                        <p class="text-muted mb-0"><strong>Saturday:</strong> 9:00 AM - 9:00 PM</p>
                        <p class="text-muted"><strong>Sunday:</strong>  4:00 AM - 9:00 PM</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-5 py-md-7" style="background: #fff5f5;">
    <div class="container">
        <div class="text-center mb-4 mb-md-5">
            <h2 class="fw-bold" style="color: #2c3e50;">Find Us</h2>
            <p class="text-muted">Come visit us at our location in Accra, Ghana</p>
        </div>
        <div class="card shadow">
            <div class="card-body p-0">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63500.93452556689!2d-0.24281125!3d5.60373565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdf9084b2b797c5%3A0x2d1584c0246548e4!2sAccra%2C%20Ghana!5e0!3m2!1sen!2sus!4v1720923000000!5m2!1sen!2sus" 
                    width="100%" 
                    height="350" 
                    style="border:0; border-radius: 20px;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
