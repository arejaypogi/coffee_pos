<?php

require_once '../app/config/database.php';

class Order {

    private $db;

    public function __construct(){
        $database = new Database();
        $this->db = $database->connect();
    }

    public function create($user_id, $total){

        $stmt = $this->db->prepare(
            "INSERT INTO orders (user_id, total_amount) VALUES (?, ?)"
        );

        $stmt->bind_param("id", $user_id, $total);

        $stmt->execute();

        return $this->db->insert_id;
    }
}