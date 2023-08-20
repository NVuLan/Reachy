<?php  
    require "../../global.php";
    require_once "../../dao/pdo.php";
    require_once "../../dao/user.php";
    session_start();
    extract($_REQUEST);
    $id_user = $_SESSION['login'];
    $user = user_selectById($id_user);
    if(exist_param("updateAvatar")){
        $img = save_file("new_avatar","$IMAGE_DIR/user/");
        if($img == ""){
            $img = $old_img;
        }
        user_updateAvatar($id_user,$img);
        header("location:../user/?info");
    }else if(exist_param("updateInfo")){
        try{
            user_update($id_user,$name,$phone_number);
            $MESSAGE = "Cập nhật thông tin thành công";
            add_session("message",$MESSAGE);
            header("location:../user/?info");
        }catch(Exception $e){
            $MESSAGE = "Cập nhật thông tin thất bại";
            add_session("message",$MESSAGE);
            header("location:../user/?info");
        }
    }else if(exist_param("changePW")){
        try{
            if($old_password != $user['password']){
                $MESSAGE = "Mật khẩu cũ không đúng";
                add_session("message",$MESSAGE);
                header("location:../user/?info");
            }else{
                user_changePassword($id_user,$new_password);
                $MESSAGE = "Đổi mật khẩu thành công";
                add_session("message",$MESSAGE);
                header("location:../user/?info");
            }
        }catch(Exception $e){
            $MESSAGE = "Đổi mật khẩu thất bại";
            add_session("message",$MESSAGE);
            header("location:../user/?info");
        }
    }
?>
