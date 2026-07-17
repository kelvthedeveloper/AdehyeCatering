<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($data['title']) ? $data['title'] . ' - ' : ''; ?><?php echo SITENAME; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/admin.css">
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar" class="sidebar">
            <div class="sidebar-header">
                <h3><i class="fas fa-utensils"></i> Adehye Admin</h3>
            </div>
            <ul class="list-unstyled components">
                <li class="<?php echo (isset($data['active']) && $data['active'] == 'dashboard') ? 'active' : ''; ?>">
                    <a href="<?php echo URLROOT; ?>/admin/dashboard"><i class="fas fa-home"></i> Dashboard</a>
                </li>
                <li class="<?php echo (isset($data['active']) && $data['active'] == 'foods') ? 'active' : ''; ?>">
                    <a href="<?php echo URLROOT; ?>/admin/foods"><i class="fas fa-hamburger"></i> Foods</a>
                </li>
                <li class="<?php echo (isset($data['active']) && $data['active'] == 'categories') ? 'active' : ''; ?>">
                    <a href="<?php echo URLROOT; ?>/admin/categories"><i class="fas fa-tags"></i> Categories</a>
                </li>
                <li class="<?php echo (isset($data['active']) && $data['active'] == 'orders') ? 'active' : ''; ?>">
                    <a href="<?php echo URLROOT; ?>/admin/orders"><i class="fas fa-shopping-cart"></i> Orders</a>
                </li>
                <li class="<?php echo (isset($data['active']) && $data['active'] == 'bookings') ? 'active' : ''; ?>">
                    <a href="<?php echo URLROOT; ?>/admin/bookings"><i class="fas fa-calendar-alt"></i> Bookings</a>
                </li>
            </ul>
            <ul class="list-unstyled CTAs">
                <li>
                    <a href="<?php echo URLROOT; ?>" class="btn btn-primary btn-block"><i class="fas fa-eye"></i> View Site</a>
                </li>
                <li>
                    <a href="<?php echo URLROOT; ?>/logout" class="btn btn-danger btn-block"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="navbar-brand ms-3">
                        <strong><?php echo isset($data['title']) ? $data['title'] : 'Admin Dashboard'; ?></strong>
                    </div>
                </div>
            </nav>

            <div class="container-fluid mt-4">
                <?php Helpers\flash('success'); ?>
                <?php Helpers\flash('error', '', 'alert alert-danger'); ?>

                <!-- Main content will be rendered here -->
                <?php require APPROOT . '/views/' . $data['view'] . '.php'; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo URLROOT; ?>/assets/js/admin.js"></script>
</body>
</html>
