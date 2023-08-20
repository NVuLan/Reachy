/**
* Xem trước ảnh sau khi upload và hiện nút lưu khi đã upload ảnh
*/
const browseImgButton = document.querySelector('#browseImg');
browseImgButton.addEventListener(
    "change",
    function() {
        let saveButton = document.querySelector("#btn-save");
        let userImg = document.querySelector("#defaultUploadImg");
        let imgSrc = browseImgButton.files[0];
        userImg.src = URL.createObjectURL(imgSrc);
        saveButton.style.display = "block";
        browseImgButton.style.display = "none";
    }
)
// =============================================================================================

var tabLinks = document.querySelectorAll(".tablinks");
var tabContent = document.querySelectorAll(".tabcontent");

tabLinks.forEach(function(el) {
    el.addEventListener("click", openTabs);
});


function openTabs(el) {
    var btn = el.currentTarget; // lắng nghe sự kiện và hiển thị các element
    var electronic = btn.dataset.electronic; // lấy giá trị trong data-electronic

    tabContent.forEach(function(el) {
        el.classList.remove("active");
    }); //lặp qua các tab content để remove class active

    tabLinks.forEach(function(el) {
        el.classList.remove("active");
    }); //lặp qua các tab links để remove class active

    document.querySelector("#" + electronic).classList.add("active");
    // trả về phần tử đầu tiên có id="" được add class active

    btn.classList.add("active");
    // các button mà chúng ta click vào sẽ được add class active
}