<?php
require_once '../app/config/database.php';

class OrderItem {

    private $db;

    public function __construct(){
        $database = new Database();
        $this->db = $database->connect();
    }

    public function create($order_id, $product_id, $qty, $price){
        $stmt = $this->db->prepare("INSERT INTO order_items (order_id, product_id, qty, price) VALUES (?, ?, ?, ?)"
    );
        $stmt->bind_param("iiid", $order_id, $product_id, $qty, $price);
        return $stmt->execute();
        }
}
?>