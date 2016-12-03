$(function() {
    
    if($('#add-aprt-form') !== 0) {
        
        $('#add-aprt-form').on('submit', function(e){
            e.preventDefault();
            
            $.post(url + '/post/addApartment', {"add-aprt-form": $('#add-aprt-form').serialize()})
                    .done( function( result) {
                           //$('#results').html( result);
                           console.log(result);
                    });

        });
    }
    
    
});


