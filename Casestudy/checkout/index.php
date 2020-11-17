<?php
include __DIR__ . "/../database/database.php";
session_start();
if (empty($_SESSION['customer'])) {
    header("Location: /account/login.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['customer_id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $queryUpdate = "UPDATE customers SET name = '$name', address = '$address', phone = '$phone' WHERE customer_id = '$id';";
    $pdo->query($queryUpdate);
    $queryInsertOrder = "INSERT INTO orders (customer_id) VALUES ('$id');";
    $pdo->query($queryInsertOrder);
    $order_id = $pdo->lastInsertId();
    foreach ($_SESSION['cart'] as $key => $value) {
        $query = "SELECT * FROM products WHERE product_id = '$key';";
        $stmt = $pdo->query($query);
        $product = $stmt->fetch();
        $price = $product['price'];
        $qty = $value['qty'];
        $queryInsertOrderDetails = "INSERT INTO orderdetails (order_id,product_id,quantityOrdered,priceEach)
         VALUES ('$order_id','$key','$qty','$price');";
        $pdo->query($queryInsertOrderDetails);
    }
    unset($_SESSION['cart']);
    $queryCustomer = "SELECT * FROM customers WHERE customer_id = $id";
    $stmt = $pdo->query($queryCustomer);
    $_SESSION['customer'] = $stmt->fetch();
}

?>
<?php include __DIR__ . "/../layout/header.php"; ?>
<div class="content">
    <div class="grid">
        <div class="row flex-wrap-reverse" style="padding: 50px;">
            <div class="col-sm-6">
                <h3 class="p-3 my-3" style="font-size: 2.5rem;">Thông tin giao hàng của bạn</h3>
                <form action="" method="post">
                    <div class="form-group input-group">
                        <input type="hidden" name="customer_id" value="<?= $_SESSION['customer']['customer_id'] ?>">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user fa-lg" style="width: 30px"></i></span>
                        </div>
                        <input type="text" name="name" value="<?= $_SESSION['customer']['name'] ?>" class="form-control form-control-lg form-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Họ và tên" required>
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-address-card fa-lg" style="width: 30px"></i></span>
                        </div>
                        <input type="text" name="address" value="<?= $_SESSION['customer']['address'] ?>" class="form-control form-control-lg form-input" id="exampleInputPassword1" placeholder="Địa chỉ đã lưu" required>
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-mobile-alt fa-lg" style="width: 30px"></i></span>
                        </div>
                        <input type="text" name="phone" value="<?= $_SESSION['customer']['phone'] ?>" class="form-control form-control-lg form-input" id="exampleInputPassword1" placeholder="Số điên thoại đã lưu" required>
                    </div>
                    <div class="">
                        <a href="/cart/" style="font-size: 1.5rem;">Quay lại giỏ hàng</a>
                    </div>
                    <div class="my-5">
                        <button type="submit" class="form-control form-control-lg form-input btn btn-primary">Hoàn tất đơn hàng</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-6" style="background-color: #fafafa">
                <div class="cart-content">
                    <div class="order">
                        <div class="order-product-list">
                            <table class="table">
                                <thead>
                                    <h3 class="text-center pb-5" style="font-size: 2.5rem;">Cart Infomation</h3>
                                </thead>
                                <tbody>
                                    <?php $sumPrice = 0;
                                    foreach ($_SESSION['cart'] as $key => $value) : ?>
                                        <?php $query = "SELECT * FROM products WHERE product_id = '$key'";
                                        $stmt = $pdo->query($query);
                                        $product = $stmt->fetch();
                                        ?>
                                        <tr>
                                            <td class="order-image">
                                                <div class="order-thumbnail">
                                                    <div class="order-thumbnail-wraper">
                                                        <img class="order-thumbnail-image" src="<?= $product['image1'] ?>" alt="">
                                                    </div>
                                                    <span class="order-thumbnail-quantily"><?= $value['qty']; ?></span>
                                                </div>
                                            </td>
                                            <td class="order-description">
                                                <span class="order-description-name"><?= $product['product_name'] ?></span>
                                            </td>
                                            <td>
                                                <span class="order-description-name">
                                                    <?php echo number_format($total = $product['price'] * $value['qty']);
                                                    $sumPrice += $total;
                                                    ?>₫</span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <hr>
                        </div>
                        <div class="order-total">
                            <div class="total-top d-flex justify-content-between p-3">
                                <span style="font-size: 1.6rem;">Tạm Tính</span>
                                <span style="font-size: 1.6rem;"><?= $sumPrice ?></span>
                            </div>
                            <div class="total-top d-flex justify-content-between p-3">
                                <span style="font-size: 1.6rem;">Phí vận chuyển</span>
                                <span style="font-size: 1.6rem;">Free Shipping</span>
                            </div>
                        </div>
                        <hr>
                        <div class="total-top d-flex justify-content-between p-3">
                            <span style="font-size: 2rem;">Tổng cộng</span>
                            <span style="font-size: 2rem;"><?= $sumPrice ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . "/../layout/footer.php"; ?>