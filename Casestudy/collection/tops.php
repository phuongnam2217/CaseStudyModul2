<?php include __DIR__ . "/../database/database.php";
session_start();
include __DIR__ . "/../cart/add-cart.php";
// Product Tops
// $getProductTop = "SELECT * FROM products WHERE product_line = 'Tops';";
// $stmt = $pdo->query($getProductTop);
// $productTop = $stmt->fetchAll();
// Tìm tổng số record
$result = "SELECT count(product_id) as total FROM products WHERE product_line = 'Tops';";
$row = $pdo->query($result);
$row = $row->fetch();
$total_records = $row['total'];
// BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 10;
// BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
// tổng số trang
$total_page = ceil($total_records / $limit);
// Giới hạn current_page trong khoảng 1 đến total_page
if ($current_page > $total_page) {
    $current_page = $total_page;
} else if ($current_page < 1) {
    $current_page = 1;
}
// Tìm Start
$start = ($current_page - 1) * $limit;
// BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
// Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
$getProductTop = "SELECT * FROM products WHERE product_line = 'Tops' LIMIT $start, $limit;";
$stmt = $pdo->query($getProductTop);
$productTop = $stmt->fetchAll();
?>
<?php include __DIR__ . "/../layout/header.php"; ?>
<div class="content">
    <div class="grid">
        <div class="layout-arrival">
            <hr>
            <div class="arrival-product">
                <?php foreach ($productTop as $value) : ?>
                    <div class="col-md-3 col-sm-6 col-xs-6 product-column">
                        <div class="product-top">
                            <a href="/products/<?= $value['slug'] ?>" class="product-link">
                                <img class="product-img image1" src="<?= $value['image1'] ?>" alt="">
                                <img class="product-img image2" src="<?= $value['image2'] ?>" alt="">
                            </a>
                            <div class="product-img-btn" id="img-btn">
                                <a href="tops.php?id=<?= $value['product_id'] ?>" class="ajax-cart">Add to card</a>
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
            <div class="pagination">
                <?php if ($current_page > 1 && $total_page > 1) : ?>
                    <a class="btn btn-outline-primary pagination-btn" href="tops.php?page=<?= $current_page - 1 ?>">Prev</a>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $total_page; $i++) : ?>
                    <?php if ($i == $current_page) : ?>
                        <span><a class="btn btn-outline-primary pagination-btn" href="tops.php?page=<?= $i ?>"><?= $i ?></a></span>
                    <?php else : ?>
                        <a class="btn btn-outline-primary pagination-btn" href="tops.php?page=<?= $i ?>"><?= $i ?></a>
                    <?php endif; ?>
                <?php endfor; ?>
                <?php if ($current_page < $total_page && $total_page > 1) : ?>
                    <a class="btn btn-outline-primary pagination-btn" href="tops.php?page=<?= $current_page + 1 ?>">Next</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . "/../layout/footer.php"; ?>