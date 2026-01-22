<?php include 'views/layout/header.php'; ?>
    <div class="container">
        <h2>Assigned Tasks</h2>
        <table width="100%">
            <tr>
                <th>Property</th>
                <th>Client</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php while($row = $tasks->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['property_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['requester_name']); ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>
                        <form action="index.php?action=update_task" method="POST">
                            <input type="hidden" name="booking_id" value="<?php echo $row['booking_id']; ?>">
                            <select name="status">
                                <option value="Completed">Completed</option>
                                <option value="In Progress">In Progress</option>
                            </select>
                            <button type="submit" class="btn">Update</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
<?php include 'views/layout/footer.php'; ?>