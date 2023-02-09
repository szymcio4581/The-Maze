let loader = document.getElementById('loader');
window.addEventListener("load", function (){
    loader.style.transition = "opacity 1000ms";
    loader.style.opacity = 0;
    setTimeout(loaderHide, 1000);
})
function loaderHide(){
    loader.style.display = `none`;
}