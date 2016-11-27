
<!-- backlink to repo on GitHub, and affiliate link to Rackspace if you want to support the project -->
<div class="container">

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-md-3">
                <p> <a href="#">About us</a></p>
            </div>

            <div class="col-md-3">
                <p><a href="#">Terms and Condition</a></p>
            </div>

            <div class="col-md-3">
                <p><a href="#">Privacy Policy</a></p>
            </div>

            <div class="col-md-3">
                <p> Copyright &copy; 2016 </p>

            </div>
    </footer>

</div>





<!-- define the project's URL (to make AJAX calls possible, even when using this in sub-folders etc) -->
<script>
    var url = "<?php echo URL; ?>";
</script>


<script src="<?php echo URL; ?>js/jquery.js"></script>

<script src="<?php echo URL; ?>js/bootstrap.js"></script>

<script src="<?php echo URL; ?>js/gen_validatorv4.js" xml:space="preserve"></script>

<script type="text/javascript">
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
</script>


<!-- tooltip -->

<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

<script>
    $(document).ready(function () {
        $("#contactLandlordButton").click(function () {
            $("#landlordInfo").toggle("slow");
        });
    });
</script>


<script>
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
</script>



<script type="text/javascript" xml:space="preserve">
    var frmvalidator = new Validator("signinForm");
    frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();


    frmvalidator.addValidation("Email", "maxlen=50");
    frmvalidator.addValidation("Email", "req");
    frmvalidator.addValidation("Email", "email");

    frmvalidator.addValidation("Password", "req");
    frmvalidator.addValidation("Password", "minlen=6");
    frmvalidator.addValidation("Password", "maxlen="20);


</script>


<script type="text/javascript" xml:space="preserve">
    var frmvalidator = new Validator("registerForm");
    frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("Email", "req");
    frmvalidator.addValidation("Email", "maxlen=50");
    frmvalidator.addValidation("Email", "email");

    frmvalidator.addValidation("Username", "req");
    frmvalidator.addValidation("Username", "minlen=3");
    frmvalidator.addValidation("Username", "maxlen=50");


    frmvalidator.addValidation("Password", "req");
    frmvalidator.addValidation("Password", "minlen=6");
    frmvalidator.addValidation("Password", "maxlen=20");

    //frmvalidator.addValidation("Reenterpassword","req", "Please confirm your password");
    frmvalidator.addValidation("Reenterpassword", "eqelmnt=Password", "Passwords do not match");

    frmvalidator.addValidation("registerAs","selone","Please select to register as a student or landlord");

    frmvalidator.addValidation("privacyAgt","shouldselchk=accept","You must agree to terms and agreement to register");


</script>


<!-- our JavaScript -->
<script src="<?php echo URL; ?>js/application.js"></script>
</body>
</html>
