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
    
//    public function postPage()
//    {
//        // load views
//        require APP . 'view/_templates/header.php';
//        require APP . 'view/post/mypost.php';
//        require APP . 'view/_templates/footer.php';
//    }
    
   
    public function displayApartments( $user_id )
    {
        // this section is to be moved to mypost.php 
        if(isset($_COOKIE["myPlace_userID"])){
            $user_id = $_COOKIE["myPlace_userID"]; 
        }
        $result =""; 
        $apartments = $this->apartment_db->getLandLordApartments($user_id); 
        if(!$apartments){
            $result .= 'No Apartments Listed'; 
        }
        else{
            foreach ($apartments as $apartment){
               $result .= '<div class="col-sm-4 col-lg-4 col-md-4">
                <div class="thumbnail">';
               if(isset($apartment->thumbnail)){
                   $result .= '<img src="data:image/jpeg;base64,'.base64_encode( $apartment->thumbnail).'" alt="" style="cursor: pointer;height:150px;width:320px;" alt="">';
               } else {
                   $result .= '<img src="http://placehold.it/320x150" alt="">';
               }
               
                $result .= '<div class="caption">
                    <h4 class="pull-right">';
                if (isset ( $apartment->actual_price)) $result .= htmlspecialchars ($apartment->actual_price).'</h4>';
                if (isset ( $apartment->id)) $result .= '<h4><a href="#">'.htmlspecialchars($apartment->id).'</a></h4>'; 
                if (isset ( $apartment->description)) $result .= '<p>'.htmlspecialchars ($apartment->description).'</p>';
                
                $result .= '</div>';
                $result .= '<div class="ratings">
                                <div style="width:100%;text-align: center;">
                                    <button style="display: inline-block;" type="button" class="btn btn-info btn-sm pull-left" data-toggle="modal" data-target="#aptModal">Edit Post</button>
                                    <a href="////';
                $result .=  htmlspecialchars (URL).'msg">';
                $result .= '<button style="display: inline-block;" type="button" class="btn btn-primary btn-sm  btn-sm">View Messages</button></a>
                                    <button style="display: inline-block;" type="button" class="btn btn-danger btn-sm pull-right">Delete Post</button>
                                </div>';
                // Form to edit Apartment
                
                $result .= '<div class="modal fade" id="aptModal" role="dialog">
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
                                             Text input
                                            <div class="control-group">
                                                <label class="control-label" for="Name">Contact name:</label>
                                                <div class="controls">
                                                    <input id="Name" name="Name" class="form-control" type="text" placeholder="Bob" class="input-large">
                                                </div>
                                            </div>

                                             Text input
                                            <div class="control-group">
                                                <label class="control-label" for="Email">Contact email:</label>
                                                <div class="controls">
                                                    <input id="Email" name="Email" class="form-control" type="text" placeholder="bob@mail.sfsu.edu" class="input-large">
                                                </div>
                                            </div>

                                             Text input
                                            <div class="control-group">
                                                <label class="control-label" for="Number">Contact number:</label>
                                                <div class="controls">
                                                    <input id="Number" name="Number" class="form-control" type="text" placeholder="(123) 456-7890" class="input-large">
                                                </div>
                                            </div>

                                             Bedrooms input
                                            <div class="control-group">
                                                <label class="control-label" for="Bedroom">*Bedrooms:</label>
                                                <select class="form-control" id="Bedroom" name="Bedroom">
                                                    <option value="-1">Any</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3+</option>
                                                </select>
                                            </div>


                                             Price input
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

                                             Text input
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
                // Form to add NEW Apartments
                
                $result .= '<div class="modal fade" id="addAptModal" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Add Apartment Post</h4>
                                </div>
                                <div class="modal-body clearfix">
                                   
                                    <p class="text-right"><span class="error">* required field.</span></p>
                                   
                                    <form class="form-horizontal" name="aptInfoForm" id="aptInfoForm">
                                        <fieldset>
                                             Text input
                                            <div class="control-group">
                                                <label class="control-label" for="Name">Contact name:</label>
                                                <div class="controls">
                                                    <input id="Name" name="Name" class="form-control" type="text" placeholder="Bob" class="input-large">
                                                </div>
                                            </div>

                                             Text input
                                            <div class="control-group">
                                                <label class="control-label" for="Email">Contact email:</label>
                                                <div class="controls">
                                                    <input id="Email" name="Email" class="form-control" type="text" placeholder="bob@mail.sfsu.edu" class="input-large">
                                                </div>
                                            </div>

                                             Text input
                                            <div class="control-group">
                                                <label class="control-label" for="Number">Contact number:</label>
                                                <div class="controls">
                                                    <input id="Number" name="Number" class="form-control" type="text" placeholder="(123) 456-7890" class="input-large">
                                                </div>
                                            </div>

                                             Bedrooms input
                                            <div class="control-group">
                                                <label class="control-label" for="Bedroom">*Bedrooms:</label>
                                                <select class="form-control" id="Bedroom" name="Bedroom">
                                                    <option value="-1">Any</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3+</option>
                                                </select>
                                            </div>


                                             Price input
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

                                             Text input
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

                                    <button type="submit" class="btn btn-success pull-right"><span class="glyphicon glyphicon-pencil"></span> Post</button>
                                      </fieldset>
                                    </form>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>';
            }
            
            return $result;
        }
        
        
    }
}

