<?php require APPROOT . '/views/layouts/header.php'; ?>

<h1 class="mb-4">Edit Category</h1>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="<?php echo URLROOT; ?>/admin/categories/<?php echo $data['category']->id; ?>" method="POST">
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($data['category']->name); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="5"><?php echo htmlspecialchars($data['category']->description); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Category</button>
                    <a href="<?php echo URLROOT; ?>/admin/categories" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
