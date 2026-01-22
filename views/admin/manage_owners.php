<?php include 'views/layout/header.php'; ?>
    <div class="container">
        <h2>Manage Property Owners</h2>
        <table>
            <tr><th>ID</th><th>Name</th><th>Phone</th><th>Actions</th></tr>
            <?php while($row = $owners->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['property_owner_id']; ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['phone']); ?></td>
                    <td>
                        <a href="index.php?action=edit_owner&id=<?php echo $row['property_owner_id']; ?>" class="btn">Edit</a>
                        <a href="index.php?action=delete_owner&id=<?php echo $row['property_owner_id']; ?>" class="btn-cancel" onclick="return confirm('Delete?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
<?php include 'views/layout/footer.php'; ?>