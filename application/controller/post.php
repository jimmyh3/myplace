<?php

class Post extends Controller
{

    public function index()
    {
        // load views

        require APP . 'view/_templates/header.php';
        require APP . 'view/post/mypost.php';
        require APP . 'view/_templates/footer.php';
    }
    
    public function postPage()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/post/mypost.php';
        require APP . 'view/_templates/footer.php';
    }
    
   
    public function displayApartments( $user_id )
    {
        // this section is to be moved to mypost.php 
//        if(isset($_COOKIE["myPlace_userID"])){
//            $user_id = $_COOKIE["myPlace_userID"]; 
//        }
        $result =""; 
        $user       = $this->user_db->getUser($user_id)[0];
        $apartmentRecords = $this->apartment_db->getLandLordApartments($user_id); 
        
        if(!$apartmentRecords){
            $result .= 'No Apartments Listed'; 
        }
        else{
            
            foreach ($apartmentRecords as $apartmentRecord){
                
                $apartment = $this->apartment_db->dbRecordToApartment($apartmentRecord);
                
                $formApartmentID        = htmlspecialchars($apartment->getID(), ENT_QUOTES, 'UTF-8');
                $formContactName        = htmlspecialchars($user->name, ENT_QUOTES, 'UTF-8');
                $formContactEmail       = htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8');
                //$formContactNumber;
                $formBedrooms           = htmlspecialchars($apartment->getBedRoomCount(), ENT_QUOTES, 'UTF-8');
                $formPrice              = htmlspecialchars($apartment->getActualPrice(), ENT_QUOTES, 'UTF-8');
                $formStartTerm          = htmlspecialchars($apartment->getBeginTerm(), ENT_QUOTES, 'UTF-8');
                $formEndTerm            = htmlspecialchars($apartment->getEndTerm(), ENT_QUOTES, 'UTF-8');
                $formZipCode            = htmlspecialchars($apartment->getAreaCode(), ENT_QUOTES, 'UTF-8');         
                $formDescription        = htmlspecialchars($apartment->getDescription(), ENT_QUOTES, 'UTF-8');
                
                if ($apartment->isPetFriendly()){
                    $formPetFriendly    = htmlspecialchars("checked='checked'", ENT_QUOTES, 'UTF-8');
                } else {
                    $formPetFriendly    = "";
                }
                
                if ($apartment->hasParking()){
                    $formParking    = htmlspecialchars("checked='checked'", ENT_QUOTES, 'UTF-8');
                } else {
                    $formParking    = "";
                }
                
                if ($apartment->hasLaundry()){
                    $formLaundry    = htmlspecialchars("checked='checked'", ENT_QUOTES, 'UTF-8');
                } else {
                    $formLaundry    = "";
                }
                
                if ($apartment->hasSmoking()){
                    $formSmoking    = htmlspecialchars("checked='checked'", ENT_QUOTES, 'UTF-8');
                } else {
                    $formSmoking    = "";
                }
                
                if ($apartment->isSharedRoom()){
                    $formSharedRoom    = htmlspecialchars("checked='checked'", ENT_QUOTES, 'UTF-8');
                } else {
                    $formSharedRoom    = "";
                }
                
                if ($apartment->isFurnished()){
                    $formFurnished    = htmlspecialchars("checked='checked'", ENT_QUOTES, 'UTF-8');
                } else {
                    $formFurnished    = "";
                } 
                
                if ($apartment->hasWheelChairAccess()){
                    $formWheelChairsAcc    = htmlspecialchars("checked='checked'", ENT_QUOTES, 'UTF-8');
                } else {
                    $formWheelChairsAcc    = "";
                } 
                
                /**
                 * Handle images with names
                 */
                $formImage;            
                
               // Get images belong to the current apartment
               $images = $this->apartment_db->getImageDB($apartmentRecord->id);
                
                
               $result .= '<div class="col-sm-4 col-lg-4 col-md-4">
                <div class="thumbnail">';
               if(isset($apartmentRecord->thumbnail)){
                   $result .= '<img src="data:image/jpeg;base64,'.base64_encode( $apartmentRecord->thumbnail).'" alt="" style="cursor: pointer;height:150px;width:320px;" alt="">';
               } else {
                   $result .= '<img src="http://placehold.it/320x150" alt="">';
               }
               
                $result .= '<div class="caption">
                    <h4 class="pull-right">';
                if (isset ( $apartmentRecord->actual_price)) $result .= htmlspecialchars ($apartmentRecord->actual_price).'</h4>';
                if (isset ( $apartmentRecord->id)) $result .= '<h4><a href="#">'.htmlspecialchars($apartmentRecord->id).'</a></h4>'; 
                if (isset ( $apartmentRecord->description)) $result .= '<p>'.htmlspecialchars ($apartmentRecord->description).'</p>';
                
                $result .= '</div>';
                $result .= '<div class="ratings">
                                <div style="width:100%;text-align: center;">
                                    <button style="display: inline-block;" type="button" class="btn btn-info btn-sm pull-left" data-toggle="modal" data-target="#editAptModal">Edit Post</button>
                                    <a href="////';
                // Original My Messages Link
//                $result .=  htmlspecialchars (URL).'msg">';
                
                $result .=  htmlspecialchars (URL).'msg?apartment_id=';
                if (isset( $apartmentRecord->id)) $result .= $apartmentRecord->id.'">';
                $result .= '<button style="display: inline-block;" type="button" class="btn btn-primary btn-sm  btn-sm">View Messages</button></a>';
                $result .= '<button style="display: inline-block;" type="button" class="btn btn-danger btn-sm pull-right">Delete Post</button>
                                </div>';
                
                // Form to edit Apartment
                
                $result .= '<div class="modal fade" id="editAptModal" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Edit Apartment Post</h4>
                                        </div>
                                        <div class="modal-body clearfix">

                                            <p class="text-right"><span class="error">* required field.</span></p>

                                            <form class="form-horizontal" name="edit-aprt-form" id="edit-aprt-form" enctype="multipart/form-data">
                                                <input type="hidden" name="apartment_id" value="' . $formApartmentID . '">
                                                <fieldset>
                                                    <!-- Text input-->
                                                    <div class="control-group">
                                                        <label class="control-label" for="Name">Contact name:</label>
                                                        <div class="controls">
                                                            <input id="Name" name="Name" value="' . $formContactName . '" class="form-control" type="text" placeholder="Bob" class="input-large">
                                                        </div>
                                                    </div>

                                                    <!-- Text input-->
                                                    <div class="control-group">
                                                        <label class="control-label" for="Email">Contact email:</label>
                                                        <div class="controls">
                                                            <input id="Email" name="Email" value="' . $formContactEmail . '" class="form-control" type="text" placeholder="bob@mail.sfsu.edu" class="input-large">
                                                        </div>
                                                    </div>

                                                    <!-- Text input-->
                                                    <div class="control-group">
                                                        <label class="control-label" for="Number">Contact number:</label>
                                                        <div class="controls">
                                                            <input id="Number" name="Number" class="form-control" type="text" placeholder="(123) 456-7890" class="input-large">
                                                        </div>
                                                    </div>';

//                $result .= '                        <!-- Bedrooms input-->
//                                                    <div class="control-group">
//                                                        <label class="control-label" for="Bedroom">*Bedrooms:</label>
//                                                        <select class="form-control" id="Bedroom" name="Bedroom" value="' . $formBedrooms . '">
//                                                            <option value="-1">Any</option>
//                                                            <option value="1">1</option>
//                                                            <option value="2">2</option>
//                                                            <option value="3">3+</option>
//                                                        </select>
//                                                    </div>';
                
                $result .= '                        <!-- Bedrooms input-->
                                                    <div class="control-group">
                                                        <label class="control-label" for="Bedroom">*Bedrooms:</label>
                                                        <input id="Bedroom" name="Bedroom" value="' . $formBedrooms . '" class="form-control" type="text" placeholder="" class="input-lg">
                                                    </div>';


                $result .= '                        <!-- Price input-->
                                                    <div class="control-group">
                                                        <label class="control-label" for="Price">*Price:</label>
                                                        <div class="controls">
                                                            <input id="Price" name="Price" value="' . $formPrice . '" class="form-control" type="text" placeholder="1000" class="input-lg">
                                                        </div>
                                                    </div>

                                                    <label class="control-label" for="Term">*Availability Term:</label>

                                                    <div class="input-group">

                                                        <!-- Calendar input in appropriate format:  -->
                                                        <input class="form-control" id="StartTerm" name="StartTerm" value="' . $formStartTerm . '" type="date" value=""/>                                         

                                                        <!-- Calendar input in appropriate format:  -->
                                                        <span class="input-group-addon">-</span>
                                                        <input class="form-control" id="EndTerm" name="EndTerm" value="' . $formEndTerm . '" type="date" value=""/>

                                                    </div>

                                                    <!-- Text input-->
                                                    <div class="control-group">
                                                        <label class="control-label" for="ZipCode">*Zip Code:</label>
                                                        <div class="controls">
                                                            <input id="ZipCode" name="ZipCode" value="' . $formZipCode . '" class="form-control" type="text" placeholder="94132" class="input-large">
                                                        </div>
                                                    </div>

                                                    <div class="control-group">

                                                        <label  class="control-label" for="desc">Description:</label>
                                                        <div class="controls">
                                                            <textarea class="form-control" class="input-large" rows="5" id="desc" name="Description">' . $formDescription . '</textarea>
                                                        </div> 
                                                    </div>';
                
                
                
                $result.= '                         <div class="checkbox" class="list-group-item">
                                                        <label> <input type="checkbox" value="true" name="PetFriendly" ' . $formPetFriendly . '>Pet Friendly</label>
                                                    </div>

                                                    <div class="checkbox" class="list-group-item">
                                                        <label> <input type="checkbox" value="true" name="Parking" ' . $formParking . '>Parking Available</label>
                                                    </div>

                                                    <div class="checkbox" class="list-group-item">
                                                        <label> <input type="checkbox" value="true" name="Laundry" ' . $formLaundry . '>Laundry</label>
                                                    </div>

                                                    <div class="checkbox" class="list-group-item">
                                                        <label> <input type="checkbox" value="true" name="Smoking" ' . $formSmoking . '>No Smoking</label>
                                                    </div>

                                                    <div class="checkbox" class="list-group-item">
                                                        <label> <input type="checkbox" value="true" name="SharedRoom" ' . $formSharedRoom . '>Shared Room</label>
                                                    </div>

                                                    <div class="checkbox" class="list-group-item">
                                                        <label> <input type="checkbox" value="true" name="Furnished" ' . $formFurnished . '>Furnished</label>
                                                    </div>

                                                    <div class="checkbox" class="list-group-item">
                                                        <label> <input type="checkbox" value="true" name="WheelChairAccess" ' . $formWheelChairsAcc . '>Wheelchair Accessible</label>
                                                    </div>

                                                ';
                
                //Add images to edit-form.
                $result .= '                    <div class="control-group multiple-form-group" data-max=10>
                                                    <label>Upload Images (max 10):</label>
                                                ';
                                                    
                foreach ($images as $image) {
                    $imageId        = htmlspecialchars($image->id, ENT_QUOTES, 'UTF-8');
                    $imageInputId   = htmlspecialchars("image".$image->id, ENT_QUOTES, 'UTF-8');
                    $imageInputName = htmlspecialchars($image->name, ENT_QUOTES, 'UTF-8');
                    
                    $result    .=                  '<div class="form-group input-group" style="padding-left: 15px; padding-right: 15px;">
                                                        <input type="hidden" name="image_id" value="' . $imageId . '">   
                                                        <input type="file" hidden="true" id="'.$imageInputId.'" accept="image/*" name="images[]" class="form-control">
                                                        <span class="input-group-btn">
                                                            <button type="button" class="btn btn-success btn-add">+</button>
                                                        </span>
                                                    </div>';                            
                    
                }
                                  
                //Append the rest of the edit-form.
                $result .= '                    </div>


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
                            </div>';
            }
            
            return $result;
        }
        
        
    }
}

