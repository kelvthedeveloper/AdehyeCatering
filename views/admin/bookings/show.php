<?php require APPROOT . '/views/layouts/header.php'; ?>

<h1 class="mb-4">Booking #<?php echo $data['booking']->id; ?></h1>

<div class="card mb-4">
    <div class="card-body">
        <h3>Customer Details</h3>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($data['booking']->user_name); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($data['booking']->email); ?></p>
        <p><strong>Phone:</strong> <?php echo htmlspecialchars($data['booking']->phone); ?></p>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h3>Booking Details</h3>
        <p><strong>Event Type:</strong> <?php echo htmlspecialchars($data['booking']->event_type); ?></p>
        <p><strong>Event Date:</strong> <?php echo date('Y-m-d H:i', strtotime($data['booking']->event_date)); ?></p>
        <p><strong>Number of Guests:</strong> <?php echo $data['booking']->guest_count; ?></p>
        <p><strong>Venue:</strong> <?php echo htmlspecialchars($data['booking']->venue); ?></p>
        <p><strong>Special Requests:</strong> <?php echo htmlspecialchars($data['booking']->special_requests); ?></p>
        <p><strong>Status:</strong> <span class="badge bg-<?php echo $data['booking']->status == 'confirmed' ? 'success' : ($data['booking']->status == 'cancelled' ? 'danger' : 'warning'); ?>"><?php echo ucfirst($data['booking']->status); ?></span></p>
        <form action="<?php echo URLROOT; ?>/admin/bookings/<?php echo $data['booking']->id; ?>/status" method="POST" class="d-inline">
            <select name="status" class="form-control w-auto d-inline me-2">
                <option value="pending" <?php echo $data['booking']->status == 'pending' ? 'selected' : ''; ?>>Pending</option>
                <option value="confirmed" <?php echo $data['booking']->status == 'confirmed' ? 'selected' : ''; ?>>Confirmed</option>
                <option value="completed" <?php echo $data['booking']->status == 'completed' ? 'selected' : ''; ?>>Completed</option>
                <option value="cancelled" <?php echo $data['booking']->status == 'cancelled' ? 'selected' : ''; ?>>Cancelled</option>
            </select>
            <button type="submit" class="btn btn-primary">Update Status</button>
        </form>
    </div>
</div>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
