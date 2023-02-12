function menuShow(){
    if (document.getElementById('burger').checked){
        document.getElementById('menu').style.left = '0';
        document.getElementById('menuContent').style.opacity = '1';
        document.getElementById('okok').style.opacity = '1';
    } else {
        document.getElementById('menu').style.left = '-13vw';
        document.getElementById('menuContent').style.opacity = '0';
        document.getElementById('okok').style.opacity = '0';
    }
}