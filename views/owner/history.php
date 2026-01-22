<?php include 'views/layout/header.php'; ?>

    <div class="container">
        <div class="card">
            <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #eee; padding-bottom: 15px; margin-bottom: 20px;">
                <h2 style="margin: 0;">Transaction History</h2>
                <button class="btn" style="background: #2ecc71;">Download PDF</button>
            </div>

            <table width="100%">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Property Name</th>
                    <th>Client</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Jan 15, 2026</td>
                    <td>Luxury Villa</td>
                    <td>John Doe</td>
                    <td>Rent</td>
                    <td style="color: green; font-weight: bold;">$1,200</td>
                    <td><span style="background: #d4edda; color: #155724; padding: 5px 10px; border-radius: 20px; font-size: 12px;">Completed</span></td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align: center; color: #888; padding: 20px;">No more history found.</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

<?php include 'views/layout/footer.php'; ?>