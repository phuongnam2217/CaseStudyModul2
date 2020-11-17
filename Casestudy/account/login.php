<?php session_start(); ?>
<?php include __DIR__ . "/../layout/header.php";  ?>

<div class="content">
    <div class="container">
        <div class="login">
            <div class="login-header d-flex flex-column">
                <h3 class="m-auto py-3 login-tittle">Đăng nhập bằng</h3>
                <div class="login-btn m-auto py-3">
                    <a href="" class="btn btn-primary btn-facebook">Facebook</a>
                    <a href="" class="btn btn-danger btn-google">Google+</a>
                </div>
                <div class="liner-or m-auto py-3">
                    <span>Hoặc</span>
                </div>
                <div class="row mt-3 py-3">
                    <div class="col-lg-6 col-xs-12 d-flex flex-column">
                        <div class="text-center form-title">Đăng Nhập</div>
                        <div style="max-width:410px;width:100%" class="m-auto">
                            <form action="xl-login.php" method="post">
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope fa-lg"></i></span>
                                    </div>
                                    <input type="email" name="loginemail" class="form-control form-control-lg form-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">
                                </div>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key fa-lg"></i></span>
                                    </div>
                                    <input type="password" name="loginpass" class="form-control form-control-lg form-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Password">
                                </div>
                                <div style="font-size: 2rem;" class="text-danger text-center"><?php if (isset($_SESSION['Err'])) {
                                                                                                    echo $_SESSION['Err'];
                                                                                                    unset($_SESSION['Err']);
                                                                                                }  ?></div>
                                <div class="form-group">
                                    <a href="" class="float-right my-3 btn-lg"></a>
                                </div>
                                <div>
                                    <button type="submit" class="form-control form-control-lg form-input btn btn-primary">Đăng nhập</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xs-12">
                        <div class="text-center form-title">Đăng ký</div>
                        <div style="max-width:410px;width:100%" class="m-auto">
                            <form action="xl-registor.php" method="post">
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user fa-lg"></i></span>
                                    </div>
                                    <input type="text" name="name" class="form-control form-control-lg form-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="User Name" required>
                                </div>
                                <div class="text-danger"><?= $nameErr ?? '' ?></div>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope fa-lg"></i></span>
                                    </div>
                                    <input type="email" name="email" class="form-control form-control-lg form-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                                </div>
                                <div style="font-size: 2rem;" class="text-danger text-center"><?= $emailErr ?? "" ?></div>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key fa-lg"></i></span>
                                    </div>
                                    <input type="password" name="pass1" class="form-control form-control-lg form-input" id="exampleInputPassword1" placeholder="Password" required>
                                </div>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key fa-lg"></i></span>
                                    </div>
                                    <input type="password" name="pass2" class="form-control form-control-lg form-input" id="exampleInputPassword1" placeholder="Re-enter Password" required>
                                </div>
                                <div style="font-size: 1.4rem;" class="text-danger text-center"><?= $passErr ?? "" ?></div>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-address-card fa-lg"></i></span>
                                    </div>
                                    <input type="text" name="address" class="form-control form-control-lg form-input" id="exampleInputPassword1" placeholder="Address" required>
                                </div>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-address-card fa-lg"></i></span>
                                    </div>
                                    <input type="text" name="phone" class="form-control form-control-lg form-input" id="exampleInputPassword1" placeholder="Phone Number" required>
                                </div>
                                <div>
                                    <button type="submit" class="form-control form-control-lg form-input btn btn-primary">Đăng ký</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . "/../layout/footer.php"  ?>