var date = new Date();
var heure =date.getHours();
var minute=date.getMinutes();
var seconde=date.getSeconds();
var f = function() {
    if(seconde<59)
        seconde++;
    else
    {minute++;seconde=00;}
    if(minute>59)
    {heure++;minute=0;}
    document.getElementById("heure").textContent=heure+":"+minute+":"+seconde;
    setTimeout(f, 1000);
}
setTimeout(f, 1000);