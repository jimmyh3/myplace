<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<!-- 
Corner Ribbon ~~!>
<style>
@import url('http://fonts.googleapis.com/css?family=Noto+Sans:400,700');

*{
  margin: 0;
  padding: 0;
}

body{
  background: #f0f0f0;
  font-family: 'Noto Sans', sans-serif;
}

h1{
  width: 500px;
  height: 100px;
  position: fixed;
  top: 50%;
  left: 50%;
  margin: -100px 0 0 -275px;
  font-size: 3.2em;
  font-weight: 700;
  text-align: center;
  text-transform: uppercase;
  line-height: 100px;
  color: #aaa;
}

h2{
  width: 500px;
  height: 100px;
  position: fixed;
  top: 50%;
  left: 50%;
  margin: 0 0 0 -225px;
  font-size: 1.6em;
  font-weight: 400;
  text-align: center;
  line-height: 100%;
  color: #bbb;
}

/* The ribbons */

.corner-ribbon{
  width: 200px;
  background: #e43;
  position: absolute;
  top: 25px;
  left: -50px;
  text-align: center;
  line-height: 50px;
  letter-spacing: 1px;
  color: #f0f0f0;
  transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
}

/* Custom styles */

.corner-ribbon.sticky{
  position: fixed;
}

.corner-ribbon.shadow{
  box-shadow: 0 0 3px rgba(0,0,0,.3);
}

/* Different positions */

.corner-ribbon.top-left{
  top: 25px;
  left: -50px;
  transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
}

.corner-ribbon.top-right{
  top: 25px;
  right: -50px;
  left: auto;
  transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
}

.corner-ribbon.bottom-left{
  top: auto;
  bottom: 25px;
  left: -50px;
  transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
}

.corner-ribbon.bottom-right{
  top: auto;
  right: -50px;
  bottom: 25px;
  left: auto;
  transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
}

/* Colors */

.corner-ribbon.white{background: #f0f0f0; color: #555;}
.corner-ribbon.black{background: #333;}
.corner-ribbon.grey{background: #999;}
.corner-ribbon.blue{background: #39d;}
.corner-ribbon.green{background: #2c7;}
.corner-ribbon.turquoise{background: #1b9;}
.corner-ribbon.purple{background: #95b;}
.corner-ribbon.red{background: #e43;}
.corner-ribbon.orange{background: #e82;}
.corner-ribbon.yellow{background: #ec0;}
</style>

End of Corner Ribbon~~!>
 -->
<div id="headerwrap">
<!--<<<<<<< HEAD-->
		<div class="container">
			<div class="row">
				<h1>myPlace</h1>
				<br>
				<h3>Apartments for SFSU students</h3>
				<br>
				<br>
				<div class="col-lg-6 col-lg-offset-3">
				</div>
			</div>
		</div><!-- /container -->
	</div><!-- /headerwrap -->   

<div class="container" style="padding-top: 30px;" id="mainPage">
     
        
<!--=======
    <div class="container">
        <div class="row">
            <h1>myPlace</h1>
            <br>
            <h3>Apartments for SFSU students</h3>
            <br>
            <br>
            <div class="col-lg-6 col-lg-offset-3">
            </div>
        </div>
    </div> /container 
</div> /headerwrap    

<div class="container" style="padding-top: 30px;">

    <div class="pull-right">
        Total apartments: 50
    </div>

>>>>>>> Horizontal_Prototype-->
    <div class="row">
        <div id="result_test"></div>
        <div class="col-md-3">
<<<<<<< Updated upstream

        <form id="ajax_filter_form" method="POST">
            <p class="lead">Filters</p>
=======
            <p class="lead" style="text-align:center" >Filters</center></p>
>>>>>>> Stashed changes
            <div class="panel panel-footer clearfix">

                <form>
                    <div class="form-group">
                        <label for="sort_by_sel">Sort By:</label>
                        <select class="form-control" id="sort_by_sel">
                            <option>Any</option>
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                        </select>
                    </div>

                <div class="form-group">
                    <label for="bedroom_sel">Bedrooms:</label>
                    <select name="bedroom" class="form-control" id="bedroom_sel">
                        <option value="">Any</option>
                        <option value="1">1</option>
                        <option value="2">2</option>                        
                        <option value="3">3+</option>
                    </select>
                </div>


                <div class="form-group">
                    <label for="price_sel">Price:</label>
                    <!--<input name="min_price" type="text" class="form-control" id="min_price" placeholder="Minimum">-->
                    <input name="actual_price[]" type="text" class="form-control" id="min_price" placeholder="Minimum">
                </div>                   
                
                
                <div class="form-group">
                    <!--<input name="max_price" type="text" class="form-control" id="max_price" placeholder="Maximum">-->
                    <input name="actual_price[]" type="text" class="form-control" id="max_price" placeholder="Maximum">
                </div>
               
                <div class="form-group">
                        <label for="price_sel">Price:</label>
                        <select class="form-control" id="price_sel">
                            <option>Any</option>
                            <option>Lowest to highest</option>
                            <option>Highest to lowest</option>
                            <option>Less than $500</option>
                            <option>Between $500 and $999</option>
                            <option>Between $1000 and $1499</option>
                            <option>$1500+</option>
                        </select>
                    </div>

<<<<<<< Updated upstream
<!--                    <div class="form-group">
                        <label for="distance_sel">Distance:</label>
                        <select class="form-control" id="distance_sel">
                            <option>Any</option>
                            <option>Less than 0.5 miles</option>
                            <option>Between 0.5 and 0.9 miles</option>
                            <option>Between 1.0 and 1.4 miles</option>
                            <option>1.5+ miles</option>
                        </select>
                    </div>-->

                <div class="form-group">
                    <label for="area_code">Zip code:</label>
                    <input name="area_code" type="text" class="form-control" id="area_code" placeholder="Any">
=======


                    <div class="form-group">
                        <label for="area_code">Zip code:</label>
                        <input type="text" class="form-control" id="zip_code" placeholder="Any">
                    </div>



                    <label>Availability Term:</label>
                    <div class="input-group">
                        <select class="form-control" id="start_term_sel">
                            <option>Any</option>
                            <option>January</option>
                            <option>February</option>
                            <option>March</option>
                            <option>April</option>
                            <option>May</option>
                            <option>June</option>
                            <option>July</option>
                            <option>August</option>
                            <option>September</option>
                            <option>October</option>
                            <option>November</option>
                            <option>December</option>
                        </select>




                        <span class="input-group-addon">-</span>
                        <select class="form-control" id="end_term_sel">
                            <option>Any</option>
                            <option>January</option>
                            <option>February</option>
                            <option>March</option>
                            <option>April</option>
                            <option>May</option>
                            <option>June</option>
                            <option>July</option>
                            <option>August</option>
                            <option>September</option>
                            <option>October</option>
                            <option>November</option>
                            <option>December</option>
                        </select>
                    </div>



                    <div class="checkbox" class="list-group-item">
                        <label> <input type="checkbox" value="">Pet Friendly</label>
                    </div>

                    <div class="checkbox" class="list-group-item">
                        <label> <input type="checkbox" value="">Parking Available</label>
                    </div>
                    
                    <div class="checkbox" class="list-group-item">
                        <label> <input type="checkbox" value="">Laundry Available</label>
                    </div>
                    
                    <div class="checkbox" class="list-group-item">
                        <label> <input type="checkbox" value="">No Smoking</label>
                    </div>
                    
                    <div class="checkbox" class="list-group-item">
                        <label> <input type="checkbox" value="">Shared Room</label>
                    </div>
                    
                    <div class="checkbox" class="list-group-item">
                        <label> <input type="checkbox" value="">Furnished</label>
                    </div>
                    
                    <div class="checkbox" class="list-group-item">
                        <label> <input type="checkbox" value="">Wheelchair accessible</label>
                    </div>



                    <input type="reset" class="btn btn-danger" value="Clear">

                    <input type="submit" class="btn btn-info pull-right" value="Filter">
                </form>
            </div>
        </div>

        <div class="col-md-9">


            <div class="row">

                <div class="col-sm-4 col-lg-4 col-md-4">
                
                    <div class="thumbnail"> 
                    <!-- <span class="w3-tag w3-display-topleft" </span> Featured</span> -->
                   
                        <img src="http://placehold.it/320x150" alt="" style="cursor: pointer;" data-toggle="modal" data-target="#aptModal"> 
                       
                        <div class="caption">
                         <div class="corner-ribbon top-left sticky red shadow">Date Posted:</div>
                            <h4 class="pull-right">$Price</h4>
                        
                            <h4><a href="" data-toggle="modal" data-target="#aptModal">Title</a></h4>
                            
                            <ul class="columns" data-columns="2">
                            
                                <li>Bedrooms:</li>
                                <li>Zip Code:</li>
                        

                            </ul>
                        </div>
                        <div class="ratings">
                            <button type="button" class="btn btn-success btn-sm pull-right"   data-toggle="modal" data-target="#contactLandlord">Rent now</button>

                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#aptModal">Details</button>



                            <div class="modal fade" id="aptModal" role="dialog" style="color: #000">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Details on Apartment</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">

                                                <div class="row">
                                                    <div class="row-height">
                                                        <div class="col-sm-6 col-height">





                                                            <!--http://www.bootply.com/XiWUwjbGtB -->

                                                            <!-- main slider carousel -->
                                                            <div class="row">
                                                                <div class="col-md-12" id="slider">

                                                                    <div class="col-md-12" id="carousel-bounding-box">
                                                                        <div id="myCarousel" class="carousel slide">
                                                                            <!-- main slider carousel items -->
                                                                            <div class="carousel-inner">
                                                                                <div class="active item" data-slide-number="0">
                                                                            
                                                                                    <img src="http://placehold.it/1200x480&amp;text=one" class="img-responsive">
                                                                                    
                                                                                </div>
                                                                                <div class="item" data-slide-number="1">
                                                                                    <img src="http://placehold.it/1200x480&amp;text=two" class="img-responsive">
                                                                                </div>
                                                                                <div class="item" data-slide-number="2">
                                                                                    <img src="http://placehold.it/1200x480&amp;text=three" class="img-responsive">
                                                                                </div>
                                                                                <div class="item" data-slide-number="3">
                                                                                    <img src="http://placehold.it/1200x480&amp;text=four" class="img-responsive">
                                                                                </div>
                                                                                <div class="item" data-slide-number="4">
                                                                                    <img src="http://placehold.it/1200x480&amp;text=five" class="img-responsive">
                                                                                </div>
                                                                                <div class="item" data-slide-number="5">
                                                                                    <img src="http://placehold.it/1200x480&amp;text=six" class="img-responsive">
                                                                                </div>
                                                                                <div class="item" data-slide-number="6">
                                                                                    <img src="http://placehold.it/1200x480&amp;text=seven" class="img-responsive">
                                                                                </div>
                                                                                <div class="item" data-slide-number="7">
                                                                                    <img src="http://placehold.it/1200x480&amp;text=eight" class="img-responsive">
                                                                                </div>
                                                                                
                                                                            </div>
     
                                                                            <!-- main slider carousel nav controls --> 
                                                                            <a class="carousel-control left" href="#myCarousel" data-slide="prev">‹</a>

                                                                            <a class="carousel-control right" href="#myCarousel" data-slide="next">›</a>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            
                                                            
                                                            <!--/main slider carousel-->

                                                            <br>

                                                            <!-- thumb navigation carousel -->
                                                            <div class="col-md-12 hidden-sm hidden-xs" id="slider-thumbs">

                                                                <!-- thumb navigation carousel items -->
                                                                <ul class="list-inline">
                                                                    <li> <a id="carousel-selector-0" class="selected">
                                                                            <img src="http://placehold.it/80x60&amp;text=one" class="img-responsive">
                                                                        </a></li>
                                                                    <li> <a id="carousel-selector-1">
                                                                            <img src="http://placehold.it/80x60&amp;text=two" class="img-responsive">
                                                                        </a></li>
                                                                    <li> <a id="carousel-selector-2">
                                                                            <img src="http://placehold.it/80x60&amp;text=three" class="img-responsive">
                                                                        </a></li>
                                                                    <li> <a id="carousel-selector-3">
                                                                            <img src="http://placehold.it/80x60&amp;text=four" class="img-responsive">
                                                                        </a></li>
                                                                    <li> <a id="carousel-selector-4">
                                                                            <img src="http://placehold.it/80x60&amp;text=five" class="img-responsive">
                                                                        </a></li>
                                                                    <li> <a id="carousel-selector-5">
                                                                            <img src="http://placehold.it/80x60&amp;text=six" class="img-responsive">
                                                                        </a></li>
                                                                    <li> <a id="carousel-selector-6">
                                                                            <img src="http://placehold.it/80x60&amp;text=seven" class="img-responsive">
                                                                        </a></li>
                                                                    <li> <a id="carousel-selector-7">
                                                                            <img src="http://placehold.it/80x60&amp;text=eight" class="img-responsive">
                                                                        </a></li>
                                                                </ul>

                                                            </div>


                                                        </div>

                                                        <div class="col-sm-6 col-height col-top">


                                                            <h1> Description </h1>
                                                            <p align ="justify" style="padding-right: 20px">
                                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut ullamcorper orci. Maecenas non dapibus
                                                                lectus. Maecenas et venenatis orci, eget cursus ante. Ut eu sem eget dolor consequat porttitor quis in nisl.
                                                                Pellentesque vitae convallis lacus. Maecenas ultrices sit amet elit cursus faucibus. Donec leo ex, porttitor
                                                                a ipsum nec, cursus congue nunc. Vestibulum in dolor neque. Vivamus commodo in eros vel commodo. Fusce 
                                                                fringilla justo eget neque efficitur volutpat. Nam semper aliquam odio, vitae suscipit nisi consequat sed.
                                                                Proin ante magna, facilisis quis egestas a, volutpat eu risus. Nullam quis malesuada ante. Nunc auctor porta
                                                                risus et scelerisque
                                                            </p>



                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-height">

                                                    <h1> Map </h1>

                                                    <div id="map" style="width:400px;height:400px;background:gray"></div>

                                                    <script>
                                                        function myMap() {
                                                            var mapCanvas = document.getElementById("map");
                                                            var mapOptions = {
                                                                center: new google.maps.LatLng(51.5, -0.2), zoom: 10
                                                            };
                                                            var map = new google.maps.Map(mapCanvas, mapOptions);
                                                        }
                                                    </script>

                                                    <script src="https://maps.googleapis.com/maps/api/?callback=myMap"></script>

                                                </div>

                                                <div class="col-sm-6 col-height">

                                                    <h1> Amenities/Filtered </h1>
                                                    <ul style="font-size: 16px">
                                                        <li> <strong>Price: </strong> $1600</li>
                                                        <li> <strong>Bedrooms: </strong> 3</li>
                                                        <li> <strong>Zip code: </strong>94132</li>
                                                        <li> <strong>Distance: </strong>1.2 miles</li>
                                                        <li> <strong>Availability term: </strong>Jan-March</li>
                                                        <li> <strong>Pet friendly: </strong>Yes</li>
                                                        <li> <strong>Parking available: </strong>Yes</li>
                                                        <li> <strong>Tags: </strong>Spacious, comfy, inviting</li>
                                                    </ul>

                                                    <button type="button" class="btn btn-success btn-lg"  data-toggle="modal" data-target="#contactLandlord">Rent now</button>

                                                    <p>
                                                        <br>
                                                        Or need more information before renting apartment? Contact landlord below.
                                                        <br>
                                                    </p>

                                                    <button id="contactLandlordButton" type="button" class="btn btn-info btn-sm">Contact Landlord</button>

                                                    <p style="display: none;" id="landlordInfo">
                                                        <br>
                                                        Name: <br>
                                                        Email: <br>
                                                        Phone: <br>
                                                    </p>



                                                </div>


                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>


                    </div>

                </div>
                <div id="contactLandlord" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="contactLandlordLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 id="myModalLabel">Send a message</h3>
                            </div>                              
                            <form class="form-horizontal">

                                <div class="modal-body">
                                    <p>Send a message to the landlord about your interest in the apartment.</p>
                                        <div class="control-group">
                                            <label>Message</label>
                                            <textarea class="form-control" placeholder="Your message here.." rows="5" required=""></textarea>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success pull-right">Send It!</button>
                                </div>                           
                            </form>

                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <img src="http://placehold.it/320x150" alt="">
                        <div class="caption">
                            <h4 class="pull-right">$64.99</h4>
                            <h4><a href="#">Second Product</a>
                            </h4>
                            <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        <div class="ratings">
                            <p class="pull-right">12 reviews</p>
                            <p>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star-empty"></span>
                            </p>
                        </div>
                    </div>
>>>>>>> Stashed changes
                </div>

                <label>Availability Term:</label>
                <div class="input-group">
                    <select name="begin_term" class="form-control" id="start_term_sel">
                        <option value="">Any</option>
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select>


                    <span class="input-group-addon">-</span>
                    <select name="end_term" class="form-control" id="end_term_sel">
                        <option value="">Any</option>
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select>
                </div>         

                <div class="checkbox" class="list-group-item">
                    <label> <input type="checkbox" name="pet_friendly" value="">Pet Friendly</label>
                </div>

                <div class="checkbox" class="list-group-item">
                    <label> <input type="checkbox" name="parking" value="">Parking Available</label>
                </div>


<<<<<<< Updated upstream

                <input type="reset" class="btn btn-danger" value="Clear">
                <input type="submit" class="btn btn-info pull-right" value="Refine">
=======
>>>>>>> Stashed changes
            </div>
        </form>
        </div>

        <div class="col-md-9">
            <div class="row" id="results">
                <?php echo $this->search(); ?>
            </div>
        </div>

    </div>
</div>
