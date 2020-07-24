function cartAdd (itemId) {
    $.ajax({
        url: cartAddUrl + '?itemId=' + itemId,
        type: 'GET',

        success: function (response) {
            location.reload();
        }
    })
}

function cartRemove (itemId) {
    $.ajax({
        url: cartRemoveUrl + '?itemId=' + itemId,
        type: 'GET',

        success: function (response) {
            location.reload();
        }
    })
}
