<?php
$loai = category_selectAll();
?>

<div class="list__container">
    <h1 class="list__heading">Danh sách loại hàng</h1>
    <table border="1">
        <thead>
            <tr>
                <th colspan="2">Mã loại</th>
                <th colspan="2">Tên loại</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($loai as $l) {
                extract($l) ?>
            <tr>
                <td>
                    <input class="list__checkbox" type="checkbox">
                </td>
                <td>
                    <?= $id_category ?>
                </td>
                <td>
                    <?= $name ?>
                </td>
                <td class="list__action--container">
                    <div class="list__action">
                        <a href="<?= $ADMIN_URL ?>?category&act=update&id=<?= $id_category ?>"><button>Sửa</button></a>
                        <a href="<?= $ADMIN_URL ?>?category&act=del&id=<?= $id_category ?>"><button>Xóa</button></a>
                    </div>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <input type="checkbox" name="all" id="checkall" hidden>
    <label for="checkall" class="admin_btn">Chọn tất cả</label>
    <label for="checkall" class="admin_btn">Bỏ chọn tất cả</label>
    <a href="<?= $ADMIN_URL ?>?category&act=add"><button class="admin_btn">Nhập thêm</button></a>
</div>
<script src="<?= $CONTENT_URL ?>/js/checkedAll.js"></script>