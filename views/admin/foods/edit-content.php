
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0" style="border-radius: 24px; overflow: hidden;">
            <div class="card-body p-5">
                <h4 class="fw-bold mb-4" style="color: #2c3e50;"><i class="fas fa-edit me-2" style="color: #e74c3c;"></i> Edit Food</h4>
                <form action="<?php echo URLROOT; ?>/admin/foods/<?php echo $data['food']->id; ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label for="name" class="form-label fw-medium" style="color: #2c3e50;">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo htmlspecialchars($data['food']->name); ?>" required style="border-radius: 12px; padding: 0.75rem 1rem;">
                    </div>
                    <div class="mb-4">
                        <label for="description" class="form-label fw-medium" style="color: #2c3e50;">Description (Optional)</label>
                        <textarea name="description" id="description" class="form-control" rows="4" style="border-radius: 12px; padding: 0.75rem 1rem;"><?php echo htmlspecialchars($data['food']->description); ?></textarea>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="price" class="form-label fw-medium" style="color: #2c3e50;">Price (GH₵)</label>
                            <input type="number" name="price" id="price" class="form-control" step="0.01" value="<?php echo $data['food']->price; ?>" required style="border-radius: 12px; padding: 0.75rem 1rem;">
                        </div>
                        <div class="col-md-6">
                            <label for="category_id" class="form-label fw-medium" style="color: #2c3e50;">Category</label>
                            <select name="category_id" id="category_id" class="form-control" style="border-radius: 12px; padding: 0.75rem 1rem;">
                                <option value="">Select Category</option>
                                <?php foreach ($data['categories'] as $category): ?>
                                    <option value="<?php echo $category->id; ?>" <?php echo $data['food']->category_id == $category->id ? 'selected' : ''; ?>><?php echo htmlspecialchars($category->name); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-medium" style="color: #2c3e50;">Current Image</label>
                        <img src="<?php echo URLROOT; ?>/<?php echo $data['food']->image ?: 'assets/images/default-food.svg'; ?>" alt="Current Image" class="img-fluid rounded-3 shadow" style="max-width: 200px; max-height: 200px; object-fit: cover; display: block; margin-bottom: 1rem;">
                    </div>
                    <div class="mb-4">
                        <label for="image" class="form-label fw-medium" style="color: #2c3e50;">New Image (optional)</label>
                        <input type="file" name="image" id="image" class="form-control" accept="image/*" style="border-radius: 12px; padding: 0.75rem 1rem;">
                    </div>
                    <div class="mb-5 form-check">
                        <input type="checkbox" name="is_available" class="form-check-input" id="is_available" <?php echo $data['food']->is_available ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="is_available">Available</label>
                    </div>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="<?php echo URLROOT; ?>/admin/foods" class="btn btn-outline-secondary rounded-pill px-5 py-3 flex-grow-1"><i class="fas fa-arrow-left me-2"></i> Back</a>
                        <button type="submit" class="btn btn-primary rounded-pill px-5 py-3 flex-grow-1" style="font-size: 1.05rem;"><i class="fas fa-save me-2"></i> Update Food</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
