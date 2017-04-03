var itemId;
$(init);

function init() {
    afficher();

    setInterval(afficher, 1000);
    scanGencode();
}

function afficher() {
    var jours = ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];
    lD = new Date();
    document.getElementById('heure').innerHTML = '' + jours[lD.getDay()] + '  ' + lD.toLocaleString() + '';
}


function scanGencode() {
    $('#validation').click(function () {
        $.ajax({
            url: '/terminal/genCode',
            method: 'POST',
            dataType: "json",
            data: {
                codebarre: $('#codebarre').val()
            },
            success: function (data) {
                $('#showTicket').append('<tr><td>' + $('#qtyTicket').val() + '</td><td>' + data.nameItem + '</td><td>'
                    + data.sellPrice + ' € </td><td>' + $('#qtyTicket').val() * data.sellPrice + ' €</td></tr>');
                $('#codebarre').val('');
                itemId = data.id;
            }
        });
    });
    insertSales(itemId); //J'envoie à insertSales l'id de Items
}

function annulation() {
    $('#annulation').click(function () {
        $.ajax({
            url: '/sales/',
            method: 'DELETE',
            dataType: "json",
            data: {
                salesId: $('#codebarre').val()
            },
            success: function (data) {
            }
        });
    });
}

function insertSales(itemId) {
    $.ajax({
        url: '/sales/insert',
        method: 'POST',
        dataType: "json",
        data: {
            itemId: itemId,
            // numTicket: $('#numTicket').val(),
            numTicket: 1,
            salesQty: $('#quantite').val()
        },
        success: function (data) {
        }
    });
}
