<?php include 'layout.php'; ?>
<div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 30px;">
    <div class="card" style="border-left: 5px solid #23a6d5;">
        <i class="fa-solid fa-house fa-2x" style="color: #23a6d5; margin-bottom: 10px;"></i>
        <h3>Active Listings</h3>
        <h1><?php echo $stats['listings']; ?></h1>
    </div>
    <div class="card" style="border-left: 5px solid #2ecc71;">
        <i class="fa-solid fa-wallet fa-2x" style="color: #2ecc71; margin-bottom: 10px;"></i>
        <h3>Total Earnings</h3>
        <h1>$<?php echo $stats['earnings']; ?></h1>
    </div>
    <div class="card" style="border-left: 5px solid #e74c3c;">
        <i class="fa-solid fa-bell fa-2x" style="color: #e74c3c; margin-bottom: 10px;"></i>
        <h3>Pending Requests</h3>
        <h1><?php echo $stats['requests']; ?></h1>
    </div>
</div>

<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px;">
    <div class="card">
        <h3><i class="fa-solid fa-chart-area"></i> Monthly Performance</h3>
        <div style="height: 150px; background: rgba(0,0,0,0.05); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #888;">
            [ Visual Chart Placeholder - Animation Active ]
        </div>
        <p style="margin-top: 15px; font-size: 14px; color: #666;">Your property views have increased by <strong>12%</strong> this week.</p>
    </div>
    <div class="card">
        <h3><i class="fa-solid fa-bolt"></i> Quick Actions</h3>
        <button class="btn btn-primary" style="width:100%; margin-bottom: 10px;">Promote Property</button>
        <button class="btn" style="width:100%; background: #fff; border: 1px solid #ccc;">Download Report</button>
    </div>
</div>
</div></body></html>