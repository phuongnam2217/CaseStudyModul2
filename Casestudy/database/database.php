<?php


$user = 'root';
$password = '';
$host = 'localhost';
$dbname = 'casestudy2';
$dns = 'mysql:host=' . $host . ';dbname=' . $dbname;
$pdo = new PDO($dns, $user, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);



function slugify($str)
{
    $str = trim(mb_strtolower($str));
    $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
    $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
    $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
    $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
    $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
    $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
    $str = preg_replace('/(đ)/', 'd', $str);
    $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
    $str = preg_replace('/([\s]+)/', '-', $str);
    return $str;
}
include_once __DIR__ . "/../classes/ClassCustomer.php";
include_once __DIR__ . "/../classes/ClassProduct.php";
include_once __DIR__ . "/../classes/ClassCategory.php";
include_once __DIR__ . "/../classes/ClassOrder.php";
include_once __DIR__ . "/../classes/ClassOrderDetail.php";
include_once __DIR__ . "/../classes/ClassUser.php";

$Pro = new Product($pdo);
$Cate = new Category($pdo);
$customerDB = new Customer($pdo);
$orderDB = new Order($pdo);
$orderDetailDB = new OrderDetail($pdo);
$userDB = new User($pdo);
