<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Manage Categories</h2>
    <a href="<?php echo URLROOT; ?>/admin/categories/create" class="btn btn-primary"><i class="fas fa-plus"></i> Add Category</a>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Display Order</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['categories'] as $category): ?>
                <tr>
                    <td><?php echo $category->id; ?></td>
                    <td>
                        <?php if ($category->image): ?>
                            <img src="<?php echo URLROOT; ?>/<?php echo $category->image; ?>" alt="<?php echo htmlspecialchars($category->name); ?>" class="img-thumbnail" style="max-width: 60px; max-height: 60px;">
                        <?php else: ?>
                            <span class="text-muted">No image</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo htmlspecialchars($category->name); ?></td>
                    <td><?php echo htmlspecialchars($category->description); ?></td>
                    <td><?php echo $category->display_order; ?></td>
                    <td>
                        <?php if ($category->is_active): ?>
                            <span class="badge bg-success">Yes</span>
                        <?php else: ?>
                            <span class="badge bg-secondary">No</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo URLROOT; ?>/admin/categories/<?php echo $category->id; ?>/edit" class="btn btn-sm btn-primary me-1"><i class="fas fa-edit"></i> Edit</a>
                        <form action="<?php echo URLROOT; ?>/admin/categories/<?php echo $category->id; ?>/delete" method="POST" class="d-inline">
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
