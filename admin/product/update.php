<?php
    $loai = category_selectAll();
    $brand = brand_selectAll();
    $id = $_GET['id'];
    $get_sp = product_selectOne($id);
    if(is_array($get_sp)){
        extract($get_sp);
    }
?>
<div class="add__container">
    <h1>Sửa sản phẩm</h1>
    <form action="index.php?product&act=update_product" method='post' enctype="multipart/form-data" class="addloai__form">
        <p>Mã sản phẩm</p>
        <input type="text" readonly class="add_input" value="<?=$id_product?>">
        <p>Tên sản phẩm</p>
        <input type="text" class="add_input" value="<?=$name?>" name="name">
        <p>Mã loại</p>
        <select name="id_cate" id="" value="<?=$id_category?>">
            <?php foreach($loai as $l){
                extract($l)?>
                <option value="<?=$id_category?>"><?=$id_category?> - <?=$name?></option>
            <?php }?>
        </select>
        <p>Mã thương hiệu</p>
        <select name="id_brand" id="" value="<?=$id_brand?>">
            <?php foreach($brand as $b){
                extract($b)?>
                <option value="<?=$id_brand?>"><?=$id_brand?> - <?=$name?></option>
            <?php }?>
        </select>
        <p>Giá</p>
        <input type="number" class="add_input" value="<?=$price?>" name="price">
        <p>Giảm giá</p>
        <input type="number" class="add_input" value="<?=$sale_off?>" name="sale_off">
        <p>Mô tả ngắn</p>
        <textarea class="add_input" col="30" row="10" name="description" value=""><?=$description?></textarea>
        <p>Mô tả dài</p>
        <textarea class="add_input" col="30" row="10" name="feature" value=""><?=$feature?></textarea>
        <p>Nổi bật</p>
        <span>Có</span><input type="radio" id="" value="1" class="noibat" name="special" <?php $check = $special==1?'checked':''; echo $check?>> |
        <span>Không</span><input type="radio" id="" value="0" class="noibat" name="special" <?php $check = $special==0?'checked':''; echo $check?>><br>

        <input type="hidden" value="<?php if(isset($id_product)&&$id_product!='') echo $id_product?>" name="hidden">
        <input type="submit" value="Cập nhật" name="submit" class="admin_btn">
        <input type="reset" value="Nhập lại" class="admin_btn">
        <a href="<?=$ADMIN_URL?>?product&act=list"><input type="button" value="Danh sách" class="admin_btn"></a>
    </form>
</div>