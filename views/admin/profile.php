<?php include 'views/layout/header.php'; ?>
    <div class="container">
        <div class="card" style="max-width: 500px; margin: auto;">
            <h2>Admin Profile</h2>
            <form action="index.php?action=update_profile_submit" method="POST">
                <label>Name</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($admin['name']); ?>" required>
                <label>Phone</label>
                <input type="text" name="phone" value="<?php echo htmlspecialchars($admin['phone']); ?>" required>
                <label>Password</label>
                <input type="text" name="password" value="<?php echo htmlspecialchars($admin['password']); ?>" required>
                <button type="submit" class="btn">Update Profile</button>
            </form>
        </div>
    </div>
<?php include 'views/layout/footer.php'; ?>