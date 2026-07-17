<?php require APPROOT . '/views/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Manage Foods</h1>
    <a href="<?php echo URLROOT; ?>/admin/foods/create" class="btn btn-primary">Add Food</a>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Available</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['foods'] as $food): ?>
                <tr>
                    <td><?php echo $food->id; ?></td>
                    <td><img src="<?php echo URLROOT; ?>/<?php echo $food->image ?: 'assets/images/default-food.svg'; ?>" alt="<?php echo htmlspecialchars($food->name); ?>" style="width: 50px; height: 50px; object-fit: cover;"></td>
                    <td><?php echo htmlspecialchars($food->name); ?></td>
                    <td><?php echo htmlspecialchars($food->category_name ?? 'N/A'); ?></td>
                    <td>GH₵ <?php echo number_format($food->price, 2); ?></td>
                    <td><?php echo $food->is_available ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-danger">No</span>'; ?></td>
                    <td>
                        <a href="<?php echo URLROOT; ?>/admin/foods/<?php echo $food->id; ?>/edit" class="btn btn-sm btn-primary me-1">Edit</a>
                        <form action="<?php echo URLROOT; ?>/admin/foods/<?php echo $food->id; ?>/delete" method="POST" class="d-inline">
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
