<?php
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch($act){
            case 'add' :
                if(isset($_POST['submit'])&&($_POST['submit'])){
                    $name = $_POST['name'];
                    $id_cate = $_POST['id_cate'];
                    $id_brand = $_POST['id_brand'];
                    $price = $_POST['price'];
                    $sale_off = $_POST['sale_off'];
                    $description = $_POST['description'];
                    $feature = $_POST['feature'];
                    $special = $_POST['special'];
                    // $hinh = $_FILES['hinh']['name'];
                    //upload
                    // $hinh = save_file('hinh', $UPLOAD_URL);
                    //insert
                    product_insert($id_cate, $id_brand, $name, $price, $sale_off, $feature, $description, $special);
                    //
                    $noti = 'Thêm thành công';
                }
                include 'product/add.php';
                break;
            case 'list' :
                include 'product/list.php';
                break;
            case 'del' :
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $id = $_GET['id'];
                    product_delete($id);
                }
                include 'product/list.php';
                break;
            case 'update' :
                include 'product/update.php';
                break;
            case 'update_product' :
                if(isset($_POST['submit'])&&($_POST['submit'])){
                    $id_product = $_POST['hidden'];
                    $name = $_POST['name'];
                    $id_cate = $_POST['id_cate'];
                    $id_brand = $_POST['id_brand'];
                    $price = $_POST['price'];
                    $sale_off = $_POST['sale_off'];
                    $description = $_POST['description'];
                    $feature = $_POST['feature'];
                    $special = $_POST['special'];
                    // $hinh = $_FILES['hinh']['name'];
                    //upload
                    // $hinh = save_file('hinh', $UPLOAD_URL);
                    //insert
                    product_update($id_cate, $id_brand, $name, $price, $sale_off, $feature, $description,$special, $id_product);
                    //
                    $noti = 'Thêm thành công';
                }
                include 'product/list.php';
                break;
            case 'rating':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $id_product = $_GET['id'];
                    $allRating = count(product_selectAllRating($id_product));
                    if($allRating!=0){
                        $level1 = (count(product_selectRatingByLevel($id_product,"1"))/$allRating)*100;
                        $level2 = (count(product_selectRatingByLevel($id_product,"2"))/$allRating)*100;
                        $level3 = (count(product_selectRatingByLevel($id_product,"3"))/$allRating)*100;
                        $level4 = (count(product_selectRatingByLevel($id_product,"4"))/$allRating)*100;
                        $level5 = (count(product_selectRatingByLevel($id_product,"5"))/$allRating)*100;
                        $level = array(
                            $level1,$level2,$level3,$level4,$level5
                        );
                    }else{
                        $massage = "Chưa có đánh giá";
                    }
                }
                include 'product/statistic.php';
                break;
            default:
                include 'product/add.php';
                break;
        }
    }
?>