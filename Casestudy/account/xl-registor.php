<?php
include __DIR__ . "/../database/database.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $hasErr = false;
    if ($pass1 == $pass2) {
        $pass = password_hash($pass1, PASSWORD_DEFAULT);
    } else {
        $_SESSION['passErr'] = "Mật khẩu và Nhập lại Mật khẩu chưa giống nhau";
        $hasErr = true;
    }
    $query = "SELECT * FROM customers";
    $stmt = $pdo->query($query);
    $customers = $stmt->fetchAll();
    foreach ($customers as $customer) {
        if ($email == $customer['email']) {
            $_SESSION['emailErr'] = "Email đã tồn tại vui lòng nhập email khác";
            $hasErr = true;
        }
    }
    if ($hasErr == false) {
        $customerDB->create($name, $pass, $email, $phone, $address);
        $customer_id = $customerDB->getLastInsert();
        $_SESSION['customer'] = $customerDB->getById($customer_id);
        header("Location: setting.php");
    } else {
        header("Location: login.php");
    }
}
