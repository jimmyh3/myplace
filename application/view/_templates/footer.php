
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

<script type="text/javascript">
   $('#myCarousel').carousel({
    interval: false
});

// handles the carousel thumbnails
$('[id^=carousel-selector-]').click( function(){
  var id_selector = $(this).attr("id");
  var id = id_selector.substr(id_selector.length -1);
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
  $('[id=carousel-selector-'+id+']').addClass('selected');
});
</script>


<!-- tooltip -->

<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
</script>





<!-- our JavaScript -->
<script src="<?php echo URL; ?>js/application.js"></script>
</body>
</html>
