<?php  
    require_once "../../global.php";
    require_once "../../dao/pdo.php";
    require_once "../../dao/user.php";    
    require_once "../../dao/product.php";
    require_once "../../dao/cart.php";
    session_start();
    extract($_REQUEST);
    $id_user = $_SESSION['login'];
    if(exist_param("btn_quantity")){
        cart_update($id_cart,$size,$quantity);
        if($quantity==0){
            cart_delete($id_cart);
        }
    }else if(isset($_GET['id_cart'])){
        cart_delete($_GET['id_cart']);
    }else if(isset($order)){
        $cart_list = explode(",",$order);
        $product_list = array();
        for($i = 0;$i<count($cart_list);$i++){
            $cart = cart_selectById($cart_list[$i]);
            $temp = array(
                "id_product" => $cart['id_product'],
                "size" => $cart['size'],
                "quantity" => $cart['quantity']
            );
            array_push($product_list,$temp);
        }
        add_session("product",$product_list);
        echo "
            <script>window.parent.location.href='../product/?buy'</script>
        ";
    }else{
        if(cart_checkExistSize($id_user,$id_product,$size)){
            $allCarts = cart_checkExistSize($id_user,$id_product,$size);
            $i=0;
            foreach($allCarts as $cart){
                if($cart['size'] == $size){
                    $i++;
                    cart_inscreaseQuantity($cart['id_cart'],$quantity);
                }
                if($i>0){
                    cart_delete($id_cart);
                }
            }
        }else{
            cart_update($id_cart,$size,$quantity);
        }
    }
?>
