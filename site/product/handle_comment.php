<?php  
    require_once "../../global.php";
    require_once "../../dao/pdo.php";
    require_once "../../dao/user.php";
    require_once "../../dao/comment.php";
    session_start();
    extract($_REQUEST);
    if(exist_param("btn_uploadComment")){
        $specifi_word = 'chó|dmm|clm|cc|dcm|dcmm|vc|vl|fuck|shit|clmm|má|ngu|ma túy|xì ke|dốt|não|giết|cứt';
        $id_user = $_SESSION['login'];
        $arr_str = explode("|",$specifi_word);
        $check = 1;
        foreach($arr_str as $word){
            if(str_contains($message,$word)){
                add_session("message","Bình luận chứa từ ngữ khiếm nhã");
                $check = 0;
                break;
            }
        }
        if($check){
            comment_insert($id_product, $id_user, $message);
        }
        $productLink = $_SESSION['productLink'];
        unset($_SESSION['productLink']);
        header("location:$productLink");
    }
?>