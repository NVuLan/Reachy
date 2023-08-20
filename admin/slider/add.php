<?php
    $loai = category_selectAll();
    $brand = brand_selectAll();
?>
<div class="add__container">
    <h1>Thêm mới slide</h1>
    <?php 
        if(isset($noti)&&$noti!="") echo "<p class='add__noti'> $noti </p>"
    ?>
    <form action="index.php?slider&act=add" method='post' class="addloai__form" enctype="multipart/form-data">
        <p>Mã slider</p>
        <input type="text" name="id_slide" disabled class="add_input" placeholder="Auto Number">
        <p>Tiêu đề</p>
        <input type="text" name="title" class="add_input" require><br>
        <p>Mã loại</p>
        <select id="" name="id_cate">
            <?php foreach($loai as $l){
                extract($l)?>
                <option value="<?=$id_category?>"><?=$id_category?> - <?=$name?></option>
            <?php }?>
        </select>
        <p>Thương hiệu</p>
        <select id="" name="id_brand">
            <?php foreach($brand as $b){
                extract($b)?>
                <option value="<?=$id_brand?>"><?=$id_brand?> - <?=$name?></option>
            <?php }?>
        </select>
        <p>Ảnh (Yêu cầu ảnh png đã xóa phông)</p>
        <input type="file" name="hinh">
        <p>Nội dung</p>
        <textarea class="add_input" col="30" row="15" name="content"></textarea>
        <input type="submit" value="Thêm mới" name="submit" class="admin_btn">
        <input type="reset" value="Nhập lại" class="admin_btn">
        <a href="<?=$ADMIN_URL?>?slider&act=list"><input type="button" value="Danh sách" class="admin_btn"></a>
    </form>
</div>