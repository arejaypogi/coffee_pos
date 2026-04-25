<?php 
require_once '../app/views/layouts/header.php';
?>

<h1 style="margin-bottom: 20px;">Products</h1>

<div style="margin-bottom: 20px; display: flex; gap: 10px;">

    <a href="index.php?url=products/create"
       style="padding:10px 15px; background:#4CAF50; color:white; text-decoration:none; border-radius:5px;">
        + Add Product
    </a>

    <a href="index.php?url=orders/create"
       style="padding:10px 15px; background:#2196F3; color:white; text-decoration:none; border-radius:5px;">
        Add to Cart
    </a>

    <a href="index.php?url=orders/index"
       style="padding:10px 15px; background:#FF9800; color:white; text-decoration:none; border-radius:5px;">
        Order Queue
    </a>

</div>

<table border="1" style="width:100%; border-collapse:collapse; text-align:left;">
    <tr style="background:#333; color:white;">
        <th style="padding:10px;">Name</th>
        <th style="padding:10px;">Price</th>
        <th style="padding:10px;">Stock</th>
    </tr>

    <?php while($row = $products->fetch_assoc()): ?>
    <tr>
        <td style="padding:10px;"><?= $row['name']; ?></td>
        <td style="padding:10px;">P<?= $row['price']; ?></td>
        <td style="padding:10px; <?= $row['stock'] <= 5 ? 'color:red;font-weight:bold;' : ''; ?>">
            <?= $row['stock']; ?>
        </td>
    </tr>
    <?php endwhile; ?>

</table>