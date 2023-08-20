
<div class="add__container">
    <h1>Thêm mới blog</h1>
    <?php 
        if(isset($noti)&&$noti!="") echo "<p class='add__noti'> $noti </p>"
    ?>
    <form action="index.php?blog&act=add" method='post' class="addloai__form" enctype="multipart/form-data">
        <p>Mã blog</p>
        <input type="text" name="id_blog" disabled class="add_input" placeholder="Auto Number">
        <p>Tiêu đề</p>
        <input type="text" name="title" class="add_input" require><br>
        <p>Ảnh</p>
        <input type="file" name="hinh">
        <p>Nội dung</p>
        <textarea class="add_input" col="30" row="15" name="content"></textarea>
        <input type="submit" value="Thêm mới" name="submit" class="admin_btn">
        <input type="reset" value="Nhập lại" class="admin_btn">
        <a href="<?=$ADMIN_URL?>?blog&act=list"><input type="button" value="Danh sách" class="admin_btn"></a>
    </form>
</div>