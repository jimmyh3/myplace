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
                        <button style="display: inline-block;" type="button" class="btn btn-primary btn-sm">View Messages</button>
                        <button style="display: inline-block;" type="button" class="btn btn-danger btn-sm pull-right">Delete Post</button>

                    </div>


                    <div class="modal fade" id="aptModal" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Post/Edit Apartment</h4>
                                </div>
                                <div class="modal-body">
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

                                    <h2 class="lead"> Fill/Edit Apartment Description Form</h2>
                                    <p><span class="error">* required field.</span></p>
                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">  
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
                                        <!-- <span class="error">* <?php echo $parkingErr; ?></span> -->
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

                                        <div class="panel panel-default">
                                            <div class="panel-heading"><strong>Upload Files</strong></div>
                                            <div class="panel-body">

                                                <!-- Standar Form -->
                                                <h4>Select files from your computer</h4>
                                                <form action="" method="post" enctype="multipart/form-data" id="js-upload-form">
                                                    <div class="form-inline">
                                                        <div class="form-group">
                                                            <input type="file" name="files[]" id="js-upload-files" multiple>
                                                        </div>
                                                        <button type="submit" class="btn btn-sm btn-primary">Upload files</button>
                                                    </div>
                                                </form>



                                            </div>
                                        </div>



                                    </form>






                                    <p>Adds Apartment to myPost</p>
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