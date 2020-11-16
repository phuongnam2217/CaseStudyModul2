<?php
// unset($_SESSION['cart']);
if (isset($_GET['id']) && $_GET['id'] != null) {
    $id = $_GET['id'];
    $query = "SELECT * FROM products WHERE product_id = '$id';";
    $stmt = $pdo->query($query);
    $product = $stmt->fetch();
    if (isset($product)) {
        if (isset($_SESSION['cart'])) {
            if (isset($_SESSION['cart'][$id])) {
                // $_SESSION['cart'][$id]['name'] = $product['product_name'];
                // $_SESSION['cart'][$id]['image'] = $product['image1'];
                // $_SESSION['cart'][$id]['price'] = $product['price'];
                $_SESSION['cart'][$id]['qty'] += 1;
            } else {
                // $_SESSION['cart'][$id]['name'] = $product['product_name'];
                // $_SESSION['cart'][$id]['image'] = $product['image1'];
                // $_SESSION['cart'][$id]['price'] = $product['price'];
                $_SESSION['cart'][$id]['qty'] = 1;
            }
        } else {
            // $_SESSION['cart'][$id]['name'] = $product['product_name'];
            // $_SESSION['cart'][$id]['image'] = $product['image1'];
            // $_SESSION['cart'][$id]['price'] = $product['price'];
            $_SESSION['cart'][$id]['qty'] = 1;
        }
    }
}
