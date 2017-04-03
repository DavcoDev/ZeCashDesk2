var itemId;

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
    scanGencode();
    // initTicket();
}

function scanGencode() {
    $('#codebarre').keypress((function (event) {
        if (event.keyCode == 13) {
            getGencode();
        }
    }));
    $('#validation').click(getGencode);
}


function getGencode() {
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
            insertSales(data.id);
        }
    });
}


function initTicket() {
    $('#validation').click(
        $.ajax({
            url: '/terminal/numTicket',
            method: 'GET'
        }).done(function (data) {
            $('#numTicket').html(data);
        })
    );
}

function annulation(saleId) {
    $('#annulation').click(function () {
        $.ajax({
            url: '/sales/' + saleId,
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

function insertSales(itemId, ticketId) {
    $.ajax({
        url: '/sales/insert/' + itemId + '/' + ticketId,
        method: 'POST',
        dataType: "json",
        data: {
            itemId: itemId,
            ticketId: ticketId,
            salesQty: $('#qtyTicket').val()
        },
        success: function (data) {
            
        }
    });
}

