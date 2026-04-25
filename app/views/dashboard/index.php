<h1>Dashboard</h1>

<h3>Today's Sale: P<?= $salesToday['total'] ?? 0; ?></h3>
<h3>Today's order: <?= $ordersToday['total']; ?></h3>
<hr>

<h2>Low Stock Products</h2>
<tableb border="1">
    <tr>
        <th>Name</th>
        <th>Stock</th>
    </tr>

    <?php while($row = $lowStock->fetch_assoc()): ?>
        <tr>
            <td><?= $row['name']; ?></td>
            <td><?= $row['stock']; ?></td>
        </tr>
    <?php endwhile; ?>
</table>