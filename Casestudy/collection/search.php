<?php require_once "../classes/ClassProduct.php";
session_start();
require_once "../cart/add-cart.php";
$search = isset($_POST['search']) ? $_POST['search'] : "";
$products = $Pro->search($search);
?>
<?php include __DIR__ . "/../layout/header.php"; ?>
<div class="content">
    <div class="grid">
        <div class="layout-arrival">
            <hr>
            <div class="arrival-product">
                <?php foreach ($products as $value) : ?>
                    <div class="col-md-3 col-sm-6 col-xs-6 product-column">
                        <div class="product-top">
                            <a href="/products/<?= $value['slug'] ?>" class="product-link">
                                <img class="product-img image1" src="<?= $value['image1'] ?>" alt="">
                                <img class="product-img image2" src="<?= $value['image2'] ?>" alt="">
                            </a>
                            <div class="product-img-btn" id="img-btn">
                                <a href="search.php?id=<?= $value['product_id'] ?>" class="ajax-cart">Add to card</a>
                            </div>
                        </div>
                        <div class="product-bot">
                            <p class="product-name"><?= $value['product_name'] ?></p>
                            <p class="product-price"><?= number_format($value['price']) ?><ins>đ</ins></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <hr>
        </div>
    </div>
</div>
<?php include __DIR__ . "/../layout/footer.php"; ?>