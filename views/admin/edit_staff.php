<?php include 'views/layout/header.php'; ?>
    <div class="container">
        <div class="card" style="max-width: 500px; margin: 40px auto;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h2 style="margin: 0;">Edit Staff</h2>
                <a href="index.php?action=manage_staff" class="btn-cancel" style="text-decoration: none; color: red; border: 1px solid red;">Cancel</a>
            </div>

            <form action="index.php?action=update_staff_submit" method="POST">
                <input type="hidden" name="staff_id" value="<?php echo $staff['staff_id']; ?>">

                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="name" value="<?php echo htmlspecialchars($staff['name']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="phone" value="<?php echo htmlspecialchars($staff['phone']); ?>" required>
                </div>

                <button type="submit" class="btn" style="width: 100%;">Update Staff</button>
            </form>
        </div>
    </div>
<?php include 'views/layout/footer.php'; ?>