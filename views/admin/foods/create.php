<?php require APPROOT . '/views/layouts/header.php'; ?>

<h1 class="mb-4">Add Food</h1>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="<?php echo URLROOT; ?>/admin/foods" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Price (GH₵)</label>
                        <input type="number" name="price" class="form-control" step="0.01" required>
                    </div>
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label>Category</label>
                        <select name="category_id" class="form-control">
                            <option value="">Select Category</option>
                            <?php foreach ($data['categories'] as $category): ?>
                                <option value="<?php echo $category->id; ?>"><?php echo htmlspecialchars($category->name); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="is_available" class="form-check-input" id="is_available" checked>
                        <label class="form-check-label" for="is_available">Available</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Food</button>
                    <a href="<?php echo URLROOT; ?>/admin/foods" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
