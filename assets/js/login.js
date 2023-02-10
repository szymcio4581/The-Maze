function okokok(){
    document.getElementById('logyn').style.visibility = 'visible';
    document.getElementById('logyn').style.transition = 'opacity 500ms';
    document.getElementById('logyn').style.opacity = 1;
}
function okok(){
    document.getElementById('logyn').style.transition = "opacity 500ms";
    document.getElementById('logyn').style.opacity = 0;
    setTimeout(logynHide, 500);
}
function logynHide(){
    document.getElementById('logyn').style.visibility = `hidden`;
}
