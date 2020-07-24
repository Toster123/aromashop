function likesRemove (itemId) {
    $.ajax({
        url: likesRemoveUrl + '?itemId=' + itemId,
        type: 'GET',

        success: function (response) {
            document.getElementById(itemId + "item").remove();
        }
    })
}
