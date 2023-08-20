<?php
if (isset($_GET['id_bill'])) {
    $bill = bill_selectOne($_GET['id_bill']);
    // print_r($bill);
}
?>

<head>
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/site_css/order.css">
</head>

<body>
    <div class="ordered_container">
        <div class="ordered">
            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
            </svg>
            <h2>Đặt hàng thành công</h2>
            <small>Xem đơn hàng <a style="color: darkturquoise;" href="<?= $SITE_URL ?>/user/?info">tại
                    đây</a></small>
        </div>
    </div>
</body>