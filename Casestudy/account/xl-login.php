<?php
include __DIR__ . "/../database/database.php";
session_start();
if (isset($_POST['loginemail']) && isset($_POST['loginpass']))
    $email = $_POST['loginemail'];
$pass = $_POST['loginpass'];
$query = "SELECT * FROM customers";
$stmt = $pdo->query($query);
$customers = $stmt->fetchAll();
foreach ($customers as $customer) {
    if ($email == $customer['email'] && password_verify($pass, $customer['password'])) {
        $_SESSION['customer'] = $customer;
        header("Location: setting.php");
    }
}
if (empty($_SESSION['customer'])) {
    $_SESSION['Err'] = "Email và mật khẩu chưa đúng";
    header("Location: login.php");
}
