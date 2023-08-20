/**
* Nút hủy đơn hàng
*/
var btns_cancel = document.querySelectorAll('.order__btn--cancel');
btns_cancel.forEach(btn_cancel => {
    btn_cancel.addEventListener(
        "click",
        function(event){
            let order_row = event.target.parentElement.parentElement.parentElement;
            order_row.remove(); //Xóa hàng cũ
            // //Gọi box chứa sản phẩm đã hủy
            let order_cancelBox = document.querySelector("#order_cancel");
            let order_list = order_cancelBox.querySelector(".order__rows--container");
            let btn_repurchase = document.querySelector(".order__btn--repurchase")
            //Tạo đường dẫn mới cho nút mua lại
            let repurchase_href = btn_repurchase.href.substr(0,btn_repurchase.href.length-2);
            let id_bill = event.target.href.substr(-2);
            let lastUrl = event.target.href;
            let new_href = repurchase_href +id_bill;
            event.target.href = new_href;
            event.target.classList.remove(".order__btn--cancel");
            event.target.innerHTML = "Mua lại";
            let new_row = document.createElement("li");
            new_row.setAttribute("class","order__row");
            new_row.innerHTML = order_row.innerHTML;
            event.target.href = lastUrl;
            order_list.appendChild(new_row);
        }
    )
});
//Nút đánh giá
var btns_rating = document.querySelectorAll(".btn_rating");
btns_rating.forEach(btn_rating => {
    btn_rating.addEventListener(
        "click",
        function(event){
            let rating_content = event.target.parentElement.parentElement;
            let rating_checkbox = document.querySelector("#rating_checkbox");
            rating_checkbox.checked = false;
            rating_content.submit();
            rating_content.remove();
        }
    )
});