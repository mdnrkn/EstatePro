<?php include 'layout.php'; ?>

<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #eee; padding-bottom: 15px; margin-bottom: 20px;">
        <h2 style="margin: 0; color: #333;"><i class="fa-solid fa-file-invoice-dollar"></i> Transaction History</h2>
        <button class="btn btn-primary"><i class="fa-solid fa-download"></i> Download PDF</button>
    </div>

    <table width="100%" style="border-collapse: collapse;">
        <thead>
            <tr style="background: #f8f9fa; text-align: left; color: #666;">
                <th style="padding: 12px; border-bottom: 2px solid #ddd;">Date</th>
                <th style="padding: 12px; border-bottom: 2px solid #ddd;">Property Name</th>
                <th style="padding: 12px; border-bottom: 2px solid #ddd;">Client</th>
                <th style="padding: 12px; border-bottom: 2px solid #ddd;">Type</th>
                <th style="padding: 12px; border-bottom: 2px solid #ddd;">Amount</th>
                <th style="padding: 12px; border-bottom: 2px solid #ddd;">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 15px; border-bottom: 1px solid #eee;">Jan 15, 2026</td>
                <td style="padding: 15px; border-bottom: 1px solid #eee;">Luxury Villa</td>
                <td style="padding: 15px; border-bottom: 1px solid #eee;">John Doe</td>
                <td style="padding: 15px; border-bottom: 1px solid #eee;">Rent</td>
                <td style="padding: 15px; border-bottom: 1px solid #eee; font-weight: bold; color: #27ae60;">$1,200</td>
                <td style="padding: 15px; border-bottom: 1px solid #eee;"><span style="background: #d4edda; color: #155724; padding: 5px 10px; border-radius: 20px; font-size: 12px;">Completed</span></td>
            </tr>
            <tr>
                <td colspan="6" style="padding: 20px; text-align: center; color: #888;">No more history found.</td>
            </tr>
        </tbody>
    </table>
</div>

</div> </div> </body>
</html>