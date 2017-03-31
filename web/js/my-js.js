$(init);

function init() {
    afficher();
    setInterval(afficher, 1000);
    scanItems();
}

function afficher() {
    var jours = ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];
    lD = new Date();
    document.getElementById('heure').innerHTML = '' + jours[lD.getDay()] + '  ' + lD.toLocaleString() + '';

}

function scanItems() {
    getGencode();
    initTicket();
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
                $('#refleft').val('');
                $('#refleft').html('<b>gencode: </b>' + data.gencode + '<b>   produit: </b>' + data.nameItem
                    + '<b>   description: </b>' + data.description + '<b>   rayon: </b>' + data.category
                    + '<b>   prix: </b>' + data.sellPrice + ' €');

                $('#showTicket').append('<tr><td>' + $('#qtyTicket').val() + '</td><td>' + data.nameItem + '</td><td>'
                    + data.sellPrice + ' € </td><td>' + $('#qtyTicket').val() * data.sellPrice + ' €</td></tr>');
                $('#codebarre').val('');
            }
        });
    });

    function initTicket() {


    }

}
