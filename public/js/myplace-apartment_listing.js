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
                
                if (serverResp) {
                    
                    var errorMsgs = JSON.parse(serverResp);
                    
                    /* $.each() as JQUery function closure */
                    $.each(errorMsgs, function(name, errMsg) {
                        var targetID = '#add-aprt-form *[name=' + name + ']';
                        var inputElement = $(targetID);
                        console.log(name + " " + errMsg);
                        inputElement.css('border', "5px solid red");
                        
                        inputElement.after("<p id='" + name + "-error' style='color:red;font-style: italic;'>"
                                                     + errMsg + "</p>");
                        
                        $('#add-aprt-form').on('submit', function(e){
                            $('#'+name+"-error").remove();
                        });
                        
                    });
                    
                }
                
            } else {
                alert ("Error " + xmlHttpReq.status);
            }
        };

        xmlHttpReq.send(oData);
        ev.preventDefault();
    }, false);
    
    
    if ($('#add-aprt-form').length !== 0){
        $('form#add-aprt-form :input').each(function(){
            $(this).on('input', function(input){
               $(this).css('border', ""); 
            });
        });
    }
    
});


