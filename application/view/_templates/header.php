<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>myPlace</title>
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
                    <a class="navbar-brand" href="<?php echo URL; ?>home/index">myPlace</a>
                </div>
                <div class="navbar-collapse collapse" id="searchbar">

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo URL; ?>post" data-toggle="tooltip" data-placement="bottom" title="Manage Apartments"><span class="glyphicon glyphicon-home"></span> myPost</a></li>
                        <li><a href="<?php echo URL; ?>msg" data-toggle="tooltip" data-placement="bottom" title="Messages"><span class="glyphicon glyphicon-inbox"></span> myMsg</a></li>

                        <li><a href="#signup" data-toggle="modal" data-target=".bs-modal-sm" ><span class="glyphicon glyphicon-log-inglyphicon glyphicon-log-in"></span> Log in/Sign up</a></li>
                    </ul>



                    <form class="navbar-form">
                        <div class="form-group" style="display:inline;">
                            <div class="input-group" style="display:table;">
                                <input class="form-control" name="search" placeholder="Search Here" autocomplete="off" autofocus="autofocus" type="text">
                                <span class="input-group-addon" style="width:1%;"><span class="glyphicon glyphicon-search"></span></span>
                            </div>
                        </div>
                    </form>
                    
                    <!-- Disclaimer at bottom of nav bar -->
                    <p class="disclaimer">SFSU/FAU/Fulda Software Engineering Project, Fall 2016. For Demonstration Only</p>

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
                                            <div class="controls" style="padding-left: 20px;">
                                                <label class="radio inline" for="humancheck-0">
                                                    <input type="radio" name="humancheck" id="humancheck-0" value="robot" required>SFSU Student</label>
                                                <label class="radio inline" for="humancheck-1">
                                                    <input type="radio" name="humancheck" id="humancheck-1" value="human" required>Landlord</label>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="control-group">
                                            <label class="control-label" for="rememberme">Terms and Conditions:</label>
                                            <div class="controls" style="padding-left: 20px;">
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