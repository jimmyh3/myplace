//$(function() {
//    
//    var form = document.forms.namedItem('send-message-form');
//    form.addEventListener('submit', function(ev) {
//        
//        var oData = new FormDate(form);
//        
//        var xmlHttpReq  = new XMLHttpRequest();
//        xmlHttpReq.open("POST", url + "msg/sendMsg", true);
//        xmlHttpReq.onload = function(oEvent) { //onload == request completed
//            if (xmlHttpReq.status == 200) {
//                alert(xmlHttpReq.responseText);
//            } else {
//                alert ("Error " + xmlHttpReq.status);
//            }
//        };
//
//        xmlHttpReq.send(oData);
//        ev.preventDefault();
//    }, false);
//    
//});

function sendMessage( e, id) {
    e.preventDefault();
    $.post( url + "/msg/sendMsg", {"message": $('#send-message-form'+id).serialize()})
            .done( function( results) {
                //alert( results);
                $("#contactLandlord"+id).modal('hide');
                // TODO format page with results
            });
}