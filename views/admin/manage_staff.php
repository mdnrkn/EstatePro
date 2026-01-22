<?php include 'views/layout/header.php'; ?>
    <div class="container">
        <h2>Manage Staff</h2>

        <div class="card" style="margin-bottom: 20px;">
            <h3>Add New Staff</h3>
            <form action="index.php?action=add_staff" method="POST" style="display: flex; gap: 10px; align-items: center;">
                <div style="flex: 1;">
                    <input type="text" name="name" placeholder="Full Name" required style="margin: 0;">
                </div>
                <div style="flex: 1;">
                    <input type="text" name="phone" placeholder="Phone Number" required style="margin: 0;">
                </div>
                <div style="flex: 1;">
                    <input type="text" name="password" placeholder="Password" required style="margin: 0;">
                </div>
                <button type="submit" class="btn">Add Staff</button>
            </form>
        </div>

        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php if ($staff_list->num_rows > 0): ?>
                <?php while($row = $staff_list->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['staff_id']; ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['phone']); ?></td>
                        <td>
                            <a href="index.php?action=edit_staff&id=<?php echo $row['staff_id']; ?>" class="btn">Edit</a>
                            <a href="index.php?action=delete_staff&id=<?php echo $row['staff_id']; ?>"
                               class="btn-cancel" onclick="return confirm('Delete this staff member?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" style="text-align: center;">No staff members found.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php include 'views/layout/footer.php'; ?>