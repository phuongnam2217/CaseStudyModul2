<?php
include __DIR__ . '/../../database/database.php';
// Get Category List

$categoryList = $Cate->getAll();

// Add Category
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_line = $_POST['product_line'];
    $description = $_POST['description'];
    $Cate->create($product_line, $description);
    header("Location: display-category.php");
}

// Xóa Category
if (isset($_GET['deleteCategory'])) {
    $delete = $_GET['deleteCategory'];
    $Cate->delete($delete);
    header('Location: display-category.php');
}
