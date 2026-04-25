<?php require_once '../app/views/layouts/header.php'; ?>

<h1 style="margin-bottom: 20px;">Add Product</h1>

<form action="index.php?url=product/store" method="POST"
      style="max-width:400px; padding:20px; border:1px solid #ddd; border-radius:10px;">

    <label>Name</label><br>
    <input type="text" name="name" required
           style="width:100%; padding:8px; margin-bottom:10px;"><br>

    <label>Price</label><br>
    <input type="number" name="price" step="0.01" required
           style="width:100%; padding:8px; margin-bottom:10px;"><br>

    <label>Category</label><br>
    <input type="text" name="category" required
           style="width:100%; padding:8px; margin-bottom:10px;"><br>

    <label>Stock</label><br>
    <input type="number" name="stock" required
           style="width:100%; padding:8px; margin-bottom:15px;"><br>

    <button type="submit"
            style="width:100%; padding:10px; background:#4CAF50; color:white; border:none; border-radius:5px;">
        Save Product
    </button>

</form>