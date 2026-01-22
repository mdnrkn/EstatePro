<?php include 'views/layout/header.php'; ?>

    <div class="container">
        <h2>Work History</h2>
        <div class="card">
            <table width="100%">
                <thead>
                <tr>
                    <th>Date Completed</th>
                    <th>Property</th>
                    <th>Client</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php if (!empty($history)): ?>
                    <?php foreach($history as $h): ?>
                        <tr>
                            <td><?php echo date("M d, Y", strtotime($h['visit_date'])); ?></td>
                            <td><?php echo htmlspecialchars($h['property_name']); ?></td>
                            <td><?php echo htmlspecialchars($h['requester_name']); ?></td>
                            <td style="color: green; font-weight: bold;">Completed</td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" style="text-align: center; padding: 20px;">No work history found.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

<?php include 'views/layout/footer.php'; ?>