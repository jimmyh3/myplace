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

<div class="row">
<?php
// default $user_id to 1 for testing purposes
$user_id ="1";

if(isset($_COOKIE["myPlace_userID"])){
    $user_id = $_COOKIE["myPlace_userID"];
}

echo $this->displayApartments($user_id); ?> 
</div>

<div class="modal fade" id="addAptModal" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Add Apartment Post</h4>
                                </div>
                                <div class="modal-body clearfix">
                                   
                                    <p class="text-right"><span class="error">* required field.</span></p>
                                   
                                    <form class="form-horizontal" name="add-aprt-form" id="add-aprt-form" enctype="multipart/form-data">
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
                                                
                                                <!-- Calendar input in appropriate format:  -->
                                                <input class="form-control" id="StartTerm" name="StartTerm" type="date" value=""/>                                         
                                                
                                                <!-- Calendar input in appropriate format:  -->
                                                <span class="input-group-addon">-</span>
                                                <input class="form-control" id="EndTerm" name="EndTerm" type="date" value=""/>
                                                
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
                                                <input type="file" id="imagesInput" accept="image/*" name="images[]" class="form-control">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-success btn-add">+</button>
                                                </span>
                                            </div>
                                        </div>
                                            
                                            
                                        <br>
                                        <div id="aptInfoForm_errorloc"></div>

                                    <button type="submit" class="btn btn-success pull-right"><span class="glyphicon glyphicon-pencil"></span> Post</button>
                                      </fieldset>
                                    </form>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>

<script src="<?php echo URL; ?>js/myplace-apartment_listing.js"></script>


