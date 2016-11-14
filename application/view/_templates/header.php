<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>MINI</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- JS -->
        <!-- please note: The JavaScript files are loaded in the footer to speed up page construction -->
        <!-- See more here: http://stackoverflow.com/q/2105327/1114320 -->

        <!-- CSS -->  
        <link href="<?php echo URL; ?>css/shop-homepage.css" rel="stylesheet">
        <link href="<?php echo URL; ?>css/bootstrap.css" rel="stylesheet">

    </head>


    <body>





        <!--http://www.bootply.com/t7O3HSGlbc-->         

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">myplace</a>
                </div>
                <div class="navbar-collapse collapse" id="searchbar">

                    <ul class="nav navbar-nav navbar-right">
                        <!-- <li><a href="about.html">About</a></li>-->
                        <!--<li id="userPage">
                          <a href="#@userpage"><i class="icon-user"></i> My Page</a>
                        </li>-->
                        <li><a href="#post"><span class="glyphicon glyphicon-home"></span> Post</a></li>
                        <li><a href="#post"><span class="glyphicon glyphicon-star"></span> Favs</a></li>

                        <li><a href="#signup" data-toggle="modal" data-target=".bs-modal-sm" ><span class="glyphicon glyphicon-log-inglyphicon glyphicon-log-in"></span> Log in/Sign up</a></li>
                    </ul>
                    <!-- <ul class="nav navbar-nav navbar-right">
                       <li><a href="#" title="Start a new search">Clear</a></li>
                     </ul>-->



                    <form class="navbar-form">
                        <div class="form-group" style="display:inline;">
                            <div class="input-group" style="display:table;">
                                <input class="form-control" name="search" placeholder="Search Here" autocomplete="off" autofocus="autofocus" type="text">
                                <span class="input-group-addon" style="width:1%;"><span class="glyphicon glyphicon-search"></span></span>

                            </div>
                        </div>
                    </form>

                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <!-- Modal  http://bootsnipp.com/snippets/featured/sign-in-sign-up-dual-modal -->
        <div class="modal fade bs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <br>
                    <div class="bs-example bs-example-tabs">
                        <ul id="myTab" class="nav nav-tabs">
                            <li class="active"><a href="#signin" data-toggle="tab">Sign In</a></li>
                            <li class=""><a href="#signup" data-toggle="tab">Register</a></li>
                            <li class=""><a href="#privacy" data-toggle="tab">Privacy</a></li>
                        </ul>
                    </div>
                    <div class="modal-body">
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade in" id="privacy">
                                <p>We need this information so that you can receive access to the site and its content. Rest assured your information will not be sold, traded, or given to anyone.</p>

                            </div>
                            <div class="tab-pane fade active in" id="signin">
                                <form class="form-horizontal">
                                    <fieldset>
                                        <!-- Sign In Form -->
                                        <!-- Text input-->
                                        <div class="control-group">
                                            <label class="control-label" for="userid">Email:</label>
                                            <div class="controls">
                                                <input required="true" id="userid" name="userid" type="text" class="form-control" placeholder="bob@mail.sfsu.edu" class="input-medium" required="">
                                            </div>


                                        </div>

                                        <!-- Password input-->
                                        <div class="control-group">
                                            <label class="control-label" for="passwordinput">Password:</label>
                                            <div class="controls">
                                                <input required="true" id="passwordinput" name="passwordinput" class="form-control" type="password" placeholder="********" class="input-medium">
                                            </div>
                                        </div>





                                        <!-- Button -->
                                        <div class="control-group">
                                            <label class="control-label" for="signin"></label>
                                            <div class="controls">
                                                <button id="signin" name="signin" class="btn btn-success">Sign In</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>

                            <!-- Register tab -->    
                            <div class="tab-pane fade" id="signup">
                                <form class="form-horizontal">
                                    <fieldset>
                                        <!-- Sign Up Form -->
                                        <!-- Text input-->
                                        <div class="control-group">
                                            <label class="control-label" for="Email">Email:</label>
                                            <div class="controls">
                                                <input id="Email" name="Email" class="form-control" type="text" placeholder="bob@mail.sfsu.edu" class="input-large" required="true">
                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="control-group">
                                            <label class="control-label" for="userid">Username:</label>
                                            <div class="controls">
                                                <input id="userid" name="userid" class="form-control" type="text" placeholder="bob" class="input-large" required="true">
                                            </div>
                                        </div>

                                        <!-- Password input-->
                                        <div class="control-group">
                                            <label class="control-label" for="password">Password:</label>
                                            <div class="controls">
                                                <input id="password" name="password" class="form-control" type="password" placeholder="********" class="input-large" required="true">
                                                <em>1-8 Characters</em>
                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="control-group">
                                            <label class="control-label" for="reenterpassword">Re-Enter Password:</label>
                                            <div class="controls">
                                                <input id="reenterpassword" class="form-control" name="reenterpassword" type="password" placeholder="********" class="input-large" required="true">
                                            </div>
                                        </div>

                                        <!-- Multiple Radios (inline) -->
                                        <br>
                                        <div class="control-group">
                                            <label class="control-label" for="humancheck">Register as a:</label>
                                            <div class="controls">
                                                <label class="radio inline" for="humancheck-0">
                                                    <input type="radio" name="humancheck" id="humancheck-0" value="robot" required>SFSU Student</label>
                                                <label class="radio inline" for="humancheck-1">
                                                    <input type="radio" name="humancheck" id="humancheck-1" value="human" required>Landlord</label>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="control-group">
                                            <label class="control-label" for="rememberme">Terms and Conditions:</label>
                                            <div class="controls">
                                                <label class="checkbox inline " for="rememberme-0">
                                                    <input  required="true" type="checkbox" name="rememberme" id="rememberme-0" value="Remember me">
                                                    I have read the privacy agreement and accept the terms
                                                </label>
                                            </div>
                                        </div>  


                                        <!-- Button -->
                                        <div class="control-group">
                                            <label class="control-label" for="confirmsignup"></label>
                                            <div class="controls">
                                                <button id="confirmsignup" name="confirmsignup" class="btn btn-success">Sign Up</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <center>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </center>
                    </div>
                </div>
            </div>
        </div>




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
                                <option>HIghest to lowest</option>
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

