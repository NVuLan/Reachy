<?php
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch($act){
            case 'list' :
                include 'comment/list.php';
                break;
            case 'del' :
                if(isset($_GET['id_cmt'])&&($_GET['id_cmt']>0)){
                    $id = $_GET['id_cmt'];
                    comment_delete($id);
                }
                include 'comment/list.php';
                break;
            default:
                include 'comment/list.php';
                break;
        }
    }
?>