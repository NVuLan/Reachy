<?php
session_start();
require '../../global.php';
require_once "../../dao/pdo.php";
require_once "../../dao/user.php";
require_once "../../dao/category.php";
require_once "../../dao/brand.php";
require_once "../../dao/product.php";
require_once "../../dao/comment.php";
require_once "../../dao/cart.php";
require_once "../../dao/bill.php";
if (exist_param("product")) {
    $VIEW_NAME = "product/product-detail.php";
} else if (exist_param("cart")) {
    if (isset($_SESSION['login'])) {
        $VIEW_NAME = "product/cart.php";
    } else {
        header("location:../../index.php");
    }
} else if (exist_param("buy")) {
    if (isset($_SESSION['login'])) {
        $VIEW_NAME = "product/order.php";
    } else {
        header("location:../../index.php");
    }
} else if (exist_param("order_return")) {
    if (isset($_SESSION['login'])) {
        $VIEW_NAME = "product/order_return.php";
    } else {
        header("location:../../index.php");
    }
} else if (isset($_SESSION['login'])) {
    $VIEW_NAME = "user/info.php";
} else {
    $VIEW_NAME = "";
}

require '../layout-overall.php';