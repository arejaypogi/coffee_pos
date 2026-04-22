<?php

require_once '../app/models/Product.php';
require_once '../app/models/Order.php';
require_once '../app/models/OrderItem.php';


class OrderController {
    public function create(){
        $product = new Product();
        $products =  $product->all();

        require '../app/views/orders/pos.php';
    }

    public function store(){

    $raw = file_get_contents("php://input");
    $data = json_decode($raw, true);

    if (!$data) {
        echo "NO DATA RECEIVED";
        exit;
    }

    $cart = $data['cart'] ?? [];
    $total = $data['total'] ?? 0;

    $user_id = $_SESSION['user_id'] ?? 1;

    $order = new Order();
    $order_id = $order->create($user_id, $total);

    $orderItem = new OrderItem();
    $product = new Product();

    foreach($cart as $item){
        $orderItem->create(
            $order_id,
            $item['id'],
            $item['qty'],
            $item['price']
        );

        $product->reduceStock($item['id'], $item['qty']);
    }

    echo "SUCCESS";
}
}


?>