function cartAdd (itemId) {

    $.ajax({
        url: cartAddUrl + '?itemId=' + itemId,
        type: 'GET',

        success: function (response) {
            $(".cartAddButton" + itemId).attr('hidden', true);
            $(".cartRemoveButton" + itemId).attr('hidden', false);
        }
    })


}
function cartRemove (itemId) {

    $.ajax({
        url: cartRemoveUrl + '?itemId=' + itemId,
        type: 'GET',

        success: function (response) {
            $(".cartAddButton" + itemId).attr('hidden', false);
            $(".cartRemoveButton" + itemId).attr('hidden', true);
        }
    })

}
function likesAdd (itemId) {

    $.ajax({
        url: likesAddUrl + '?itemId=' + itemId,
        type: 'GET',

        success: function (response) {
            $(".likeAddButton" + itemId).attr('hidden', true);
            $(".likeRemoveButton" + itemId).attr('hidden', false);
        }
    })

}
function likesRemove (itemId) {

    $.ajax({
        url: likesRemoveUrl + '?itemId=' + itemId,
        type: 'GET',

        success: function (response) {
            $(".likeAddButton" + itemId).attr('hidden', false);
            $(".likeRemoveButton" + itemId).attr('hidden', true);
        }
    })

}
