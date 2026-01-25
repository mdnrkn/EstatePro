<?php include 'layout.php'; ?>
<div style="max-width: 700px; margin: 0 auto;">
    <div class="card">
        <h2>Edit Property</h2>
        <form action="index.php?action=update_property_submit" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="property_id" value="<?php echo $prop['property_id']; ?>">
            
            <label>Current Images</label>
            <div style="display: flex; gap: 10px; overflow-x: auto; padding-bottom: 10px;">
                <img src="uploads/<?php echo $prop['property_image']; ?>" style="height: 60px; border-radius: 5px; border: 2px solid #3498db;">
                <?php foreach($gallery as $img): ?>
                    <img src="uploads/<?php echo $img['image_path']; ?>" style="height: 60px; border-radius: 5px; border: 1px solid #ddd;">
                <?php endforeach; ?>
            </div>

            <label>Title</label> <input type="text" name="property_name" value="<?php echo $prop['property_name']; ?>">
            <label>Price</label> <input type="number" name="property_price" value="<?php echo $prop['property_price']; ?>">
            <label>Description</label> <textarea name="description"><?php echo $prop['description']; ?></textarea>

            <label style="color: #27ae60; font-weight: bold;">+ Add More Photos</label>
            <input type="file" name="new_images[]" multiple accept="image/*">

            <button type="submit" class="btn btn-primary" style="margin-top: 15px;">Update Property</button>
        </form>
    </div>
</div>
</div></body></html>