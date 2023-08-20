<?php
    session_start();
    require_once '../../global.php';
    require_once "../../dao/pdo.php";
    require_once "../../dao/user.php";
    require_once "../../dao/category.php";
    require_once "../../dao/brand.php";
    require_once "../../dao/product.php";
    require_once "../../dao/comment.php";
    require_once "../../dao/cart.php";
    require_once "../../dao/bill.php";
    if (exist_param("info")) {
        if(isset($_SESSION['login'])){
            $VIEW_NAME = "user/info.php";
        }else{
            header("location:../../index.php");
        }
    } else if (exist_param("sign_in")) {
        $VIEW_NAME = "user/sign-in.php";
    } else if (exist_param("sign_up")) {
        $VIEW_NAME = "user/sign-up.php";
    } else if (exist_param("sign_out")) {
        $VIEW_NAME = "user/sign-out.php";
    }else if (exist_param("forgot_password")) {
        $VIEW_NAME = "user/forgot_password.php";
    } else {
        $VIEW_NAME = "";
    }

    require '../layout-overall.php';

?>
