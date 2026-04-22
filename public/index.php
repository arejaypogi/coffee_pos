<?php 
session_start();

require_once '../app/controllers/ProductController.php';
require_once '../app/controllers/OrderController.php';

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

case 'orders/store':
    $controller = new OrderController();
    $controller->store();
    break;

var_dump($url);

}

if ($url == 'orders/store') {
    echo "STORE ROUTE HIT";
}
exit;
?>