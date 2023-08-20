<?php  
    /**
    * Xuất bình luận theo mã sản phẩm
    * @param int $id_product Mã sản phẩm
    * @return array Danh sách bình luận
    */
    function comment_selectByIdProduct($id_product){
        $sql = "SELECT * FROM comment WHERE id_product=?";
        return pdo_query($sql, $id_product);
    }
    /**
    * Thêm bình luận
    * @param int $id_product
    * @param int $id_user
    * @param string $message
    */
    function comment_insert($id_product, $id_user, $message){
        $sql = "INSERT INTO comment(id_comment,id_product, id_user, content) VALUES (NULL,?,?,?)";
        pdo_execute($sql, $id_product, $id_user, $message);
    }
    /**
    * Xóa bình luận
    * @param int $id_comment
    */
    function comment_delete($id_comment){
        $sql = "DELETE FROM comment WHERE id_comment = ?";
        pdo_execute($sql, $id_comment);
    }
?>