
<div class="container">
    <div class="row">

        <div class="col-md-3">

        <form method='POST' action="<?php echo URL; ?>home/printArray">

            <p class="lead">Refine your search</p>
            <div class="panel panel-footer">



                <div class="form-group">
                    <label for="bedroom_sel">Bedrooms:</label>
                    <select name="filter['bedroom']" class="form-control" id="bedroom_sel">
                        <option>Any</option>
                        <option value="1">1</option>
                        <option value="2">2</option>                        
                        <option value="3">3+</option>
                    </select>
                </div>



<!--                <div class="form-group">
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
                </div>-->

                <div class="form-group">
                    <label for="price_sel">Price:</label>
                    <input name="filter['min_price']" type="text" class="form-control" id="area_code" placeholder="Any">
                </div>                   
                <div class="form-group">
                    <input name="filter['max_price']" type="text" class="form-control" id="area_code" placeholder="Any">
                </div>
                



                <div class="input-group">
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
                    <label for="area_code">Area code:</label>
                    <input name="filter['area_code']" type="text" class="form-control" id="area_code" placeholder="Any">
                </div>



                <label>Availability Term:</label>
                <div class="input-group">
                    <select name="filter['begin_term']" class="form-control" id="start_term_sel">
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
                    <select name="filter['end_term']" class="form-control" id="end_term_sel">
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
                    <label> <input type="checkbox" name="filter['pet_friendly']" value="1">Pet Friendly</label>
                </div>

                <div class="checkbox" class="list-group-item">
                    <label> <input type="checkbox" name="filter['[parking']"value="">Parking available</label>
                </div>




                <input type="submit" class="btn btn-info" value="Refine">
            </div>
            </form>
            
        </div>

        <div class="col-md-9">

            <!-- Carousel at the top of the page -->
           <!-- <div class="row carousel-holder">

                <div class="col-md-12">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="slide-image" src="http://placehold.it/800x300" alt="">
                            </div>
                            <div class="item">
                                <img class="slide-image" src="http://placehold.it/800x300" alt="">
                            </div>
                            <div class="item">
                                <img class="slide-image" src="http://placehold.it/800x300" alt="">
                            </div>
                        </div>
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>

            </div>               -->

            <div class="row">

                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail"> 
                        <img src="http://placehold.it/320x150" alt="">
                        <div class="caption">
                            <h4 class="pull-right">$24.99</h4>
                            <h4><a href="#">First Product</a>
                            </h4>
                            <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        <div class="ratings">
                            <button type="button" class="btn btn-primary btn-sm pull-right">Rent now</button>

                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#aptModal">See more details</button>



                            <div class="modal fade" id="aptModal" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Modal Header</h4>
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
                                                            <p>
                                                                Description will go here...<br>
                                                            </p>


                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-height">

                                                    <h1> Map </h1>

                                                    <div id="map" style="width:400px;height:400px;background:yellow"></div>

                                                    <script>
                                                        function myMap() {
                                                            var mapCanvas = document.getElementById("map");
                                                            var mapOptions = {
                                                                center: new google.maps.LatLng(51.5, -0.2), zoom: 10
                                                            };
                                                            var map = new google.maps.Map(mapCanvas, mapOptions);
                                                        }
                                                    </script>

                                                    <script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>

                                                </div>

                                                <div class="col-sm-6 col-height">

                                                    <h1> Amenities/Filtered </h1>
                                                    <p>
                                                        Blah blah blah...<br>
                                                        Maybe tags at the bottom <br>
                                                        Contact button<br>

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
                                            <p>This is a small modal.</p>
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
                    <h4><a href="#">Like this template?</a>
                    </h4>
                    <p>If you like this template, then check out <a target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">this tutorial</a> on how to build a working review system for your online store!</p>
                    <a class="btn btn-primary" target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">View Tutorial</a>
                </div>

            </div>

        </div>

    </div>
</div>