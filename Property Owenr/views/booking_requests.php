<?php include 'layout.php'; ?>
<div class="card">
    <h2>Booking Requests</h2>
    <table style="width: 100%; border-collapse: collapse;">
        <tr style="background: #f8f9fa; text-align: left;">
            <th style="padding: 12px;">Property</th>
            <th style="padding: 12px;">Requester</th>
            <th style="padding: 12px;">Date</th>
            <th style="padding: 12px;">Action</th>
        </tr>
        <?php foreach($bookings as $book): ?>
        <tr style="border-bottom: 1px solid #eee;">
            <td style="padding: 12px;"><?php echo htmlspecialchars($book['property_name']); ?></td>
            <td style="padding: 12px;"><?php echo htmlspecialchars($book['requester_name']); ?></td>
            <td style="padding: 12px;"><?php echo htmlspecialchars($book['request_date']); ?></td>
            <td style="padding: 12px;">
                <button class="btn btn-primary" style="padding: 5px 10px; font-size: 12px;">Accept</button>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php if(empty($bookings)) echo "<tr><td colspan='4' style='padding:20px; text-align:center;'>No requests found.</td></tr>"; ?>
    </table>
</div>
</div></body></html>