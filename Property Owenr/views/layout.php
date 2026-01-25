<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Real Estate Owner</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
        
        
        body {
            margin: 0; font-family: 'Poppins', sans-serif;
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            display: flex; height: 100vh; overflow: hidden; color: #333;
        }
        @keyframes gradientBG { 0% {background-position: 0% 50%;} 50% {background-position: 100% 50%;} 100% {background-position: 0% 50%;} }

        
        .sidebar {
            width: 260px;
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border-right: 1px solid rgba(255, 255, 255, 0.3);
            display: flex; flex-direction: column; padding: 20px 0;
            box-shadow: 5px 0 15px rgba(0,0,0,0.1);
        }
        .sidebar h2 { text-align: center; color: white; margin-bottom: 30px; text-shadow: 0 2px 4px rgba(0,0,0,0.2); }
        .sidebar a {
            padding: 15px 25px; color: white; text-decoration: none;
            display: flex; align-items: center; gap: 15px;
            transition: 0.3s; font-weight: 500;
        }
        .sidebar a:hover, .sidebar a.active { background: rgba(255,255,255,0.4); border-left: 5px solid white; padding-left: 30px; }
        
        
        .main { flex: 1; display: flex; flex-direction: column; overflow-y: auto; position: relative; }
        
      
        .header {
            background: rgba(255, 255, 255, 0.8);
            padding: 15px 40px; display: flex; justify-content: space-between; align-items: center;
            backdrop-filter: blur(5px); box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
        .profile { display: flex; align-items: center; gap: 15px; cursor: pointer; transition: 0.3s; padding: 5px 15px; border-radius: 50px; }
        .profile:hover { background: rgba(0,0,0,0.05); }
        .profile img { width: 45px; height: 45px; border-radius: 50%; border: 2px solid #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.2); }
        
        
        .container { padding: 40px; animation: slideUp 0.8s ease-out; }
        @keyframes slideUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }

        
        .card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            border-radius: 15px; padding: 25px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.18);
            transition: transform 0.3s;
        }
        .card:hover { transform: translateY(-5px); box-shadow: 0 12px 40px 0 rgba(31, 38, 135, 0.25); }

        
        .btn { padding: 10px 20px; border: none; border-radius: 8px; cursor: pointer; font-weight: 600; transition: 0.3s; }
        .btn-primary { background: linear-gradient(45deg, #23a6d5, #23d5ab); color: white; box-shadow: 0 4px 15px rgba(35, 166, 213, 0.4); }
        .btn-primary:hover { transform: scale(1.05); box-shadow: 0 6px 20px rgba(35, 166, 213, 0.6); }
        
        input, textarea, select {
            width: 100%; padding: 12px; border: 1px solid rgba(0,0,0,0.1);
            border-radius: 8px; background: rgba(255,255,255,0.9); margin-bottom: 10px;
            transition: 0.3s;
        }
        input:focus { border-color: #23a6d5; outline: none; box-shadow: 0 0 10px rgba(35, 166, 213, 0.2); }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2><i class="fa-solid fa-building-user"></i> RE Manager</h2>
        <a href="index.php?action=dashboard" class="<?php echo $_GET['action']=='dashboard'?'active':''; ?>"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
        <a href="index.php?action=add_property" class="<?php echo $_GET['action']=='add_property'?'active':''; ?>"><i class="fa-solid fa-plus-circle"></i> Add Property</a>
        <a href="index.php?action=my_properties" class="<?php echo $_GET['action']=='my_properties'?'active':''; ?>"><i class="fa-solid fa-list"></i> My Properties</a>
        <a href="index.php?action=booking_requests" class="<?php echo $_GET['action']=='booking_requests'?'active':''; ?>"><i class="fa-solid fa-envelope-open-text"></i> Requests</a>
        <a href="index.php?action=history" class="<?php echo $_GET['action']=='history'?'active':''; ?>"><i class="fa-solid fa-history"></i> History</a>
        <a href="#"><i class="fa-solid fa-sign-out-alt"></i> Logout</a>
    </div>

    <div class="main">
        <div class="header">
            <h1 style="margin:0;"><i class="fa-solid fa-user-tie"></i> Owner Panel</h1>
            <div class="profile" onclick="window.location.href='index.php?action=edit_profile'">
                <div style="text-align: right; margin-right: 10px;">
                    <span style="display:block; font-weight:bold;"><?php echo $_SESSION['owner_name']; ?></span>
                    <span style="font-size: 12px; color: #666;">Edit Profile</span>
                </div>
                <img src="https://via.placeholder.com/150" alt="Profile">
            </div>
        </div>
        <div class="container">