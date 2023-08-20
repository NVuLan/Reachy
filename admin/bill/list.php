<?php
$bill = bill_selectAll();
$i = 0;
?>
<div class="list__container">
    <h1 class="list__heading">Danh sách đơn hàng</h1>
    <form action="index.php?bill&act=update_status" method="post">
        <?php
        if (isset($noti) && $noti != "") echo "<p class='add__noti'> $noti </p>"
        ?>
        <table border="1">
            <thead>
                <tr>
                    <th colspan="2">Tên khách hàng</th>
                    <th>Sản phẩm</th>
                    <th colspan="2">Tình trạng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bill as $dh) {
                    extract($dh);
                    $user = user_selectById($id_user);
                    $bill_detail = bill_detailSelectbyIdBill($id_bill);
                ?>
                <tr>
                    <td>
                        <input class="list__checkbox" type="checkbox">
                    </td>
                    <td>
                        <input type="text" name="id_bill[]" readonly value="<?= $id_bill ?>"
                            style="width: 30px; font-size: 16px; background-color: transparent; display: none">
                        <?= $user['name'] ?>
                    </td>
                    <td>
                        <?php $pro = product_selectOne($bill_detail['id_product']);
                            echo $pro['name'];
                            ?>
                    </td>
                    <td>
                        <select name="status[]" id="" style=" width:9rem ">
                            <option value="0" <?php $select = $status == 0 ? 'selected' : '';
                                                    echo $select ?>>Đang đóng gói</option>
                            <option value="1" <?php $select = $status == 1 ? 'selected' : '';
                                                    echo $select ?>>Đang vận chuyển</option>
                            <option value="2" <?php $select = $status == 2 ? 'selected' : '';
                                                    echo $select ?>>Đã hoàn tất</option>
                            <option value="3" <?php $select = $status == 3 ? 'selected' : '';
                                                    echo $select ?>>Đã hủy</option>
                        </select>
                        <div class="bill__detail--contain" data-bill="<?= $i ?>"></div>

                    </td>
                    <td class="list__action--container">
                        <div class="list__action">
                            <button type="button" class="bill_detail" data-bill="<?= $i ?>">Chi tiết</button>
                            <a href="<?= $ADMIN_URL ?>?bill&act=del&id=<?= $id_bill ?>"><button
                                    type="button">Xóa</button></a>
                        </div>
                    </td>
                    <input type="hidden" data-bill="<?= $i ?>" class="name" value="<?= $user['name'] ?>">
                    <input type="hidden" data-bill="<?= $i ?>" class="email" value="<?= $user['email'] ?>">
                    <input type="hidden" data-bill="<?= $i ?>" class="pro" value="<?= $pro['name'] ?>">
                    <input type="hidden" data-bill="<?= $i ?>" class="price                                             " value="<?= $pro['price'] ?>">
                    <input type="hidden" data-bill="<?= $i ?>" class="date" value="<?= $date ?>">
                    <input type="hidden" data-bill="<?= $i ?>" class="address" value="<?= $address ?>">
                    <input type="hidden" data-bill="<?= $i ?>" class="amount" value="<?= $bill_detail['amount'] ?>">
                    <input type="hidden" data-bill="<?= $i ?>" class="note" value="<?= $note ?>">

                </tr>
                <?php $i++;
                } ?>
            </tbody>
        </table>
        <input type="checkbox" name="all" id="checkall" hidden>
        <label for="checkall" class="admin_btn">Chọn tất cả</label>
        <label for="checkall" class="admin_btn">Bỏ chọn tất cả</label>
        <input type="submit" value="Lưu" class="admin_btn">
    </form>
</div>
<script src="<?= $CONTENT_URL ?>/js/checkedAll.js"></script>