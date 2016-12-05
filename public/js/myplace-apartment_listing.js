$(function() {
    
    if($('#add-aprt-form') !== 0) {
        
        $('#add-aprt-form').on('submit', function(e){
            e.preventDefault();
            
            $.post(url + '/landlord/addApartment', {"add-aprt-form": $('#add-aprt-form').serialize()})
                    .done( function( result) {
                            //target some <div> to pretty it up later
                            //$('#results').html( result);
                            alert(result);
                    });

        });
        
    }
    
});


