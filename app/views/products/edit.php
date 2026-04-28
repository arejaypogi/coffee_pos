<?php 
require_once '../app/views/layouts/header.php';
?>

<div class="max-w-xl mx-auto bg-white dark:bg-gray-800 shadow rounded-lg p-6">

    <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">
        Edit Inventory
    </h1>

    <?php if($data): ?>

        <div class="mb-4">
            <p class="text-sm text-gray-500">Product Name</p>
            <p class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                <?= $data['name']; ?>
            </p>
        </div>

        <div class="mb-4">
            <p class="text-sm text-gray-500">Current Stock</p>
            <p class="text-lg font-bold text-blue-600">
                <?= $data['stock']; ?>
            </p>
        </div>

        <form action="index.php?url=products/updateStock" method="POST" class="space-y-4">

            <input type="hidden" name="id" value="<?= $data['id']; ?>">

            <div>
                <label class="block text-sm text-gray-600 dark:text-gray-300 mb-1">
                    New Stock
                </label>

                <input type="number" name="stock" required
                    class="w-full border rounded px-3 py-2 
                           focus:outline-none focus:ring-2 focus:ring-blue-500
                           dark:bg-gray-700 dark:text-white">
            </div>

            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded font-semibold">
                Update Stock
            </button>

        </form>

    <?php else: ?>

        <div class="bg-red-100 text-red-600 p-3 rounded">
            Product not found
        </div>

    <?php endif; ?>

</div>

