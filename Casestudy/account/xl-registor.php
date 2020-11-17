<?php
include __DIR__ . "/../database/database.php";
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
        $passErr = "Mật khẩu và Nhập lại Mật khẩu chưa giống nhau";
        $hasErr = true;
    }
    $query = "SELECT * FROM customers";
    $stmt = $pdo->query($query);
    $customers = $stmt->fetchAll();
    foreach ($customers as $customer) {
        if ($email == $customer['email']) {
            $emailErr = "Email đã tồn tại vui lòng nhập email khác";
            $hasErr = true;
        }
    }
    if ($hasErr == false) {
        $queryInsert = "INSERT INTO customers (name,password,email,address,phone) VALUES (?,?,?,?,?);";
        $stmt = $pdo->prepare($queryInsert);
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $pass);
        $stmt->bindParam(3, $email);
        $stmt->bindParam(4, $address);
        $stmt->bindParam(5, $phone);
        $stmt->execute();
        header("Location: login.php");
    } else {
        header("Location: login.php");
    }
}
