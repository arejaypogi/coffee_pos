<?php 
require_once '../app/views/layouts/header.php';
?>

<div style="max-width:400px; margin:auto; padding:20px; font-family:Arial; border:1px solid #ddd; border-radius:10px;">

    <h2 style="text-align:center; margin-bottom:5px;">☕ Coffee Shop</h2>
    <p style="text-align:center; margin-top:0;">Official Receipt</p>

    <hr>

    <p><strong>Order #:</strong> <?= $order['id']; ?></p>

    <hr>

    <?php $total = 0; ?>

    <div style="margin-bottom:10px;">
        <?php while($item = $items->fetch_assoc()): ?>
            <div style="display:flex; justify-content:space-between; margin-bottom:5px;">
                <span>
                    <?= $item['name']; ?> x <?= $item['quantity']; ?>
                </span>

                <span>
                    ₱<?= $item['price'] * $item['quantity']; ?>
                </span>
            </div>

            <?php $total += $item['price'] * $item['quantity']; ?>
        <?php endwhile; ?>
    </div>

    <hr>

    <div style="display:flex; justify-content:space-between; font-size:18px; font-weight:bold;">
        <span>Total:</span>
        <span>₱<?= $total; ?></span>
    </div>

    <br>

    <button onclick="window.print()"
            style="
                width:100%;
                padding:10px;
                background:#333;
                color:white;
                border:none;
                border-radius:5px;
                cursor:pointer;
            ">
        Print Receipt
    </button>

</div>