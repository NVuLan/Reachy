<?php
if (isset($_GET['id_category'])) $id_category = $_GET['id_category'];
$sql_category = category_selectAll();
$sql_categoryOne = category_selectOne($id_category);
$sql_brand = brand_selectAll_byCateId($id_category);
$sql_deal = product_select_AllSaleOff();
$currentUrl = getCurrentUrl();
$sql_total_product = "SELECT * FROM product";
?>
<?php
if (isset($_GET['page_num'])) {
    $page_num = $_GET['page_num'];
    $currentUrl = explode('&page_num=', getCurrentUrl());
    $currentUrl = $currentUrl[0];
}
?>
<!-- Lọc theo loại hàng -->
<?php
$page_size = 9;
if (isset($_GET['page_num'])) $page_num = $_GET['page_num'] + 0;
else $page_num = 1;
if ($page_num <= 0) $page_num = 1;
$base_url = "$SITE_URL/homepage/?category&id_category=$id_category";
$sql_total_product .= " WHERE id_category = $id_category";
?>
<!-- Lọc thêm thương hiệu -->
<?php
if (isset($_GET['id_brand'])) {
    $id_brand = $_GET['id_brand'];
    $currentUrl = explode('&id_brand=', $currentUrl);
    $currentUrl = $currentUrl[0] . substr($currentUrl[1], strlen($id_brand));
    $base_url = $currentUrl . "&id_brand=$id_brand";
    $sql_total_product .= " AND id_brand = $id_brand";
    global $id_brand;
};
?>
<!-- Lọc thêm giá tiền -->
<?php
if (isset($_GET['price'])) {
    $price_breakpoint = $_GET['price'];
    $currentUrl = explode('&price=', $currentUrl);
    $currentUrl = $currentUrl[0] . substr($currentUrl[1], strlen($price_breakpoint));
    $base_url = $currentUrl  . "&price=$price_breakpoint";
    if ($price_breakpoint == 0) {
        $sql_total_product .= " AND price < 500000";
    } else if ($price_breakpoint == 1) {
        $sql_total_product .= " AND 500000 < price AND price < 1000000";
    } else if ($price_breakpoint == 2) {
        $sql_total_product .= " AND 1000000 < price AND price < 2000000";
    } else if ($price_breakpoint == 3) {
        $sql_total_product .= " AND 2000000 < price AND price < 5000000";
    } else if ($price_breakpoint == 4) {
        $sql_total_product .= " AND price > 5000000";
    }
}
?>
<!-- Xử lí sắp xếp sản phẩm -->
<?php
if (isset($_POST['sort'])) {
    $sortProduct = $_POST['sort'];
    if ($sortProduct === "banChay") {
        $sql_total_product = str_replace("WHERE", "HAVING", $sql_total_product);
        $sql_total_product = str_replace(
            "SELECT * FROM product",
            "SELECT product.* FROM product JOIN bill_detail ON product.id_product = bill_detail.id_product GROUP BY bill_detail.id_product",
            $sql_total_product
        );
        $sql_total_product .= " ORDER BY (COUNT(bill_detail.id_product)*bill_detail.amount)";
    } else if ($sortProduct === "tenAZ") {
        $sql_total_product .= " ORDER BY name";
    } else if ($sortProduct === "tenZA") {
        $sql_total_product .= " ORDER BY name DESC";
    } else if ($sortProduct === "giaGiam") {
        $sql_total_product .= " ORDER BY price DESC";
    } else if ($sortProduct === "giaTang") {
        $sql_total_product .= " ORDER BY price";
    } else if ($sortProduct === "spMoi") {
        $sql_total_product .= " ORDER BY date DESC";
    } else if ($sortProduct === "spCu") {
        $sql_total_product .= " ORDER BY date";
    }
}
?>
<!-- Xuất danh sách sản phẩm tương ứng -->
<?php
$total_products = count(pdo_query($sql_total_product));
$sql_product = getRowInPageBySql($sql_total_product, $page_num, $page_size);
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/site_css/form.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/site_css/home.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/site_css/category.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/root.css">
</head>

<body>
    <div class="background_header cate_img-fixed">
        <img style="width: 100%; height: 50%; position: absolute; z-index: -10; top: 0;"
            src="<?= $CONTENT_URL ?>/imgs/interface/background.png" alt="">
    </div>
    <div class="category__container">
        <div class="title__sign-in">
            <h1>Danh Mục</h1>
            <div class="title_link">
                <a style="color: #fff;" href="<?= $SITE_URL ?>/homepage">Home</a> <i
                    class="fa-solid fa-arrow-right-long"></i> <?= $sql_categoryOne['name'] ?>
            </div>
        </div>
        <div class="category_content">
            <div class="category__content-left">
                <div class="category__details">
                    <h3>Danh Mục</h3>
                    <ul class="category__detail">
                        <?php foreach ($sql_category as $row_category) { ?>
                        <li>
                            <a <?php if (exist_param('id_category') && $_GET['id_category'] == $row_category['id_category']) echo "style='color: var(--blue) ;'" ?>
                                href="<?= $SITE_URL ?>/homepage/?category&id_category=<?= $row_category['id_category'] ?>">
                                <?= $row_category['name'] ?>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="category__details">
                    <h3>Thương Hiệu</h3>
                    <ul class="category__detail">
                        <?php if (count($sql_brand) == 0) echo "Không có thương hiệu"; ?>
                        <?php foreach ($sql_brand as $row_sql_brand) { ?>
                        <li>
                            <a <?php if (exist_param('id_brand') && $_GET['id_brand'] == $row_sql_brand['id_brand']) echo "style='color: var(--blue) ;'" ?>
                                href="<?= $currentUrl ?>&id_brand=<?= $row_sql_brand['id_brand'] ?>">
                                <?= $row_sql_brand['name'] ?>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="category__details">
                    <h3>Giá</h3>
                    <ul class="category__detail">
                        <?php if (isset($id_brand)) $currentUrl .= "&id_brand=$id_brand"; ?>
                        <li>
                            <a <?php if (exist_param('price') && $_GET['price'] == 0) echo "style='color: var(--blue) ;'" ?>
                                href="<?= $currentUrl ?>&price=0">
                                Dưới 500,000đ
                            </a>
                        </li>
                        <li>
                            <a <?php if (exist_param('price') && $_GET['price'] == 1) echo "style='color: var(--blue) ;'" ?>
                                href="<?= $currentUrl ?>&price=1">
                                500,000đ - 1,000,000đ
                            </a>
                        </li>
                        <li>
                            <a <?php if (exist_param('price') && $_GET['price'] == 2) echo "style='color: var(--blue) ;'" ?>
                                href="<?= $currentUrl ?>&price=2">
                                1,000,000đ - 2,000,000đ
                            </a>
                        </li>
                        <li>
                            <a <?php if (exist_param('price') && $_GET['price'] == 3) echo "style='color: var(--blue) ;'" ?>
                                href="<?= $currentUrl ?>&price=3">
                                2,000,000đ - 5,000,000đ
                            </a>
                        </li>
                        <li>
                            <a <?php if (exist_param('price') && $_GET['price'] == 4) echo "style='color: var(--blue) ;'" ?>
                                href="<?= $currentUrl ?>&price=4">
                                Trên 5,000,000đ
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="category__content-right">
                <div class="product__container">
                    <div class="btn_page">
                        <form action="" method="POST" id="sort__form">
                            <select class="product__sort" name="sort" id="product__sort">
                                <option value="">Sắp xếp mặc định</option>
                                <option
                                    <?php if (isset($_POST['sort']) && $_POST['sort'] === 'banChay') echo 'selected' ?>
                                    value="banChay">Sản phẩm bán chạy</option>
                                <option
                                    <?php if (isset($_POST['sort']) && $_POST['sort'] === 'tenAZ') echo 'selected' ?>
                                    value="tenAZ">Theo bảng chữ cái từ A - Z</option>
                                <option
                                    <?php if (isset($_POST['sort']) && $_POST['sort'] === 'tenZA') echo 'selected' ?>
                                    value="tenZA">Theo bảng chữ cái từ Z - A</option>
                                <option
                                    <?php if (isset($_POST['sort']) && $_POST['sort'] === 'giaGiam') echo 'selected' ?>
                                    value="giaGiam">Giá từ cao đến thấp</option>
                                <option
                                    <?php if (isset($_POST['sort']) && $_POST['sort'] === 'giaTang') echo 'selected' ?>
                                    value="giaTang">Giá từ thấp đến cao</option>
                                <option
                                    <?php if (isset($_POST['sort']) && $_POST['sort'] === 'spMoi') echo 'selected' ?>
                                    value="spMoi">Sản phẩm mới nhất</option>
                                <option <?php if (isset($_POST['sort']) && $_POST['sort'] === 'spCu') echo 'selected' ?>
                                    value="spCu">Sản phẩm cũ nhất</option>
                            </select>
                        </form>
                        <?php
                        echo createMultiPage($base_url, $total_products, $page_num, $page_size);
                        ?>

                    </div>
                    <ul class="row-3">
                        <?php
                        if ($total_products == 0) {
                            echo "Hết hàng";
                        }
                        ?>
                        <?php foreach ($sql_product as $row_product) {
                            $imgs__product = product_selectImgs($row_product['id_product']);
                            $discount_product = $row_product['price'] + $row_product['price'] * ($row_product['sale_off'] / 100);
                        ?>
                        <li>
                            <div class="product__selection-top">
                                <a href="index.php?page=product&product_id=<?= $row_product['id_product'] ?>" target="">
                                    <a href="<?= $SITE_URL ?>/product?product&id_product=<?= $row_product['id_product'] ?>"
                                        target="">
                                        <img src="<?= $CONTENT_URL ?>/imgs/products/<?= $imgs__product['contain'] ?>"
                                            alt="">
                                    </a>
                                    <div class="stick_top">
                                        <span class="sale">-<?= $row_product['sale_off'] ?>%</span>
                                        <span class="new">NEW</span>
                                    </div>
                            </div>
                            <div class="btn_add-buy">
                                <button name="btn_addCart" class="cart">
                                    <span class="add-to-cart">THÊM VÀO GIỎ</span>
                                    <span class="added">ĐÃ THÊM</span>
                                    <i class="fa fa-shopping-cart"></i> <i class="fa fa-square"></i>
                                </button>
                                <button class="buy">MUA NGAY</button>
                            </div>
                            <div class="product__selection-info">
                                <h4 class="product__name"><?= $row_product['name'] ?></h4>
                                <div class="product__price"><?= number_format($row_product['price']) ?>₫
                                    <span><?= number_format(round($discount_product, -4)) ?>₫</span>
                                </div>
                            </div>
                            <div class="product__selection-tools">
                                <div class="tools">
                                    <i class="hover_tools tooltip">
                                        <a href="index.php?page=product&product_id=">
                                            <ion-icon name="eye-outline"></ion-icon>
                                        </a>
                                        <span class="tooltiptext">Xem chi tiết</span>
                                    </i>
                                    <i class="hover_tools tooltip">
                                        <ion-icon name="heart-outline"></ion-icon>
                                        <span class="tooltiptext">Yêu thích</span>
                                    </i>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                    <div class="btn_page">
                        <!-- <select class="product__sort" name="" id="">
                            <option value="">Sắp xếp mặc định</option>
                            <option value="">Sản phẩm bán chạy</option>
                            <option value="">Theo bảng chữ cái từ A - Z</option>
                            <option value="">Theo bảng chữ cái từ Z - A</option>
                            <option value="">Giá từ cao đến thấp</option>
                            <option value="">Giá từ thấp đến cao</option>
                            <option value="">Sản phẩm mới nhất</option>
                            <option value="">Sản phẩm cũ nhất</option>
                        </select> -->
                        <?php
                        echo createMultiPage($base_url, $total_products, $page_num, $page_size);
                        ?>

                    </div>
                </div>

            </div>
        </div>
        <div class="deal__week-area">
            <div class="deal__week-title">
                <h1>Ưu Đãi Trong Tuần</h1>
            </div>
            <div class="deal__week-container">
                <ul class="deal__week-content">
                    <?php foreach ($sql_deal as $row_deal) {
                        $imgs_deal = product_selectImgs($row_deal['id_product']);
                        $discount_deal = $row_deal['price'] + $row_deal['price'] * ($row_deal['sale_off'] / 100);
                    ?>
                    <li>
                        <a href="<?= $SITE_URL ?>/product?product&id_product<?= $row_deal['id_product'] ?>">
                            <img src="<?= $CONTENT_URL ?>/imgs/products/<?= $imgs_deal['contain'] ?>" alt="">
                        </a>
                        <div class="deal__info">
                            <h3><?= $row_deal['name'] ?></h3>
                            <div class="deal__price">
                                <?= number_format($row_deal['price']) ?>đ
                                <small><?= number_format(round($discount_deal, -4)) ?>đ</small>
                            </div>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
                <div class="deal__banner"><img src="<?= $CONTENT_URL ?>/imgs/interface/deal_week.png" alt=""></div>
            </div>
        </div>
    </div>
    <script src="<?= $CONTENT_URL ?>/js/category.js"></script>
    <script src="<?= $CONTENT_URL ?>/js/cart.js"></script>
</body>