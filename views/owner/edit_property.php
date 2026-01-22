<?php include 'views/layout/header.php'; ?>
    <div class="container">
        <div class="card" style="max-width: 600px; margin: 0 auto;">
            <h2>Edit Property</h2>

            <form action="index.php?action=update_property_submit" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="property_id" value="<?php echo $prop['property_id']; ?>">

                <input type="hidden" name="current_image" value="<?php echo $prop['property_image']; ?>">

                <div class="form-group">
                    <label>Current Image</label><br>
                    <img src="uploads/<?php echo !empty($prop['property_image']) ? $prop['property_image'] : 'default.jpg'; ?>" class="img-preview">
                </div>

                <div class="form-group">
                    <label>Property Name</label>
                    <input type="text" name="property_name" value="<?php echo htmlspecialchars($prop['property_name']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Location</label>
                    <input type="text" name="location" value="<?php echo htmlspecialchars($prop['location']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="property_price" value="<?php echo htmlspecialchars($prop['property_price']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" rows="4" style="width:100%; border:1px solid #ddd; padding:10px;"><?php echo htmlspecialchars($prop['description']); ?></textarea>
                </div>

                <div class="form-group">
                    <label style="color: green; font-weight: bold;">Upload New Image (Optional)</label>
                    <input type="file" name="new_image" accept="image/*">
                </div>

                <button type="submit" class="btn" style="width: 100%;">Update Property</button>
            </form>
        </div>
    </div>
<?php include 'views/layout/footer.php'; ?>