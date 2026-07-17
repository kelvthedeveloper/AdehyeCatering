<?php require APPROOT . '/views/layouts/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h2>Book Catering Service</h2>
            </div>
            <div class="card-body">
                <form action="<?php echo URLROOT; ?>/customer/book" method="POST">
                    <div class="mb-3">
                        <label>Event Type</label>
                        <input type="text" name="event_type" class="form-control" required placeholder="e.g. Wedding, Birthday, Corporate Event">
                    </div>
                    <div class="mb-3">
                        <label>Event Date & Time</label>
                        <input type="datetime-local" name="event_date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Number of Guests</label>
                        <input type="number" name="guest_count" class="form-control" required min="1">
                    </div>
                    <div class="mb-3">
                        <label>Venue</label>
                        <input type="text" name="venue" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Special Requests</label>
                        <textarea name="special_requests" class="form-control" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Booking</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
