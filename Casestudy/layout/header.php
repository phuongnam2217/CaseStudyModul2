<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="/asset/css/main.css">
    <link rel="stylesheet" href="/asset/css/base.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,500;1,700&display=swap" rel="stylesheet" />
    <title>CaseStudy Modul 2</title>
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
                            <li class="nav-item header-navbar-item"><a href="/index.php" class="header-link">HOME</a></li>
                            <li class="nav-item header-navbar-item"><a href="/collection/tops.php" class="header-link">TOPS</a></li>
                            <li class="nav-item header-navbar-item"><a href="/collection/outerwear.php" class="header-link">OUTERWEAR</a></li>
                            <li class="nav-item header-navbar-item"><a href="" class="header-link">BOTTOMS</a></li>
                            <li class="nav-item header-navbar-item"><a href="" class="header-link">ACCESSORIES</a></li>
                            <li class="nav-item header-navbar-item"><a href="/collection/aboutus.php" class="header-link">ABOUT US</a></li>
                            <?php if (!isset($_SESSION['customer'])) : ?>
                                <li class="nav-item header-navbar-item"><a href="/account/login.php" class="header-link">LOGIN</a></li>
                            <?php else : ?>
                                <li class="nav-item dropdown mx-4">
                                    <a class="nav-link dropdown-toggle header-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Dropdown
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item header-link" href="#">Action</a>
                                        <a class="dropdown-item header-link" href="#">Another action</a>
                                        <a class="dropdown-item header-link" href="#">Something else here</a>
                                    </div>
                                </li>
                            <?php endif; ?>
                            <li class="nav-item header-navbar-item header-search" id="header-search">
                                <div class="header-search-icon" id="search">
                                    <img width="20px" src="https://theme.hstatic.net/1000344185/1000478812/14/pic-search.png?v=379" alt="">
                                </div>
                                <form action="/collection/search.php" method="post">
                                    <div class="header-search-form" id="formsearch">
                                        <div class="header-search-input">
                                            <input type="text" name="search" class="header-search-input-input" placeholder="Tìm kiếm">
                                            <button type="submit" class="header-search-input-btn"><i class="fas fa-search header-search-input-icon"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            <li class="nav-item header-navbar-item" id="header-input">
                                <form action="/collection/search.php" method="post">
                                    <div class="header-search-input">
                                        <input type="text" name="search" class="header-input-input" placeholder="Tìm kiếm">
                                        <button type="submit" class="header-search-input-btn"><i class="fas fa-search header-search-input-icon"></i></button>
                                    </div>
                                </form>
                            </li>
                            <li class="nav-item header-navbar-item header-cart">
                                <a href="/cart/" class="header-link header-cart-link">
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