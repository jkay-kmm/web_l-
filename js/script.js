//--------------Product--------------------
const bigImg = document.querySelector(".product-content-left-big-img img")
const smalImg =  document.querySelectorAll(".product-content-left-small-img img")
smalImg.forEach(function(imgItem,X) {
    imgItem.addEventListener("click",function(){
        bigImg.src = smalImg.src
    })
})