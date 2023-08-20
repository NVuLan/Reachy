<?php  
    /**
    * Xuất toàn bộ loại hàng sản phẩm
    * @return array Categories
    */
    function category_selectAll(){
        $sql = "SELECT * FROM category";
        return pdo_query($sql);
    }
    /**
    * Xuất loại hàng theo mã loại hàng
    * @param int $id_category Mã loại hàng
    * @return array Category
    */
    function category_selectOne($id_category){
        $sql = "SELECT * FROM category WHERE id_category = ?";
        return pdo_query_one($sql, $id_category);
    }
    /**
    * Thêm 1 loại hàng sản phẩm
    * @param string $category_name Tên loại hàng
    */
    function category_insert($category_name){
        $sql = "INSERT INTO category(name) VALUES (?)";
        pdo_execute($sql, $category_name);
    }
    /**
    * Xóa loại hàng theo mã loại hàng
    * @param int $id_category Mã loại hàng
    */
    function category_delete($id_category){
        $sql = "DELETE FROM category WHERE id_category=?";
        pdo_execute($sql, $id_category);
    }
    /**
    * Cập nhật loại hàng theo mã loại hàng chỉ định
    * @param int $id_category Mã loại hàng
    * @param string $category_name Tên loại hàng
    */
    function category_update($id_category, $category_name){
        $sql = "UPDATE category SET name = ? WHERE id_category=?";
        pdo_execute($sql, $category_name, $id_category);
    }
?>