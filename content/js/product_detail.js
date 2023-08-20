const increaseQuantityProduct = document.querySelector("#btn_increaseQuantityProduct");
const decreaseQuantityProduct = document.querySelector("#btn_descreaseQuantityProduct");
increaseQuantityProduct.addEventListener(
    "click",
    function(){
        let quantity = document.querySelector(".product_quantity");
        quantity.value++;
    }
)
decreaseQuantityProduct.addEventListener(
    "click",
    function(){
        let quantity = document.querySelector(".product_quantity");
        if(quantity.value!=0){
            quantity.value--;
        }
    }
)
