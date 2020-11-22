<?php
require_once "../../classes/ClassProduct.php";
require_once "../../classes/ClassCategory.php";
// Get Products
$products = $Pro->getAll();
// Get Category
$categoryList = $Cate->getAll();

// Add Product
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];
    $product_line = $_POST['product_line'];
    $slug = $_POST['slug'];
    $slug = slugify($slug);
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image1 = $_POST['image1'];
    $image2 = $_POST['image2'];
    $stock = $_POST['stock'];
    $Pro->create($product_name, $product_line, $slug, $price, $image1, $image2, $stock, $description);
    // header("Location: display-product.php");
}
