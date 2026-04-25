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

        <a href="index.php?url=dashboard" class="text-gray-600 hover:text-black">
            Dashboard
        </a>

        <a href="index.php?url=products" class="text-gray-600 hover:text-black">
            Products
        </a>

        <a href="index.php?url=orders/create" class="text-gray-600 hover:text-black">
            POS
        </a>

        <a href="index.php?url=orders" class="text-gray-600 hover:text-black">
            Orders
        </a>

        <a href="index.php?url=reports" class="text-gray-600 hover:text-black">
            Reports
        </a>

    </div>



</nav>

<!-- PAGE CONTENT START -->
<div class="p-6">