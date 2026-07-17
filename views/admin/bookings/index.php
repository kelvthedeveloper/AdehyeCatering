<?php require APPROOT . '/views/layouts/header.php'; ?>

<h1 class="mb-4">Manage Bookings</h1>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Customer</th>
                <th>Event Type</th>
                <th>Event Date</th>
                <th>Guests</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['bookings'] as $booking): ?>
                <tr>
                    <td>#<?php echo $booking->id; ?></td>
                    <td><?php echo htmlspecialchars($booking->user_name); ?></td>
                    <td><?php echo htmlspecialchars($booking->event_type); ?></td>
                    <td><?php echo date('Y-m-d H:i', strtotime($booking->event_date)); ?></td>
                    <td><?php echo $booking->guest_count; ?></td>
                    <td><span class="badge bg-<?php echo $booking->status == 'confirmed' ? 'success' : ($booking->status == 'cancelled' ? 'danger' : 'warning'); ?>"><?php echo ucfirst($booking->status); ?></span></td>
                    <td>
                        <a href="<?php echo URLROOT; ?>/admin/bookings/<?php echo $booking->id; ?>" class="btn btn-sm btn-primary">View</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
