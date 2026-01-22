<!DOCTYPE html>
<html>
<head>
    <title>EstatePro</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<header>
    <div class="logo">EstatePro</div>
    <nav>
        <?php if ($_SESSION['role'] == 'user'): ?>
            <a href="index.php?action=dashboard">Dashboard</a>
            <a href="index.php?action=browse">Browse Properties</a>
            <a href="index.php?action=bookings">My Bookings</a>
        <?php elseif ($_SESSION['role'] == 'owner'): ?>
            <a href="index.php?action=dashboard">Dashboard</a>
            <a href="index.php?action=my_properties">My Properties</a>
            <a href="index.php?action=booking_requests">Requests</a>
        <?php elseif ($_SESSION['role'] == 'staff'): ?>
            <a href="index.php?action=dashboard">Dashboard</a>
            <a href="index.php?action=my_tasks">Tasks</a>
        <?php elseif ($_SESSION['role'] == 'admin'): ?>
            <a href="index.php?action=dashboard">Dashboard</a>
            <a href="index.php?action=manage_users">Users</a>
            <a href="index.php?action=manage_owners">Owners</a>
            <a href="index.php?action=manage_staff">Staff</a>
            <a href="index.php?action=profile">Profile</a> ```
        <?php endif; ?>
        <a href="index.php?action=logout" style="color:red;">Logout</a>
    </nav>
</header>