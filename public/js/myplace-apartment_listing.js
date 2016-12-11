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
                    
                    for (var name in errorMsgs){
                        var targetID = '#add-aprt-form input[name=' + name + ']';
                        var inputElement = $(targetID);
                        
                        inputElement.css('border', "5px solid red");
                        
                        inputElement.after("<p id='" + name + "-error' style='color:red;font-style: italic;'>" + errorMsgs[name] + "</p>");
                        
                        /* Closure issue inside loop fix */
                        inputElement.on('input', {temp: name}, function (e) {
                            var name = e.data.temp;
                            /*
                             * TODO: this submit portion doesn't work.
                             */
//                            $('form#add-aprt-form').on('submit', {temp2:name}, function(e){
//                                var name = e.data.temp2;
//                                $('#'+name+'-error').remove();
//                                console.log(e.data.temp2);
//                            });
                            
                            _removeAprtErrMsg(name);
                            console.log(name);
                        });
//                        console.log("Key: " + name + " Value: " + errorMsgs[name] );
                    }
                    
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
    
    function _deleteAprtErrMsgOnSubmit(input_name){
        $('#add-aprt-form').on('submit', _removeAprtErrMsg(input_name));
    }
    
    function _removeAprtErrMsg(input_name){
        $('#'+input_name+'-error').remove();
    };
});


