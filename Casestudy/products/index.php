<?php require_once "../classes/ClassProduct.php";
session_start();
$product_id = $_GET['id'];
$product = $Pro->getId($product_id);
$Pro->increase("view", "product_id", $product_id);
if (isset($_POST['product_id']) && isset($_POST['qty'])) {
    $id = $_POST['product_id'];
    $qty = $_POST['qty'];

    $product = $Pro->getId($id);
    if (isset($product)) {
        if (isset($_SESSION['cart'])) {
            if (isset($_SESSION['cart'][$id])) {

                $_SESSION['cart'][$id]['qty'] += $qty;
            } else {

                $_SESSION['cart'][$id]['qty'] = $qty;
            }
        } else {

            $_SESSION['cart'][$id]['qty'] = $qty;
        }
    }
}
?>

<?php include __DIR__ . "/../layout/header.php"; ?>
<div class="content">
    <div class="grid">
        <div class="row" style="padding: 50px;">
            <div class="col-sm-6">
                <img id="image" width="100%" src="<?= $product['image1'] ?>" alt="">
                <div class="row">
                    <div class="slide-image">
                        <div class="row">
                            <img id="image1" class="slide-image-one" width="20%" src="<?= $product['image1'] ?>" alt="">
                            <img id="image2" class="slide-image-one" width="20%" src="<?= $product['image2'] ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="product-item">
                    <h3 class="product-item-name"><?= $product['product_name'] ?></h3>
                </div>
                <div class="product-item">
                    <h3 class="product-item-price" style="font-weight: 300;"><?= number_format($product['price']) ?><ins>đ</ins></h3>
                </div>
                <div class="product-item product-item-form">
                    <form action="" method="post">
                        <div class="product-quality">
                            <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                            <span class="product-quality-btn" id="giam"><i class="fas fa-arrow-left"></i></span>
                            <input class="product-quality-btn" id="qty" type="text" name='qty' value="1">
                            <span class="product-quality-btn" id="tang"><i class="fas fa-arrow-right"></i></span>
                        </div>
                        <div class="product-quality">
                            <input type="submit" class="btn insert-cart" value="Thêm vào giỏ">
                        </div>
                    </form>
                </div>
                <div class="product-item">
                    <p style="font-size: 1.6rem;">Mã sản phẩm: <?= $product['slug'] ?></p>
                </div>
                <div class="product-item">
                    <p style="font-size: 1.6rem;"><?= $product['description'] ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . "/../layout/footer.php"; ?>