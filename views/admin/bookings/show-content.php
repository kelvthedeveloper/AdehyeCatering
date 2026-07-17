
<h2>Booking #<?php echo $data['booking']->id; ?></h2>

<div class="row mb-4">
    <div class="col-lg-6">
        <div class="card shadow">
            <div class="card-body">
                <h3>Customer Details</h3>
                <p><strong>Name:</strong> <?php echo htmlspecialchars($data['booking']->user_name); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($data['booking']->email); ?></p>
                <p><strong>Phone:</strong> <?php echo htmlspecialchars($data['booking']->phone); ?></p>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card shadow">
            <div class="card-body">
                <h3>Booking Details</h3>
                <p><strong>Event Type:</strong> <?php echo htmlspecialchars($data['booking']->event_type); ?></p>
                <p><strong>Event Date:</strong> <?php echo date('Y-m-d H:i', strtotime($data['booking']->event_date)); ?></p>
                <p><strong>Number of Guests:</strong> <?php echo $data['booking']->guest_count; ?></p>
                <p><strong>Venue:</strong> <?php echo htmlspecialchars($data['booking']->venue); ?></p>
                <p><strong>Special Requests:</strong> <?php echo htmlspecialchars($data['booking']->special_requests); ?></p>
                <p><strong>Status:</strong> <span class="badge bg-<?php echo $data['booking']->status == 'confirmed' ? 'success' : ($data['booking']->status == 'cancelled' ? 'danger' : 'warning'); ?>"><?php echo ucfirst($data['booking']->status); ?></span></p>
                <form action="<?php echo URLROOT; ?>/admin/bookings/<?php echo $data['booking']->id; ?>/status" method="POST" class="d-inline">
                    <div class="input-group">
                        <select name="status" class="form-control">
                            <option value="pending" <?php echo $data['booking']->status == 'pending' ? 'selected' : ''; ?>>Pending</option>
                            <option value="confirmed" <?php echo $data['booking']->status == 'confirmed' ? 'selected' : ''; ?>>Confirmed</option>
                            <option value="completed" <?php echo $data['booking']->status == 'completed' ? 'selected' : ''; ?>>Completed</option>
                            <option value="cancelled" <?php echo $data['booking']->status == 'cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Update Status</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="mt-4">
    <a href="<?php echo URLROOT; ?>/admin/bookings" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back to Bookings</a>
</div>
