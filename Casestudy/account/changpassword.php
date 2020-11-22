<?php
require_once "../classes/ClassCustomer.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];
    $newpass1 = $_POST['newpassword1'];
    $newpass2 = $_POST['newpassword2'];

    if (password_verify($password, $_SESSION['customer']['password'])) {
        if ($newpass1 == $newpass2) {
            $pass = password_hash($newpass1, PASSWORD_DEFAULT);
            $customerDB->updatePass($pass, $_SESSION['customer']['customer_id']);
            $_SESSION['success'] = "Đổi mật khẩu thành công";
        } else {
            $_SESSION['success'] = "Mật khẩu và nhập lại mật khẩu không giống nhau";
        }
    } else {
        $_SESSION['success'] = "Mật khẩu hiện tại chưa đúng";
    }
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
                        <li class="py-2"><a href="changpassword.php" class="">Đổi mật khẩu</a> </li>
                        <li class="py-2"><a href="" class="">Đơn hàng của tôi</a> </li>
                        <li class="py-2"><a href="/account/logout.php?logout" class="">Đăng xuất</a> </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="infor m-auto" style="width:60%">
                    <div class="">
                        <h3 class="text-primary py-3">Đổi mật khẩu</h3>
                    </div>
                    <form action="" method="post">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key fa-lg" style="width: 30px"></i></span>
                            </div>
                            <input type="password" name="password" value="" class="form-control form-control-lg form-input" id="exampleInputPassword1" placeholder="Mật khẩu hiện tại" required>
                        </div>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key fa-lg" style="width: 30px"></i></span>
                            </div>
                            <input type="password" name="newpassword1" value="" class="form-control form-control-lg form-input" id="exampleInputPassword1" placeholder="Mật khẩu mới" required>
                        </div>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key fa-lg" style="width: 30px"></i></span>
                            </div>
                            <input type="password" name="newpassword2" value="" class="form-control form-control-lg form-input" id="exampleInputPassword1" placeholder="Nhập lại mật khẩu mới" required>
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
                            <button type="submit" class="form-control form-control-lg form-input btn btn-primary">Đổi mật khẩu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once "../layout/footer.php"; ?>