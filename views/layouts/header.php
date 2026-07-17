<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($data['title']) ? $data['title'] . ' - ' : ''; ?><?php echo SITENAME; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?php echo URLROOT; ?>" style="color: #e74c3c;">
                <i class="fas fa-utensils me-2"></i> Adehye Catering
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-3 mb-lg-0">
                    <!--<li class="nav-item me-3">
                        <a class="nav-link fw-medium" href="<?php echo URLROOT; ?>" style="color: #2c3e50;">Home</a>
                    </li>-->
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="<?php echo URLROOT; ?>/menu" style="color: #2c3e50;">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="<?php echo URLROOT; ?>/about" style="color: #2c3e50;">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="<?php echo URLROOT; ?>/contact" style="color: #2c3e50;">Contact</a>
                    </li>
                </ul>
                <div class="d-flex flex-column flex-lg-row align-items-stretch align-items-lg-center gap-2">
                    <!-- Search Icon (opens modal) -->
                    <button type="button" class="btn btn-link text-decoration-none p-2 align-self-center" data-bs-toggle="modal" data-bs-target="#searchModal">
                        <i class="fas fa-search fs-5" style="color: #6c757d;"></i>
                    </button>
                    <?php if (Helpers\Session::isLoggedIn('customer')): ?>
                    <a class="btn btn-outline-secondary rounded-pill px-3 py-2 position-relative align-self-stretch" href="<?php echo URLROOT; ?>/customer/cart">
                        <i class="fas fa-shopping-cart me-1"></i> Cart
                        <?php 
                        // Get cart count
                        $cartCount = 0;
                        if (class_exists('Models\Cart')) {
                            try {
                                $cartModel = new Models\Cart();
                                $cart = $cartModel->getCartByUserId(Helpers\Session::get('user_id'));
                                if ($cart) {
                                    $cartItems = $cartModel->getCartItems($cart->id);
                                    foreach ($cartItems as $item) {
                                        $cartCount += $item->quantity;
                                    }
                                }
                            } catch (\Exception $e) {
                                // Do nothing
                            }
                        }
                        if ($cartCount > 0): 
                        ?>
                        <span id="cart-count-badge" class="position-absolute top-0 start-100 translate-middle badge rounded-pill" style="background: #e74c3c; font-size: 0.7rem;">
                            <?php echo $cartCount; ?>
                        </span>
                        <?php endif; ?>
                    </a>
                    <a class="btn btn-primary rounded-pill px-3 py-2" href="<?php echo URLROOT; ?>/customer/dashboard">
                        My Account
                    </a>
                    <?php endif; ?>
                    <?php if (Helpers\Session::isLoggedIn('admin')): ?>
                    <a class="btn btn-primary rounded-pill px-3 py-2" href="<?php echo URLROOT; ?>/admin/dashboard">
                        Admin Dashboard
                    </a>
                    <?php endif; ?>
                    <?php if (Helpers\Session::isLoggedIn()): ?>
                    <a class="btn btn-outline-danger rounded-pill px-3 py-2" href="<?php echo URLROOT; ?>/logout">
                        <i class="fas fa-sign-out-alt me-1"></i> Logout
                    </a>
                    <?php else: ?>
                    <a class="btn btn-outline-primary rounded-pill px-3 py-2" href="<?php echo URLROOT; ?>/login">
                        Login
                    </a>
                    <a class="btn btn-primary rounded-pill px-3 py-2" href="<?php echo URLROOT; ?>/register">
                        Sign Up
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
    <?php if (isset($data['full_width']) && $data['full_width']): ?>
    <div class="container-fluid p-0">
    <?php else: ?>
    <div class="container mt-4">
    <?php endif; ?>
        <?php Helpers\flash('success'); ?>
        <?php Helpers\flash('error', '', 'alert alert-danger'); ?>
