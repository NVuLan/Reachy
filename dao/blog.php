<?php  
    /**
    * Xuất danh sách tin tức
    * @return array  Danh sách tin tức
    */
    function blog_selectAll(){
        $sql = "SELECT * FROM blog";
        return pdo_query($sql);
    }
    /**
    * Xuất tin tức theo mã tin tức
    * @param int $id_blog Mã tin tức
    * @return array Tin tức theo mã tương ứng
    */
    function blog_selectById($id_blog){
        $sql = "SELECT * FROM blog WHERE id_blog = ?";
        return pdo_query_one($sql,$id_blog);
    }
    /**
    * Xóa tin tức theo mã tin tức
    * @param int $id_blog Mã tin tức
    * @return array Tin tức theo mã tương ứng
    */
    /**
    * Thêm 1 slide
    * @param string $title Tiêu đề
    * @param string $content Nội dung
    * @param string $img Ảnh
    */
    function blog_insert($title, $content, $img){
        $sql = "INSERT INTO blog(id_blog, title, content, img) VALUES (NULL,?,?,?)";
        pdo_execute($sql, $title, $content, $img);
    }
    function blog_delete($id_blog){
        $sql = "DELETE FROM blog WHERE id_blog = ?";
        pdo_execute($sql,$id_blog);
    }
    /**
    * Cập nhật slide
    * @param int $id_blog Mã blog
    * @param string $title Tiêu đề
    * @param string $content Nội dung
    * @param string $img Ảnh
    */
    function blog_update($id_blog, $title, $content, $img){
        $sql = "UPDATE blog SET title = ?, content = ?, img = ? WHERE id_blog=?";
        pdo_execute($sql, $title, $content, $img, $id_blog);
    }
    /**
    * Lấy ảnh bìa tin tức
    * @param int $id_blog Mã tin tức
    * @return string Ảnh
    */
    function blog_selectFirstImg($id_blog){
        $blog = blog_selectById($id_blog);
        $firstImg = explode("`",$blog['img']);
        return $firstImg[0];
    }
    /**
    * Tăng lượt xem tin tức
    * @param int $id_blog Mã tin tức
    */
    function blog_increaseView($id_blog){
        $sql = "UPDATE blog SET view = view + 1 WHERE id_blog = ?";
        pdo_execute($sql,$id_blog);
    }
?>