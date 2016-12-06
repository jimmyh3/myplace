<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div id="headerwrap">
    <div class="container">
        <div class="row">
            <h1>myPost</h1><br>
            <h3>Post apartments for SFSU students</h3><br><br>
            <p><a data-toggle="modal" data-target="#addAptModal" class="w3-btn w3-padding-large w3-large">ADD APARTMENT</a></p>
            <div class="col-lg-6 col-lg-offset-3"></div>
        </div>
    </div>
</div>

<br>
<br>
        <div class="row">

<?php
$user_id ="";
if(isset($_COOKIE["myPlace_userID"])){
        $user_id = $_COOKIE["myPlace_userID"];
}
echo $this->displayApartments(1);?> 
    </div>
</div>