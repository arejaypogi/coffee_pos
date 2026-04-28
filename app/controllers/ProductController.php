<?php

require_once '../app/models/Product.php';
require_once '../app/models/Order.php';
require_once '../app/models/OrderItem.php';

class ProductController {

    public function index(){
        $product = new Product();
        $products = $product->all();

        require '../app/views/products/index.php';
    }

    public function create(){
        require '../app/views/products/create.php';
    }

    public function store(){

        $name = $_POST['name'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $stock = $_POST['stock'];

        $product = new Product();
        $product->create($name, $price, $category, $stock);

        header("Location: index.php?url=products");
    }

    public function edit() {
        $id = $_GET['id'];

        $product = new Product();
        $data = $product->find($id);

        require '../app/views/products/edit.php';
    }

    public function updateStock (){
        $id = $_POST['id'];
        $newStock = $_POST['stock'];

        $product = new Product();
        
        //get old products
        $old = $product->find($id)['stock'];

        $product->updateStock($id, $newStock);

        //log inventory
        $diff = $newStock - $old;

        $db = new  Database();
        $conn = $db->connect();

        $type = $diff>0 ? 'in' : 'out';
        $qty = abs($diff);

        $conn->query("INSERT INTO inventory_logs (product_id, type, quantity)
        VALUES ($id, '$type', $qty)");

        header ("Location: index.php?url=products");
    }
}