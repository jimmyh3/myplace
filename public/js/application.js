$(function() {
    
    if($('#ajax_search').length !== 0) {
        $('#ajax_search').on('click', function( e){
            e.preventDefault();
            $.post(url + '/home/getFilters', {"filters": $('#ajax_filter_form').serialize()})
                .done( function( filters) {
                   $.post(url + "/home/search", {"query" : $('#search_bar').val(), "filters" : filters})
                   .done( function ( result) {
                       $('#results').html( result);
                   });
                });
        });
    }
    
    if($('#ajax_filter_form') !== 0) { 
        $('#ajax_filter_form').on('submit', function( e){
            e.preventDefault();
            $.post(url + '/home/getFilters', {"filters": $('#ajax_filter_form').serialize()})
                .done( function( filters) {
                   $.post(url + "/home/search", {"query" : $('#search_bar').val(), "filters" : filters})
                   .done( function ( result) {
                       $('#results').html( result);
                   });
                });
        });
    }
    
    // TODO finalize ajax login call
    if($('#ajax_signin_form') !== 0) {
        $('ajax_signin_form').on('submit', function( e) {
            e.preventDefault();
            alert( "login clicked");
            $.post( url + '/pagetemplate/login', {"userinfo": $('#ajax_signin_form').serialize()})
                .done( function( results) {
                    alert( "login done" + results);
                    //$('#login').html( results);
                });
        });
    }
    
    //TODO finalize ajax signup call
    if($('#ajax_signup_form') !== 0) {
        $('ajax_signup_form').on('submit', function( e) {
            e.preventDefault();
            alert( "register clicked");
            $.post( url + '/home/register', {"userinfo": $('#ajax_signup_form').serialize()})
                .done( function( results) {
                    alert( "registration done" + results);
                    //$('#login').html( results);
                });
        });
    }
});
