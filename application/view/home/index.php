<div id="headerwrap">
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

<div class="container" style="padding-top: 30px;">
     
        <div class="pull-right">
            Total apartments: 50
            </div>
        
    <div class="row">

        <div class="col-md-3">
            <p class="lead">Refine your search</p>
            <div class="panel panel-footer">

                <div class="form-group">
                    <label for="sort_by_sel">Sort By:</label>
                    <select class="form-control" id="sort_by_sel">
                        <option>Any</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Distance: Closest to SFSU</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="bedroom_sel">Bedrooms:</label>
                    <select class="form-control" id="bedroom_sel">
                        <option>Any</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3+</option>
                    </select>
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



                <div class="form-group">
                    <label for="distance_sel">Distance:</label>
                    <select class="form-control" id="distance_sel">
                        <option>Any</option>
                        <option>Less than 0.5 miles</option>
                        <option>Between 0.5 and 0.9 miles</option>
                        <option>Between 1.0 and 1.4 miles</option>
                        <option>1.5+ miles</option>
                    </select>
                </div>


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




                <input type="submit" class="btn btn-info" value="Refine">
            </div>
        </div>

        <div class="col-md-9">


            <div class="row">

                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail"> 
                        <img src="http://placehold.it/320x150" alt="" style="cursor: pointer;" data-toggle="modal" data-target="#aptModal"> 
                        <div class="caption">
                            <h4 class="pull-right">$Price</h4>
                            <h4><a href="" data-toggle="modal" data-target="#aptModal">Title</a></h4>
                             <ul class="columns" data-columns="2">
                                <li>Rent Term:</li>
                                <li>Num of Bedrooms:</li>
                                <li>Area Code:</li>
                                <li>Tags:</li>
                                
                            </ul>
                        </div>
                        <div class="ratings">
                            <button type="button" class="btn btn-success btn-sm pull-right">Rent now</button>

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
                                                                            <!-- main slider carousel nav controls --> <a class="carousel-control left" href="#myCarousel" data-slide="prev">‹</a>

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

                                                        <button type="button" class="btn btn-success btn-lg">Rent now</button>

                                                        <p>
                                                            <br>
                                                            Or need more information before renting apartment? Contact landlord below.
                                                            <br>
                                                        </p>
                                                        
                                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#contactLandlord">Contact Landlord</button>

                                                    <div id="contactLandlord" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="contactLandlordLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                    <h3 id="myModalLabel">Contact form</h3>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form class="form-horizontal col-sm-12">
                                                                        <div class="form-group"><label>Name</label><input class="form-control required" placeholder="Your name" data-placement="top" data-trigger="manual" data-content="Must be at least 3 characters long, and must only contain letters." type="text"></div>
                                                                        <div class="form-group"><label>E-Mail</label><input class="form-control email" placeholder="email@you.com (so that we can contact you)" data-placement="top" data-trigger="manual" data-content="Must be a valid e-mail address (user@gmail.com)" type="text"></div>
                                                                        <div class="form-group"><label>Message</label><textarea class="form-control" placeholder="Your message here.." data-placement="top" data-trigger="manual" rows="5"></textarea></div>
                                                                        <div class="form-group"><button type="submit" class="btn btn-success pull-right">Send It!</button> <p class="help-block pull-left text-danger hide" id="form-error">&nbsp; The form is not valid. </p></div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


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
                </div>

                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <img src="http://placehold.it/320x150" alt="">
                        <div class="caption">
                            <h4 class="pull-right">$74.99</h4>
                            <h4><a href="#">Third Product</a>
                            </h4>
                            <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        <div class="ratings">
                            <p class="pull-right">31 reviews</p>
                            <p>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star-empty"></span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <img src="http://placehold.it/320x150" alt="">
                        <div class="caption">
                            <h4 class="pull-right">$84.99</h4>
                            <h4><a href="#">Fourth Product</a>
                            </h4>
                            <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        <div class="ratings">
                            <p class="pull-right">6 reviews</p>
                            <p>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star-empty"></span>
                                <span class="glyphicon glyphicon-star-empty"></span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <img src="http://placehold.it/320x150" alt="">
                        <div class="caption">
                            <h4 class="pull-right">$94.99</h4>
                            <h4><a href="#">Fifth Product</a>
                            </h4>
                            <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        <div class="ratings">
                            <p class="pull-right">18 reviews</p>
                            <p>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star-empty"></span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-lg-4 col-md-4">
                    <p>Click below to view more results</p>
                    <a class="btn btn-primary">More results</a>
                </div>

            </div>

        </div>

    </div>

</div>