<?php
add_session('productLink', getCurrentUrl());
?>
<?php
$sql_deal = product_select_AllSaleOff();
if (isset($_GET['id_product'])) {
    $id_product = $_GET['id_product'];
    $specification = product_select_specification($id_product);
    $sql_product = product_selectOne($id_product);
    $discount_product = $sql_product['price'] + $sql_product['price'] * ($sql_product['sale_off'] / 100);
}
$sql_category = category_selectOne($sql_product['id_category']);
$sql_brand = brand_selectOne($sql_product['id_brand']);
$sql_imgs = product_selectArrayImgs($id_product);
$ratingList = product_selectAllRating($id_product);
// foreach ($sql_imgs as $row_imgs) {
//     print_r($contain);
//     print_r($sql_imgs['contain']);
// }
?>
<!-- COMMENT -->
<?php
$comments = comment_selectByIdProduct($_GET['id_product']);
?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/site_css/home.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/site_css/form.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/site_css/product-detail.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/root.css">
</head>

<body>
    <div class="background_header pd_img-fixed">
        <img style="width: 100%; height: 50%; position: absolute; z-index: -10; top: 0;"
            src="<?= $CONTENT_URL ?>/imgs/interface/background.png" alt="">
    </div>
    <section class="product__detail-container">
        <div class="title__sign-in">
            <h1>Chi Tiết</h1>
            <div class="title_link">
                <a style="color: #fff;" href="<?= $SITE_URL ?>/homepage">Home</a>
                <i class="fa-solid fa-arrow-right-long"></i> <a href=""><?= $sql_category['name'] ?></a>
                <i class="fa-solid fa-arrow-right-long"></i> <a href=""><?= $sql_brand['name'] ?></a>
                <i class="fa-solid fa-arrow-right-long"></i> <?= $sql_product['name'] ?>
            </div>
        </div>

        <div class="product__detail-content">
            <div class="product__detail-left">
                <div id="slide">
                    <?php foreach ($sql_imgs as $row_imgs) {
                        extract($row_imgs);
                    ?>
                    <div class="item">
                        <img src="<?= $CONTENT_URL ?>/imgs/products/<?= $contain ?>" alt="<?= $sql_product['name'] ?>">
                    </div>
                    <?php } ?>
                </div>

                <div class="buttons">
                    <button id="prev"><i class="fa-solid fa-angle-left"></i></button>
                    <button id="next"><i class="fa-solid fa-angle-right"></i></button>
                </div>
            </div>
            <div class="product__detail-right">
                <div class="product__detail-top">
                    <h1><?= $sql_product['name'] ?></h1>
                    <span>MSP: <?= $sql_product['id_product'] ?></span>
                    <h1><?= number_format($sql_product['price'] * (100 - $sql_product['sale_off']) / 100) ?>đ <small
                            style="text-decoration: line-through;"><?= number_format($sql_product['price']) ?>đ</small>
                    </h1>
                    <hr>
                </div>
                <div class="product__detail-bottom">
                    <form action="handle_product-detail.php" method="POST" target="frame">
                        <?php if (product_checkSizeExist($sql_product['id_product'])) {
                            $product_size = product_checkSizeExist($sql_product['id_product']);
                        ?>
                        <div class="product-size">
                            <?php $check_status = "";
                                for ($i = 36; $i < 43; $i++) { ?>
                            <div class="col-size">
                                <input <?php if ($product_size[$i] == 0) echo "disabled" ?> <?php if ($product_size[$i] != 0 && $check_status != "done") {
                                                                                                        if ($i == 36) {
                                                                                                            echo "checked";
                                                                                                            $check_status = "done";
                                                                                                        } else if ($i == 37) {
                                                                                                            echo "checked";
                                                                                                            $check_status = "done";
                                                                                                        } else if ($i == 38) {
                                                                                                            echo "checked";
                                                                                                            $check_status = "done";
                                                                                                        } else if ($i == 39) {
                                                                                                            echo "checked";
                                                                                                            $check_status = "done";
                                                                                                        } else if ($i == 40) {
                                                                                                            echo "checked";
                                                                                                            $check_status = "done";
                                                                                                        } else if ($i == 41) {
                                                                                                            echo "checked";
                                                                                                            $check_status = "done";
                                                                                                        } else if ($i == 42) {
                                                                                                            echo "checked";
                                                                                                            $check_status = "done";
                                                                                                        }
                                                                                                    }; ?> type="radio"
                                    name="size" value="<?= $i ?>" hidden id="s<?= $i ?>">
                                <label for="s<?= $i ?>"><?= $i ?></label>
                            </div>
                            <?php } ?>
                        </div>
                        <?php } ?>
                        <div class="product-count">
                            <button type="button" id="btn_descreaseQuantityProduct">
                                <span class="material-symbols-outlined">
                                    remove
                                </span>
                            </button>
                            <input type="number" name="quantity" value="1" class="product_quantity" min="1">
                            <button type="button" id="btn_increaseQuantityProduct">
                                <span class="material-symbols-outlined">
                                    add
                                </span>
                            </button>
                        </div>
                        <?php if ($sql_product['in_stock'] == 1) { ?>
                        <small style="color: green;">Còn hàng</small> <br>
                        <?php } else { ?>
                        <small style="color: gray;">Hết hàng</small> <br>
                        <?php } ?>
                        <div class="product-tool">
                            <input type="hidden" name="id_product" value="<?= $sql_product['id_product'] ?>">
                            <button name="btn_buy"
                                <?php if ($sql_product['in_stock'] == 0) echo "disabled style='cursor: not-allowed' "; ?>>
                                <div class="btn_submit">
                                    <div style="margin-top: 0;" class="btn_submit-border">
                                        MUA NGAY
                                        <span></span><span></span><span></span><span></span>
                                    </div>
                                </div>
                            </button>
                            <button style="margin: 0 0.5rem;" id="add_cart" name="btn_addCart" class="cart-cir">
                                <span class="add-to-cart"><i class="fa-solid fa-cart-shopping"></i></span>
                                <span class="added"><i class="fa-solid fa-cart-shopping"></i></span>
                                <i class="fa fa-shopping-cart"></i> <i class="fa fa-square"></i>
                            </button>
                            <a href="<?= $SITE_URL ?>/product/handle_addWishList.php?id_product=<?= $sql_product['id_product'] ?>"
                                target="frame" id="btn_like">
                                <?php if (isset($_SESSION['login']) && product_checkLiked($sql_product['id_product'], $_SESSION['login'])) { ?>
                                <span id="like_span" style="color:red ;" class="material-icons-outlined"
                                    data-status="liked"> favorite </span>
                                <?php } else { ?>
                                <span id="like_span" class="material-icons-outlined" data-status="none"> favorite_border
                                </span>
                                <?php } ?>
                            </a>
                        </div>

                        <p> <?= $sql_product['feature'] ?> </p>
                        <div class="product__bottom-bh">
                            <ul style="font-weight: 700;" class="product_content-bh">
                                <li>- Hàng chính hãng</li>
                                <li>- Giao hàng Toàn Quốc</li>
                                <li>- Thanh Toán khi nhận hàng</li>
                                <li>- Bảo hành chính hãng trọn đời sản phẩm</li>
                                <li>- Bảo hành keo , chỉ trọn đời sản phẩm</li>
                                <li>- Giao hàng Nhanh 60p tại Sài Gòn</li>
                            </ul>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="product__tabs-container">
        <div class="tabs">
            <button class="tablinks active" data-electronic="description">Mô Tả</button> <br>
            <button class="tablinks" data-electronic="pd_detail">Chi Tiết</button>
            <button class="tablinks" data-electronic="comment">Bình luận</button>
            <button class="tablinks" data-electronic="rate">Đánh giá</button>
        </div>
        <div class="wrapper_tabcontent">
            <div id="description" class="tabcontent active">
                <p>
                    <?= $sql_product['description'] ?>
                </p>
            </div>
            <div id="pd_detail" class="tabcontent">
                <h3>Chi tiết</h3>
                <table class="pd_detail-content">
                    <tr class="pd_detail-row">
                        <td>Chiều dài</td>
                        <td><?= $specification['width'] ?>mm</td>
                    </tr>
                    <tr class="pd_detail-row">
                        <td>Chiều rộng</td>
                        <td><?= $specification['height'] ?>mm</td>
                    </tr>
                    <tr class="pd_detail-row">
                        <td>Chiều cao</td>
                        <td><?= $specification['dept'] ?>mm</td>
                    </tr>
                    <tr class="pd_detail-row">
                        <td>Cân nặng</td>
                        <td><?= $specification['weight'] ?>gm</td>
                    </tr>
                    <tr class="pd_detail-row">
                        <td>Kiểm tra hàng</td>
                        <td><?php if ($specification['quality_checking'] == 1) echo "Cho phép kiểm hàng";
                            else echo "Không"; ?></td>
                    </tr>
                    <tr class="pd_detail-row">
                        <td>Bảo hành</td>
                        <td><?= $specification['insurance'] ?></td>
                    </tr>
                </table>
            </div>
            <!-- bình luận -->
            <div id="comment" class="tabcontent">
                <div class="box_container">
                    <div class="content_box">
                        <?php foreach ($comments as $comment_row) {
                            $user = user_selectById($comment_row['id_user']);
                        ?>
                        <div class="comment-row">
                            <div class="user-info">
                                <div class="user-info-left">
                                    <img src="<?= $CONTENT_URL ?>/imgs/user/<?= $user['img'] ?>" alt="Ảnh đại diện">
                                    <div class="user-name">
                                        <h3><?= $user['name'] ?></h3>
                                        <i><?= $comment_row['date'] ?></i>
                                    </div>
                                </div>
                                <?php if ($user['role'] == 1 || $user['role'] == 2) { ?>
                                <div class="user-reply">
                                    <button>Trả lời</button>
                                </div>
                                <?php } ?>
                            </div>
                            <p><?= $comment_row['content'] ?></p>
                        </div>
                        <?php } ?>
                    </div>
                    <?php if (isset($_SESSION['login'])) { ?>
                    <form action="handle_comment.php" method="POST" class="comment_form">
                        <h1>Bình Luận</h1>
                        <textarea name="message" id="" cols="30" rows="5" placeholder="Nội dung" required></textarea>
                        <input type="hidden" name="id_product" value="<?= $sql_product['id_product'] ?>">
                        <button name="btn_uploadComment" type="submit">
                            <div class="btn_submit">
                                <div class="btn_submit-border">
                                    ĐĂNG
                                    <span></span><span></span><span></span><span></span>
                                </div>
                            </div>
                        </button>
                    </form>
                    <?php } else { ?>
                    <div>
                        <h2>Bạn chưa đăng nhập vui lòng đăng nhập để có thể bình luận</h2>
                        <a href="<?= $SITE_URL ?>/user?sign_in">
                            <div style="width: 50%; margin: 0 auto;" class="btn_submit">
                                <div class="btn_submit-border">
                                    ĐĂNG NHẬP
                                    <span></span><span></span><span></span><span></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <!-- Đánh giá -->
            <div id="rate" class="tabcontent">

                <div style="display: block; width: 100%;" class="box_container">

                    <div style="display: flex;" class="content_box">
                        <div style="width: 50%;" class="overall-container">
                            <div class="overall-left">
                                <h2>Tổng Đánh Giá</h2>
                                <strong>5.0</strong> <br>
                                <span>(04 Đánh giá)</span>
                            </div>
                            <div class="overall-right">
                                <h4 style="margin: 0;">Tất cả đánh giá</h4>
                                <ul class="rate-all">
                                    <li>
                                        5 Sao
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        01
                                    </li>
                                    <li>
                                        4 Sao
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-regular fa-star"></i> 01
                                    </li>
                                    <li>
                                        3 Sao
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i> 01
                                    </li>
                                    <li>
                                        2 Sao
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        01
                                    </li>
                                    <li>
                                        1 Sao
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        01
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <?php foreach ($ratingList as $rating) {
                            $user = user_selectById($rating['id_user']);
                        ?>
                        <div style="width: 50%; padding-left: 4rem;" class="rating-row">
                            <div class="user-info">
                                <div class="user-info-left">
                                    <img src="<?= $CONTENT_URL ?>/imgs/user/<?= $user['img'] ?>" alt="">
                                    <div class="user-name">
                                        <h3><?= $user['name'] ?></h3>
                                        <div class="user-rate">
                                            <?php for ($i = 0; $i < $rating['rating']; $i++) { ?>
                                            <i class="fa-solid fa-star"></i>
                                            <?php } ?>
                                            <?php for ($i = 0; $i < 5 - $rating['rating']; $i++) { ?>
                                            <i class="fa-regular fa-star"></i>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <p><?= $rating['content'] ?></p>
                        </div>
                        <?php } ?>




                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="deal__week-area">
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
                    <a href="<?= $SITE_URL ?>/product?product&id_product=<?= $row_deal['id_product'] ?>">
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
    </section>
    </div>
    <iframe name="frame" hidden></iframe>
    <script src="<?= $CONTENT_URL ?>/js/slide_product.js"></script>
    <script src="<?= $CONTENT_URL ?>/js/tabs.js"></script>
    <script src="<?= $CONTENT_URL ?>/js/product_detail.js"></script>
    <?php if (isset($_SESSION['message'])) { ?>
    <script>
    alert("<?= $_SESSION['message']; ?>")
    </script>

    <?php unset($_SESSION['message']);
    } ?>
    <?php if (isset($_SESSION['login'])) { ?>
    <script>
    const btn_like = document.querySelector("#btn_like");
    btn_like.addEventListener(
        "click",
        function() {
            const span_like = document.querySelector("#like_span");
            if (span_like.innerHTML == "favorite") {
                span_like.innerText = "favorite_border";
                span_like.style.color = "var(--blue)";
                // span_like.style.border = "3px solid var(--blue)";
            } else {
                span_like.innerText = "favorite";
                span_like.style.color = "red";
                // span_like.style.border = "3px solid red";
            }
        }
    )
    </script>
    <?php } ?>
    <script>
    let amount_cart = document.getElementById("cart_quantity");
    const btn_cart = document.getElementById("add_cart").addEventListener(
        "click",
        function() {
            amount_cart.innerHTML++;
        })
    </script>
    <script>
    const cartButtons = document.querySelectorAll('.cart-cir');

    cartButtons.forEach(button => {

        button.addEventListener('click', cartClick);

    });

    function cartClick() {
        let button = this;
        button.classList.toggle('clicked');
    }
    </script>
</body>

</html>