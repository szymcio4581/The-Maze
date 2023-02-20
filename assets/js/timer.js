window.addEventListener("load", timer);

function timer(){

    //pobieranie daty
    var dzisiaj = new Date();

    //data
    var dzien = dzisiaj.getDate();
    var miesiac = dzisiaj.getMonth()+1;
    var rok = dzisiaj.getFullYear();

    //godzina
    var godzina = dzisiaj.getHours();
    if(godzina<10) godzina = "0" + godzina;

    var minuta = dzisiaj.getMinutes();
    if(minuta<10) minuta = "0" + minuta;

    var sekunda = dzisiaj.getSeconds();
    if(sekunda<10) sekunda = "0" + sekunda;

    document.getElementById("time").innerHTML = godzina + ":" + minuta + ":" + sekunda;
    document.getElementById("date").innerHTML = dzien + "." + miesiac + "." + rok;

    setTimeout("timer()", 1000);
}