<?php 
    $id = $_GET['id'];
    $getloai = category_selectOne($id);
    if(is_array($getloai)){
        extract($getloai);
    }
?>
<div class="add__container">
    <h1>Cập nhật loại hàng</h1>
    <form action="index.php?category&act=update_cate" method='post' class="addloai__form">
        <p>Mã loại</p>
        <input type="text" readonly class="add_input" value="<?=$id_category?>">
        <p>Tên loại</p>
        <input type="text" class="add_input" autofocus value="<?=$name?>" name="name"><br>
        <input type="hidden" name="hidden"value="<?php if(isset($id_category)&&$id_category!="") echo $id_category?>">
        <input type="submit" value="Cập nhật" name="submit" class="admin_btn">
        <input type="reset" value="Nhập lại" class="admin_btn">
        <a href="<?=$ADMIN_URL?>?category&act=list"><input type="button" value="Danh sách" class="admin_btn"></a>
    </form>
</div>