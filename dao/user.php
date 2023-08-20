<?php

/**
 * Xuất danh sách khách hàng
 * @return array danh sách khách hàng
 */
function user_selectAll()
{
    $sql = "SELECT * FROM user";
    return pdo_query($sql);
}
/**
 * Xuất thông tin khách hàng theo mã khách hàng
 * @param int $id_user Mã khách hàng
 * @return array Khách hàng theo mã khách hàng
 */
function user_selectById($id_user)
{
    $sql = "SELECT * FROM user WHERE id_user=?";
    return pdo_query_one($sql, $id_user);
}
/**
 * Xuất thông tin khách hàng theo địa chỉ email
 * @param string $email Địa chỉ email
 * @return array Khách hàng theo email
 */
function user_selectByEmail($email)
{
    $sql = "SELECT * FROM user WHERE email=?";
    return pdo_query_one($sql, $email);
}
/**
 * Nhập thêm người dùng
 * @param string $user_name Tên khách hàng
 * @param string $password mật khẩu đăng nhập của khách hàng
 * @param string $email Địa chỉ email(tên đăng nhập)
 * @param string $img Ảnh đại diện
 * @param string $address Địa chỉ
 * @param int phone_number Số điện thoại
 */
function user_insert($user_name, $password, $email, $phone_number)
{
    $sql = "INSERT INTO user(id_user,name,email,password,img,phone_number) VALUES (null,?,?,?,'default-avatar.jpg',?)";
    pdo_execute($sql, $user_name, $email, $password, $phone_number);
}
/**
 * Nhập thêm người dùng admin
 * @param string $user_name Tên khách hàng
 * @param string $password mật khẩu đăng nhập của khách hàng
 * @param string $email Địa chỉ email(tên đăng nhập)
 * @param string $img Ảnh đại diện
 * @param string $address Địa chỉ
 * @param int phone_number Số điện thoại
 */
function user_insert_admin($user_name, $password, $email,$img, $phone_number, $role)
{
    $sql = "INSERT INTO user(id_user,name,password,email,img,phone_number, role) VALUES (null,?,?,?,?,?,?)";
    pdo_execute($sql, $user_name, $password, $email,$img, $phone_number, $role);
}
/**
 * Cập nhật thông tin khách hàng
 * @param int $id_user Mã khách hàng
 * @param string $user_name Tên khách hàng
 * @param string $address Địa chỉ
 * @param int $phone_number Số điện thoại
 */
function user_update($id_user, $user_name, $phone_number)
{
    $sql = "UPDATE user SET name = ?, phone_number = ? WHERE id_user=?";
    pdo_execute($sql, $user_name, $phone_number, $id_user);
}
/**
 * Cập nhật thông tin khách hàng (admin)
 * @param int $id_user Mã khách hàng
 * @param string $user_name Tên khách hàng
 * @param string $img Ảnh đại diện
 * @param int $phone_number Số điện thoại
 */
function user_update_admin($id_user, $user_name, $phone_number,$password, $img)
{
    $sql = "UPDATE user SET name = ?, phone_number = ?,password = ?, img = ? WHERE id_user=?";
    pdo_execute($sql, $user_name, $phone_number,$password,$img, $id_user);
}
/**
 * Xóa khách hàng
 * @param int id_user Mã khách hàng
 */
function user_delete($id_user)
{
    $sql = "DELETE FROM user WHERE id_user=?";
    pdo_execute($sql, $id_user);
}
/**
 * Kiểm tra sự tồn tại của email đầu vào
 * @param string $user_email Địa chỉ email kiểm tra
 * @return Bool True = đã tồn tại, False = không tồn tại
 */
function user_checkExistEmail($user_email)
{
    $sql = "SELECT * FROM user WHERE email=?";
    return pdo_query_one($sql, $user_email);
}
/**
 * Đổi mật khẩu
 * @param string newPassword Mật khẩu mới
 */
function user_changePassword($id_user, $user_password)
{
    $sql = "UPDATE user SET password=? WHERE id_user=?";
    pdo_execute($sql, $user_password, $id_user);
}
/**
 * Kích hoạt tài khoản
 * @param int id_user Mã khách hàng
 */
function user_activate($id_user)
{
    $sql = "UPDATE user SET active = 1 WHERE id_user=?";
    pdo_execute($sql, $id_user);
}
/**
 * Đăng nhập
 * @param string $user_email Địa chỉ email
 * @param string $password Mật khẩu
 * @return bool True = Đăng nhập thành công, False = Đăng nhập thất bại
 */
function user_signIn($user_email, $password)
{
    $sql = "SELECT * FROM user WHERE email=? AND password =?";
    if (pdo_query_one($sql, $user_email, $password)) {
        $acc = pdo_query_one($sql, $user_email, $password);
        extract($acc);
        add_session("login", $id_user);
        if (isset($_POST['remember'])) {
            add_cookie("username", $email, 7);
            add_cookie("password", $password, 7);
        } else {
            delete_cookie("username");
            delete_cookie("password");
        }
        return true;
    } else {
        return false;
    }
}
/**
 * Cập nhật quyền user
 * @param int $id_user Mã khách hàng
 */
function user_updateRole($role, $id_user)
{
    $sql = "UPDATE user SET role = ? WHERE id_user=?";
    pdo_execute($sql,$role, $id_user);
}
/**
 * Nâng cấp quyền admin
 * @param int $id_user Mã khách hàng
 */
function user_upgradeRole($id_user)
{
    $sql = "UPDATE user SET role = 1 WHERE id_user=?";
    pdo_execute($sql, $id_user);
}
/**
 * Xóa quyền admin
 * @param int $id_user Mã khách hàng
 */
function user_downgradeRole($id_user)
{
    $sql = "UPDATE user SET role = 0 WHERE id_user=?";
    pdo_execute($sql, $id_user);
}
/**
 * Xuất ảnh địa diện của khách hàng
 * @param int $id_user Mã khách hàng
 * @return string Ảnh đại diện
 */
function user_selectImgs($id_user)
{
    $sql = "SELECT img FROM user WHERE id_user=?";
    return pdo_query_one($sql, $id_user);
}
/**
* Cập nhật ảnh đại diện
* @param int $id_user Mã khách hàng
* @param string $img Ảnh đại diện mới
*/
function user_updateAvatar($id_user,$img){
    $sql = "UPDATE user SET img=? WHERE id_user = ?";
    pdo_execute($sql,$img,$id_user);
}