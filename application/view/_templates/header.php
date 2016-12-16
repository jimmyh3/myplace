<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>myPlace</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=3.0">

        <!-- JS -->
        <!-- please note: The JavaScript files are loaded in the footer to speed up page construction -->
        <!-- See more here: http://stackoverflow.com/q/2105327/1114320 -->

        <!-- CSS -->  

        <link href="<?php echo URL; ?>css/shop-homepage.css" rel="stylesheet">
        <link href="<?php echo URL; ?>css/bootstrap.css" rel="stylesheet">




    </head>

    <body style="padding-top: 75px;">
        <!--http://www.bootply.com/t7O3HSGlbc-->         

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
   
                    <div>
                    <a class="span9 nav clearfix" href="<?php echo URL; ?>home">
					<img src="public/img/648logo.png" alt="logo" width="90" height="75" border="4" style="padding-right: 10px; padding-top: 5px;">
					</a>
                    </div>
                </div>    
                    
                <div class="navbar-collapse collapse" id="searchbar">

                    <ul class="nav navbar-nav navbar-right">
                        <?php if(isset($_COOKIE["myPlace_userType"]) && $_COOKIE["myPlace_userType"] == 1){
                            echo '<li><a href="'; 
                            echo URL; 
                            echo 'post" data-toggle="tooltip" data-placement="bottom" title="Manage Apartments"><span class="glyphicon glyphicon-home"></span> myPost</a></li>';
                            echo '<li id="login_logout_button">'; 
                            echo '<a id="ajax_logout" onclick="logout()" data-toggle="tooltip" data-placement="bottom" title="Logout"><span class="glyphicon glyphicon-log-out"></span> Welcome ' . $_COOKIE["myPlace_user"] . '</a>';
                            echo '</li>'; 
                        }else{
                            echo '<li><a data-toggle="tooltip" data-placement="bottom" title="MUST BE LANDLORD!"><span class="glyphicon glyphicon-home"></span> myPost</a></li>';
                            echo '<li id="login_logout_button">'; 
                            echo '<a href="#signup" data-toggle="modal" data-target=".bs-modal-sm" ><span class="glyphicon glyphicon-log-in"></span> Log in/Sign up</a>';
                            echo '</li>'; 
                        }
                        ?>
                    </ul>

                    <form class="navbar-form">
                        <div class="form-group" style="display:inline;">
                            <div class="input-group" style="display:table;">
                                <input class="form-control" id="search_bar" name="search" placeholder="Search (e.g. zip code)" autocomplete="off" autofocus="autofocus" type="text">
                                <span class="input-group-addon" id="ajax_search" style="width:1%;cursor:pointer;cursor:hand;"><span class="glyphicon glyphicon-search"></span></span>
                            </div>
                        </div>
                    </form>

                    <!-- Disclaimer at bottom of nav bar -->
                    <h2 class="disclaimer">SFSU/FAU/Fulda Software Engineering Project, Fall 2016. For Demonstration Only</h2>
                </div><!--/.nav-collapse -->
            </div>          
        </nav>

        <!-- Modal  http://bootsnipp.com/snippets/featured/sign-in-sign-up-dual-modal -->
        <div class="modal fade bs-modal-sm" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
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
                                <form class="form-horizontal" name="signinForm" id="ajax_signin_form" method="POST">
                                    <fieldset>
                                        <!-- Sign In Form -->
                                        <!-- Text input-->
                                        <div class="control-group">
                                            <label class="control-label" for="Email">Email:</label>
                                            <div class="controls">
                                                <input id="email" name="Email" type="text" class="form-control" placeholder="bob@mail.sfsu.edu" class="input-medium">
                                            </div>
                                        </div>

                                        <!-- Password input-->
                                        <div class="control-group">
                                            <label class="control-label" for="passwordinput">Password:</label>
                                            <div class="controls">
                                                <input id="password" name="Password" class="form-control" type="password" placeholder="********" class="input-medium">
                                            </div>
                                        </div>

                                        <br>
                                        <div id="signinForm_errorloc"></div>
                                        <div id="signin_error"></div>
                                        
                                        <!-- Button -->
                                        <div class="control-group">
                                            <label class="control-label" for="signin"></label>
                                            <div class="controls text-right">
                                                <input type="submit" class="btn btn-success" value="Sign In">
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>

                            <!-- Register tab -->    
                            <div class="tab-pane fade" id="signup">
                                <form class="form-horizontal" name="registerForm" id="ajax_signup_form" method="POST">
                                    <fieldset>
                                        <!-- Sign Up Form -->
                                        <!-- Text input-->
                                        <div class="control-group">
                                            <label class="control-label" for="Email">Email:</label>
                                            <div class="controls">
                                                <input id="Email" name="Email" class="form-control" type="text" placeholder="bob@mail.sfsu.edu" class="input-large">
                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="control-group">
                                            <label class="control-label" for="Username">Username:</label>
                                            <div class="controls">
                                                <input id="Username" name="Username" class="form-control" type="text" placeholder="bob" class="input-large">
                                            </div>
                                        </div>

                                        <!-- Password input-->
                                        <div class="control-group">
                                            <label class="control-label" for="password">Password:</label>
                                            <div class="controls">
                                                <input id="Password" name="Password" class="form-control" type="password" placeholder="********" class="input-large">
                                                <em>6-20 Characters</em>
                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="control-group">
                                            <label class="control-label" for="reenterpassword">Re-Enter Password:</label>
                                            <div class="controls">
                                                <input id="Reenterpassword" class="form-control" name="Reenterpassword" type="password" placeholder="********" class="input-large">
                                            </div>
                                        </div>

                                        <!-- Multiple Radios (inline) -->
                                        <br>
                                        <div class="control-group">
                                            <label class="control-label" for="humancheck">Register as a:</label>
                                            <div class="controls" style="padding-left: 20px;">
                                                <label class="radio inline" for="student">
                                                    <input type="radio" name="registerAs" id="registerAs" value="student">SFSU Student</label>
                                                <label class="radio inline" for="landlord">
                                                    <input type="radio" name="registerAs" id="registerAs" value="landlord">Landlord</label>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="control-group">
                                            <label class="control-label">Terms and Conditions:</label>
                                            <div class="controls" style="padding-left: 20px;">
                                                <label class="checkbox inline " for="privacyAgt">
                                                    <input type="checkbox" name="privacyAgt" id="privacyAgt" value="acceot">
                                                    I have read the privacy agreement and accept the terms
                                                </label>
                                            </div>
                                        </div>  

                                        <br>
                                        <div id="registerForm_errorloc"></div>
                                        <div id="register_error"></div>
                                        
                                        <!-- Button -->
                                        <div class="control-group">
                                            <label class="control-label" for="confirmsignup"></label>
                                            <div class="controls text-right">
                                                <input type="submit" class="btn btn-success" value="Sign Up">
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
