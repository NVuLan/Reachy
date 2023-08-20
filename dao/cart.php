<?php
    /**
    * Xuất danh sách sản phẩm trong giỏ hàng của khách hàng
    * @param int $id_user Mã khách hàng
    * @return array Danh sách sản phẩm
    */
    function cart_selectByUserId($id_user){
        $sql = "SELECT * FROM cart WHERE id_user = ?";
        return pdo_query($sql,$id_user);
    }
    /**
    * Xuất giỏ hàng theo mã giỏ hàng
    * @param int id_cart Mã giỏ hàng
    * @return array danh sách giỏ hàng
    */
    function cart_selectById($id_cart){
        $sql = "SELECT * FROM cart WHERE id_cart = ?";
        return pdo_query_one($sql,$id_cart);
    }
    /**
    * Thêm sản phẩm vào giỏ hàng 
    * @param int $id_user Mã khách hàng
    * @param int $id_product Mã sản phẩm
    * @param string $size Kích thước sản phẩm
    * @param int $quantity Số lượng sản phẩm
    */
    function cart_insert($id_user,$id_product,$size,$quantity){
        $sql = "INSERT INTO cart (id_user,id_product,size,quantity) VALUES (?,?,?,?)";
        pdo_execute($sql,$id_user,$id_product,$size,$quantity);
    }
    /**
    * Xóa sản phẩm khỏi giỏ hàng
    * @param int $id_cart Mã dòng trong giỏ hàng
    */
    function cart_delete($id_cart){
        $sql = "DELETE FROM cart WHERE id_cart = ?";
        pdo_execute($sql,$id_cart);
    }
    /**
    * Cập nhật dòng tương ứng trong giỏ hàng
    * @param int $id_cart Mã dòng trong giỏ hàng
    * @param string $size Kích thước sản phẩm
    * @param int $quantity Số lượng sản phẩm
    * @param int $quantity Số lượng sản phẩm
    */
    function cart_update($id_cart,$size,$quantity){
        $sql = "UPDATE cart SET size=?, quantity = ? WHERE id_cart = ?";
        pdo_execute($sql,$size,$quantity,$id_cart);
    }
    /**
    * Kiểm tra sản phẩm đã được người dùng thích chưa
    * @param int $id_user Mã khách hàng
    * @param int $id_product Mã sản phẩm
    * @return array Danh sách sản phẩm trong giỏ hàng
    */
    function cart_checkExist($id_user,$id_product){
        $sql = "SELECT * FROM cart WHERE id_user = ? AND id_product = ?";
        return pdo_query($sql,$id_user,$id_product);
    }
    /**
    * Kiểm tra sản phẩm trong giỏ hàng có tồn tại size chỉ định chưa
    * @param int $id_user Mã khách hàng
    * @param int $id_product Mã sản phẩm
    * @param string $size Kích thước sản phẩm
    * @return array Danh sách sản phẩm trong giỏ hàng
    */
    function cart_checkExistSize($id_user,$id_product,$size){
        $sql = "SELECT * FROM cart WHERE id_user = ? AND id_product = ? AND size = ?";
        return pdo_query($sql,$id_user,$id_product,$size);
    }
    /**
    * Tăng số lượng sản phẩm của sản phẩm trong giỏ hàng
    * @param int $id_cart Mã dòng trong giỏ hàng
    * @param int $quantity Số lượng sản phẩm
    */
    function cart_inscreaseQuantity($id_cart,$quantity){
        $sql = "UPDATE cart SET quantity = quantity + ? WHERE id_cart = ?";
        pdo_execute($sql,$quantity,$id_cart);
    }
    
?>
