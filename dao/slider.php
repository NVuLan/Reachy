<?php  
    /**
    * Xuất toàn bộ slider
    * @return array slider
    */
    function slider_selectAll(){
        $sql = "SELECT * FROM slider";
        return pdo_query($sql);
    }
    /**
    * Xuất slider theo mã
    * @param int $id_slider Mã slider
    * @return array slider
    */
    function slider_selectById($id_slider){
        $sql = "SELECT * FROM slider WHERE id_slide = ?";
        return pdo_query_one($sql, $id_slider);
    }
    /**
    * Thêm 1 slide
    * @param string $title Tiêu đề
    * @param string $content Nội dung
    * @param string $img Ảnh
    * @param string $id_category Mã loại
    * @param string $id_brand Mã thương hiệu
    */
    function slider_insert($title, $content, $img, $id_category, $id_brand){
        $sql = "INSERT INTO slider(id_slide, title, content, img , id_category, id_brand) VALUES (NULL,?,?,?,?,?)";
        pdo_execute($sql, $title, $content, $img, $id_category, $id_brand);
    }
    /**
    * Xóa slide
    * @param int $id_slide Mã slide
    */
    function slider_delete($id_slider){
        $sql = "DELETE FROM slider WHERE id_slide=?";
        pdo_execute($sql, $id_slider);
    }
    /**
    * Cập nhật slide
    * @param int $id_slider Mã slide
    * @param string $title Tiêu đề
    * @param string $content Nội dung
    * @param string $img Ảnh
    * @param string $id_category Mã loại
    * @param string $id_brand Mã thương hiệu
    */
    function slider_update($id_slider, $title, $content, $img, $id_category, $id_brand){
        $sql = "UPDATE slider SET title = ?, content = ?, img = ?, id_category = ?, id_brand = ? WHERE id_slide=?";
        pdo_execute($sql, $title, $content, $img, $id_category, $id_brand, $id_slider);
    }
?>