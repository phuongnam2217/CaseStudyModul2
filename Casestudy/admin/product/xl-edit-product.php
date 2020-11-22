<?php
require_once "../../classes/ClassProduct.php";
require_once "../../classes/ClassCategory.php";
// Get Category
$categoryList = $Cate->getAll();
// Get 1 Product
$id = $_GET['id'];
$product = $Pro->getId($id);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $product_name = $_POST['product_name'];
  $product_line = $_POST['product_line'];
  $slug = $_POST['slug'];
  $slug = slugify($slug);
  $price = $_POST['price'];
  $image1 = $_POST['image1'];
  $image2 = $_POST['image2'];
  $stock = $_POST['stock'];

  $Pro->update($product_name, $product_line, $slug, $price, $image1, $image2, $stock, $id);
  header("Location: display-product.php");
}
