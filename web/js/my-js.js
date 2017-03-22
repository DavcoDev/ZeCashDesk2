
$(init);

function init() {
    afficher();

    getItemByGencode();
    setInterval(afficher, 1000);
}

function afficher() {
    var jours = ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];
    lD = new Date();
    document.getElementById('heure').innerHTML = '' + jours[lD.getDay()] + '  ' + lD.toLocaleString() + '';
}


function getItemByGencode() {
    $('#codebarre').keypress(function (k) {
        if (k.keycode == 13) {
            $.ajax({
                url: '/terminal/genCode/',
                method: 'GET',
                data:{
                    gencode: $('#codebarre').val()
                }
            }).done(function (data) {
                console.log(data.nameItem);
                afficherArticle(data.category, data.nameItem, data.sellPrice, data.tva);
            });
        }
    });
}

function afficherArticle(category, nameItem, sellPrice, tva) {
    $('#liste').append('<h0><u><b>' + category + '</u></b></h0> Tva:' + tva
        + '<br><dd>' + nameItem + ' '+sellPrice+'<br>');
}