$(init);

function init () {
    afficher();
    setInterval(afficher, 1000);
    codebarre();
}

function afficher() {
    var jours = ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];
    lD = new Date();
    document.getElementById('heure').innerHTML = '' + jours[lD.getDay()] + '  ' + lD.toLocaleString()+'';

}


function codebarre(){


}
