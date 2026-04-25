<?php 
session_start();

require_once '../app/controllers/ProductController.php';
require_once '../app/controllers/OrderController.php';
require_once '../app/controllers/ReceiptController.php';
require_once '../app/controllers/DashboardController.php';
require_once '../app/config/database.php';

$url = $_GET['url'] ?? '';

switch($url){
case 'products':
    $controller = new ProductController();
    $controller->index();
break;

case 'products/create':
    $controller = new ProductController();
    $controller->create();
break;

case 'product/store':
    $controller = new ProductController();
    $controller->store();
break;

case 'orders/create':
    $controller = new OrderController();
    $controller->create();
    break;

case 'orders/receipt':
    $controller = new ReceiptController();
    $controller->receipt();
    break;

case 'orders/store':
    $controller = new OrderController();
    $controller->store();
    break;

case 'orders/index':
    $controller = new ReceiptController();
    $controller->order_queue();
    break;

case 'orders/updateStatus':
    $controller = new OrderController();
    $controller->updateStatus();
    break;

case 'orders':
    $controller = new ReceiptController();
    $controller->order_queue();
    break;

case 'dashboard':
    $controller = new DashboardController();
    $controller->index();
    break;

var_dump($url);

}


?>