<head>
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/site_css/home.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/site_css/category.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/root.css">
    <style>
    .search__products--container {
        width: 100%;
        margin-top: 30px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .search__products--container>.search__title {
        text-align: left;
        margin: 1.5rem 0;
    }

    @media only screen and (max-width: 430px) {
        .search_img-fixed>img {
            height: 30% !important;
        }

        .search__products--container>.search__title {
            text-align: center;
            margin: 1.5rem 5%;
            font-size: 17px;
        }

        .container-search {
            margin: 0 5% !important;
        }

        .btn_page-search {
            padding: 0.5rem 5%;
        }

        .row_pd-search>li {
            flex-basis: 49% !important;
        }
    }
    </style>
</head>

<body>
    <div class="background_header search_img-fixed">
        <img style="width: 100%; height: 50%; position: absolute; z-index: -10; top: 0;"
            src="<?= $CONTENT_URL ?>/imgs/interface/background.png" alt="">
    </div>
    <div class="search__content">
        <div class="title__sign-in">
            <h1>Tìm kiếm</h1>
            <div class="title_link">
                <a style="color: #fff;" href="<?= $SITE_URL ?>/homepage">Home</a> <i
                    class="fa-solid fa-arrow-right-long"></i> Tìm kiếm
            </div>
        </div>
        <div class="search__products--container">
            <div class="search__title">
                <h2>Kết quả tìm kiếm cho: "<?= $search ?>"</h2>
                <?php if ($total_products != 0) { ?>
                <small>Có <?= $total_products ?> sản phẩm tương ứng</small>
                <?php } ?>
            </div>
            <div style="margin: 0 10%;" class="container-search">
                <div class="product__container">
                    <div class="btn_page btn_page-search">
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
                    <ul class="row-3 row_pd-search">
                        <?php
                        if ($total_products == 0) {
                            echo "Không có sản phẩm tương ứng";
                        }
                        ?>
                        <?php foreach ($product_list as $row_product) {
                            $imgs__product = product_selectImgs($row_product['id_product']);
                            $discount_product = $row_product['price'] + $row_product['price'] * ($row_product['sale_off'] / 100);
                        ?>
                        <li style="flex-basis: 24%;">
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
                                <button class="cart">ADD VÀO GIỎ</button>
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
                    <div class="btn_page btn_page-search">
                        <?php
                        echo createMultiPage($base_url, $total_products, $page_num, $page_size);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= $CONTENT_URL ?>/js/category.js"></script>
</body>