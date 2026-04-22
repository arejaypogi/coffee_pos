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
}