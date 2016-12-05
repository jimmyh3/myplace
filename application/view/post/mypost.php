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
	
    <div class="container">
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

					<!-- Form to Edit Apartment-->
                    <div class="modal fade" id="aptModal" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Edit Apartment Post</h4>
                                </div>
                                <div class="modal-body clearfix">
                                   
                                    <p class="text-right"><span class="error">* required field.</span></p>
                                   
                                    <form class="form-horizontal" name="aptInfoForm" id="aptInfoForm">
                                        <fieldset>
                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="Name">Contact name:</label>
                                                <div class="controls">
                                                    <input id="Name" name="title" class="form-control" type="text" placeholder="Bob" class="input-large">
                                                </div>
                                            </div>

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="Email">Contact email:</label>
                                                <div class="controls">
                                                    <input id="Email" name="Email" class="form-control" type="text" placeholder="bob@mail.sfsu.edu" class="input-large">
                                                </div>
                                            </div>

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="Number">Contact number:</label>
                                                <div class="controls">
                                                    <input id="Number" name="Number" class="form-control" type="text" placeholder="(123) 456-7890" class="input-large">
                                                </div>
                                            </div>

                                            <!-- Bedrooms input-->
                                            <div class="control-group">
                                                <label class="control-label" for="Bedroom">*Bedrooms:</label>
                                                <select class="form-control" id="Bedroom" name="Bedroom">
                                                    <option value="-1">Any</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3+</option>
                                                </select>
                                            </div>


                                            <!-- Price input-->
                                            <div class="control-group">
                                                <label class="control-label" for="Price">*Price:</label>
                                                <div class="controls">
                                                    <input id="Price" name="Price" class="form-control" type="text" placeholder="1000" class="input-lg">
                                                </div>
                                            </div>

                                            <label class="control-label" for="Term">*Availability Term:</label>

                                            <div class="input-group">

                                                <select class="form-control" id="StartTerm" name="StartTerm">
                                                    <option value="-1">Any</option>
                                                    <option value="1">January</option>
                                                    <option value="2">February</option>
                                                    <option value="3">March</option>
                                                    <option value="4">April</option>
                                                    <option value="5">May</option>
                                                    <option value="6">June</option>
                                                    <option value="7">July</option>
                                                    <option value="8">August</option>
                                                    <option value="9">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>




                                                <span class="input-group-addon">-</span>
                                                <select class="form-control" id="EndTerm" name="EndTerm">
                                                    <option value="-1">Any</option>
                                                    <option value="1">January</option>
                                                    <option value="2">February</option>
                                                    <option value="3">March</option>
                                                    <option value="4">April</option>
                                                    <option value="5">May</option>
                                                    <option value="6">June</option>
                                                    <option value="7">July</option>
                                                    <option value="8">August</option>
                                                    <option value="9">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>
                                            </div>

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="ZipCode">*Zip Code:</label>
                                                <div class="controls">
                                                    <input id="ZipCode" name="ZipCode" class="form-control" type="text" placeholder="94132" class="input-large">
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
                                            
                                            <div class="checkbox" class="list-group-item">
                                                <label> <input type="checkbox" value="">Laundry</label>
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
                                                <label> <input type="checkbox" value="">Wheelchair Acessible</label>
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
                                            
                                            
                                        <br>
                                        <div id="aptInfoForm_errorloc"></div>

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
        
                    <!-- Form to Add NEW Apartment-->
                    <div class="modal fade" id="addAptModal" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Add Apartment Post</h4>
                                </div>
                                <div class="modal-body clearfix">
                                   
                                    <p class="text-right"><span class="error">* required field.</span></p>
                                   
                                    <form class="form-horizontal" name="aptInfoForm" id="add-aprt-form" method="POST">
                                        <fieldset>
                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="Name">Contact name:</label>
                                                <div class="controls">
                                                    <input id="Name" name="Name" class="form-control" type="text" placeholder="Bob" class="input-large">
                                                </div>
                                            </div>

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="Email">Contact email:</label>
                                                <div class="controls">
                                                    <input id="Email" name="Email" class="form-control" type="text" placeholder="bob@mail.sfsu.edu" class="input-large">
                                                </div>
                                            </div>

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="Number">Contact number:</label>
                                                <div class="controls">
                                                    <input id="Number" name="Number" class="form-control" type="text" placeholder="(123) 456-7890" class="input-large">
                                                </div>
                                            </div>

                                            <!-- Bedrooms input-->
                                            <div class="control-group">
                                                <label class="control-label" for="Bedroom">*Bedrooms:</label>
                                                <select class="form-control" id="Bedroom" name="Bedroom">
                                                    <option value="-1">Any</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3+</option>
                                                </select>
                                            </div>


                                            <!-- Price input-->
                                            <div class="control-group">
                                                <label class="control-label" for="Price">*Price:</label>
                                                <div class="controls">
                                                    <input id="Price" name="Price" class="form-control" type="text" placeholder="1000" class="input-lg">
                                                </div>
                                            </div>

                                            <label class="control-label" for="Term">*Availability Term:</label>

                                            <div class="input-group">

                                                <select class="form-control" id="StartTerm" name="StartTerm">
                                                    <option value="-1">Any</option>
                                                    <option value="1">January</option>
                                                    <option value="2">February</option>
                                                    <option value="3">March</option>
                                                    <option value="4">April</option>
                                                    <option value="5">May</option>
                                                    <option value="6">June</option>
                                                    <option value="7">July</option>
                                                    <option value="8">August</option>
                                                    <option value="9">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>




                                                <span class="input-group-addon">-</span>
                                                <select class="form-control" id="EndTerm" name="EndTerm">
                                                    <option value="-1">Any</option>
                                                    <option value="1">January</option>
                                                    <option value="2">February</option>
                                                    <option value="3">March</option>
                                                    <option value="4">April</option>
                                                    <option value="5">May</option>
                                                    <option value="6">June</option>
                                                    <option value="7">July</option>
                                                    <option value="8">August</option>
                                                    <option value="9">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>
                                            </div>

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="ZipCode">*Zip Code:</label>
                                                <div class="controls">
                                                    <input id="ZipCode" name="ZipCode" class="form-control" type="text" placeholder="94132" class="input-large">
                                                </div>
                                            </div>

                                            <div class="control-group">

                                                <label  class="control-label" for="desc">Description:</label>
                                                <div class="controls">
                                                    <textarea class="form-control" class="input-large" rows="5" id="desc" name="Description"></textarea>
                                                </div> 
                                            </div>

                                                      <div class="checkbox" class="list-group-item">
                                                <label> <input type="checkbox" value="true" name="PetFriendly">Pet Friendly</label>
                                            </div>

                                            <div class="checkbox" class="list-group-item">
                                                <label> <input type="checkbox" value="true" name="Parking">Parking Available</label>
                                            </div>
                                            
                                            <div class="checkbox" class="list-group-item">
                                                <label> <input type="checkbox" value="true" name="Laundry">Laundry</label>
                                            </div>

                                            <div class="checkbox" class="list-group-item">
                                                <label> <input type="checkbox" value="true" name="Smoking">No Smoking</label>
                                            </div>
                                            
                                            <div class="checkbox" class="list-group-item">
                                                <label> <input type="checkbox" value="true" name="SharedRoom">Shared Room</label>
                                            </div>

                                            <div class="checkbox" class="list-group-item">
                                                <label> <input type="checkbox" value="true" name="Furnished">Furnished</label>
                                            </div>
                                            
                                            <div class="checkbox" class="list-group-item">
                                                <label> <input type="checkbox" value="true" name="WheelChairAccess">Wheelchair Accessible</label>
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
                                            
                                            
                                        <br>
                                        <div id="aptInfoForm_errorloc"></div>

                                        <button type="submit" class="btn btn-success pull-right" >Submit</button>
                                      </fieldset>
                                    </form>
                                    
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
