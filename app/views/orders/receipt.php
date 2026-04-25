<h2>Coffee Shop</h2>
<p>Order #: <?= $order['id']; ?></p>
<hr>

<?php $total = 0; ?>

<?php while($item = $items->fetch_assoc()): ?>
    <p>
        <?= $item['name']; ?> x <?= $item['quantity']; ?>
        = P<?= $item['price'] * $item['quantity']; ?>
    </p>
    <?php $total += $item['price'] * $item['quantity']; ?>
<?php endwhile; ?>

<hr>
<h3>Total: P<?= $total; ?></h3>
<button onclick="window.print()">Print</button>

