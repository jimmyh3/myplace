// no auto slide
$('#myCarousel').carousel({
    interval: false
});

// handles the carousel thumbnails
$('[id^=carousel-selector-]').click(function () {
    var id_selector = $(this).attr("id");
    var id = id_selector.substr(id_selector.length - 1);
    id = parseInt(id);
    $('#myCarousel').carousel(id);
    $('[id^=carousel-selector-]').removeClass('selected');
    $(this).addClass('selected');
});

// when the carousel slides, auto update
$('#myCarousel').on('slid', function (e) {
    var id = $('.item.active').data('slide-number');
    id = parseInt(id);
    $('[id^=carousel-selector-]').removeClass('selected');
    $('[id=carousel-selector-' + id + ']').addClass('selected');
});


//tooltip
$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

// show land lord info
$(document).ready(function () {
    $("#contactLandlordButton").click(function () {
        $("#landlordInfo").toggle("slow");
    });
});


// add/delete images to upload
(function ($) {
    $(function () {

        var addFormGroup = function (event) {
            event.preventDefault();

            var $formGroup = $(this).closest('.form-group');
            var $multipleFormGroup = $formGroup.closest('.multiple-form-group');
            var $formGroupClone = $formGroup.clone();

            $(this)
                    .toggleClass('btn-default btn-add btn-danger btn-remove')
                    .html('–');

            $formGroupClone.find('input').val('');
            $formGroupClone.insertAfter($formGroup);

            var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
            if ($multipleFormGroup.data('max') <= countFormGroup($multipleFormGroup)) {
                $lastFormGroupLast.find('.btn-add').attr('disabled', true);
            }
        };

        var removeFormGroup = function (event) {
            event.preventDefault();

            var $formGroup = $(this).closest('.form-group');
            var $multipleFormGroup = $formGroup.closest('.multiple-form-group');

            var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
            if ($multipleFormGroup.data('max') >= countFormGroup($multipleFormGroup)) {
                $lastFormGroupLast.find('.btn-add').attr('disabled', false);
            }

            $formGroup.remove();
        };

        var countFormGroup = function ($form) {
            return $form.find('.form-group').length;
        };

        $(document).on('click', '.btn-add', addFormGroup);
        $(document).on('click', '.btn-remove', removeFormGroup);

    });
})(jQuery);


// sign in form validation
$(function () {
    var signinValidator = new Validator("signinForm");
    signinValidator.EnableOnPageErrorDisplaySingleBox();
    signinValidator.EnableMsgsTogether();

    signinValidator.addValidation("Email", "maxlen=50");
    signinValidator.addValidation("Email", "req");
    signinValidator.addValidation("Email", "email");

    signinValidator.addValidation("Password", "req");
    signinValidator.addValidation("Password", "maxlen=50");
});

// registration form validation
$(function () {

    var registerValidator = new Validator("registerForm");
    registerValidator.EnableOnPageErrorDisplaySingleBox();
    registerValidator.EnableMsgsTogether();

    registerValidator.addValidation("Email", "req");
    registerValidator.addValidation("Email", "maxlen=50");
    registerValidator.addValidation("Email", "email");

    registerValidator.addValidation("Username", "req");
    registerValidator.addValidation("Username", "minlen=3");
    registerValidator.addValidation("Username", "maxlen=50");


    registerValidator.addValidation("Password", "req");
    registerValidator.addValidation("Password", "minlen=6");
    registerValidator.addValidation("Password", "maxlen=20");

    registerValidator.addValidation("Reenterpassword", "eqelmnt=Password", "Passwords do not match");

    registerValidator.addValidation("registerAs", "selone", "Please select to register as a student or landlord");

    registerValidator.addValidation("privacyAgt", "shouldselchk=accept", "You must agree to terms and agreement to register");

});


// add/edit apt info form validation
$(function () {
    if ($('div').is('.postsPage')) {


        var aptInfoValidator = new Validator("aptInfoForm");
        aptInfoValidator.EnableOnPageErrorDisplaySingleBox();
        aptInfoValidator.EnableMsgsTogether();

        aptInfoValidator.addValidation("Name", "req");
        aptInfoValidator.addValidation("Name", "minlen=3");
        aptInfoValidator.addValidation("Name", "maxlen=50");

        aptInfoValidator.addValidation("Email", "req");
        aptInfoValidator.addValidation("Email", "maxlen=50");
        aptInfoValidator.addValidation("Email", "email");

        aptInfoValidator.addValidation("Number", "req");
        aptInfoValidator.addValidation("Number", "num", "Number: Only numeric values are allowed");
        aptInfoValidator.addValidation("Number", "minlen=10", "Number: must be 10 digits");
        aptInfoValidator.addValidation("Number", "maxlen=10", "Number: must be 10 digits");

        aptInfoValidator.addValidation("Bedroom", "dontselect=-1");

        aptInfoValidator.addValidation("Price", "req");
        aptInfoValidator.addValidation("Price", "num", "Price: Only numeric values are allowed");

        aptInfoValidator.addValidation("StartTerm", "dontselect=-1", "Select a start term");
        aptInfoValidator.addValidation("EndTerm", "dontselect=-1", "Select an end term");

        aptInfoValidator.addValidation("ZipCode", "req", "Zip code: Required Field");
        aptInfoValidator.addValidation("ZipCode", "num", "Zip code: Only numeric values are allowed");
        aptInfoValidator.addValidation("ZipCode", "minlen=5", "Zip code: must be 5 digits");
        aptInfoValidator.addValidation("ZipCode", "maxlen=5", "Zip code: must be 5 digits");

    }
});
