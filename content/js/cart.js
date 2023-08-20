var addBtns = document.querySelectorAll(".btn_increaseQuantityProduct");
var minusBtns = document.querySelectorAll(".btn_descreaseQuantityProduct");
var cart_rows = document.querySelectorAll(".cart-row");
var cart_selecters = document.querySelectorAll(".cart_selecter");
var size_selecters = document.querySelectorAll(".size_selecter");
var cart_quantity = document.querySelectorAll(".product_quantity");
var cart_delete = document.querySelectorAll(".btn_delete");
var cart_totalPrice = document.querySelectorAll(".cart_totalPrice");
var cartId = document.querySelectorAll(".id_cart");
const final_price = document.querySelector("#cart_finalPrice");
const btn_submit = document.querySelector("#btn_cart_submit");
const cart_form = document.querySelector("#cart_form");
/**
 * Tính giá tất cả sản phẩm đã chọn
 */
function cart_final_price() {
  let total_price = 0;
  let check = false;
  for (let i = 0; i < cart_selecters.length; i++) {
    if (cart_selecters[i].checked == true) {
      check = true;
      total_price += parseInt(cart_totalPrice[i].getAttribute("data-value"));
      final_price.innerHTML = new Intl.NumberFormat().format(total_price) + "đ";
      final_price.setAttribute("data-value", total_price);
    }
  }
  if (!check) {
    total_price = 0;
    final_price.innerHTML = new Intl.NumberFormat().format(total_price) + "đ";
    final_price.setAttribute("data-value", total_price);
  }
}
/**
 * Tính tổng tiền theo từng hàng khi load trang
 */
cart_rows.forEach((cart_row) => {
  window.addEventListener("load", solve_cartRow_totalPrice(cart_row));
});
/**
 * Tính tổng tiền theo từng hàng sản phẩm
 */
function solve_cartRow_totalPrice(cart_row) {
  let product_quantity = cart_row.querySelector(".product_quantity");
  let product_price = cart_row.querySelector(".cart_currentPrice");
  let product_totalPrice = cart_row.querySelector(".cart_totalPrice");
  product_totalPrice.innerHTML = new Intl.NumberFormat().format(
    parseInt(product_price.getAttribute("data-value")) * product_quantity.value
  );
  product_totalPrice.setAttribute(
    "data-value",
    parseInt(product_price.getAttribute("data-value")) * product_quantity.value
  );
}
/**
 * Tăng số lượng sản phẩm và thay đổi giá
 */
addBtns.forEach((btn_add) => {
  btn_add.addEventListener("click", function (event) {
    let cartRow = event.target.parentElement.parentElement;
    let product_quantity = cartRow.querySelector(".product_quantity");
    let product_price = cartRow.querySelector(".cart_currentPrice");
    let product_totalPrice = cartRow.querySelector(".cart_totalPrice");
    product_quantity.value++;
    product_totalPrice.innerHTML = new Intl.NumberFormat().format(
      parseInt(product_price.getAttribute("data-value")) *
        product_quantity.value
    );
    product_totalPrice.setAttribute(
      "data-value",
      parseInt(product_price.getAttribute("data-value")) *
        product_quantity.value
    );
    let ipt_request = document.createElement("input");
    ipt_request.setAttribute("name", "btn_quantity");
    ipt_request.setAttribute("type", "hidden");
    cartRow.appendChild(ipt_request);
    solve_cartRow_totalPrice(cartRow);
    cart_final_price();
    cartRow.submit();
  });
});
/**
 * Giảm số lượng sản phẩm và thay đổi giá
 */
minusBtns.forEach((btn_minus) => {
  btn_minus.addEventListener("click", function (event) {
    let cartRow = event.target.parentElement.parentElement;
    let product_quantity = cartRow.querySelector(".product_quantity");
    let product_price = cartRow.querySelector(".cart_currentPrice");
    let product_totalPrice = cartRow.querySelector(".cart_totalPrice");
    if (product_quantity.value > 0) {
      product_quantity.value--;
      product_totalPrice.innerHTML = new Intl.NumberFormat().format(
        parseInt(product_price.getAttribute("data-value")) *
          product_quantity.value
      );
      product_totalPrice.setAttribute(
        "data-value",
        parseInt(product_price.getAttribute("data-value")) *
          product_quantity.value
      );
      let ipt_request = document.createElement("input");
      ipt_request.setAttribute("name", "btn_quantity");
      ipt_request.setAttribute("type", "hidden");
      cartRow.appendChild(ipt_request);
      cart_final_price();
      cartRow.submit();
    } else {
      cartRow_prt = cartRow.parentElement;
      cartRow_prt.style.display = "none";
      cart_final_price();
      cartRow.submit();
    }
  });
});
/**
 * Chọn sản phẩm muốn mua và hiển thị giá
 */
cart_selecters.forEach((cart_selecter) => {
  cart_selecter.addEventListener("click", function () {
    cart_final_price();
  });
});
/**
 * Chọn size và xóa các hàng trùng size + cộng dồn số lượng sản phẩm
 */
size_selecters.forEach((size_selecter) => {
  size_selecter.addEventListener("change", function (event) {
    let cartRow = event.target.parentElement.parentElement.parentElement;
    remove_cartRow_sizeExisted(cartRow);
    cartRow.submit();
  });
});
/**
 * Hàm xóa hàng sản phẩm trùng size
 */
function remove_cartRow_sizeExisted_sizeExisted(cartRow) {
  let check = 0;
  let cartRow_div = cartRow.parentElement;
  let seleter = cartRow.querySelector(".size_selecter");
  let quantity = cartRow.querySelector(".product_quantity");
  for (let index = 0; index < cart_rows.length; index++) {
    if (seleter.value == size_selecters[index].value) {
      check++;
    }
    if (check == 2) {
      cart_quantity[index].value =
        parseInt(cart_quantity[index].value) + parseInt(quantity.value);
      cartRow_div.style.display = "none";
      break;
    }
  }
}
//Nút xóa
cart_delete.forEach((btn_delete) => {
  btn_delete.addEventListener("click", function (event) {
    let cartRow =
      event.target.parentElement.parentElement.parentElement.parentElement;
    let cart_quantity = document.querySelector("#cart_quantity");
    cartRow.style.display = "none";
    cart_quantity.innerHTML = parseInt(cart_quantity.innerHTML) - 1;
  });
});
//Nút than toán
btn_submit.addEventListener("click", function () {
  let id_carts = [];
  for (let i = 0; i < cart_selecters.length; i++) {
    if (cart_selecters[i].checked == true) {
      id_carts.push(cartId[i].value);
      let request = document.createElement("input");
      request.setAttribute("name", "order");
      request.setAttribute("type", "hidden");
      request.setAttribute("value", id_carts);
      cart_form.appendChild(request);
      cart_form.submit();
    }
  }
});
// hiệu ứng add
document.addEventListener("DOMContentLoaded", function (event) {
  const cartButtons = document.querySelectorAll(".cart");
  cartButtons.forEach((button) => {
    button.addEventListener("click", cartClick);
  });
  function cartClick() {
    let button = this;
    button.classList.add("clicked");
  }
});
