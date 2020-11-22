<?php
require_once "../../classes/ClassOrder.php";
require_once "../../classes/classOrderDetail.php";

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $order = $orderDB->getById($order_id);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $_POST['order_id'];
    $shipper_date = $_POST['shipper_date'];
    $status = $_POST['status'];
    $customer_id = $_POST['customer_id'];
    if ($orderDB->update($shipper_date, $status, $customer_id, $order_id)) {
        $notify = "Edit thành công";
    }
}

?>
<?php include __DIR__ . '/../layout/header.php';  ?>
<!-- Content -->
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Edir order</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
            <li class="breadcrumb-item active">Order</li>
            <li class="breadcrumb-item active">Edit Order</li>
        </ol>
        <div class="col-12">
            <form action="" method="post">
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Mã Order</label>
                    <div class="col-sm-9">
                        <input type="text" name="order_id" value="<?= $order['order_id'] ?>" class="form-control" id="inputPassword" placeholder="Nhập tên sản phẩm" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Ngày Order</label>
                    <div class="col-sm-9">
                        <input type="text" name="order_date" value="<?= $order['order_date'] ?>" class="form-control" placeholder="Nhập slug" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Ngày Shipper</label>
                    <div class="col-sm-3">
                        <input type="date" name="shipper_date" min="<?= $min = substr($order['order_date'], 0, 10); ?>" class="form-control" placeholder="Nhập giá sản phẩm" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Trạng thái</label>
                    <div class="col-sm-3">
                        <select class="form-control" name="status" id="">
                            <option value="On Hold">On Hold</option>
                            <option value="Shipping">Shipping</option>
                            <option value="Success">Success</option>
                            <option value="Canceled">Canceled</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Mã khách hàng</label>
                    <div class="col-sm-9">
                        <input type="text" name="customer_id" value="<?= $order['customer_id'] ?>" class="form-control" placeholder="Nhập số lượng sản phẩm" required>
                    </div>
                </div>
                <div>
                    <h3 class='text-center'><?= $notify ?? "" ?></h3>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary">Sửa lại</button>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
<?php include __DIR__ . '/../layout/footer.php';  ?>