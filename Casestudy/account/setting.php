<?php
require_once "../classes/ClassCustomer.php";
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_id = $_POST['customer_id'];
    $customer_name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    if ($customerDB->updateInfo($customer_name, $address, $phone, $customer_id)) {
        $_SESSION['success'] = "Thay đổi thông tin thành công";
        $_SESSION['customer'] = $customerDB->getById($customer_id);
    } else {
        $_SESSION['success'] = "Thay đổi thông tin thất bại";
    };
}
?>
<?php include_once "../layout/header.php"; ?>
<div class="content">
    <div class="container py-5">
        <div class="row py-5">
            <div class="col-sm-3">
                <div class="account row justify-content-around align-items-center">
                    <div class="icon">
                        <img src="https://theme.hstatic.net/1000344185/1000478812/14/icon_avatar.png?v=379" alt="">
                    </div>
                    <div class="user">
                        <span>Tài khoản của</span>
                        <h4><?= $_SESSION['customer']['name'] ?></h4>
                    </div>
                </div>
                <div class="link-account">
                    <ul style="padding-left:0;">
                        <li class="py-2"><a href="setting.php" class="">Thông tin chung</a> </li>
                        <li class="py-2"><a href="changpassword.php">Đổi mật khẩu</a> </li>
                        <li class="py-2"><a href="">Đơn hàng của tôi</a> </li>
                        <li class="py-2"><a href="/account/logout.php?logout">Đăng xuất</a> </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="infor m-auto" style="width:60%">
                    <div class="">
                        <h2 class="p-2 text-primary">BẢNG THÔNG TIN CỦA TÔI</h2>
                    </div>
                    <div class="">
                        <h3 class="p-3 text-primary">Thông tin tài khoản</h3>
                    </div>
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
                                <span class="input-group-text"><i class="fas fa-envelope-square fa-lg" style="width: 30px"></i></span>
                            </div>
                            <input type="text" name="email" value="<?= $_SESSION['customer']['email'] ?>" class="form-control form-control-lg form-input" id="exampleInputPassword1" placeholder="Email đã lưu" required disabled>
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
                        <div class="p3" style="font-size: 1.6rem;color:red">
                            <h3>
                                <?php if (isset($_SESSION['success'])) {
                                    echo $_SESSION['success'];
                                };
                                unset($_SESSION['success']);
                                ?>
                            </h3>
                        </div>
                        <div class="my-5">
                            <button type="submit" class="form-control form-control-lg form-input btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once "../layout/footer.php"; ?>