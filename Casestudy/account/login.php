<?php include __DIR__ . "/../layout/header.php"  ?>

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
                            <form>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg form-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg form-input" id="exampleInputPassword1" placeholder="Password">
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
                            <form>
                                <div class="form-group d-flex">
                                    <input type="text" class="form-control form-control-lg form-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="User Name">
                                </div>
                                <div class="form-group d-flex">
                                    <input type="email" class="form-control form-control-lg form-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg form-input" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg form-input" id="exampleInputPassword1" placeholder="Re-enter Password">
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