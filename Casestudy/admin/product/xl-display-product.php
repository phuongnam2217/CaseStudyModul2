<?php
require_once "../../classes/ClassProduct.php";
require_once "../../classes/ClassCategory.php";
// Get Products
$products = $Pro->getAll();
// Get Category

$categoryList = $Cate->getAll();
// Xóa Product
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $Pro->delete($id);
    header("Location: display-product.php");
}
