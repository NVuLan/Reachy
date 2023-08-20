<?php  
    require_once "../../global.php";
    require_once "../../dao/pdo.php";
    require_once "../../dao/user.php";
    require_once "../../dao/category.php";
    require_once "../../dao/product.php";
    session_start();
    extract($_REQUEST);
    if(!user_checkExistEmail($email)){
        global $email;
        $MESSAGE = "Mật khẩu không đúng";
        $VIEW_NAME = "user/sign-in.php";
        require "../layout-overall.php";
    }else{
        $info = user_selectByEmail($email);
        if($info['password'] != $password){
            global $email;
            $MESSAGE = "Mật khẩu không đúng";
            $VIEW_NAME = "user/sign-in.php";
            $check = false;
            require "../layout-overall.php";
        }else{
            user_signIn($email,$password);
            if(isset($_SESSION['productLink'])){
                $productLink = $_SESSION['productLink'];
                unset($_SESSION['productLink']);
                header("location:$productLink");
            }else{
                header("location:../../index.php");
            }
        }
    }
