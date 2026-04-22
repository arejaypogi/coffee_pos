<h1>Order Queue</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Total</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

<?php while($row = $orders->fetch_assoc()); ?>
<tr>
    <td><?= $row['id']; ?></td>
    <td><?= $row['total_amount']; ?></td>
    <td><?= $row['status']; ?></td>
    <td>
        <a href="index.php?url=orders/updateStatus&id=<?= $row['id']; ?>&status=preparing">Preparing</a>
        |
        <a href="index.php?url=orders/updateStatus&id=<?= $row['id']; ?>&status=completed">Done</a>
    </td>
</tr>
<?php endwhile; ?>
</table>