<?php
require_once "../../classes/ClassUser.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass1 = $_POST['password1'];
    $pass2 = $_POST['password2'];
    $hasErr = false;
    $regrexp = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";
    $users = $userDB->getAll();
    foreach ($users as $user) {
        if ($email == $user['email']) {
            $emailErr = "Email đã có vui lòng nhập email khác";
            $hasErr = true;
        }
    }
    if (preg_match($regrexp, $pass1) && preg_match($regrexp, $pass2)) {
        if ($pass1 == $pass2) {
            $pass = password_hash($pass1, PASSWORD_DEFAULT);
        } else {
            $passErr = "Vui lòng nhập mật khẩu giống nhau";
            $hasErr = true;
        }
    } else {
        $passErr = "Mật khẩu ít nhất 8 kí tự và chứa ít nhất 1 số và 1 chữ viết Hoa";
        $hasErr = true;
    }
    if ($hasErr === false) {
        $userDB->create($name, $pass, $email, $phone);
        $success = "Thêm tài khoản thành công";
    }
}

?>
<?php include __DIR__ . '/../layout/header.php';  ?>
<!-- Content -->
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Thêm tài khoản admin</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
            <li class="breadcrumb-item active">Users</li>
            <li class="breadcrumb-item active">Add User</li>
        </ol>
        <div class="col-12">
            <form action="" method="post">
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Tên tài khoản</label>
                    <div class="col-sm-6">
                        <input type="text" name="name" class="form-control" id="inputPassword" placeholder="Họ và tên" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-6">
                        <input type="email" name="email" class="form-control" id="inputPassword" placeholder="Email" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Số điện thoại</label>
                    <div class="col-sm-6">
                        <input type="text" name="phone" class="form-control" id="inputPassword" placeholder="Số điện thoại" required>
                    </div>
                </div>
                <div class="text-center text-danger  pb-3">
                    <?= $emailErr ?? ""; ?>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Mật khẩu</label>
                    <div class="col-sm-6">
                        <input type="password" name="password1" class="form-control" id="inputPassword" placeholder="Mật khẩu" required>
                    </div>
                </div>
                <div class="text-center text-danger  pb-3">
                    <?= $passErr ?? ""; ?>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Nhập lại mật khẩu</label>
                    <div class="col-sm-6">
                        <input type="password" name="password2" class="form-control" id="inputPassword" placeholder="Nhập lại mât khẩu" required>
                    </div>
                </div>
                <div class="text-center text-danger  pb-3">
                    <?= $passErr ?? ""; ?>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                    </div>
                </div>
                <div class="text-center text-danger pb-3"><?= $success ?? ""; ?></div>
            </form>
        </div>
    </div>
</main>
<?php include __DIR__ . '/../layout/footer.php';  ?>