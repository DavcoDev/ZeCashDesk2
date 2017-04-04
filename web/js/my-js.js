var cancel = false;
var itemId;
var idSales;
var ticket = false;
var idTicket;
var ticketTab = [];
var totalLine;
var totalTicket;
$(init);

function init() {
    afficher();
    setInterval(afficher, 1000);
    scanItems();
}

function afficher() {
    var jours = ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];
    var lD = new Date();
    document.getElementById('heure').innerHTML = '' + jours[lD.getDay()] + '  ' + lD.toLocaleString() + '';
}

function scanItems() {

    scanGencode();
    if (ticket === false) initTicket();
}

function scanGencode() {
    $('#codebarre').keypress((function (event) {
        if (event.keyCode === 13) {
            getGencode();
        }
    }));
    $('#validation').click(getGencode);
    $('#annulation').click(annulation);
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
            if (!$.isEmptyObject(data)) {
                $('#refleft').html('<b>gencode: </b>' + data.gencode + '<b>   produit: </b>' + data.nameItem
                    + '<b>   description: </b>' + data.description + '<b>   rayon: </b>' + data.category
                    + '<b>   prix: </b>' + data.sellPrice + ' €');

                totalLine = $('#qtyTicket').val() * data.sellPrice;
                var ligneAchats = [$('#qtyTicket').val(), data.nameItem, data.sellPrice, totalLine];
                ticketTab.push(ligneAchats);
                updateTicketView();
                itemId = data.id;
                insertSales();
                $('#qtyTicket').val('1');
            } else {
                $('#refleft').html('<b>Ce produit n\'existe pas ou Erreur de saisie !!!!<b>');
            }
        }
    });
}

function initTicket() {
    $('#validation').click(
        $.ajax({
            url: '/terminal/numTicket',
            method: 'POST',
            dataType: "json",
            success: function (data) {
                $('#numTicket').html('Ticket n° : ' + data);
                ticket = true;
                idTicket = data;
            }
        })
    );
}

function annulation() {
    $.ajax({
        url: '/sales/' + idSales,
        method: 'DELETE',
        dataType: "json",
        success: function () {
            cancel = true;
            updateTicketView();
        }
    });
}

function insertSales() {
    $.ajax({
        url: '/sales/insert/' + itemId + '/' + idTicket,
        method: 'POST',
        dataType: "json",
        data: {
            itemId: itemId,
            numTicket: idTicket,
            salesQty: $('#qtyTicket').val()
        },
        success: function (data) {
            idSales = data;
        }
    });
}

function updateTicketView() {
    $('#showTicket').html('');
    totalTicket = 0;
    if (cancel) {
        console.log('valeur de tickettab : '+ticketTab)
        ticketTab.pop();
        console.log('valeur de tickettab apres : '+ticketTab)

        cancel = false;
    }
    for (var i = 0; i < ticketTab.length; i++) {
        totalTicket += ticketTab[i][3];
console.log('ok ok ok ')
        $('#showTicket').append('<tr><td>' + ticketTab[i][0] + '</td><td>' + ticketTab[i][1] + '</td><td>'
            + ticketTab[i][2] + ' € </td><td>' + ticketTab[i][3] + ' €</td></tr>');
        $('#codebarre').val('');

        $('#totalTicket').html('Total  :   ' + totalTicket + ' €');
    }
}

