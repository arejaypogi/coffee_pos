<?php

$current = $_GET['url'] ?? 'dashboard';
?>

<?php
function isActive($route, $current){
    return $route == $current ? 'text-blue-600 font-bold' : 'text-gray-600';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Coffee POS System</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<!-- NAVBAR -->
<nav class="bg-white shadow px-6 py-4 flex justify-between items-center">

    <!-- LEFT: Brand -->
    <div class="text-xl font-bold text-gray-800">
        ☕ Coffee POS
    </div>

    <!-- CENTER: Links -->
    <div class="space-x-4 text-sm">

        <a href="index.php?url=dashboard" 
   class="<?= isActive('dashboard', $current); ?> hover:text-black">
   Dashboard
</a>

<a href="index.php?url=products" 
   class="<?= isActive('products', $current); ?> hover:text-black">
   Products
</a>

<a href="index.php?url=orders/create" 
   class="<?= isActive('orders/create', $current); ?> hover:text-black">
   POS
</a>

<a href="index.php?url=orders" 
   class="<?= isActive('orders', $current); ?> hover:text-black">
   Orders
</a>

<a href="index.php?url=reports" 
   class="<?= isActive('reports', $current); ?> hover:text-black">
   Reports
</a>

    </div>



</nav>

<!-- PAGE CONTENT START -->
<div class="p-6">