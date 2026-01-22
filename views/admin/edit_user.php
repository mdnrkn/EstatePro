<?php include 'views/layout/header.php'; ?>
    <div class="container">
        <div class="card" style="max-width: 500px; margin: auto;">
            <h2>Edit User</h2>
            <form action="index.php?action=update_user_submit" method="POST">
                <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
                <label>Name</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
                <label>Phone</label>
                <input type="text" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" required>
                <button type="submit" class="btn">Update User</button>
            </form>
        </div>
    </div>
<?php include 'views/layout/footer.php'; ?>