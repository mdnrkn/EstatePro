<?php include 'views/layout/header.php'; ?>
    <div class="container">
        <div class="card" style="max-width: 500px; margin: auto;">
            <h2>Edit Owner</h2>
            <form action="index.php?action=update_owner_submit" method="POST">
                <input type="hidden" name="owner_id" value="<?php echo $owner['property_owner_id']; ?>">
                <label>Name</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($owner['name']); ?>" required>
                <label>Phone</label>
                <input type="text" name="phone" value="<?php echo htmlspecialchars($owner['phone']); ?>" required>
                <button type="submit" class="btn">Update Owner</button>
            </form>
        </div>
    </div>
<?php include 'views/layout/footer.php'; ?>