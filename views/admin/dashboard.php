<?php include 'views/layout/header.php'; ?>

    <div class="container">
        <h2>Admin Dashboard</h2>

        <div class="grid-cards">
            <div class="card" style="border-left: 5px solid #3498db;">
                <h3>Total Users</h3>
                <h1><?php echo $stats['users']; ?></h1>
                <a href="index.php?action=manage_users" class="btn">Manage Users</a>
            </div>

            <div class="card" style="border-left: 5px solid #e67e22;">
                <h3>Property Owners</h3>
                <h1><?php echo $stats['owners']; ?></h1>
                <a href="index.php?action=manage_owners" class="btn">Manage Owners</a>
            </div>

            <div class="card" style="border-left: 5px solid #2ecc71;">
                <h3>Staff Members</h3>
                <h1><?php echo $stats['staff']; ?></h1>
                <a href="index.php?action=manage_staff" class="btn">Manage Staff</a>
            </div>

            <div class="card" style="border-left: 5px solid #9b59b6;">
                <h3>Total Properties</h3>
                <h1><?php echo $stats['properties']; ?></h1>
            </div>
        </div>
    </div>

<?php include 'views/layout/footer.php'; ?>