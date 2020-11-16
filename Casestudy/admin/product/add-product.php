<?php include __DIR__ . '/xl-add-product.php'; ?>
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
                    <label for="inputPassword" class="col-sm-3 col-form-label">Tên sản phẩm</label>
                    <div class="col-sm-9">
                        <input type="text" name="product_name" class="form-control" id="inputPassword" placeholder="Nhập tên sản phẩm" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Loại sản phẩm</label>
                    <div class="col-sm-2">
                        <select name="product_line" class="form-control" id="">
                            <?php foreach ($categoryList as $category) : ?>
                                <option value="<?= $category['product_line'] ?>"><?= $category['product_line'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Slug</label>
                    <div class="col-sm-9">
                        <input type="text" name="slug" class="form-control" placeholder="Nhập slug" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Giá sản phẩm</label>
                    <div class="col-sm-9">
                        <input type="text" name="price" class="form-control" placeholder="Nhập giá sản phẩm" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Ảnh sản phẩm 1</label>
                    <div class="col-sm-9">
                        <textarea name="image1" class="form-control" placeholder="Ảnh sản phẩm 1" required></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Ảnh sản phẩm 2</label>
                    <div class="col-sm-9">
                        <textarea name="image2" class="form-control" placeholder="Ảnh sản phẩm 2"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Số lượng sản phẩm</label>
                    <div class="col-sm-9">
                        <input type="text" name="stock" class="form-control" placeholder="Nhập số lượng sản phẩm" required>
                    </div>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
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