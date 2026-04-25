<?php require_once '../app/views/layouts/header.php'; ?>

<h1 style="margin-bottom: 20px;">Order Queue</h1>

<table border="1" style="width:100%; border-collapse:collapse;">
    
    <tr style="background:#333; color:#fff;">
        <th style="padding:10px;">ID</th>
        <th style="padding:10px;">Total</th>
        <th style="padding:10px;">Status</th>
        <th style="padding:10px;">Action</th>
    </tr>

    <?php while($row = $orders->fetch_assoc()): ?>
    <tr>
        <td style="padding:10px;"><?= $row['id']; ?></td>

        <td style="padding:10px;">
            P<?= $row['total_amount']; ?>
        </td>

        <td style="padding:10px;">
            <span style="
                padding:5px 10px;
                border-radius:5px;
                color:white;
                background:
                    <?= $row['status'] == 'completed' ? 'green' :
                       ($row['status'] == 'preparing' ? 'orange' : 'gray'); ?>
            ">
                <?= $row['status']; ?>
            </span>
        </td>

        <td style="padding:10px;">
            <a href="index.php?url=orders/updateStatus&id=<?= $row['id']; ?>&status=preparing">
                Preparing
            </a>
            |
            <a href="index.php?url=orders/updateStatus&id=<?= $row['id']; ?>&status=completed">
                Done
            </a>
        </td>
    </tr>
    <?php endwhile; ?>

</table>