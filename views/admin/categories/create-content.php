<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow">
            <div class="card-body">
                <form action="<?php echo URLROOT; ?>/admin/categories" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" id="image" class="form-control" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="display_order" class="form-label">Display Order</label>
                        <input type="number" name="display_order" id="display_order" class="form-control" value="0" min="0">
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input type="checkbox" name="is_active" id="is_active" class="form-check-input" checked>
                            <label for="is_active" class="form-check-label">Active</label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="<?php echo URLROOT; ?>/admin/categories" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Add Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
