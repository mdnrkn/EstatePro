<?php include 'views/layout/header.php'; ?>
    <div class="container">
        <div class="welcome-section">
            <h1>Owner Dashboard</h1>
            <p>Welcome, <?php echo $_SESSION['name']; ?></p>
        </div>
        <div class="grid-cards">
            <div class="card">
                <h3>My Properties</h3>
                <p>Manage your listings.</p>
                <a href="index.php?action=my_properties" class="btn">View All</a>
            </div>
            <div class="card">
                <h3>Add New</h3>
                <p>List a new property.</p>
                <a href="index.php?action=add_property" class="btn">Add Property</a>
            </div>
            <div class="card">
                <h3>Requests</h3>
                <p>See booking requests.</p>
                <a href="index.php?action=booking_requests" class="btn">View Requests</a>
            </div>
        </div>
    </div>
<?php include 'views/layout/footer.php'; ?>