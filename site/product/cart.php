<?php
if (isset($_SESSION['login'])) {
    $carts = cart_selectByUserId($_SESSION['login']);
} else {
    echo '<script> alert("Hãy đăng nhập để sử dụng chức năng");</script>';
    $carts = array();
}
add_session("lasted_url", getCurrentUrl());
?>

<head>
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/site_css/cart.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/site_css/home.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/site_css/form.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/root.css">

</head>

<body>
    <div class="background_header">
        <img style="width: 100%; height: 50%; position: absolute; z-index: -10; top: 0;"
            src="<?= $CONTENT_URL ?>/imgs/interface/background.png" alt="">
    </div>
    <div class="title__sign-in">
        <h1>Giỏ Hàng</h1>
        <div class="title_link">
            <a style="color: #fff;" href="<?= $SITE_URL ?>/homepage">Home</a>
            <i class="fa-solid fa-arrow-right-long"></i>Giỏ hàng
        </div>
    </div>
    <section style="margin-bottom: 4rem; display: flex;" class="cart__container">
        <div class="cart__main">
            <span style="margin-bottom: 0.5rem;">Bạn có <?= count($carts) ?> sản phẩm trong giỏ hàng </span>
            <?php foreach ($carts as $cart) {
                $product_img = product_selectImgs($cart['id_product']);
                $product = product_selectOne($cart['id_product']);
            ?>
            <li class="cart-row">
                <input class="id_cart" type="hidden" readonly value="<?=$cart['id_cart']?>">
                <form action="handle_cart.php" method="POST" target="frame">
                    <div class="group">
                        <input type="checkbox" class="cart_selecter" name="cart_selecter">
                        <input type="hidden" name="id_cart" value="<?= $cart['id_cart'] ?>">
                        <input type="hidden" name="id_product" value="<?= $cart['id_product'] ?>">
                        <div style="margin-right: 1rem;" class="cart__product-img">
                            <img style="width: 5rem;"
                                src="<?= $CONTENT_URL ?>/imgs/products/<?= $product_img['contain'] ?>" alt="">
                        </div>
                        <div class="cart__product-info">
                            <h4 style="margin-bottom: 5px; margin-top: 0;"><a
                                    href="<?= $SITE_URL ?>/product/?product&id_product=<?= $cart['id_product'] ?>"><?= $product['name'] ?></a>
                            </h4>
                            <select name="size" id="" class="size_selecter">
                                <option <?php if ($cart['size'] == "36") echo "selected" ?> value="36">Size 36</option>
                                <option <?php if ($cart['size'] == "37") echo "selected" ?> value="37">Size 37</option>
                                <option <?php if ($cart['size'] == "38") echo "selected" ?> value="38">Size 38</option>
                                <option <?php if ($cart['size'] == "39") echo "selected" ?> value="39">Size 39</option>
                                <option <?php if ($cart['size'] == "40") echo "selected" ?> value="40">Size 40</option>
                                <option <?php if ($cart['size'] == "41") echo "selected" ?> value="41">Size 41</option>
                                <option <?php if ($cart['size'] == "42") echo "selected" ?> value="42">Size 42</option>
                            </select>
                        </div>
                    </div>
                    <div class="product-count">
                        <button type="button" name="btn_quantity" class="btn_descreaseQuantityProduct">
                            <span class="material-symbols-outlined">
                                remove
                            </span>
                        </button>
                        <input type="number" name="quantity" class="product_quantity" value="<?= $cart['quantity'] ?>">
                        <button type="button" name="btn_quantity" class="btn_increaseQuantityProduct">
                            <span class="material-symbols-outlined">
                                add
                            </span>
                        </button>
                    </div>
                    <div class="cart-price">
                        <?php if ($product['sale_off'] != 0) { ?>
                        <span class="cart_currentPrice"
                            data-value="<?= $product['price'] * (100 - $product['sale_off']) / 100 ?>"><?= number_format($product['price'] * (100 - $product['sale_off']) / 100) ?>đ
                        </span><br>
                        <small style="text-decoration: line-through;"><?= number_format($product['price']) ?></small>
                        <?php } else { ?>
                        <span class="cart_currentPrice"
                            data-value="<?= $product['price'] ?>"><?= number_format($product['price']) ?>đ </span>
                        <?php } ?>
                    </div>
                    <div class="cart-total">
                        <span style="font-size: 18px; font-weight: 600;">Thành tiền: <br> <strong
                                class="cart_totalPrice" style="font-size: 20px;color: darkred; "></strong><strong
                                style="font-size: 20px;color: darkred; ">đ</strong></span> <br>
                        <a class="btn_delete" href="handle_cart.php?id_cart=<?= $cart['id_cart'] ?>" target="frame"><i
                                class="fa-solid fa-trash-can"></i></a>
                    </div>
                </form>
            </li>
            <?php } ?>

            <a href="<?= $SITE_URL ?>/homepage">
                <button type=" submit">
                    <div class="btn_submit">
                        <div class="btn_submit-border">
                            Tiếp tục mua hàng
                            <span></span><span></span><span></span><span></span>
                        </div>
                    </div>
                </button>
            </a>
        </div>
        <div class="cart_pay">
            <li>
                <h4 style="margin: 0;">Thông tin đơn hàng</h4>
            </li>
            <li>Tổng tiền: <span id="cart_finalPrice" style="float: right; font-weight: 700;" data-value="0">0đ</span>
            </li>
            <li>Bạn có thể nhập mã giảm giá ở trang thanh toán</li>
            <form id="cart_form" action="handle_cart.php" method="POST" target="frame"></form>
            <button id="btn_cart_submit" type="submit">
                <div class="btn_submit">
                    <div class="btn_submit-border">
                        THANH TOÁN
                        <span></span><span></span><span></span><span></span>
                    </div>
                </div>
            </button>
        </div>
    </section>
    <iframe name="frame" hidden></iframe>
    <script src="<?= $CONTENT_URL ?>/js/cart.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var scrollpos = sessionStorage.getItem('scrollpos');
        if (scrollpos) {
            window.scrollTo(0, scrollpos);
            sessionStorage.removeItem('scrollpos');
        }
    });

    window.addEventListener("beforeunload", function(e) {
        sessionStorage.setItem('scrollpos', window.scrollY);
    });
    </script>
</body>