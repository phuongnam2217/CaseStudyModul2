<?php include_once "classes/ClassProduct.php";
include_once "classes/ClassCategory.php";
session_start();
include_once __DIR__ . "/cart/add-cart.php";
// ProDuct New
$productNew = $Pro->getBySelect("create_at", 8);
// Product Hots
$productHot = $Pro->getBySelect("view", 8);
// Product Selling
$productSelling = $Pro->getBySelect("sold", 8);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="asset/css/main.css">
    <link rel="stylesheet" href="asset/css/base.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,500;1,700&display=swap" rel="stylesheet" />
    <title>CaseStudy Module 2</title>
</head>

<body>
    <div class="app">
        <div class="header">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-dark ">
                    <a href="/index.php" class="navbar-brand">
                        <img width="132px" src="https://file.hstatic.net/1000344185/file/uoemj1xih2cluupbe1vw-kvjkaw1umbarw_b4167849b7b34a4687658886e20ddd0e.gif" alt="">
                    </a>
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
                        <span class="header-icon">
                            <i class="fas fa-bars" class="header-icon"></i>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarMenu">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item header-navbar-item"><a href="index.php" class="header-link">HOME</a></li>
                            <li class="nav-item header-navbar-item"><a href="collection/tops.php" class="header-link">TOPS</a></li>
                            <li class="nav-item header-navbar-item"><a href="collection/outerwear.php" class="header-link">OUTERWEAR</a></li>
                            <li class="nav-item header-navbar-item"><a href="collection/bottom.php" class="header-link">BOTTOMS</a></li>
                            <li class="nav-item header-navbar-item"><a href="collection/accessories.php" class="header-link">ACCESSORIES</a></li>
                            <li class="nav-item header-navbar-item"><a href="collection/aboutus.php" class="header-link">ABOUT US</a></li>
                            <?php if (!isset($_SESSION['customer'])) : ?>
                                <li class="nav-item header-navbar-item"><a href="account/login.php" class="header-link">LOGIN</a></li>
                            <?php else : ?>
                                <li class="nav-item dropdown mx-4">
                                    <a class="nav-link dropdown-toggle header-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Hello,<?= $_SESSION['customer']['name'] ?>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 100%;text-align: center;">
                                        <a class="dropdown-item header-link" href="account/setting.php">Setting</a>
                                        <a class="dropdown-item header-link" href="account/logout.php?logout">Logout</a>
                                    </div>
                                </li>
                            <?php endif; ?>
                            <li class="nav-item header-navbar-item header-search" id="header-search">
                                <div class="header-search-icon" id="search">
                                    <img width="20px" src="https://theme.hstatic.net/1000344185/1000478812/14/pic-search.png?v=379" alt="">
                                </div>
                                <form action="collection/search.php" method="post">
                                    <div class="header-search-form" id="formsearch">
                                        <div class="header-search-input">
                                            <input type="text" name="search" class="header-search-input-input" placeholder="Tìm kiếm">
                                            <button type="submit" class="header-search-input-btn"><i class="fas fa-search header-search-input-icon"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            <li class="nav-item header-navbar-item" id="header-input">
                                <form action="collection/search.php" method="post">
                                    <div class="header-search-input">
                                        <input type="text" name="search" class="header-input-input" placeholder="Tìm kiếm">
                                        <button type="submit" class="header-search-input-btn"><i class="fas fa-search header-search-input-icon"></i></button>
                                    </div>
                                </form>
                            </li>
                            <li class="nav-item header-navbar-item header-cart">
                                <a href="cart/index.php" class="header-link header-cart-link">
                                    <img class="header-cart-img" src="https://theme.hstatic.net/1000319111/1000411564/14/cart-icon.png?v=1032" alt="">
                                    <span class="header-cart-quality">
                                        <?php if (isset($_SESSION['cart'])) {
                                            $total = 0;
                                            foreach ($_SESSION['cart'] as $value) {
                                                $total += $value['qty'];
                                            }
                                            echo $total;
                                        }
                                        ?>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
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
                                    <a href="products/index.php?id=<?= $value['product_id'] ?>" class="product-link">
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
                                    <a href="products/index.php?id=<?= $value['product_id'] ?>" class="product-link">
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
                                    <a href="products/index.php?id=<?= $value['product_id'] ?>" class="product-link">
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
        <div class="footer">
            <div class="footer-bot">
                <p class="footer-bot-tittle">©2020 SWE, LLC. All Rights Reserved.</p>
            </div>
        </div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="asset/js/main.js"></script>

</html>