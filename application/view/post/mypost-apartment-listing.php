<?php
/*
 * Keeping this here but commented in case of variable renaming.
 */

//$apartThumbnail;    //HTML thumbnail string to display
//$apartPrice;        //LITERAL apartment price
//$apartID;           //LITERAL apartment ID
//$apartDescription;  //LITERAL apartment description
//$apartBedrooms;     //LITERAL
////$apartPrice;        //LITERAL
//$apartStartTerm;    //LITERAL
//$apartEndTerm;      //LITERAL
//$apartZipCode;      //LITERAL
////$apartDescription;  //LITERAL
//$apartPetFriendly;  //LITERAL
//$apartParking;      //LITERAL
//$apartLaundry;      //LITERAL
//$apartSmoking;
//$apartSharedRoom;
//$apartFurnished;
//$apartWheelChairAcc;
//$apartImages;       //ARRAY of images from ImageDB
//
//$landlordName;      //LITERAL landlord name
//$landlordEmail;     //LITERAL landlord email
?>

<div id="aprt-thumbnail-<?php echo $apartID; ?>" class="col-sm-4 col-lg-4 col-md-4">
    <div class="thumbnail">
        <?php echo $apartThumbnail; ?>
        
        <div class="caption">
            <h4 class="pull-right">
                <?php echo $apartPrice; ?>
            </h4>
            <h4>
                <a href="#">
                    <?php echo $apartID; ?>
                </a>
            </h4>
            <p>
                <?php echo $apartDescription; ?>
            </p>
        </div>
        
        <div class="ratings">
            <div style="width:100%; text-align: center;">
                <button style=  "display: inline-block;"
                        type=   "button"
                        class=  "btn btn-info btn-sm pull-left"
                        data-toggle="modal"
                        data-target="#editAptModal<?php echo $apartID; ?>"
                >
                Edit Post
                </button>
                
                <a href="////<?php echo htmlspecialchars(URL.'msg?apartment_id='.$apartID); ?>">
                    <button style=  "display: inline-block;" 
                            type=   "button" 
                            class=  "btn btn-primary btn-sm  btn-sm"
                    >
                    View Messages
                    </button>
                </a>
                
                <button id="delete-aprt-btn-<?php echo $apartID; ?>" 
                        data-id="<?php echo $apartID; ?>" 
                        style=  "display: inline-block;" 
                        type=   "button" 
                        class=  "btn btn-danger btn-sm pull-right"
                >
                Delete Post
                </button>
                
            </div>
            
            <div class="modal fade" id="editAptModal<?php echo $apartID; ?>" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Apartment Post</h4>
                        </div>
                        
                        <div class="modal-body clearfix">
                            <p class="text-right">
                                <span class="error">* required field.</span>
                            </p>
                            
                            <form class="form-horizontal"   
                                  name= "edit-aprt-form<?php echo $apartID; ?>" 
                                  id=   "edit-aprt-form<?php echo $apartID; ?>"
                                  data-id="<?php echo $apartID; ?>"
                                  enctype="multipart/form-data"
                            >
                            
                                <input type="hidden" name="apartment_id" value="<?php echo $apartID; ?>">
                                
                                <fieldset>
                                    
                                    <!-- Text input-->
                                    <div class="control-group">
                                        <label class="control-label" for="Name">Contact name:</label>
                                        <div class="controls">
                                            <input id=  "Name" 
                                                   name="Name" 
                                                   value="<?php echo $landlordName; ?>" 
                                                   class="form-control" 
                                                   type="text" 
                                                   placeholder="Bob" 
                                                   class="input-large"
                                            >
                                        </div>
                                    </div>

                                    <!-- Text input-->
                                    <div class="control-group">
                                        <label class="control-label" for="Email">Contact email:</label>
                                        <div class="controls">
                                            <input id=  "Email" 
                                                   name="Email" 
                                                   value="<?php echo $landlordEmail; ?>" 
                                                   class="form-control" 
                                                   type= "text" 
                                                   placeholder="bob@mail.sfsu.edu" 
                                                   class="input-large"
                                            >
                                        </div>
                                    </div>

                                    <!-- Text input-->
                                    <div class="control-group">
                                        <label class="control-label" for="Number">Contact number:</label>
                                        <div class="controls">
                                            <input id="Number" 
                                                   name="Number" 
                                                   class="form-control" 
                                                   type="text" 
                                                   placeholder="(123) 456-7890" 
                                                   class="input-large"
                                            >
                                        </div>
                                    </div>
                                    
                                    <!-- Bedrooms input-->
                                    <div class="control-group">
                                        <label class="control-label" for="Bedroom">*Bedrooms:</label>
                                        <input id="Bedroom" 
                                               name="Bedroom" 
                                               value="<?php echo $apartBedrooms; ?>"
                                               class="form-control" 
                                               type="text" 
                                               placeholder="" 
                                               class="input-lg"
                                        >
                                    </div>
                            
                                    <!-- Price input-->
                                    <div class="control-group">
                                        <label class="control-label" for="Price">*Price:</label>
                                        <div class="controls">
                                            <input id="Price" 
                                                   name="Price" 
                                                   value="<?php echo $apartPrice; ?>" 
                                                   class="form-control" 
                                                   type="text" 
                                                   placeholder="1000" 
                                                   class="input-lg"
                                            >
                                        </div>
                                    </div>
                                    
                                    <label class="control-label" for="Term">*Availability Term:</label>

                                    <div class="input-group">

                                        <!-- Calendar input in appropriate format:  -->
                                        <input class="form-control" 
                                               id="StartTerm" 
                                               name="StartTerm" 
                                               value="<?php echo $apartStartTerm; ?>" 
                                               type="date" 
                                               value=""
                                        >                                         

                                        <span class="input-group-addon">-</span>
                                        
                                        <!-- Calendar input in appropriate format:  -->
                                        <input class="form-control" 
                                               id="EndTerm" 
                                               name="EndTerm" 
                                               value="<?php echo $apartEndTerm; ?>" 
                                               type="date" 
                                               value=""
                                        >

                                    </div>

                                    <!-- Zipcode input -->
                                    <div class="control-group">
                                        <label class="control-label" for="ZipCode">*Zip Code:</label>
                                        <div class="controls">
                                            <input id="ZipCode" 
                                                   name="ZipCode" 
                                                   value="<?php echo $apartZipCode; ?>" 
                                                   class="form-control" 
                                                   type="text" 
                                                   placeholder="94132" 
                                                   class="input-large"
                                            >
                                        </div>
                                    </div>

                                    <!-- Description input -->
                                    <div class="control-group">
                                        <label  class="control-label" for="desc">Description:</label>
                                        <div class="controls">
                                            <textarea class="form-control" 
                                                      class="input-large" 
                                                      rows="5" 
                                                      id="desc" 
                                                      name="Description"
                                            >
                                            <?php echo $apartDescription; ?>
                                            </textarea>
                                        </div> 
                                    </div>
                                    
                                    <div class="checkbox" class="list-group-item">
                                        <label> 
                                            <input type="checkbox" 
                                                   value="true" 
                                                   name="PetFriendly" 
                                                   <?php echo $apartPetFriendly; //"checked='checked'" ?>
                                            >
                                            Pet Friendly
                                        </label>
                                    </div>

                                    <div class="checkbox" class="list-group-item">
                                        <label> 
                                            <input type="checkbox" 
                                                   value="true" 
                                                   name="Parking" 
                                                   <?php echo $apartParking; //"checked='checked'" ?>
                                            >
                                            Parking Available
                                        </label>
                                    </div>

                                    <div class="checkbox" class="list-group-item">
                                        <label> 
                                            <input type="checkbox" 
                                                   value="true" 
                                                   name="Laundry" 
                                                   <?php echo $apartLaundry; //"checked='checked'" ?>
                                            >
                                            Laundry
                                        </label>
                                    </div>

                                    <div class="checkbox" class="list-group-item">
                                        <label> 
                                            <input type="checkbox" 
                                                   value="true" 
                                                   name="Smoking" 
                                                   <?php echo $apartSmoking; //"checked='checked'" ?>
                                            >
                                            No Smoking
                                        </label>
                                    </div>

                                    <div class="checkbox" class="list-group-item">
                                        <label> 
                                            <input type="checkbox" 
                                                   value="true" 
                                                   name="SharedRoom" 
                                                   <?php echo $apartSharedRoom; //"checked='checked'" ?>
                                            >
                                            Shared Room
                                        </label>
                                    </div>

                                    <div class="checkbox" class="list-group-item">
                                        <label> 
                                            <input type="checkbox" 
                                                   value="true" 
                                                   name="Furnished" 
                                                   <?php echo $apartFurnished; //"checked='checked'" ?>
                                            >
                                            Furnished
                                        </label>
                                    </div>

                                    <div class="checkbox" class="list-group-item">
                                        <label> 
                                            <input type="checkbox" 
                                                   value="true" 
                                                   name="WheelChairAccess" 
                                                   <?php echo $apartWheelChairAcc; //"checked='checked'" ?>
                                            >
                                            Wheelchair Accessible
                                        </label>
                                    </div>
                                    
                                    <!-- Uploaded images  -->
                                    <div class="control-group multiple-form-group" data-max=10>
                                        <label>Upload Images (max 10):</label>
                                          
                                    <?php foreach($apartImages as $index=>$apartImage) : ?>
                                        <div class="form-group input-group" style="padding-left: 15px; padding-right: 15px;">
                                            <input type="hidden" 
                                                   name="image_id[]" 
                                                   value="<?php echo htmlspecialchars($apartImage->id, ENT_QUOTES, 'UTF-8'); ?>"
                                            >   
                                            <input type="file" 
                                                   accept="image/*" 
                                                   name="images[]" 
                                                   class="form-control"
                                            >
                                            <span class="input-group-btn">
                                                <?php 
                                                if ($index == 10) {
                                                    echo '<button type="button" class="btn btn-success btn-add" disabled="disabled">+</button>';
                                                } else if (($image_index + 1) < count($images)) {
                                                    echo '<button type="button" class="btn btn-success btn-default btn-danger btn-remove">-</button>';
                                                } else {
                                                    echo '<button type="button" class="btn btn-success btn-add">+</button>';
                                                }
                                                ?>
                                            </span>
                                        </div>
                                    
                                    <?php endforeach; ?>
                                    
                                    <?php if (count($apartImages) == 0) :?>
                                        <div class="form-group input-group" style="padding-left: 15px; padding-right: 15px;">
                                            <input type="hidden" name="image_id[]" value="' . $imageId . '">
                                            <input type="file" accept="image/*" name="images[]" class="form-control">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-success btn-add">+</button>
                                            </span>
                                        </div>
                                    <?php endif; ?>
                                        
                                    </div>
                                    
                                    <br>
                                    <div id="editInfoForm_errorloc"></div>

                                    <button type="submit" class="btn btn-success pull-right">Update</button>
                                    
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


