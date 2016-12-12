
<!-- backlink to repo on GitHub, and affiliate link to Rackspace if you want to support the project -->
<div class="container">

    <hr>

    <!-- Footer -->
    <footer id="footer">
        <div class="row">
            <div class="col-md-3">
                <p> <a href="<?php echo URL; ?>about">About Us</a></p>
            </div>

            <div class="col-md-3">
                <p><a href="<?php echo URL; ?>terms">Terms and Condition</a></p>
            </div>

            <div class="col-md-3">
                <p><a href="<?php echo URL; ?>policy">Privacy Policy</a></p>
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

<script src="<?php echo URL; ?>js/custom.js"></script>




<!-- our JavaScript -->
<script src="<?php echo URL; ?>js/application.js"></script>

<script src="<?php echo URL; ?>js/myplace-search.js"></script>

<script src="<?php echo URL; ?>js/myplace-apartment_listing.js"></script>

<!--<script>
    var stickySidebar = $('.sticky');

if (stickySidebar.length > 0) { 
  var stickyHeight = stickySidebar.height(),
      sidebarTop = stickySidebar.offset().top;
}

// on scroll move the sidebar
$(window).scroll(function () {
  if (stickySidebar.length > 0) { 
    var scrollTop = $(window).scrollTop();
            
    if (sidebarTop < scrollTop) {
      stickySidebar.css('top', scrollTop - sidebarTop);

      // stop the sticky sidebar at the footer to avoid overlapping
      var sidebarBottom = stickySidebar.offset().top + stickyHeight,
          stickyStop = $('.mainPage').offset().top + $('.mainPage').height();
      if (stickyStop < sidebarBottom) {
        var stopPosition = $('.mainPage').height() - stickyHeight;
        stickySidebar.css('top', stopPosition);
      }
    }
    else {
      stickySidebar.css('top', '0');
    } 
  }
});

$(window).resize(function () {
  if (stickySidebar.length > 0) { 
    stickyHeight = stickySidebar.height();
  }
});
</script>-->

<script>
    //Side menu floater
$('#sidebar').affix({
      offset: {
        top: $('#headerwrap').height() + 50,
        //top:350,
        bottom: $('#footer').outerHeight(true) + 60

      }
});
</script>

</body>
</html>
