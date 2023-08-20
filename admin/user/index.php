<?php
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch($act){
            case 'list' :
                include 'user/list.php';
                break;
            case 'del' :
                if(isset($_GET['id'])&&($_GET['id']!='')){
                    $id_user = $_GET['id'];
                    user_delete($id_user);
                }
                include 'user/list.php';
                break;
            case 'update_role' :
                $user_id = $_POST['id_user'];
                $user_role = $_POST['role'];
                for($i=0;$i<=count($user_id)-1;$i++){
                    user_updateRole($user_role[$i], $user_id[$i]);
                }
                $noti = 'Cập nhật thành công';
                include 'user/list.php';
                break;
            case 'update' :
                include 'user/update.php';
                break;
            case 'update_user' :
                if(isset($_POST['submit'])&&($_POST['submit'])){
                    $id_user = $_POST['hidden'];
                    $name = $_POST['name'];
                    $phone_number = $_POST['phone_number'];
                    $password = $_POST['password'];
                    $img = save_file('img', $UPLOAD_USER_IMG);
                    user_update_admin($id_user, $name, $phone_number,$password, $img);
            
                }
                include 'user/list.php';
                break;
            default:
                include 'user/add.php';
                break;
        }
    }
?>