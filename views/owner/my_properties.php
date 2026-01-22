<?php include 'views/layout/header.php'; ?>
    <div class="container">
        <h2>My Properties</h2>
        <div class="property-list">
            <?php foreach($properties as $prop): ?>
                <div class="card">
                    <h3><?php echo htmlspecialchars($prop['property_name']); ?></h3>
                    <p>$<?php echo number_format($prop['property_price']); ?></p>
                    <p>Status: <?php echo $prop['status']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php include 'views/layout/footer.php'; ?>