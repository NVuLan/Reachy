<div class="add__container">
    <h1>Thêm mới loại hàng</h1>
    <form action="index.php?category&act=add" method='post' class="addloai__form">
        <p>Mã loại</p>
        <input type="text" name="id_cate" disabled class="add_input" placeholder="Auto Number">
        <p>Tên loại</p>
        <input type="text" name="name_cate" class="add_input" require><br>
        <input type="submit" value="Thêm mới" name="submit" class="admin_btn">
        <input type="reset" value="Nhập lại" class="admin_btn">
        <a href="<?=$ADMIN_URL?>?category&act=list"><input type="button" value="Danh sách" class="admin_btn"></a>
    </form>
    <?php 
        if(isset($noti)&&$noti!="") echo "<p class='add__noti'> $noti </p>"
    ?>
</div>