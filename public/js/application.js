$(function() {
    
    if($('#ajax_search').length !== 0) {
        $('#ajax_search').on('click', function( e){
            e.preventDefault();
            //alert( "Search clicked");
            $.post(url + '/home/getFilters', {"filters": $('#ajax_filter_form').serialize()})
                .done( function( filters) {
                   $.post(url + "/home/search", {"query" : $('#search_bar').val(), "filters" : filters})
                   .done( function ( result) {
                       //alert( result);
                       $('#results').html( result);
                   });
                });
        });
    }
    
    if($('#ajax_filter_form') !== 0) { 
        $('#ajax_filter_form').on('submit', function( e){
            e.preventDefault();
            //alert( "Filter clicked");
            $.post(url + '/home/getFilters', {"filters": $('#ajax_filter_form').serialize()})
                .done( function( filters) {
                   $.post(url + "/home/search", {"query" : $('#search_bar').val(), "filters" : filters})
                   .done( function ( result) {
                       $('#results').html( result);
                   });
                });
        });
    }
    
    if($('#ajax_signin_form') !== 0) {
        $('#ajax_signin_form').on('submit', function( e) {
            e.preventDefault();
            //alert( "signin clicked");
            // makes sure login info is valid 
            if( document.getElementById( "signinForm_errorloc").innerHTML == "") {
                $.post( url + '/home/login', {"userinfo": $('#ajax_signin_form').serialize()})
                    .done( function( results) {
                        //alert( results);
                        if( results.substring(0,6) === "Error-") { // Some error occured
                            var error = "Unidentified error";
                            switch( results.substring(6,9)) {
                                case "WPW": // Wrong password
                                    error = "Invalid password";
                                    break;
                                case "UNF": // User not found
                                    error = "User not found, wrong email";
                                    break;
                            }
                            $('#signin_error').html( error);
                        } else { // successful login
                            //alert( results);
                            $('#signin_error').html( "");
                            $('#loginModal').modal('hide');
                            //login_logout_button
                            $('#login_logout_button').html( results); 
                        }
                    });
            }
        });
    }
    
    if($('#ajax_signup_form') !== 0) {
        $('#ajax_signup_form').on('submit', function( e) {
            e.preventDefault();
            //alert( "register clicked");
            // makes sure registration info is valid
            if( document.getElementById( "registerForm_errorloc").innerHTML == "") {
                $.post( url + '/home/register', {"userinfo": $('#ajax_signup_form').serialize()})
                    .done( function( results) {
                        if( results.substring(0,6) === "Error-") {
                            var error = "Unidentified error";
                            switch( results.substring(6,9)) {
                                case "AUF": // Adding user failed
                                    error = "Adding user failed";
                                    break;
                                case "UAE":
                                    error = "User already exists with that email";
                                    break;
                                case "WEF": // Wrong email format
                                    error = "Wrong email format, when registering as a student email must end in @mail.sfsu.edu";
                                    break;
                            }
                            $('#register_error').html( error);
                        } else {
                            $('#register_error').html( "");
                            $('#loginModal').modal('hide');
                            //$('#login_logout_button').html( ""); // TODO Logout button to be displayed
                            $('#login_logout_button').html( results);
                        }
                    });
            }
        });
    }
});

function logout( e) {
    $.ajax( url + '/home/logout')
               .done( function( results) {
                   $('#login_logout_button').html( results);
           });
}