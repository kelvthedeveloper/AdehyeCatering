<?php require APPROOT . '/views/layouts/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Login</h2>
            </div>
            <div class="card-body">
                <form action="<?php echo URLROOT; ?>/login" method="POST">
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
                <p class="text-center mt-3">
                    Don't have an account? <a href="<?php echo URLROOT; ?>/register">Register here</a>
                </p>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
