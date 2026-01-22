<?php include 'views/layout/header.php'; ?>
    <div class="container">
        <div class="card" style="max-width: 600px; margin: 0 auto;">
            <h2>Add New Property</h2>

            <form action="index.php?action=store_property" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label>Property Name</label>
                    <input type="text" name="property_name" required>
                </div>

                <div class="form-group">
                    <label>Location</label>
                    <input type="text" name="location" required>
                </div>

                <div class="form-group">
                    <label>Price (BDT)</label>
                    <input type="number" name="property_price" required>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" rows="4" required style="width:100%; padding:10px; border:1px solid #ddd;"></textarea>
                </div>

                <div class="form-group">
                    <label>Property Image</label>
                    <input type="file" name="image" accept="image/*" required>
                </div>

                <button type="submit" class="btn" style="width: 100%;">Submit Listing</button>
            </form>
        </div>
    </div>
<?php include 'views/layout/footer.php'; ?>