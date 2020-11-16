<?php include_once "database/database.php";
session_start();
include_once __DIR__ . "/cart/add-cart.php";
// ProDuct New
$getProductNew = "SELECT * FROM products ORDER BY update_at DESC LIMIT 0,4;";
$stmt = $pdo->query($getProductNew);
$productNew = $stmt->fetchAll();

// Product Tops
$getProductTop = "SELECT * FROM products WHERE product_line = 'Tops' ORDER BY update_at DESC LIMIT 0,4;";
$stmt = $pdo->query($getProductTop);
$productTop = $stmt->fetchAll();
// Product Hots
$getProductHot = "SELECT * FROM products ORDER BY view DESC LIMIT 0,4;";
$stmt = $pdo->query($getProductHot);
$productHot = $stmt->fetchAll();
// Product Hots
$getProductSelling = "SELECT * FROM products ORDER BY sold DESC LIMIT 0,4;";
$stmt = $pdo->query($getProductSelling);
$productSelling = $stmt->fetchAll();
?>
<?php include __DIR__ . "/layout/header.php"; ?>
<div class="content">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="https://bucket.nhanh.vn/store/7136/bn/sb_1604304214_345.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://bucket.nhanh.vn/store/7136/bn/sb_1604304182_702.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://bucket.nhanh.vn/store/7136/bn/sb_1604304157_337.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="grid">
        <div class="layout-arrival">
            <div class="arrival-tittle">
                <h3 class="arrival-tittle-font"> NEW ARRIVAL</h3>
            </div>
            <div class="arrival-product">
                <?php foreach ($productNew as $value) : ?>
                    <div class="col-md-3 col-sm-6 col-xs-6 product-column">
                        <div class="product-top">
                            <a href="products/<?= $value['slug'] ?>" class="product-link">
                                <img class="product-img image1" src="<?= $value['image1'] ?>" alt="">
                                <img class="product-img image2" src="<?= $value['image2'] ?>" alt="">
                            </a>
                            <div class="product-img-btn" id="img-btn">
                                <a href="index.php?id=<?= $value['product_id'] ?>" class="">Add to card</a>
                            </div>
                        </div>
                        <div class="product-bot">
                            <p class="product-name"><?= $value['product_name'] ?></p>
                            <p class="product-price"><?= number_format($value['price']) ?><ins>đ</ins></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="layout-arrival">
            <div class="arrival-tittle">
                <h3 class="arrival-tittle-font"> TOP VIEW </h3>
            </div>
            <div class="arrival-product">
                <?php foreach ($productHot as $value) : ?>
                    <div class="product-column">
                        <div class="product-top">
                            <a href="products/<?= $value['slug'] ?>" class="product-link">
                                <img class="product-img image1" src="<?= $value['image1'] ?>" alt="">
                                <img class="product-img image2" src="<?= $value['image2'] ?>" alt="">
                            </a>
                            <div class="product-img-btn" id="img-btn">
                                <a href="index.php?id=<?= $value['product_id'] ?>" class="">Add to card</a>
                            </div>
                        </div>
                        <div class="product-bot">
                            <p class="product-name"><?= $value['product_name'] ?></p>
                            <p class="product-price"><?= number_format($value['price']) ?><ins>đ</ins></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="layout-arrival">
            <div class="arrival-tittle">
                <h3 class="arrival-tittle-font"> TOP SELLING </h3>
            </div>
            <div class="arrival-product">
                <?php foreach ($productSelling as $value) : ?>
                    <div class="product-column">
                        <div class="product-top">
                            <a href="products/<?= $value['slug'] ?>" class="product-link">
                                <img class="product-img image1" src="<?= $value['image1'] ?>" alt="">
                                <img class="product-img image2" src="<?= $value['image2'] ?>" alt="">
                            </a>
                            <div class="product-img-btn" id="img-btn">
                                <a href="index.php?id=<?= $value['product_id'] ?>" class="">Add to card</a>
                            </div>
                        </div>
                        <div class="product-bot">
                            <p class="product-name"><?= $value['product_name'] ?></p>
                            <p class="product-price"><?= number_format($value['price']) ?><ins>đ</ins></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="layout-arrival">
            <div class="arrival-tittle">
                <h3 class="arrival-tittle-font"> TOPS </h3>
            </div>
            <div class="arrival-product">
                <?php foreach ($productTop as $value) : ?>
                    <div class="product-column">
                        <div class="product-top">
                            <a href="products/<?= $value['slug'] ?>" class="product-link">
                                <img class="product-img image1" src="<?= $value['image1'] ?>" alt="">
                                <img class="product-img image2" src="<?= $value['image2'] ?>" alt="">
                            </a>
                            <div class="product-img-btn" id="img-btn">
                                <a href="index.php?id=<?= $value['product_id'] ?>" class="">Add to card</a>
                            </div>
                        </div>
                        <div class="product-bot">
                            <p class="product-name"><?= $value['product_name'] ?></p>
                            <p class="product-price"><?= number_format($value['price']) ?><ins>đ</ins></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . "/layout/footer.php"; ?>