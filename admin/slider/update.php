<?php
    $loai = category_selectAll();
    $brand = brand_selectAll();
    $id = $_GET['id'];
    $get = slider_selectById($id);
    if(is_array($get)){
        extract($get);
    }
?>
<div class="add__container">
    <h1>Cập nhật slide</h1>
    <form action="index.php?slider&act=update_sl" method='post' class="addloai__form" enctype="multipart/form-data">
        <p>Mã slider</p>
        <input type="text" name="id_slide" readonly disabled class="add_input" value="<?=$id_slide?>">
        <p>Tiêu đề</p>
        <input type="text" name="title" class="add_input" value="<?=$title?>" require><br>
        <p>Mã loại</p>
        <select id="" name="id_cate">
            <?php foreach($loai as $l){
                extract($l)?>
                <option value="<?=$id_category?>" <?php $select = $get['id_category']==$id_category?'selected':''; echo $select?>><?=$id_category?> - <?=$name?></option>
            <?php }?>
        </select>
        <p>Thương hiệu</p>
        <select id="" name="id_brand">
            <?php foreach($brand as $b){
                extract($b)?>
                <option value="<?=$id_brand?>" <?php $select = $get['id_brand']==$id_brand?'selected':''; echo $select?>><?=$id_brand?> - <?=$name?></option>
            <?php }?>
        </select>
        <p>Ảnh (Yêu cầu ảnh png đã xóa phông)</p>
        <input type="file" name="hinh">
        <p>(<?=$img?>)</p>
        <p>Nội dung</p>
        <textarea class="add_input" col="30" row="15" name="content"><?=$content?></textarea>
        <input type="hidden" value="<?php if(isset($id_slide)&&$id_slide!='') echo $id_slide?>" name="hidden">
        <input type="submit" value="Cập nhật" name="submit" class="admin_btn">
        <input type="reset" value="Nhập lại" class="admin_btn">
        <a href="<?=$ADMIN_URL?>?slider&act=list"><input type="button" value="Danh sách" class="admin_btn"></a>
    </form>
</div>