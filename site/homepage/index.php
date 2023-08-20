<?php
session_start();
require '../../global.php';
require_once "../../dao/pdo.php";
require_once "../../dao/user.php";
require_once "../../dao/category.php";
require_once "../../dao/brand.php";
require_once "../../dao/product.php";
require_once "../../dao/comment.php";
require_once "../../dao/blog.php";
require_once "../../dao/cart.php";
if (exist_param("contact")) {
    $VIEW_NAME = "homepage/contact.php";
} else if (exist_param("category")) {
    $VIEW_NAME = "homepage/category.php";
} else if (exist_param("introduce")) {
    $VIEW_NAME = "homepage/introduce.php";
} else if (exist_param("search")) {
    extract($_REQUEST);
    if (isset($_GET['page_num'])) $page_num = $_GET['page_num'] + 0;
    else $page_num = 1;
    if ($page_num <= 0) $page_num = 1;
    $page_size = 12;
    $sql = "SELECT product.* FROM product
            JOIN category ON product.id_category = category.id_category
            JOIN brand ON product.id_brand = brand.id_brand
            WHERE product.name LIKE '%$search%' OR brand.name LIKE '%$search%' OR category.name LIKE '%$search%'";
    if (isset($_POST['sort'])) {
        $sortProduct = $_POST['sort'];
        if ($sortProduct === "banChay") {
            $sql = "SELECT product.* FROM product
            JOIN category ON product.id_category = category.id_category
            JOIN brand ON product.id_brand = brand.id_brand
            JOIN bill_detail ON product.id_product = bill_detail.id_product
            WHERE product.name LIKE '%$search%' OR brand.name LIKE '%$search%' OR category.name LIKE '%$search%'
            GROUP BY bill_detail.id_product";
            $sql .= " ORDER BY (COUNT(bill_detail.id_product)*bill_detail.amount)";
        } else if ($sortProduct === "tenAZ") {
            $sql .= " ORDER BY name";
        } else if ($sortProduct === "tenZA") {
            $sql .= " ORDER BY name DESC";
        } else if ($sortProduct === "giaGiam") {
            $sql .= " ORDER BY price DESC";
        } else if ($sortProduct === "giaTang") {
            $sql .= " ORDER BY price";
        } else if ($sortProduct === "spMoi") {
            $sql .= " ORDER BY date DESC";
        } else if ($sortProduct === "spCu") {
            $sql .= " ORDER BY date";
        }
    }
    $total_products = count(pdo_query($sql));
    $product_list = getRowInPageBySql($sql, $page_num, $page_size);
    $base_url = "$SITE_URL/homepage/?search=$search";
    $VIEW_NAME = "homepage/search.php";
} else if (exist_param("product")) {
    $VIEW_NAME = "product/product-detail.php";
} else if(exist_param("blogs")){
    $VIEW_NAME = "homepage/blogs.php";
}else if(exist_param("infor_blogs")){
    $VIEW_NAME = "homepage/infor_blogs.php";
}else {
    $VIEW_NAME = "homepage/home.php";
}

require '../layout-overall.php';