<?php
include __DIR__ . '/../../database/database.php';

// Get Products
$getProducts = "SELECT * FROM products";
$stmt = $pdo->query($getProducts);
$products = $stmt->fetchAll();
// Get Category
$getCategory = "SELECT * FROM product_lines";
$stmt = $pdo->query($getCategory);
$categoryList = $stmt->fetchAll();
// Xóa Product
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $queryDelete = "DELETE FROM products WHERE product_id = '$id';";
    $pdo->query($queryDelete);
    header("Location: display-product.php");
}
