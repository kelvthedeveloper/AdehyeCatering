<?php require APPROOT . '/views/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Admin Dashboard</h1>
    <div>
        <a href="<?php echo URLROOT; ?>/admin/foods" class="btn btn-primary me-2">Manage Foods</a>
        <a href="<?php echo URLROOT; ?>/admin/categories" class="btn btn-primary me-2">Manage Categories</a>
        <a href="<?php echo URLROOT; ?>/admin/orders" class="btn btn-primary me-2">Manage Orders</a>
        <a href="<?php echo URLROOT; ?>/admin/bookings" class="btn btn-primary me-2">Manage Bookings</a>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body text-center">
                <h3><?php echo $data['totalOrders']; ?></h3>
                <p>Total Orders</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body text-center">
                <h3>GH₵ <?php echo number_format($data['totalRevenue'], 2); ?></h3>
                <p>Total Revenue</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body text-center">
                <h3><?php echo $data['totalBookings']; ?></h3>
                <p>Total Bookings</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body text-center">
                <h3><?php echo $data['totalFoods']; ?></h3>
                <p>Total Foods</p>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
