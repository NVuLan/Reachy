<?php  
    /**
    * Xuất tất cả thương hiệu
    * @return array Mảng các thương hiệu
    */
    function brand_selectAll(){
        $sql = "SELECT * FROM brand";
        return pdo_query($sql);
    }
    /**
    * Xuất thương hiệu có mã tương ứng
    * @param int $id_brand Mã thương hiệu
    * @return array 1 thương hiệu
    */
    function brand_selectOne($id_brand){
        $sql = "SELECT * FROM brand WHERE id_brand = ?";
        return pdo_query_one($sql, $id_brand);
    }
    /**
    * Xuất tất cả thương hiệu theo loại hàng
    * @param int $id_category Mã loại hàng
    * @return array Mảng các thương hiệu tương ứng với loại hàng
    */
    function brand_selectAll_byCateId($id_category)
    {
        $sql = "SELECT * FROM brand WHERE id_category = ?";
        return pdo_query($sql, $id_category);
    }
    /**
    * Thêm thương hiệu
    * @param int $id_category mã loại hàng
    * @param string $name Tên thương hiệu
    */
    function brand_insert($id_category,$name){
        $sql = "INSERT INTO brand(id_brand,id_category,name) VALUES (NULL,?,?)";
        pdo_execute($sql,$id_category,$name);
    }
    /**
    * Xóa thương hiệu
    * @param int $id_brand Mã thương hiệu
    */
    function brand_delete($id_brand){
        $sql = "DELETE FROM brand WHERE id_brand = ?";
        pdo_execute($sql,$id_brand);
    }
    /**
    * Cập nhật thương hiệu
    * @param int $id_category Mã loại hàng
    * @param string $name Tên thương hiệu
    * @param int $id_brand Mã thương hiệu
    */
    function brand_update($id_category,$name,$id_brand){
        $sql = "UPDATE brand SET id_category = ? , name = ? WHERE id_brand = ?";
        pdo_execute($sql,$id_category,$name,$id_brand);
    }
?>