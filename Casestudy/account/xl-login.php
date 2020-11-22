<?php
require_once "../classes/ClassCustomer.php";
session_start();
if (isset($_POST['loginemail']) && isset($_POST['loginpass']))
    $email = $_POST['loginemail'];
$pass = $_POST['loginpass'];
$customers = $customerDB->getAll();
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
