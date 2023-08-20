<?php
$page_size = 9;
if (isset($_GET['page_num'])) $page_num = $_GET['page_num'] + 0;
else $page_num = 1;
if ($page_num <= 0) $page_num = 1;
$sanpham = getRowInPageByTable('product', $page_num, $page_size);
$total_products = count(product_selectAll());
?>
<div class="list__container list_product">
    <h1 class="list__heading">Danh sách sản phẩm</h1>
    <?php
    $base_url = $ADMIN_URL . '?product&act=list';
    echo createMultiPage($base_url, $total_products, $page_num, $page_size);
    ?>

    <table border="1">
        <thead>
            <tr>
                <th colspan="2">Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Tên loại</th>
                <th>Tên thương hiệu</th>
                <th>Hình</th>
                <th>Giá</th>
                <th>Ngày đăng</th>
                <th colspan="2">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sanpham as $sp) {
                extract($sp);
                $img = product_selectImgs($id_product);
                $name_cate = category_selectOne($id_category);
                $name_brand = brand_selectOne($id_brand);
            ?>
            <tr>
                <td>
                    <input class="list__checkbox" type="checkbox">
                </td>
                <td>
                    <?= $id_product ?>
                </td>
                <td>
                    <?= $name ?>
                </td>
                <td>
                    <a href="<?= $SITE_URL ?>/product?product&id_product=<?= $id_product ?>"><?= $name_cate['name'] ?>
                    </a>
                </td>
                <td>
                    <?= $name_brand['name'] ?>
                </td>
                <td class="hinh">
                    <a href="<?= $SITE_URL ?>/product?product&id_product=<?= $id_product ?>"><img
                            src="<?= $CONTENT_URL ?>/imgs/products/<?= $img['contain'] ?>" alt=""></a>
                </td>
                <td>
                    <?= number_format(round($price, -4)) ?>₫
                </td>
                <td>
                    <?= $date ?>
                </td>
                <td class="list__action--container">
                    <div class="list__action">
                        <a href="<?= $ADMIN_URL ?>?product&act=update&id=<?= $id_product ?>"><button>Sửa</button></a>
                        <a href="<?= $ADMIN_URL ?>?product&act=del&id=<?= $id_product ?>"><button>Xóa</button></a>
                        <a href="<?= $ADMIN_URL ?>?comment&act=list&id=<?= $id_product ?>"><button>Bình
                                luận</button></a>
                        <a href="<?= $ADMIN_URL ?>?product&act=rating&id=<?= $id_product ?>"><button>Đánh
                                giá</button></a>
                    </div>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php
    echo createMultiPage($base_url, $total_products, $page_num, $page_size);
    ?>
    <input type="checkbox" name="all" id="checkall" hidden>
    <label for="checkall" class="admin_btn">Chọn tất cả</label>
    <label for="checkall" class="admin_btn">Bỏ chọn tất cả</label>
    <a href="<?= $ADMIN_URL ?>?product&act=add"><button class="admin_btn">Nhập thêm</button></a>
</div>
<script src="<?= $CONTENT_URL ?>/js/checkedAll.js"></script>