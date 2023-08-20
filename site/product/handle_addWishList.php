<?php  
    require_once "../../global.php";
    require_once "../../dao/pdo.php";
    require_once "../../dao/user.php";    
    require_once "../../dao/product.php";    
    extract($_REQUEST);
    session_start();
    if(!isset($_SESSION['login'])){
        add_session("message","Vui lòng đăng nhập để được thêm sản phẩm vào danh sách yêu thích!");
        if(isset($_SESSION['productLink'])){
            $productLink = $_SESSION['productLink'];
            unset($_SESSION['productLink']);
            header("location:$productLink");
        }else{
            header("location:../../index.php");
        }
    }else{
        if(product_checkLiked($id_product,$_SESSION['login'])){
           $wishListItem =  product_checkLiked($id_product,$_SESSION['login']);
           product_unLike($wishListItem['id_wishlist']);
           if(isset($_SESSION['productLink'])){
            $productLink = $_SESSION['productLink'];
            unset($_SESSION['productLink']);
            header("location:$productLink");
            }else{
                header("location:../../index.php");
            }
        }else{
            product_like($id_product,$_SESSION['login']);
            if(isset($_SESSION['productLink'])){
                $productLink = $_SESSION['productLink'];
                unset($_SESSION['productLink']);
                header("location:$productLink");
            }else{
                header("location:../../index.php");
            }
        }
    }
?>

