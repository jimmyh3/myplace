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
                
                try {
                    if (serverResp) {
                    
                        var serverMsgs = JSON.parse(serverResp);

                        /*
                         *  $.each() as JQUery function closure.
                         *  Dynamically create and apply Jquery function to
                         *  display red borders + text for validation.
                         */
                        $.each(serverMsgs, function(name, errMsg) {
                            var targetID = '#add-aprt-form *[name=' + name + ']';
                            var inputElement = $(targetID);

                            inputElement.css('border', "5px solid red");

                            inputElement.after("<p id='" + name + "-error' style='color:red;font-style: italic;'>"
                                                         + errMsg + "</p>");

                            $('#add-aprt-form').on('submit', function(e){
                                $('#'+name+"-error").remove();
                            });

                        });

                        _apartmentFormActionOutput(serverMsgs);
                        
                        /*
                         * Refresh the page to show updated changes.
                         */
                        if (serverMsgs.hasOwnProperty('Success')
                                    && !isEmptyOrSpaces(serverMsgs['Success'])) {
                            
                            location.reload();  //Refreshes page to display new Apartment
                        }
                        
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
    
    /**
     * Declare AJAX function to send the #add_aprt_form form object to 
     * landlord->addApartment() to add a new Apartment to the database.
     */
    if ($('[id^=edit-aprt-form]').length !== 0) {
        $('[id^=edit-aprt-form]').on('submit', function(event){
            
            var apartmentId = $(this).attr("data-id");
            var editData = new FormData(this);
            
            var xmlHttpReq  = new XMLHttpRequest();
            xmlHttpReq.open("POST", url + "landlord/editApartment", true);
            xmlHttpReq.onload = function(oEvent) { //onload == request completed
                if (xmlHttpReq.status == 200) {
                    var serverResp = xmlHttpReq.responseText;
                    console.log(serverResp);

                    try {
                        if (serverResp) {

                            var serverMsgs = JSON.parse(serverResp);

                            /* $.each() as JQUery function closure */
                            $.each(serverMsgs, function(name, errMsg) {
                                var targetID = '#edit-aprt-form'+apartmentId+' *[name=' + name + ']';
                                var inputElement = $(targetID);

                                inputElement.css('border', "5px solid red");

                                inputElement.after("<p id='" + name + apartmentId + "-error' style='color:red;font-style: italic;'>"
                                                             + errMsg + "</p>");

                                $('#edit-aprt-form'+apartmentId).on('submit', function(e){
                                    $('#'+name+apartmentId+"-error").remove();
                                });

                            });

                            _apartmentFormActionOutput(serverMsgs);
                            
                            /*
                             * Refresh the page to show updated changes.
                             */
                            if (serverMsgs.hasOwnProperty('Success')
                                        && !isEmptyOrSpaces(serverMsgs['Success'])) {

                                location.reload();  //Refreshes page to display new Apartment
                            }
                        }
                    } catch (error) {

                    }

                } else {
                    alert ("Error " + xmlHttpReq.status);
                }
            };

            xmlHttpReq.send(editData);
            event.preventDefault();
        });
    }
    
    /* edit-aprt-form handling - reset invalid red bars to none upon input. */
    if ($('[id^=edit-aprt-form]').length !== 0){
        $('[id^=edit-aprt-form] :input').each(function(){
            $(this).on('input', function(input){
               $(this).css('border', ""); 
            });
        });
    }
    
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
                    var serverMsgs;
                    try {
                        if (serverResp) {
                            serverMsgs = JSON.parse(serverResp);
                            
                            _apartmentFormActionOutput(serverMsgs);
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
    
    /**
     * Function to display Apartment form processing result message and close 
     * the modal.
     * 
     * @param {array/object} serverMsgs - error messages from the server side.
     * @returns {void}
     */
    function _apartmentFormActionOutput(serverMsgs){
        if (serverMsgs.hasOwnProperty('Success')
                && !isEmptyOrSpaces(serverMsgs['Success'])) {
            alert(serverMsgs['Success']);
            $('button.close').click();  //closes the Modal.
        }
        
        if (serverMsgs.hasOwnProperty('Failure')
                && !isEmptyOrSpaces(serverMsgs['Failure'])) {
            alert(serverMsgs['Failure']);
        }

        if (serverMsgs.hasOwnProperty('Error')
                && !isEmptyOrSpaces(serverMsgs['Error'])) {
            console.log(serverMsgs['Error']);
        }
    }
    
    function isEmptyOrSpaces(str){
        return str === null || str.match(/^\s*$/) !== null;
    }
    
});


