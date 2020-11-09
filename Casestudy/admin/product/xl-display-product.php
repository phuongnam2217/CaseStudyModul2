<?php
include __DIR__ . '../../database/database.php';

// Get Products
$getProducts = "SELECT * FROM products";
$stmt = $pdo->query($getProducts);
$products = $stmt->fetchAll();
// Get Category
$getCategory = "SELECT * FROM product_lines";
$stmt = $pdo->query($getCategory);
$categoryList = $stmt->fetchAll();
