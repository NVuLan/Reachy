<?php
require '../global.php';
require_once "../dao/pdo.php";
require_once "../dao/user.php";
session_start();
if(isset($_SESSION['login'])){
    $s_role = user_selectById($_SESSION['login']);
    if($s_role['role']==2||$s_role['role']==1){
        if (exist_param("category")) {
            $VIEW_NAME = "category/index.php";
        } else if (exist_param("product")) {
            $VIEW_NAME = "product/index.php";
        } else if (exist_param("comment")) {
            $VIEW_NAME = "comment/index.php";
        } else if (exist_param("user")) {
            $VIEW_NAME = "user/index.php";
        } else if (exist_param("bill")) {
            $VIEW_NAME = "bill/index.php";
        } else if (exist_param("slider")) {
            $VIEW_NAME = "slider/index.php";
        } else if (exist_param("blog")) {
        $VIEW_NAME = "blog/index.php";
        } else {
            $VIEW_NAME = "layout/main-admin.php";
        }
        require 'layout-overall.php';
    }else{
        header('location: ../index.php');
    }
}else{
    header('location: ../index.php');
}