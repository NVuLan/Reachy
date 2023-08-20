<?php  
    require_once "../../global.php";
    require_once "../../dao/pdo.php";
    require_once "../../dao/user.php";
    session_start();
    extract($_REQUEST);
    if(exist_param("btn_checkMail")){
        if(user_checkExistEmail($email)){
            $CONTENT_URL = "../../content";
            $code = sendEmail($email);
            add_session("message","Địa chỉ email chính xác, mời nhập mã xác nhận");
            add_session("email", $email);
            add_session("code", $code);
            header("location:index.php?forgot_password&iptCode");
        }else{
            add_session("message","Địa chỉ email không tồn tại");
            header("location:index.php?forgot_password");
        }
    }else if(exist_param("btn_resendCode")){
        $CONTENT_URL = "../../content";
        $email = $_SESSION['email'];
        $code = sendEmail($email);
        add_session("code",$code);
        add_session("message","Đã gửi lại, mời nhập mã xác nhận");
        header("location:index.php?forgot_password&iptCode");
    }else if(exist_param("btn_checkCode")){
        $code = $_SESSION['code']; 
        if($ipt_code != $code){
            add_session("message","Mã xác nhận không chính xác");
            header("location:index.php?forgot_password&iptCode");
        }else{
            add_session("message","Mã xác nhận chính xác, mời đổi mật khẩu");
            header("location:index.php?forgot_password&changePW");
        }
    }else if(exist_param("btn_changePW")){
        if($refill_newPW !== $newPW){
            add_session("message","Nhập lại mật khẩu không chính xác");
            header("location:index.php?forgot_password&changePW");
        }else{
            $email = $_SESSION['email'];
            $user = user_checkExistEmail($email);
            user_changePassword($user['id_user'],$newPW);
            user_signIn($email,$newPW);
            add_session("message","Đổi mật khẩu thành công");
            header("location:index.php?forgot_password&done");
        }
    }

?>