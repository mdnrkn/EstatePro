<?php include 'views/layout/header.php'; ?>

    <div class="container">
        <div class="card" style="max-width: 600px; margin: 0 auto;">
            <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #eee; padding-bottom: 15px; margin-bottom: 20px;">
                <h2 style="margin: 0;">Edit Profile</h2>
                <a href="index.php?action=dashboard" class="btn" style="background: #95a5a6; color: white;">Back</a>
            </div>

            <form action="index.php?action=update_profile_submit" method="POST" enctype="multipart/form-data">

                <div style="text-align: center; margin-bottom: 20px;">
                    <?php
                    $img_src = !empty($user['profile_pic']) ? 'uploads/' . $user['profile_pic'] : 'https://via.placeholder.com/150';
                    ?>
                    <img src="<?php echo $img_src; ?>" style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 3px solid #3498db;">
                    <br>
                    <label style="cursor: pointer; color: #3498db; font-weight: bold; margin-top: 10px; display: inline-block;">
                        Change Photo
                        <input type="file" name="profile_pic" style="display: none;">
                    </label>
                </div>

                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="password" value="<?php echo htmlspecialchars($user['password']); ?>" required>
                </div>

                <button type="submit" class="btn" style="width: 100%;">Save Changes</button>
            </form>
        </div>
    </div>

<?php include 'views/layout/footer.php'; ?>