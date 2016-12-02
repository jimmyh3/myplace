$(function() {
    
    /* Submit search arguments to controller/home.php */
    function submitSearch(e){
        e.preventDefault();
        $.post(url + '/home/getFilters', {"filters": $('#ajax_filter_form').serialize()})
            .done( function( filters) {
               $.post(url + "/home/search", {"query" : $('#search_bar').val(), "filters" : filters})
               .done( function ( result) {
                   $('#results').html( result);
               });
            });
    }
    
    if($('#ajax_search').length !== 0) {
        $('#ajax_search').on('click', function( e){
            submitSearch(e);
        });
        
        $('#search_bar').keydown(function( e){
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



