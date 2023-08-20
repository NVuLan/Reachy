<?php
    $id = $_GET['id'];
    $get = blog_selectById($id);
    if(is_array($get)){
        extract($get);
    }
?>
<div class="add__container">
    <h1>Cập nhật blog </h1>
    <form action="index.php?blog&act=update_blog" method='post' class="addloai__form" enctype="multipart/form-data">
        <p>Mã blog</p>
        <input type="text" name="id_slide" readonly disabled class="add_input" value="<?=$id_blog?>">
        <p>Tiêu đề</p>
        <input type="text" name="title" class="add_input" value="<?=$title?>" require><br>
        <p>Ảnh</p>
        <input type="file" name="hinh">
        <p>(<?=$img?>)</p>
        <p>Nội dung</p>
        <textarea class="add_input" col="30" row="100" name="content"><?=$content?></textarea>
        <input type="hidden" value="<?php if(isset($id_blog)&&$id_blog!='') echo $id_blog?>" name="hidden">
        <input type="submit" value="Cập nhật" name="submit" class="admin_btn">
        <input type="reset" value="Nhập lại" class="admin_btn">
        <a href="<?=$ADMIN_URL?>?blog&act=list"><input type="button" value="Danh sách" class="admin_btn"></a>
    </form>
</div>