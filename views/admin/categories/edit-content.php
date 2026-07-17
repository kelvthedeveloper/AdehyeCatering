<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow">
            <div class="card-body">
                <form action="<?php echo URLROOT; ?>/admin/categories/<?php echo $data['category']->id; ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo htmlspecialchars($data['category']->name); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="5"><?php echo htmlspecialchars($data['category']->description); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <?php if ($data['category']->image): ?>
                            <div class="mb-2">
                                <img src="<?php echo URLROOT; ?>/<?php echo $data['category']->image; ?>" alt="<?php echo htmlspecialchars($data['category']->name); ?>" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                            </div>
                        <?php endif; ?>
                        <input type="file" name="image" id="image" class="form-control" accept="image/*">
                        <small class="text-muted">Leave blank to keep current image</small>
                    </div>
                    <div class="mb-3">
                        <label for="display_order" class="form-label">Display Order</label>
                        <input type="number" name="display_order" id="display_order" class="form-control" value="<?php echo $data['category']->display_order; ?>" min="0">
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input type="checkbox" name="is_active" id="is_active" class="form-check-input" <?php echo $data['category']->is_active ? 'checked' : ''; ?>>
                            <label for="is_active" class="form-check-label">Active</label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="<?php echo URLROOT; ?>/admin/categories" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
