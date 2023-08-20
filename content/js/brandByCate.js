function selecterValue(request){
    let cate_value = document.getElementById("product_cates").value;
    let brands = document.getElementById("product_brands");
    console.log(brands.value);
    let min = brands.length;
    for(let i=0;i<brands.length;i++){
        let brand_value = brands[i].value;
        if(brand_value.split("-")[0] == cate_value){
            if(i<min){
                min = i;
            }
            brands[i].style.display = "block";
        }else{
            brands[i].style.display = "none";
        }
    }
    if(request=='add'){
        brands[min].selected = true;
    }
}
