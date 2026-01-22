<?php include 'views/layout/header.php'; ?>
    <div class="container">
        <h2>Booking Requests</h2>
        <table width="100%">
            <tr>
                <th>Property</th>
                <th>Requester</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php foreach($bookings as $book): ?>
                <tr>
                    <td><?php echo htmlspecialchars($book['property_name']); ?></td>
                    <td><?php echo htmlspecialchars($book['requester_name'] ?? 'Unknown'); ?></td>
                    <td><?php echo $book['booking_date']; ?></td>
                    <td>
                        <span style="padding: 5px 10px; background: #eee; border-radius: 5px; font-weight: bold;">
                            <?php echo $book['status']; ?>
                        </span>
                    </td>
                    <td>
                        <?php if($book['status'] == 'Pending'): ?>
                            <div style="display: flex; gap: 10px;">
                                <form action="index.php?action=accept_booking" method="POST">
                                    <input type="hidden" name="booking_id" value="<?php echo $book['booking_id']; ?>">
                                    <button type="submit" class="btn" style="background-color: #27ae60;">Accept</button>
                                </form>

                                <form action="index.php?action=reject_booking" method="POST" onsubmit="return confirm('Reject this request?');">
                                    <input type="hidden" name="booking_id" value="<?php echo $book['booking_id']; ?>">
                                    <button type="submit" class="btn" style="background-color: #e74c3c;">Reject</button>
                                </form>
                            </div>
                        <?php else: ?>
                            <span style="color: grey;">Completed</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
<?php include 'views/layout/footer.php'; ?>