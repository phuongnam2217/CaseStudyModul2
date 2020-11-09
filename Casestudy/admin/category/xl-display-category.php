<?php
include __DIR__ . '../../database/database.php';
// Get Category List
$getCategory = "SELECT * FROM product_lines";
$stmt = $pdo->query($getCategory);
$categoryList = $stmt->fetchAll();


// Add Category
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_line = $_POST['product_line'];
    $description = $_POST['description'];
    $queryAddCategory = "INSERT INTO `product_lines` (`product_line`, `description`)
     VALUES ('$product_line', '$description');";
    // $stmt = $pdo->prepare($queryAddCategory);
    // $stmt->execute(['product_line' => $product_line, 'description' => $description]);
    $pdo->query($queryAddCategory);
    header("Location: display-category.php");
}
