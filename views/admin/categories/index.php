<?php require APPROOT . '/views/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Manage Categories</h1>
    <a href="<?php echo URLROOT; ?>/admin/categories/create" class="btn btn-primary">Add Category</a>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['categories'] as $category): ?>
                <tr>
                    <td><?php echo $category->id; ?></td>
                    <td><?php echo htmlspecialchars($category->name); ?></td>
                    <td><?php echo htmlspecialchars($category->description); ?></td>
                    <td>
                        <a href="<?php echo URLROOT; ?>/admin/categories/<?php echo $category->id; ?>/edit" class="btn btn-sm btn-primary me-1">Edit</a>
                        <form action="<?php echo URLROOT; ?>/admin/categories/<?php echo $category->id; ?>/delete" method="POST" class="d-inline">
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
