$(init);

function init () {
    afficher();
    setInterval(afficher, 1000);
}

function afficher() {
    var jours = ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];
    lD = new Date();
    document.getElementById('heure').innerHTML = '' + jours[lD.getDay()] + '  ' + lD.toLocaleString()+'';
    document.getElementById('heure2').innerHTML = '<p class="navbar-text">' + jours[lD.getDay()] + '  ' + lD.toLocaleString()+'</p>';
}



