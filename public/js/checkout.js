function Selected(a) {

    var label = a.value;

    if (label==1) {
        document.getElementById("deliverySelected").hidden=true;
        document.getElementById("pickupSelected").hidden=false;
    } else {
        document.getElementById("deliverySelected").hidden=false;
        document.getElementById("pickupSelected").hidden=true;
    }
}

window.addEventListener('DOMContentLoaded', function() {
    Selected(document.getElementById('shippingOption'));
    if (document.getElementById('date').type != 'date') {
        $('#date').datepicker({
            minDate: '+7D',
            maxDate: '+40D',
            dateFormat: 'yy-mm-dd'
        });
    }
});
