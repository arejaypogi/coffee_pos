<?php 
require_once '../app/views/layouts/header.php';
?>
<h1 style="margin-bottom: 20px;">Dashboard</h1>

<div style="display: flex; gap: 20px; margin-bottom: 30px;">

    <div style="flex:1; background:#f5f5f5; padding:20px; border-radius:10px;">
        <h3>Today's Sales</h3>
        <p style="font-size:24px; font-weight:bold;">
            P<?= $salesToday['total'] ?? 0; ?>
        </p>
    </div>

    <div style="flex:1; background:#f5f5f5; padding:20px; border-radius:10px;">
        <h3>Today's Orders</h3>
        <p style="font-size:24px; font-weight:bold;">
            <?= $ordersToday['total'] ?? 0; ?>
        </p>
    </div>

</div>

<h2>Low Stock Products</h2>

<table border="1" style="width:100%; border-collapse:collapse; text-align:left;">
    <tr style="background:#333; color:white;">
        <th style="padding:10px;">Name</th>
        <th style="padding:10px;">Stock</th>
    </tr>

    <?php while($row = $lowStock->fetch_assoc()): ?>
        <tr>
            <td style="padding:10px;"><?= $row['name']; ?></td>
            <td style="padding:10px; color:red; font-weight:bold;">
                <?= $row['stock']; ?>
            </td>
        </tr>
    <?php endwhile; ?>

</table>