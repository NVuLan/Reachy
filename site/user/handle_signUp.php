<?php
session_start();
require_once "../../global.php";
require_once "../../dao/pdo.php";
require_once "../../dao/user.php";
require_once "../../dao/category.php";
extract($_REQUEST);
if (user_checkExistEmail($email)) {
    $MESSAGE = "Địa chỉ email đã tồn tại";
    $VIEW_NAME = "user/sign-up.php";
    global $name, $email, $phone_number;
} else {
    try {
        $CONTENT_URL = "../../content";
        $code = sendEmail($email);
        add_session("code", $code);
        $VIEW_NAME = "user/activate.php";
    } catch (Exception $exc) {
        $MESSAGE = "Đăng ký thành viên thất bại!";
        $VIEW_NAME = "user/sign-up.php";
        global $name, $email, $address, $phone_number;
    }
}
require '../layout-overall.php';