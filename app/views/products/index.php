<h1>Products</h1>

<a href="index.php?url=products/create">Add Product</a> <br>
<a href="index.php?url=orders/create"> Add to Cart</a>
<a href="index.php?url=orders/index"> Order Queue</a>

<table border="1">
<tr>
    <th>Name</th>
    <th>Price</th>
    <th>Stock</th>
</tr>

<?php while($row = $products->fetch_assoc()): ?>
<tr>
    <td><?= $row['name']; ?></td>
    <td><?= $row['price']; ?></td>
    <td><?= $row['stock']; ?></td>
</tr>
<?php endwhile; ?>

</table>