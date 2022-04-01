document.addEventListener("DOMContentLoaded", function() {

    document.querySelector('#fitness-access_tr').style.display = "none"
    document.querySelector('#golf-facility-access_tr').style.display = "none"

    if(document.querySelector('select[name="membership_level"] option[selected="selected"]').value === '2') {
        document.querySelector('#golf-facility-access_tr').style.display = "table-row"
    }

    if(document.querySelector('select[name="membership_level"] option[selected="selected"]').value === '3') {
        document.querySelector('#fitness-access_tr').style.display = "table-row"
    }

    if(document.querySelector('select[name="membership_level"] option[selected="selected"]').value === '4') {
        document.querySelector('#fitness-access_tr').style.display = "table-row"
        document.querySelector('#golf-facility-access_tr').style.display = "table-row"
    }

});



