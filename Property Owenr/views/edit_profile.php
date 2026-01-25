<?php include 'layout.php'; ?>

<div style="max-width: 600px; margin: 0 auto;">
    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #eee; padding-bottom: 15px; margin-bottom: 20px;">
            <h2 style="margin: 0; color: #333;"><i class="fa-solid fa-user-edit"></i> Edit Profile</h2>
            <a href="index.php?action=dashboard" class="btn" style="background: #6c757d; color: white; font-size: 14px;">
                <i class="fa-solid fa-arrow-left"></i> Back
            </a>
        </div>

        <form action="index.php?action=update_profile_submit" method="POST" enctype="multipart/form-data">
            
            <div style="text-align: center; margin-bottom: 30px;">
                <?php 
                    
                    $display_img = 'https://via.placeholder.com/150'; 
                    
                    
                    if (!empty($user['profile_pic'])) {
                        
                        $server_path = dirname(__DIR__) . '/uploads/' . $user['profile_pic'];
                        
                       
                        if (file_exists($server_path)) {
                          
                            $display_img = 'uploads/' . $user['profile_pic'];
                        }
                    }
                ?>
                
                <img src="<?php echo $display_img; ?>" 
                     style="width: 120px; height: 120px; border-radius: 50%; border: 4px solid #667eea; object-fit: cover; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                <br>
                <label style="cursor: pointer; color: #667eea; font-weight: bold; margin-top: 10px; display: inline-block;">
                    <i class="fa-solid fa-camera"></i> Change Photo
                    <input type="file" name="profile_pic" style="display: none;">
                </label>
            </div>

            <div style="margin-bottom: 20px;">
                <label>Full Name</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
            </div>

            <div style="margin-bottom: 20px;">
                <label>Phone Number</label>
                <input type="text" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" required>
            </div>

            <div style="margin-bottom: 30px;">
                <label>Password</label>
                <input type="password" name="password" value="<?php echo htmlspecialchars($user['password']); ?>" required>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 12px; font-size: 16px;">
                <i class="fa-solid fa-save"></i> Save Changes
            </button>

        </form>
    </div>
</div>

</div>
</div>
</body>
</html>