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
                var serverResp = xmlHttpReq.responseText;
                console.log(serverResp);
                try {
                    if (serverResp) {
                    
                        var errorMsgs = JSON.parse(serverResp);

                        /* $.each() as JQUery function closure */
                        $.each(errorMsgs, function(name, errMsg) {
                            var targetID = '#add-aprt-form *[name=' + name + ']';
                            var inputElement = $(targetID);

                            inputElement.css('border', "5px solid red");

                            inputElement.after("<p id='" + name + "-error' style='color:red;font-style: italic;'>"
                                                         + errMsg + "</p>");

                            $('#add-aprt-form').on('submit', function(e){
                                $('#'+name+"-error").remove();
                            });

                        });

                    }
                }catch(error){
                    
                }
                
            } else {
                alert ("Error " + xmlHttpReq.status);
            }
        };

        xmlHttpReq.send(oData);
        ev.preventDefault();
    }, false);
    
    /* add-aprt-form handling - reset invalid red bars to none upon input. */
    if ($('#add-aprt-form').length !== 0){
        $('form#add-aprt-form :input').each(function(){
            $(this).on('input', function(input){
               $(this).css('border', ""); 
            });
        });
    }
    
    /* edit-aprt-form handling - reset invalid red bars to none upon input. */
    if ($('#edit-aprt-form').length !== 0){
        $('form#edit-aprt-form :input').each(function(){
            $(this).on('input', function(input){
               $(this).css('border', ""); 
            });
        });
    }
    
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
                var serverResp = xmlHttpReq.responseText;
                console.log(serverResp);
                
                try {
                    if (serverResp) {
                    
                        var errorMsgs = JSON.parse(serverResp);

                        /* $.each() as JQUery function closure */
                        $.each(errorMsgs, function(name, errMsg) {
                            var targetID = '#edit-aprt-form *[name=' + name + ']';
                            var inputElement = $(targetID);

                            inputElement.css('border', "5px solid red");

                            inputElement.after("<p id='" + name + "-error' style='color:red;font-style: italic;'>"
                                                         + errMsg + "</p>");

                            $('#edit-aprt-form').on('submit', function(e){
                                $('#'+name+"-error").remove();
                            });

                        });

                    }
                } catch (error) {
                    
                }
                
                
            } else {
                alert ("Error " + xmlHttpReq.status);
            }
        };

        xmlHttpReq.send(editData);
        ev.preventDefault();
    }, false);
    
    /*
     * Applies to all myPost 'Delete Post' buttons. This will delete the targeted
     * apartment and remove the thumbnail. 
     */
    if ($('[id^=delete-aprt-btn]').length !== 0) {
        $('[id^=delete-aprt-btn]').on('click', function(e){
            
            var formData    = new FormData();
            var apartmentId = $(this).attr("data-id");
            
            formData.append("apartment_id", apartmentId);
            
            var xmlHttpReq = new XMLHttpRequest();
            xmlHttpReq.open("POST", url + 'landlord/deleteApartment');
            xmlHttpReq.onload = function(event) {
                if (xmlHttpReq.status == 200) {
                    var serverResp = xmlHttpReq.responseText;
                    var errorMsgs;
                    try {
                        if (serverResp) {
                            errorMsgs = JSON.parse(serverResp);
                        }
                    } catch (error) {
                        alert("FAILURE: couldn't delete Apartment! ");
                    }
                }
            }
            
            xmlHttpReq.send(formData);

            $('#aprt-thumbnail-'+apartmentId).remove();
            
        });
    }
});


