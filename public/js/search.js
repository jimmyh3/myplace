$(function() {
    
    /* Submit search arguments to controller/home.php */
    function submitSearch(event){
           
        if (validateSearch($('#search_bar').val())){
            event.preventDefault();
            $.post(url + '/home/getFilters', {"filters": $('#ajax_filter_form').serialize()})
                .done( function( filters) {
                   $.post(url + "/home/search", {"query" : $('#search_bar').val(), "filters" : filters})
                   .done( function ( result) {
                       $('#results').html( result);
                   });
                });
        }else{
            $('#search_bar').each(function(){
               this.setCustomValidity("Only alphanumeric characters allowed!"); 
            });
        }
        
        
    }
    
    /* Checks if search input was only characters and numbers */
    function validateSearch(searchValues){
        var invalidValues   = "[^a-zA-Z0-9]";
        
        for (var i = 0; i < searchValues.length; i++)
        {
            var value = "" + searchValues[i];
            if (value.match(invalidValues)) return false;
        }
        
        return true;
    }
    
    
    
    if($('#ajax_search').length !== 0) {
        $('#ajax_search').on('click', function( e){
            submitSearch(e);
        });
        
        $('#search_bar').keypress(function( e){
            if (e.which === 13){    //13 === Enter Key
                submitSearch(e);
            }
        });
    }
    
    if($('#ajax_filter_form') !== 0) { 
        $('#ajax_filter_form').on('submit', function( e){
            submitSearch(e);
        });
    }
    
});



