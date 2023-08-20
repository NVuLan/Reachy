<?php
    $id = $_GET['id'];
    $get_kh = user_selectById($id);
    if(is_array($get_kh)){
        extract($get_kh);
    }
?>
    <div class="signup__content">
        <h2>Cập nhật tài khoản</h2>
        <form action="index.php?user&act=update_user" method="post" enctype="multipart/form-data" class="signup__form">
            <p>Họ tên</p>
            <input type="text" value="<?=$name?>" name="name"require>
            <p>Số điện thoại</p>
            <input type="number" name="phone_number" value="<?=$phone_number?>" maxlength="11" require>
            <p>Ảnh</p>
            <input type="file" name="img">
            <p><?=$img?></p>
            <p>Mật khẩu</p>
            <input type="password" name="password" require ><br>
            <input type="hidden" value="<?php if(isset($id_user)&&$id_user!='') echo $id_user?>" name="hidden">
            <input type="submit" class="login__content--action" name="submit" value="Cập nhật" >
        </form>
    </div>