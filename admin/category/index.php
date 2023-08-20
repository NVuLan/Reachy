<?php
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch($act){
            case 'add' :
                if(isset($_POST['submit'])&&($_POST['submit'])){
                    if($_POST['name_cate']==''){
                        $noti = 'Vui lòng nhập tên loại!';
                    }else{
                        $name_cate = $_POST['name_cate'];
                        category_insert($name_cate);
                        $noti = 'Thêm thành công';
                    }                   
                }
                include 'category/add.php';
                break;
            case 'list' :
                include 'category/list.php';
                break;
            case 'del' :
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $id = $_GET['id'];
                    category_delete($id);
                }
                include 'category/list.php';
                break;
            case 'update' :
                include 'category/update.php';
                break;
            case 'update_cate' :
                if(isset($_POST['submit'])&&($_POST['submit'])){
                    $id_cate = $_POST['hidden'];
                    $name = $_POST['name'];
                    category_update($id_cate, $name);
                    $noti = 'Cập nhật thành công';
                }
                include 'category/list.php';
                break;
            default:
                include 'category/add.php';
                break;
        }
    }
?>