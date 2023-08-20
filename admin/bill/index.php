
<?php
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch($act){
            case 'list' :
                include 'bill/list.php';
                break;
            case 'del' :
                if(isset($_GET['id'])&&($_GET['id']!='')){
                    $id_bill = $_GET['id'];
                    bill_delete($id_bill);
                }
                include 'bill/list.php';
                break;
            case 'update_status' :
                $id_bill = $_POST['id_bill'];
                $status = $_POST['status'];
                for($i=0;$i<=count($id_bill)-1;$i++){
                    bill_updateStatus($status[$i], $id_bill[$i]);
                }
                $noti = 'Cập nhật thành công';
                include 'bill/list.php';
                break;
            default:
                include 'bill/list.php';
                break;
        }
    }
?>