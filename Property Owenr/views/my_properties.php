<?php include 'layout.php'; ?>
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h2><i class="fa-solid fa-list"></i> My Listings</h2>
    <a href="index.php?action=add_property" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add New</a>
</div>

<div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px;">
    <?php foreach($properties as $prop): ?>
    <div class="card">
        <div style="position: relative;">
            <img src="uploads/<?php echo $prop['property_image'] ? $prop['property_image'] : 'default.jpg'; ?>" style="width:100%; height:180px; object-fit:cover; border-radius: 10px;">
            <span style="position: absolute; top: 10px; right: 10px; background: rgba(0,0,0,0.6); color: white; padding: 5px 10px; border-radius: 5px; font-size: 12px;">
                <?php echo $prop['status']; ?>
            </span>
        </div>
        <h3 style="margin: 15px 0 5px;"><?php echo htmlspecialchars($prop['property_name']); ?></h3>
        <p style="color: #23a6d5; font-weight: bold; font-size: 18px;">$<?php echo htmlspecialchars($prop['property_price']); ?></p>
        
        <div style="display: flex; gap: 10px; margin-top: 15px;">
            <a href="index.php?action=edit_property&id=<?php echo $prop['property_id']; ?>" class="btn" style="flex:1; background:#f39c12; color:white; text-align:center; text-decoration:none;">
                <i class="fa-solid fa-pen"></i> Edit
            </a>
            
            <a href="index.php?action=delete_property&id=<?php echo $prop['property_id']; ?>" class="btn" style="flex:1; background:#e74c3c; color:white; text-align:center; text-decoration:none;" onclick="return confirm('Are you sure?')">
                <i class="fa-solid fa-trash"></i>
            </a>
        </div>
    </div>
    <?php endforeach; ?>
</div>
</div></body></html>