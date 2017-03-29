
$(init);

function init() {
    afficher();

    getItemByGencode();
    setInterval(afficher, 1000);
    getGencode();
}

function afficher() {
    var jours = ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];
    lD = new Date();
    document.getElementById('heure').innerHTML = '' + jours[lD.getDay()] + '  ' + lD.toLocaleString() + '';
}


function getGencode() {

    $('#validation').click(function () {
        $.ajax({
            url: '/terminal/genCode',
            method: 'POST',
            dataType: "json",
            data: {
                codebarre: $('#codebarre').val()
            },
            success: function (data) {
                console.log(data);

                $('#showTicket').append('<tr><td>' + $('#qtyTicket').val() + '</td><td>' + data.nameItem + '</td><td>'
                    + data.sellPrice + ' € </td><td>'+ $('#qtyTicket').val()*data.sellPrice +' €</td></tr>');
                $('#codebarre').val('');
            }
        });
    });

function afficherArticle(category, nameItem, sellPrice, tva) {
    $('#liste').append('<h0><u><b>' + category + '</u></b></h0> Tva:' + tva
        + '<br><dd>' + nameItem + ' '+sellPrice+'<br>');
}