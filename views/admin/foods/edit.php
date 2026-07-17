<?php require APPROOT . '/views/layouts/header.php'; ?>

<h1 class="mb-4">Edit Food</h1>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="<?php echo URLROOT; ?>/admin/foods/<?php echo $data['food']->id; ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($data['food']->name); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="5" required><?php echo htmlspecialchars($data['food']->description); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Price (GH₵)</label>
                        <input type="number" name="price" class="form-control" step="0.01" value="<?php echo $data['food']->price; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Current Image</label>
                        <img src="<?php echo URLROOT; ?>/<?php echo $data['food']->image ?: 'assets/images/default-food.svg'; ?>" alt="Current Image" style="width: 200px; height: 200px; object-fit: cover; display: block; margin-bottom: 10px;">
                    </div>
                    <div class="mb-3">
                        <label>New Image (optional)</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label>Category</label>
                        <select name="category_id" class="form-control">
                            <option value="">Select Category</option>
                            <?php foreach ($data['categories'] as $category): ?>
                                <option value="<?php echo $category->id; ?>" <?php echo $data['food']->category_id == $category->id ? 'selected' : ''; ?>><?php echo htmlspecialchars($category->name); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="is_available" class="form-check-input" id="is_available" <?php echo $data['food']->is_available ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="is_available">Available</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Food</button>
                    <a href="<?php echo URLROOT; ?>/admin/foods" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
