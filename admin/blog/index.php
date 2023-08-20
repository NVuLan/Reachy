<?php
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch($act){
            case 'add' :
                if(isset($_POST['submit'])&&($_POST['submit'])){
                    $title = $_POST['title'];
                    $img = save_file('hinh', $UPLOAD_SLIDER_IMG);
                    $content = $_POST['content'];
                    blog_insert($title, $content, $img);
                    $noti = "Thêm thành công";
                }
                include 'blog/add.php';
                break;
            case 'list' :
                include 'blog/list.php';
                break;
            case 'del' :
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $id = $_GET['id'];
                    blog_delete($id);
                }
                include 'blog/list.php';
                break;
            case 'update' :
                include 'blog/update.php';
                break;
            case 'update_blog' :
                if(isset($_POST['submit'])&&($_POST['submit'])){
                    $id_blog = $_POST['hidden'];
                    $title = $_POST['title'];
                    $img = save_file('hinh', $UPLOAD_SLIDER_IMG);
                    $content = $_POST['content'];
                    blog_update($id_blog, $title, $content, $img);
                    $noti = 'Cập nhật thành công';
                }
                include 'blog/list.php';
                break;
            default:
                include 'blog/add.php';
                break;
        }
    }
?>