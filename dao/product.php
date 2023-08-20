<?php

/**
 * đếm số lượng Sản phẩm
 */
function product_countAll()
{
    $sql = "SELECT COUNT(id_product) as pd_num FROM product;";
    return pdo_query($sql);
}

/**
 * Xuất toàn bộ sản phẩm
 */
function product_selectAll()
{
    $sql = "SELECT * FROM product";
    return pdo_query($sql);
}
/**
 * Xuất 1 sản phẩm theo mã sản phẩm
 * @param int $id_product Mã sản phẩm
 * @return array Sản phẩm theo mã sản phẩm
 */
function product_selectOne($id_product)
{
    $sql = "SELECT * FROM product WHERE id_product = ?";
    return pdo_query_one($sql, $id_product);
}
/**
 * Xuất tất cả sản phẩm theo mã loại hàng
 * @param int $id_category Mã loại hàng
 * @return array Tất cả sản phẩm theo loại hàng tương ứng
 */
function product_selectAllByIdCategory($id_category)
{
    $sql = "SELECT * FROM product WHERE id_category=?";
    return pdo_query($sql, $id_category);
}
/**
 * Xuất tất cả sản phẩm theo mã thương hiệu
 * @param int $id_brand Mã thương hiệu
 * @return array Tất cả sản phẩm theo mã thương hiệu tương ứng
 */
function product_selectAllByIdBrand($id_brand)
{
    $sql = "SELECT * FROM product WHERE id_brand=?";
    return pdo_query($sql, $id_brand);
}
/**
 * Thêm sản phẩm
 * @param int $id_category Mã loại hàng
 * @param int $id_brand Mã thương hiệu
 * @param string $name Tên sản phẩm
 * @param int $price Giá sản phẩm
 * @param int $sale_off Giảm giá
 * @param int $quantity Số lượng sản phẩm trong kho
 * @param string $feature Đặc trưng sản phẩm
 * @param string $description Mô tả sản phẩm
 */
function product_insert($id_category, $id_brand, $name, $price, $sale_off, $feature, $description, $special)
{
    $sql = "INSERT INTO product(id_product,id_category,id_brand,name,price,sale_off,feature,description, special) VALUES(NULL,?,?,?,?,?,?,?,?)";
    pdo_execute($sql, $id_category, $id_brand, $name, $price, $sale_off, $feature, $description, $special);
}
/**
 * Cập nhật thông tin sản phẩm
 * @param int $id_category Mã loại hàng
 * @param int $id_brand Mã thương hiệu
 * @param string $name Tên sản phẩm
 * @param int $price Giá sản phẩm
 * @param int $sale_off Giảm giá
 * @param int $quantity Số lượng sản phẩm trong kho
 * @param string $feature Đặc trưng sản phẩm
 * @param string $description Mô tả sản phẩm
 * @param int $id_product Mã sản phẩm
 */
function product_update($id_category, $id_brand, $name, $price, $sale_off, $feature, $description, $special, $id_product)
{
    $sql = "UPDATE product SET id_category=?,id_brand=?,name=?,price=?,sale_off=?,feature=?,description=?, special=? WHERE id_product=?";
    pdo_execute($sql, $id_category, $id_brand, $name, $price, $sale_off, $feature, $description, $special, $id_product);
}
/**
 * Xóa sản phẩm
 * @param int $id_product Mã sản phẩm
 */
function product_delete($id_product)
{
    $sql = "SET FOREIGN_KEY_CHECKS=0;
    DELETE FROM product WHERE id_product = ?;
    SET FOREIGN_KEY_CHECKS=1;";
    pdo_execute($sql, $id_product);
}
/**
 * Tăng lượt xem
 * @param int $id_product Mã sản phẩm
 */
function product_view_increase($id_product)
{
    $sql = "UPDATE product views=views+1 WHERE id_product=?";
    pdo_execute($sql, $id_product);
}
/**
 * Giảm số lượng sản phẩm
 * @param int $id_product Mã sản phẩm
 */
function product_quantity_decrease($id_product)
{
    $sql = "UPDATE product quantity=quantity-1 WHERE id_product=?";
    pdo_execute($sql, $id_product);
}
/**
 * Chuyển sản phẩm thành sản phẩm đặc biệt
 * @param int $id_product Mã sản phẩm
 */
function product_specialOn($id_product)
{
    $sql = "UPDATE product special=1 WHERE id_product=?";
    pdo_execute($sql, $id_product);
}
/**
 * Chuyển sản phẩm đặc biệt thành sản phẩm thường
 * @param int $id_product Mã sản phẩm
 */
function product_specialOff($id_product)
{
    $sql = "UPDATE product special=0 WHERE id_product=?";
    pdo_execute($sql, $id_product);
}
/**
 * Xuất tất cả sản phẩm đặc biệt
 * @param int $id_product Mã sản phẩm
 * @return array Sản phẩm đặc biệt
 */
function product_select_special()
{
    $sql = "SELECT * FROM product WHERE special = 1";
    return pdo_query($sql);
}
/**
 * Xuất thông số chi tiết sản phẩm
 * @param int $id_product Mã sản phẩm
 * @return array Thông số chi tiết sản phẩm
 */
function product_select_specification($id_product)
{
    $sql = "SELECT * FROM specification WHERE id_product=?";
    return pdo_query_one($sql, $id_product);
}
/**
 * Xuất ra mảng ảnh của sản phẩm tương ứng
 * @param int $id_product Mã sản phẩm
 * @return array Mảng ảnh
 */
function product_selectArrayImgs($id_product)
{
    $sql = "SELECT * FROM product_img WHERE id_product=?";
    return pdo_query($sql, $id_product);
}
/**
 * Xuất ra 1 ảnh của sản phẩm tương ứng
 * @param int $id_product Mã sản phẩm
 * @return array 1 ảnh
 */
function product_selectImgs($id_product)
{
    $sql = "SELECT * FROM product_img WHERE id_product=?";
    return pdo_query_one($sql, $id_product);
}
/**
 * Xuất 9 sản phẩm giảm giá cao nhất
 * @return array Mảng 9 phần tử sản phẩm
 */
function product_select_9SaleOff()
{
    $sql = "SELECT * FROM product ORDER BY sale_off desc limit 9";
    return pdo_query($sql);
}
/**
 * Xuất sản phẩm theo từ khóa tìm kiếm
 * @param string $keyword Từ khóa tìm kiếm
 * @return array Danh sách sản phẩm trùng khớp
 */
function product_select_ByKeyWord($keyword)
{
    $sql = "SELECT product.* FROM product
            JOIN category ON product.id_category = category.id_category
            JOIN brand ON product.id_brand = brand.id_brand
            WHERE product.name LIKE '%$keyword%' OR brand.name LIKE '%$keyword%' OR category.name LIKE '%$keyword%'";
    return pdo_query($sql);
}
/**
 * Xuất 8 sản phẩm được yêu thích nhất
 * @return array 8 sản phẩm
 */
function product_select_8WishList()
{
    $sql = "SELECT * FROM wish_list ORDER BY id_product desc LIMIT 8";
    return pdo_query($sql);
}
/**
 * Xuất 8 sản phẩm mới nhất
 * @return array 8 sản phẩm
 */
function product_select_8DateLasted()
{
    $sql = "SELECT * FROM product where special=0 and not id_category=9 ORDER BY date desc LIMIT 8";
    return pdo_query($sql);
}
/**
 * Xuất tất cả sản phẩm có giảm giá
 * @return array Các sản phẩm đang giảm giá
 */
function product_select_AllSaleOff()
{
    $sql = "SELECT * FROM product WHERE sale_off = 20 limit 6";
    return pdo_query($sql);
}
/**
 * Xuất danh sách slide trang chủ
 * @return array Danh sách slide
 */
function product_selectAllSlide()
{
    $sql = "SELECT * FROM slider";
    return pdo_query($sql);
}

// Table WISH_LIST

/**
 * Xuất danh sách yêu thích
 * @return array Danh sách yêu thích
 */
function product_likeList()
{
    $sql = "SELECT * FROM wish_list";
    return pdo_query($sql);
}
/**
 * Thích sản phẩm
 * @param int $id_product Mã sản phẩm
 * @param int $id_user Mã khách hàng
 */
function product_like($id_product, $id_user)
{
    $sql = "INSERT INTO wish_list (id_product,id_user) VALUES (?,?)";
    pdo_execute($sql, $id_product, $id_user);
}
/**
 * Kiểm tra sản phẩm tương ứng đã được người dùng thêm vào danh sách thích chưa
 * @param int $id_product Mã sản phẩm
 * @param int $id_user Mã khách hàng
 * @return bool True = Đã thích, False = Chưa thích
 */
function product_checkLiked($id_product, $id_user)
{
    $sql = "SELECT * FROM wish_list WHERE id_product = ? AND id_user = ?";
    return pdo_query_one($sql, $id_product, $id_user);
}
/**
 * Bỏ thích sản phẩm
 * @param int $id_product Mã sản phẩm
 * @param int $id_user Mã khách hàng
 */
function product_unLike($id_wishlist)
{
    $sql = "DELETE FROM wish_list WHERE id_wishlist = ?";
    pdo_execute($sql, $id_wishlist);
}
/**
 * Kiểm tra sản phẩm có thuộc tính size không
 * @param int $id_product Mã sản phẩm
 * @return array Danh sách size của sản phẩm tương ứng
 */
function product_checkSizeExist($id_product)
{
    $sql = "SELECT * FROM size WHERE id_product = ?";
    return pdo_query_one($sql, $id_product);
}
/**
 * Đánh giá sản phẩm
 * @param int $id_product Mã sản phẩm
 * @param int $id_user Mã khách hàng
 * @param int $rating Đánh giá sản phẩm
 * @param string $content Nội dung đánh giá
 */
function product_rating($id_product, $id_user, $rating, $content)
{
    $sql = "INSERT INTO rating(id_rating,id_product,id_user,rating,content) VALUES (null,?,?,?,?)";
    pdo_execute($sql, $id_product, $id_user, $rating, $content);
}
/**
* Xuất tất cả đánh giá của 1 sản phẩm
* @param int $id_product Mã sản phẩm
*/
function product_selectAllRating($id_product){
    $sql = "SELECT * FROM rating WHERE id_product = ?";
    return pdo_query($sql,$id_product);
}
/**
* Xuất đánh giá sản phẩm theo mức đánh giá
* @param int $id_product Mã sản phẩm
* @param int $level Mức đánh giá
*/
function product_selectRatingByLevel($id_product,$level){
    $sql = "SELECT * FROM rating WHERE id_product = ? AND rating = ?";
    return pdo_query($sql,$id_product,$level);
}
