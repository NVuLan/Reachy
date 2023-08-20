const bill_detail = document.querySelectorAll('.bill_detail');
const bill_contain = document.querySelectorAll('.bill__detail--contain');
const user_name = document.querySelectorAll('.name');
const user_email = document.querySelectorAll('.email');
const product = document.querySelectorAll('.pro');
const price = document.querySelectorAll('.price');
const date_bill = document.querySelectorAll('.date');
const address = document.querySelectorAll('.address');
const amount = document.querySelectorAll('.amount');
const note = document.querySelectorAll('.note');

[...bill_detail].forEach(item => item.addEventListener('click', detail_info));
function detail_info(e){
    console.log(e.target.dataset.bill);
    bill_num = e.target.dataset.bill;
    console.log(user_name);
    const template = 
    `<div class="bill__detail">
        <div class="bill__container">
            <h2>Thông tin chi tiết</h2>
            <p><span>Tên khách hàng:</span> ${user_name[bill_num].value}</p>
            <p><span>Email:</span> ${user_email[bill_num].value}</p>
            <p><span>Tên sản phẩm:</span> ${product[bill_num].value}</p>
            <p><span>Giá:</span> ${new Intl.NumberFormat().format(price[bill_num].value*amount[bill_num].value) +"đ"}</p>
            <p><span>Ngày đặt:</span> ${date_bill[bill_num].value}</p>
            <p><span>Địa chỉ:</span> ${address[bill_num].value}</p>
            <p><span>Số lượng:</span> ${amount[bill_num].value}</p>
            <p><span>Ghi chú:</span> ${note[bill_num].value}</p>
        </div>
    </div>`;
    bill_contain[bill_num].insertAdjacentHTML('afterbegin', template);
}
document.body.addEventListener('click', function(e){
    if(e.target.matches('.bill__detail')){
        e.target.parentNode.removeChild(e.target);
}})
