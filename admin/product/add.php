<?php
    $loai = category_selectAll();
    // $brand = brand_selectAll();
?>
<div class="add__container">
    <h1>Thêm mới sản phẩm</h1>
    <?php 
        if(isset($noti)&&$noti!="") echo "<p class='add__noti'> $noti </p>"
    ?>
    <form action="index.php?product&act=add" method='post' enctype="multipart/form-data" class="addloai__form">
        <p>Mã sản phẩm</p>
        <input type="text" disabled class="add_input" placeholder="Auto Number">
        <p>Tên sản phẩm</p>
        <input type="text" class="add_input" name="name">
        <p>Mã loại</p>
        <select id="product_cates" name="id_cate" onchange="selecterValue('add')">
            <?php foreach($loai as $l){
                extract($l)?>
                <option value="<?=$id_category?>"><?=$id_category?> - <?=$name?></option>
            <?php }?>
        </select>
        <p>Thương hiệu</p>
        <select id="product_brands" name="id_brand">
            <?php foreach($loai as $l){
                $brand = brand_selectAll_byCateId($l['id_category']);   
                foreach($brand as $b){?>
                    <option value="<?=$b['id_category'] . '-' . $b['id_brand']?>"><?=$b['id_brand'] .' - '. $b['name']?></option>
                <?php } 
            } ?>
            
        </select>
        <p>Giá</p>
        <input type="number" class="add_input" name="price">
        <p>Giảm giá</p>
        <input type="number" class="add_input" name="sale_off">
        <p>Mô tả ngắn</p>
        <textarea class="add_input" col="30" row="10" name="description"></textarea>
        <p>Mô tả dài</p>
        <textarea class="add_input" col="30" row="10" name="feature"></textarea>
        <p>Nổi bật</p>
        <span>Có</span><input type="radio" id="" value="1" class="noibat" name="special"> |
        <span>Không</span><input type="radio" id="" value="0" class="noibat" name="special"><br>

        <input type="submit" value="Thêm mới" name="submit" class="admin_btn">
        <input type="reset" value="Nhập lại" class="admin_btn">
        <a href="<?=$ADMIN_URL?>?product&act=list"><input type="button" value="Danh sách" class="admin_btn"></a>
    </form>
</div>