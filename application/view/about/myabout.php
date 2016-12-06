<!DOCTYPE html>
<html>
<title>About us</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">

<div id="headerwrap">
    <div class="container">
        <div class="row">
            <h1>About Us</h1>
            <br>
            <h3>myPlace - Apartments for SFSU students</h3>
            <p><a href="<?php echo URL; ?>home" class="w3-btn w3-padding-large w3-large">APARTMENTS</a></p>
            <br>
            <div class="col-lg-6 col-lg-offset-3">
            </div>
        </div>
    </div><!-- /container -->
</div><!-- /headerwrap -->   



<body>

<!-- Header with image -->
<header class="bgimg w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-bottomleft w3-center w3-padding-xlarge w3-hide-small">
    <span class="w3-tag">Team 14</span>
  </div>

  <div class="w3-display-bottomright w3-center w3-padding-xlarge">
    <span class="w3-text-white">1600 Holloway Ave, San Francisco, CA 94132</span>
  </div>
</header>

<!-- Add a background color and large text to the whole page -->


  <div class="container">
   <br><br>

 
    
    <center><h2><b><i>myPlace</i></b> is an apartment rental web application that is built by San Francisco University (SFSU) students, for SFSU students. myPlace leverages itself over its competitors by limiting its rental services to SFSU students only. myPlace will include basic features such as search, filters, maps, apartment listing, and communication. However we highlight these features by basing the design similar to official SFSU websites; thereby creating a welcoming and native feel familiar to SFSU students as well as an extension of SFSU’s online identity. By emphasizing simplicity and intuitive design, we can serve clients of all ages and focus on delivering the one desire of our SFSU students: finding a place to rent. </center>
</h2>
    
      
    </div>
    </div>

  </div>
</div>


<!-- Where to Find us Container -->
<style>
h1 { 
    display: block;
    font-size: 4em;
    margin-top: 0.40em;
    margin-bottom: 0.67em;
    margin-left: 0;
    margin-right: 0;
    font-weight: bold;
}
</style>


    <div class="container">
        <div class="row">
         	<br>
            <br>
            <br>
            <center><img src="img/648logo.png" alt="point" /></center>
            <center><h1>Where to Find Us</h1></center>
            <center><h3>San Francisco State University</h3></center>
            <br>
            <br>
            </div>
        </div>
    </div><!-- /container -->
</div><!-- /headerwrap -->   


<!-- Contact/Area Container -->
<div class="w3-container" id="where" style="padding-bottom:32px;">
  <div class="w3-content" style="max-width:700px">
    <div id="googleMap" class="w3-sepia" style="width:100%;height:400px;"></div>
  </div>
</div>

<!-- End page content -->
</div>


<!-- Add Google Maps -->
<script src="https://maps.googleapis.com/maps/api/js"></script>

<script>
// Google Map Location
var myCenter = new google.maps.LatLng(37.7219, 122.4782);

function initialize() {
var mapProp = {
  center: myCenter,
  zoom: 12,
  scrollwheel: false,
  draggable: false,
  mapTypeId: google.maps.MapTypeId.ROADMAP
  };

var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker = new google.maps.Marker({
  position: myCenter,
});

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);

// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" w3-dark-grey", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-dark-grey";
}
document.getElementById("myLink").click();
</script>

</body>
</html>
