<?php

require_once "../app/models/Order.php";
require_once "../app/models/OrderItem.php";
require_once "../app/models/Product.php";
require_once "../app/config/database.php";

class ReceiptController {

    public function receipt() {
        $order_id = $_GET['id'];

        $db = new Database();
        $conn = $db->connect();

        $order = $conn->query("SELECT * FROM orders WHERE id = $order_id")->fetch_assoc();
        
        $items = $conn->query("
        SELECT p.name, oi.quantity, oi.price 
        FROM order_items oi
        JOIN products p ON p.id = oi.product_id
        WHERE oi.order_id = $order_id
        ");

        
    require '../app/views/orders/receipt.php';
    }


}

?>