var cancel = false;
var itemId;
var idSales;
var ticket = false;
var idTicket;
var ticketTab = [];
var totalLine;
var totalTicket;
var encaissement=0;
var cbIn=0;
var chqIn=0;
var espIn=0;

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
    $('#reglement').click(reglement);
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
    $.ajax({
        url: '/terminal/numTicket',
        method: 'POST',
        dataType: "json",
        success: function (data) {
            $('#numTicket').html('Ticket n° : ' + data);
            ticket = true;
            idTicket = data;
            $('#totalTicket').html('Total  :  0 €');
        }
    })
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
        ticketTab.pop();
        cancel = false;
        if (totalTicket === 0) {
            $('#totalTicket').html('Total  :  0 €');
        }
    }
    for (var i = 0; i < ticketTab.length; i++) {
        totalTicket += ticketTab[i][3];
        $('#showTicket').append('<tr><td>' + ticketTab[i][0] + '</td><td>' + ticketTab[i][1] + '</td><td>'
            + ticketTab[i][2] + ' € </td><td>' + ticketTab[i][3] + ' €</td></tr>');
        $('#codebarre').val('');

        $('#totalTicket').html('Total  :   ' + totalTicket + ' €');
    }
}

function reglement() {
    encaissement=0;
    cbIn= parseFloat($('#cb').val());
    chqIn= parseFloat($('#chq').val());
    espIn= parseFloat($('#esp').val());
    if (isNaN(cbIn))
        cbIn=0;
    if (isNaN(chqIn))
        chqIn=0;
    if (isNaN(espIn))
        espIn=0;
     encaissement= cbIn+chqIn+espIn;
    alert('Réglé: ' + encaissement+' €');
    if (encaissement == totalTicket) {
        insertCashDesk();
    }
    else {
        encaissement=0;
        $('#cb').val(0);
        $('#esp').val(0);
        $('#chq').val(0);
    }
}

function insertCashDesk() {
    $.ajax({
        url: '/cash_desk/insert/'+idTicket,
        method: 'POST',
        dataType: "json",
        data: {
            cbIn: cbIn,
            espIn: espIn,
            chqIn: chqIn,
            typeTransaction: 1
        },
        success: function () {
            alert('Paiement validé.\n\nTransaction terminée.\n\nClickez sur OK pour client suivant\n\n');
            $('#refleft').html("Règlement conforme.\n\nClient Suivant");
            setTimeout(window.location.replace("http://localhost:8000/terminal/"), 5000);


        }
    });
}