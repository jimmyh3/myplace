$(function() {
    
    /**
     * Submit search arguments to controller/home.php
     * 
     * @param {type} event
     */
    function submitSearch(event){
        
        var searchBar   = "";
        var minPrice    = "";
        var maxPrice    = "";
        var areaCode    = "";
        
        var isValidSearch   = false;
        var isValidMinPrice = false;
        var isValidMaxPrice = false;
        var isValidAreaCode = false;
        
        searchBar   = $.trim($('#search_bar').val());
        minPrice    = $.trim($('#min_price').val());
        maxPrice    = $.trim($('#max_price').val());
        areaCode    = $.trim($('#area_code').val());
        
        isValidSearch   = isAllAlphaNumeric(searchBar);
        isValidMinPrice = isAllEmptyNumeric(minPrice);
        isValidMaxPrice = isAllEmptyNumeric(maxPrice);
        isValidAreaCode = isAllEmptyNumeric(areaCode);
        
        event.preventDefault(); //disable page refresh upon submission
        
        if (isValidSearch && isValidMinPrice &&  isValidMaxPrice && isValidAreaCode    ){
        
            $.post(url + '/home/getFilters', {"filters": $('#ajax_filter_form').serialize()})
                .done( function( filters) {
                   $.post(url + "/home/search", {"query" : $('#search_bar').val(), "filters" : filters})
                   .done( function ( result) {
                       $('#results').html( result);
                   });
                });
                
        }
        
    }
    
    /**
     * Checks if all given values are only alphanumeric characters (including
     * whitespace).
     * 
     * @param (Array) values - an array of characters.
     * @returns {Boolean} - true if given array holds on valid values.
     */
    function isAllAlphaNumeric(values)
    {  
        for (var i = 0; i < values.length; i++)
        {
            if (!isAlphaNumeric(values[i])) return false;
        }
        return true;
    }
    
    /**
     * Check if all given values are only numeric characters or empty string.
     * 
     * @param {type} values
     * @returns {Boolean}
     */
    function isAllEmptyNumeric(values)
    {
        for (var i = 0; i < values.length; i++)
        {
            if (!isEmptyNumeric(values[i])) return false;
        }
        return true;
    }
    
        
    /**
     * Check if the given value is an alphanumeric character.
     * 
     * @param {type} value
     * @returns {Boolean}
     */
    function isAlphaNumeric(value)
    {
        return value.match("^[a-zA-Z0-9. ]*$");
    }
    
    /**
     * Check if the given value is either only numbers or empty string.
     * 
     * @param {type} value
     * @returns {Boolean}
     */
    function isEmptyNumeric(value)
    {
        return value.match("^[0-9]*$");
    }
     
    //------------------------------------------------------------//
    //      Attach functionality to target elements               //
    //------------------------------------------------------------//
    
    
    /**
     * Target - search_bar: cause error message to popup upon invalid input.
     */
    $('#search_bar').on('input', function(event){
        var value = $(event.target).val();
        if (isAlphaNumeric(value)){
            $(this).css('border', "");
            this.setCustomValidity("");
        }else{
            $(this).css('border', "5px solid red");
            this.setCustomValidity("Enter only alphanumeric characters!");
        }
    });
    
    /**
     * Target - min_price: cause error message to popup upon invalid input.
     */
    $('#min_price').on('input', function(event){
        var value = $(event.target).val();
        if (isEmptyNumeric(value)){
            $(this).css('border', "");
            this.setCustomValidity("");
        }else{
            $(this).css('border', "5px solid red");
            this.setCustomValidity("Enter only numeric characters!");
        }
    });
    
    /**
     * Target - max_price: cause error message to popup upon invalid input.
     */
    $('#max_price').on('input', function(event){
        var value = $(event.target).val();
        if (isEmptyNumeric(value)){
            $(this).css('border', "");
            this.setCustomValidity("");
        }else{
            $(this).css('border', "5px solid red");
            this.setCustomValidity("Enter only numeric characters!");
        }
    });
    
    /**
     * Target - area_code: cause error message to popup upon invalid input.
     */
    $('#area_code').on('input', function(event){
        var value = $(event.target).val();
        if (isEmptyNumeric(value)){
            $(this).css('border', "");
            this.setCustomValidity("");
        }else{
            $(this).css('border', "5px solid red");
            this.setCustomValidity("Enter only numeric characters!");
        }
    });
    
    /**
     * Target - ajax_search: submit search string upon pressing 'search' button.
     */
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
    
    /**
     * Target - ajax_filter_form: submit "Filter" form upon pressing 'Refine'
     */
    if($('#ajax_filter_form') !== 0) { 
        $('#ajax_filter_form').on('submit', function( e){
            submitSearch(e);
        });
    }
});