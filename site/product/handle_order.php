<?php 
    require_once "../../global.php";
    require_once "../../dao/pdo.php";
    require_once "../../dao/user.php";    
    require_once "../../dao/product.php";
    require_once "../../dao/bill.php";
    session_start();
    extract($_REQUEST);
    if(exist_param("cancel")){
        $id_bill = $_GET['cancel'];
        bill_cancel($id_bill);
    }else if(exist_param("taken")){ 
        $id_bill = $_GET['taken'];
        bill_taken($id_bill);
        echo "
            <script>window.parent.location.href='../user/?info'</script>
        ";
    }else if(exist_param("repurchase")){
        $bill_detail = bill_detail_selectByIdBill($_GET['repurchase']);
        $product_list = array();
        foreach($bill_detail as $product_row){
            $temp = array(
                "id_product" => $product_row['id_product'],
                "size" => $product_row['size'],
                "quantity" => $product_row['amount']
            );
            array_push($product_list,$temp);
        }
        add_session("product",$product_list);
        echo "
            <script>window.parent.location.href='../product/?buy'</script>
        ";
    }else if(exist_param("btn-rating")){
        if(!isset($rating)){
            $rating = 5;
        }
        product_rating($id_product,$_SESSION['login'],$rating,$rating_content);
        bill_detail_rated($id_billdetail);

    }else{
        $full_address = $address .", " .$village .", " .$district .", " .$province;
        $id_user = $_SESSION['login'];
        if(isset($_SESSION['product'])){
            $products = $_SESSION['product'];
            if(!is_array($products[0])){
                $products = array($products);
            }
        }
        if($payment == "cod"){
            $order_info = array(
                "username" => $username,
                "email" => $email,
                "phone_number" => $phone_number,
                "address" => $full_address
            );
            add_session("order_info",$order_info);
            bill_insert($id_user,$full_address,$payment,$note);
            $bill = bill_selectLasted();
            $id_bill = $bill['id_bill'];
            foreach($products as $product){
                bill_detail_insert($id_bill,$product['id_product'],$product['size'],$product['quantity']);
            }
            echo "
                <script>window.parent.location.href='../product/?order_return&id_bill=$id_bill'</script>
            ";
        }else{
            echo "ss";
        }
    }
?>