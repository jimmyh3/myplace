<div class="container">

    <div class="row">

        <div class="col-md-3">
            <p class="lead">Refine your search</p>
            <div class="panel panel-footer">



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
                    <label for="area_code">Area code:</label>
                    <input type="text" class="form-control" id="area_code" placeholder="Any">
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
                    <label> <input type="checkbox" value="">Parking available</label>
                </div>




                <input type="submit" class="btn btn-info" value="Refine">
            </div>
        </div>

        <div class="col-md-9">

            <!-- Carousel at the top of the page -->
            <div class="row carousel-holder">

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

            </div>               

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

                                                <div class="col-sm-6" style="background-color:lavender;">
                                                    <div class="row carousel-holder">

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

                                                    </div>

                                                </div>

                                                <div class="col-sm-6" style="background-color:lavenderblush;">.col-sm-6

                                                </div>

                                                <div class="col-sm-6" style="background-color:lavender;">.col-sm-3


                                                </div>

                                                <div class="col-sm-6" style="background-color:lavenderblush;">.col-sm-6


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