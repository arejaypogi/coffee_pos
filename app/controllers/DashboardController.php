<?php


require_once '../app/core/Auth.php';
require_once '../app/config/database.php';
require_once '../app/models/Product.php';
require_once '../app/models/Order.php';
require_once '../app/models/OrderItem.php';

class DashboardController {
    
    public function index(){
        $db = new Database();
        $conn = $db->connect();

        // total sales today
        $salesToday = $conn->query("SELECT SUM(total_amount) as total FROM orders WHERE DATE(created_at) = CURDATE()")->fetch_assoc();

        // total orders today
        $ordersToday = $conn->query("SELECT COUNT(*) as total FROM orders WHERE DATE(created_at) = CURDATE()")->fetch_assoc();

        // low stock (below 5)
        $lowStock = $conn->query("SELECT * FROM products WHERE stock <=5");

        require '../app/views/dashboard/index.php';
        }



}

?>