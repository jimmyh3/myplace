$(function() {
    
    
    /**
     * Declare AJAX function to send the #add_aprt_form form object to 
     * landlord->addApartment() to add a new Apartment to the database.
     */
    var form = document.forms.namedItem('add-aprt-form');
    form.addEventListener('submit', function(ev) {

        var oData = new FormData(form);

        var xmlHttpReq  = new XMLHttpRequest();
        xmlHttpReq.open("POST", url + "landlord/addApartment", true);
        xmlHttpReq.onload = function(oEvent) { //onload == request completed
            if (xmlHttpReq.status == 200) {
                alert(xmlHttpReq.responseText);
            } else {
                alert ("Error " + xmlHttpReq.status);
            }
        };

        xmlHttpReq.send(oData);
        ev.preventDefault();
    }, false);
    
    
    /**
     * Declare AJAX function to send the #add_aprt_form form object to 
     * landlord->addApartment() to add a new Apartment to the database.
     */
    var editform = document.forms.namedItem('edit-aprt-form');
    editform.addEventListener('submit', function(ev) {

        var editData = new FormData(editform);

        var xmlHttpReq  = new XMLHttpRequest();
        xmlHttpReq.open("POST", url + "landlord/editApartment", true);
        xmlHttpReq.onload = function(oEvent) { //onload == request completed
            if (xmlHttpReq.status == 200) {
                alert(xmlHttpReq.responseText);
            } else {
                alert ("Error " + xmlHttpReq.status);
            }
        };

        xmlHttpReq.send(editData);
        ev.preventDefault();
    }, false);
    
});


