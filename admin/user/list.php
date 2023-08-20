<?php
$khachhang = user_selectAll();
?>
<div class="list__container">
    <h1 class="list__heading">Danh sách tài khoản</h1>
    <form action="index.php?user&act=update_role" method="post">
        <?php
        if (isset($noti) && $noti != "") echo "<p class='add__noti'> $noti </p>"
        ?>
        <table border="1">
            <thead>
                <tr>
                    <th colspan="2">Mã khách hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Email</th>
                    <th>Mật khẩu</th>
                    <th>Hình</th>
                    <th colspan="2">Vai trò</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($khachhang as $kh) {
                    extract($kh) ?>
                <tr>
                    <td>
                        <input class="list__checkbox" type="checkbox">
                    </td>
                    <td>
                        <input type="text" name="id_user[]" readonly value="<?= $id_user ?>"
                            style="width: 30px; font-size: 16px; background-color: transparent">
                    </td>
                    <td>
                        <?= $name ?>
                    </td>
                    <td>
                        <?= $email ?>
                    </td>
                    <td>
                        <?= $password ?>
                    </td>
                    <td class="hinh">
                        <img src="<?= $CONTENT_URL ?>/imgs/user/<?= $img ?>" alt="">
                    </td>
                    <td>
                        <?php
                            if (isset($_SESSION['login'])) {
                                $user_role = user_selectById($_SESSION['login']);
                                if ($user_role['role'] == 2) {
                            ?>
                        <select name="role[]" id="" style=" width:7rem ">
                            <option value="0" <?php $select = $role == 0 ? 'selected' : '';
                                                            echo $select ?>>Khách hàng</option>
                            <option value="1" <?php $select = $role == 1 ? 'selected' : '';
                                                            echo $select ?>>Nhân viên</option>
                            <option value="2" <?php $select = $role == 2 ? 'selected' : '';
                                                            echo $select ?>>Admin</option>
                        </select>
                        <?php } else {
                                    if ($role == 0) {
                                        echo 'Khách hàng';
                                    } else if ($role == 1) {
                                        echo 'Nhân viên';
                                    } else {
                                        echo 'Admin';
                                    }
                                } ?>

                        <?php }

                            ?>
                    </td>
                    <td class="list__action--container">
                        <div class="list__action">
                            <a href="<?= $ADMIN_URL ?>?user&act=update&id=<?= $id_user ?>"><button
                                    type="button">Sửa</button></a>
                            <a href="<?= $ADMIN_URL ?>?user&act=del&id=<?= $id_user ?>"><button
                                    type="button">Xóa</button></a>
                        </div>
                    </td>

                </tr>
                <?php } ?>
            </tbody>
        </table>
        <input type="checkbox" name="all" id="checkall" hidden>
        <label for="checkall" class="admin_btn">Chọn tất cả</label>
        <label for="checkall" class="admin_btn">Bỏ chọn tất cả</label>
        <?php if ($user_role['role'] == 2) { ?>
        <input type="submit" value="Lưu" class="admin_btn">
        <?php } ?>
    </form>
</div>
<script src="<?= $CONTENT_URL ?>/js/checkedAll.js"></script>