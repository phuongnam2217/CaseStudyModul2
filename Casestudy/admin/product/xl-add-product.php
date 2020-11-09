<?php
include __DIR__ . '../../database/database.php';
session_start();
if ($_SESSION['user'] == null) {
    header('location: /admin/templates/login.php');
}
// Get Products
$getProducts = "SELECT * FROM products";
$stmt = $pdo->query($getProducts);
$products = $stmt->fetchAll();
// Get Category
$getCategory = "SELECT * FROM product_lines";
$stmt = $pdo->query($getCategory);
$categoryList = $stmt->fetchAll();

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

    $queryAdd = "INSERT INTO products (product_name, product_line, slug, price, description , image1, image2, stock)
    VALUES ('$product_name','$product_line','$slug','$price','$description' ,'$image1','$image2','$stock');";
    $pdo->query($queryAdd);

    header("Location: display-product.php");
}
