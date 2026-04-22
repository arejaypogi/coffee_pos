<?php

require_once '../app/config/database.php';

class Product {

    private $db;

    public function __construct(){
        $database = new Database();
        $this->db = $database->connect();
    }

    public function all(){
        return $this->db->query("SELECT * FROM products ORDER BY id DESC");
    }

    public function create($name, $price, $category, $stock){
        $stmt = $this->db->prepare(
            "INSERT INTO products (name, price, category, stock) VALUES (?, ?, ?, ?)"
        );
        $stmt->bind_param("sdsi", $name, $price, $category, $stock);
        return $stmt->execute();
    }

    public function reduceStock($id, $quantity) {
        $stmt = $this->db->prepare("
        UPDATE products SET stock = stock - ? WHERE id = ?");

        $stmt->bind_param("ii", $qty, $id);
        return $stmt->execute();
    }
}