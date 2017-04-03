var itemId;
$(init);

function init() {
    afficher();

    setInterval(afficher, 1000);
<<<<<<< HEAD
    scanItems();
=======
    scanGencode();
>>>>>>> Gestion_variables_ticket
}

function afficher() {
    var jours = ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];
    lD = new Date();
    document.getElementById('heure').innerHTML = '' + jours[lD.getDay()] + '  ' + lD.toLocaleString() + '';
}

function scanItems() {
    scanGencode();
    initTicket();
}

function scanGencode() {

    $('#codebarre').keypress((function (event) {
        if (event.keyCode == 13) {
            getGencode();
        }
    }));

    $('#validation').click(getGencode);
}

<<<<<<< HEAD
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

=======
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
>>>>>>> Gestion_variables_ticket
