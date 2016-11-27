<div class="container">
    <h2>myPosts</h2>
    <a class="btn btn-success pull-right" data-toggle="modal" data-target="#aptModal">Add Apartment</a>

    <p>Insert Page Results</p>
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
                    <div style="width:100%;text-align: center;">
                        <button style="display: inline-block;" type="button" class="btn btn-info btn-sm pull-left" data-toggle="modal" data-target="#aptModal">Edit Post</button>
                        <a href="<?php echo URL; ?>msg" <button style="display: inline-block;" type="button" class="btn btn-primary btn-sm">View Messages</button></a>
                        <button style="display: inline-block;" type="button" class="btn btn-danger btn-sm pull-right">Delete Post</button>

                    </div>


                    <div class="modal fade" id="aptModal" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Post/Edit Apartment</h4>
                                </div>
                                <div class="modal-body clearfix">
                                    <?php
// define variables and set to empty values
                                    $nameErr = $emailErr = $genderErr = $websiteErr = "";
                                    $name = $name = $email = $number = $title = $bedroom = $price = $term = $zipcode = $desc = $tag = "";

                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        if (empty($_POST["name"])) {
                                            $nameErr = "Name is required";
                                        } else {
                                            $name = test_input($_POST["name"]);
                                            // check if name only contains letters and whitespace
                                            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                                                $nameErr = "Only letters and white space allowed";
                                            }
                                        }

                                        if (empty($_POST["email"])) {
                                            $emailErr = "Email is required";
                                        } else {
                                            $email = test_input($_POST["email"]);
                                            // check if e-mail address is well-formed
                                            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                                $emailErr = "Invalid email format";
                                            }
                                        }

                                        if (empty($_POST["website"])) {
                                            $website = "";
                                        } else {
                                            $website = test_input($_POST["website"]);
                                            // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
                                            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
                                                $websiteErr = "Invalid URL";
                                            }
                                        }

                                        if (empty($_POST["comment"])) {
                                            $comment = "";
                                        } else {
                                            $comment = test_input($_POST["comment"]);
                                        }

                                        if (empty($_POST["gender"])) {
                                            $genderErr = "Gender is required";
                                        } else {
                                            $gender = test_input($_POST["gender"]);
                                        }
                                    }

                                    function test_input($data) {
                                        $data = trim($data);
                                        $data = stripslashes($data);
                                        $data = htmlspecialchars($data);
                                        return $data;
                                    }
                                    ?>

                                    <p class="text-right"><span class="error">* required field.</span></p>
                                   <!-- <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">  
                                        Contact Name: <input type="text" name="name" value="<?php echo $name; ?>">
                                        <span class="error">* <?php echo $nameErr; ?></span>
                                        <br><br>
                                        Contact Email: <input type="text" name="email" value="<?php echo $email; ?>">
                                        <span class="error">* <?php echo $nameErr; ?></span>
                                        <br><br>
                                        Contact Number: <input type="text" name="number" value="<?php echo $number; ?>">
                                        <span class="error">* <?php echo $nameErr; ?></span>
                                        <br><br>
                                        Title: <input type="text" name="title" value="<?php echo $title; ?>">
                                        <span class="error">* <?php echo $emailErr; ?></span>
                                        <br><br>
                                        # of Bedrooms: <input type="text" name="bedroom" value="<?php echo $bedroom; ?>">
                                        <span class="error">* <?php echo $nameErr; ?></span>
                                        <br><br>

                                        Price: <input type="text" name="price" value="<?php echo $price; ?>">
                                        <span class="error">* <?php echo $nameErr; ?></span>
                                        <br><br>
                                        Rental Term: <input type="text" name="term" value="<?php echo $term; ?>">
                                        <span class="error">* <?php echo $nameErr; ?></span>
                                        <br><br>
                                        Zip Code: <input type="text" name="zipcode" value="<?php echo $zipcode; ?>">
                                        <span class="error">* <?php echo $nameErr; ?></span>
                                        <br><br>
                                        Description: <textarea name="desc" rows="5" cols="40"><?php echo $desc; ?></textarea>
                                        <br><br>
                                        Tags: <input type="text" name="tag" value="<?php echo $tag; ?>">
                                        <span class="error"><?php echo $websiteErr; ?></span>
                                        <br><br>
                                        Parking Available:
                                        <input type="radio" name="parking" <?php if (isset($parking) && $parking == "yes") echo "checked"; ?> value="yes">Yes
                                        <input type="radio" name="parking" <?php if (isset($parking) && $parking == "no") echo "checked"; ?> value="no">No
                                        <!-- <span class="error">* <?php echo $parkingErr; ?></span> --
                                        <br><br>
                                        Pet Friendly:
                                        <input type="radio" name="pet" <?php if (isset($pet) && $pet == "yes") echo "checked"; ?> value="yes">Yes
                                        <input type="radio" name="pet" <?php if (isset($pet) && $pet == "no") echo "checked"; ?> value="no">No
                                        <br><br>
                                        <!--Upload Images: <input type="text" name="title" value="<?php echo $title; ?>">
                                        <span class="error"><?php echo $websiteErr; ?></span>
                                        <br><br>
                                        <br><br>
                                        <input type="submit" name="submit" value="Post Apartment">  -->


                                    <form class="form-horizontal">
                                        <fieldset>
                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="name">*Contact name:</label>
                                                <div class="controls">
                                                    <input id="name" name="name" class="form-control" type="text" placeholder="Bob" class="input-large" required="true">
                                                </div>
                                            </div>

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="email">*Contact email:</label>
                                                <div class="controls">
                                                    <input id="email" name="email" class="form-control" type="text" placeholder="bob@mail.sfsu.edu" class="input-large" required="true">
                                                </div>
                                            </div>

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="number">*Contact number:</label>
                                                <div class="controls">
                                                    <input id="number" name="number" class="form-control" type="text" placeholder="(123) 456-7890" class="input-large" required="true">
                                                </div>
                                            </div>

                                            <!-- Bedrooms input-->
                                            <div class="control-group">
                                                <label class="control-label" for="bedroom_sel">*Bedrooms:</label>
                                                <select class="form-control" id="bedroom_sel" required="true">
                                                    <option value="">Any</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3+</option>
                                                </select>
                                            </div>


                                            <!-- Price input-->
                                            <div class="control-group">
                                                <label class="control-label" for="price">*Price:</label>
                                                <div class="controls">
                                                    <input id="number" name="price" class="form-control" type="text" placeholder="1000" class="input-lg" required="true">
                                                </div>
                                            </div>

                                            <label class="control-label" for="term">*Availability Term:</label>

                                            <div class="input-group">

                                                <select class="form-control" id="start_term_sel" required="true">
                                                    <option value="">Any</option>
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
                                                <select class="form-control" id="end_term_sel" required="true">
                                                    <option value="">Any</option>
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

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="zipcode">*Zip Code:</label>
                                                <div class="controls">
                                                    <input id="zipcode" name="zipcode" class="form-control" type="text" placeholder="94132" class="input-large" required="true">
                                                </div>
                                            </div>

                                            <div class="control-group">

                                                <label  class="control-label" for="desc">Description:</label>
                                                <div class="controls">
                                                    <textarea class="form-control" class="input-large" rows="5" id="desc"></textarea>
                                                </div> 
                                            </div>

                                            <div class="checkbox" class="list-group-item">
                                                <label> <input type="checkbox" value="">Pet Friendly</label>
                                            </div>

                                            <div class="checkbox" class="list-group-item">
                                                <label> <input type="checkbox" value="">Parking Available</label>
                                            </div>

                                
                                        <div class="control-group multiple-form-group" data-max=10>
                                            <label>Upload Images (max 10):</label>

                                            <div class="form-group input-group" style="padding-left: 15px; padding-right: 15px;">
                                                <input type="file" accept="image/png" name="images[]" class="form-control">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-success btn-add">+</button>
                                                </span>
                                            </div>
                                        </div>


                                    <button type="submit" class="btn btn-success pull-right">Submit</button>
                                      </fieldset>
                                    </form>
                                    
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