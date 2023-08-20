const productSort = document.querySelector('#product__sort');
const page_control_opt = document.querySelector(".pageControl-option");
productSort.addEventListener(
    "change",
    function (){
        let sortForm = document.querySelector("#sort__form");
        sortForm.submit();
    }
)
page_control_opt.addEventListener(
    "click",
    function (){
        let sortForm = document.querySelector("#sort__form");
        sortForm.submit();
    }
)


