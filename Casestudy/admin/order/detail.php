<?php require "../../database/database.php";

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $inforCus = $orderDB->getCustomerById($order_id);
    $products = $orderDetailDB->getByOrderId($order_id);
}




?>
<?php include __DIR__ . '/../layout/header.php';  ?>
<!-- Content -->
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Quản lí order</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="../index.php">Menu</a></li>
            <li class="breadcrumb-item active"><a href="">Order</a></li>
            <li class="breadcrumb-item active"><a href="">Thông tin chi tiết</a></li>
        </ol>
        <div class="">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h3 class="text-center">Thông tin Order</h3>
                    <div class="card shadow-lg border-0 rounded-lg ">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="small mb-1" for="inputFirstName">Mã order :</label>
                                <span><?= $inforCus['order_id'] ?></span>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputFirstName">Ngày order :</label>
                                <span><?= $inforCus['order_date'] ?></span>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputFirstName">Ngày shipper :</label>
                                <span><?= $inforCus['shipper_date'] ?></span>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputFirstName">Trạng thái order :</label>
                                <span><?= $inforCus['status'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h3 class="text-center">Thông tin khách hàng</h3>
                    <div class="card shadow-lg border-0 rounded-lg ">
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label class="small mb-1" for="inputFirstName">Họ và tên</label>
                                    <input class="form-control py-4" value="<?= $inforCus['name'] ?>" id="inputFirstName" type="text" placeholder="Enter first name" disabled>
                                </div>


                                <div class="form-group">
                                    <label class="small mb-1" for="inputEmailAddress">Email</label>
                                    <input class="form-control py-4" value="<?= $inforCus['email'] ?>" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="inputEmailAddress">Phone</label>
                                    <input class="form-control py-4" value="<?= $inforCus['phone'] ?>" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" disabled>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <svg class="svg-inline--fa fa-table fa-w-16 mr-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="table" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                    <path fill="currentColor" d="M464 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V80c0-26.51-21.49-48-48-48zM224 416H64v-96h160v96zm0-160H64v-96h160v96zm224 160H288v-96h160v96zm0-160H288v-96h160v96z"></path>
                </svg><!-- <i class="fas fa-table mr-1"></i> Font Awesome fontawesome.com -->
                Danh sách sản phẩm được order
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row" style="display: none;">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="dataTable_length"><label>Show <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> entries</label></div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <!-- <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 38px;">Mã</th> -->
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Mã sản phẩm</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Tên sản phẩm</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Số lượng</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Giá</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending">Tổng tiền</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width:200px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $sumTotal = 0;
                                        foreach ($products as $product) : ?>
                                            <tr>
                                                <td><?= $product['product_id'] ?></td>
                                                <td><?= $product['product_name'] ?></td>
                                                <td><?= $product['quantityOrdered'] ?></td>
                                                <td><?= $product['priceEach'] ?></td>
                                                <td><?php
                                                    $sumTotal += $product['total'];
                                                    echo $product['total']; ?></td>
                                                <td>
                                                    <a href="">Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Tồng tiền: <?= number_format($sumTotal) ?>VND</td>
                                            <td>

                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="row" style="display: none;">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                        <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                        <li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            <button class="btn btn-outline-primary" onclick="window.history.go(-1); return false;">Quay Lại</button>
        </div>
    </div>
</main>
<?php include __DIR__ . '/../layout/footer.php';  ?>