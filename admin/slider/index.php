<?php
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch($act){
            case 'add' :
                if(isset($_POST['submit'])&&($_POST['submit'])){
                    $title = $_POST['title'];
                    $id_cate = $_POST['id_cate'];
                    $id_brand = $_POST['id_brand'];
                    $imagesss = save_file('hinh', $UPLOAD_SLIDER_IMG);
                    $content = $_POST['content'];
                    slider_insert($title, $content, $imagesss, $id_cate, $id_brand);
                    $noti = "Thêm thành công";
                }
                include 'slider/add.php';
                break;
            case 'list' :
                include 'slider/list.php';
                break;
            case 'del' :
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $id = $_GET['id'];
                    slider_delete($id);
                }
                include 'slider/list.php';
                break;
            case 'update' :
                include 'slider/update.php';
                break;
            case 'update_sl' :
                if(isset($_POST['submit'])&&($_POST['submit'])){
                    $id_slide = $_POST['hidden'];
                    $title = $_POST['title'];
                    $id_cate = $_POST['id_cate'];
                    $id_brand = $_POST['id_brand'];
                    $content = $_POST['content'];
                    $img = save_file('hinh', $UPLOAD_SLIDER_IMG);
                    slider_update($id_slide, $title, $content, $img, $id_cate, $id_brand);
                    $noti = 'Cập nhật thành công';
                }
                include 'slider/list.php';
                break;
            default:
                include 'slider/list.php';
                break;
        }
    }
?>