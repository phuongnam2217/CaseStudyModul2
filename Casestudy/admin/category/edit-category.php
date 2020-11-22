<?php require_once "../../classes/ClassCategory.php";

$editName = $_GET['EditCategory'];

$cateogory = $Cate->getName($editName);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['product_line'];
    $description = $_POST['description'];

    $Cate->update($name, $description, $editName);
    header("Location: display-category.php");
}
?>
<?php include __DIR__ . '/../layout/header.php';  ?>
<!-- Content -->
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Thêm sản phẩm</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
            <li class="breadcrumb-item active">Product</li>
            <li class="breadcrumb-item active">Add Product</li>
        </ol>
        <div class="col-12">
            <form action="" method="post">
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Tên thể loại</label>
                    <div class="col-sm-9">
                        <input type="text" name="product_line" class="form-control" id="inputPassword" value="<?= $cateogory['product_line'] ?>" placeholder="Nhập tên thể loại" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Mô tả thể loại</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="description" placeholder="Nhập mô tả" required><?= $cateogory['description'] ?></textarea>
                    </div>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary">Edit</button>
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