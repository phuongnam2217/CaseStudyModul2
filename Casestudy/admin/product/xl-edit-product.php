<?php
include __DIR__ . '/../../database/database.php';
// Get Category
$getCategory = "SELECT * FROM product_lines";
$stmt = $pdo->query($getCategory);
$categoryList = $stmt->fetchAll();
// Get 1 Product
$id = $_GET['id'];
$getProduct = "SELECT * FROM products WHERE product_id = '$id';";
$stmt = $pdo->query($getProduct);
$product = $stmt->fetch();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $product_name = $_POST['product_name'];
  $product_line = $_POST['product_line'];
  $slug = $_POST['slug'];
  $slug = slugify($slug);
  $price = $_POST['price'];
  $image1 = $_POST['image1'];
  $image2 = $_POST['image2'];
  $stock = $_POST['stock'];

  $queryAdd = "UPDATE products
     SET product_name = '$product_name', product_line = '$product_line', slug = '$slug',
      price = '$price', image1 = '$image1', image2 = '$image2', stock = '$stock' 
      WHERE product_id = '$id';";

  $pdo->query($queryAdd);
  header("Location: display-product.php");
}
