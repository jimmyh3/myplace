<?php

/**
 * Description of landlord
 *
 * @author Jimmy
 */
class Landlord extends PageTemplate{
    
    public function index()
    {
        // load views
//        require APP . 'view/_templates/header.php';
//        require APP . 'view/post/mypost.php';
//        require APP . 'view/_templates/footer.php';
    }
    
    /**
     * This method corresponds to the 'Add Apartment Form' from mypost.php. This
     * method is called via POST and will add a new Apartment record to the
     * database based on the POST-ed data.
     * 
     * @return \Apartment - Apartment object made from the POST-ed data.
     * @throws Exception - if the query/upload fails.
     */
    public function addApartment()
    {
        
        $userType = 0;
        if( isset($_COOKIE["myPlace_userType"]))
            $userType = $_COOKIE["myPlace_userType"];
        if( isset($_COOKIE["myPlace_userID"]))
            $userID = $_COOKIE["myPlace_userID"];
                
                
        /* Variables */
        $apartForm      = array();          //holds the 'Add Apartment Form' data. 
        $apartImgNames  = array();          //holds the image names sent from the form.
        $apartImgFiles  = array();          //holds the images sent from the form.
        $errorMsgs      = array();          //holds validation response messages.
        $apartment      = new Apartment();  //Apartment object to add to database.
        
        /* Form <input name=""> for quick reference */
        $name_bedroom       = "Bedroom";
        $name_price         = "Price";
        $name_startTerm     = "StartTerm";
        $name_endTerm       = "EndTerm";
        $name_zipcode       = "ZipCode";
        $name_description   = "Description";
        $name_petFriendly   = "PetFriendly";
        $name_parking       = "Parking";
        $name_laundry       = "Laundry";
        $name_smoking       = "Smoking";
        $name_sharedRoom    = "SharedRoom";
        $name_furnished     = "Furnished";
        $name_wheelChairAcc = "WheelChairAccess";
        $name_images        = "images";
        
        /* Verify that the User is a landlord (i.e usertype == 1 == landlord.) */
        if ($userType != 1) {
            $errorMsgs['Failure'] = "You must be a landlord who's signed in to add a new apartment!";
            return;
        }
        
        /* Return if no form data was sent over */
        if ($_POST){ 
            $apartForm = array_filter($_POST);
        } else {
            $errorMsgs['Error']  = "Error: form data was not received!";
            $errorMsgs['Result'] = "Failure: cannot add new apartment at this time!";
            echo json_encode($errorMsgs);
            return;
        }
        
        /* Have $apartForm['image'] set to image files array passed over */
        if (isset($_FILES[$name_images]['tmp_name']) && (!empty($_FILES[$name_images]['tmp_name']))) 
        {
            $apartImgNames = $_FILES[$name_images]['name'];
            $apartImgFiles = $_FILES[$name_images]['tmp_name'];
        }
        
        /* Create new Apartment object acccording to the form values */
        try {
            
            /* Set the user ID of this Apartment to this logged in landlord's ID */
            $apartment->setUserID($userID);
            
            /* ---------Set number of bedrooms in this Apartment------------ */
            if ((isset($apartForm[$name_bedroom])) 
                                    && (is_numeric($apartForm[$name_bedroom])) 
                                              && !($apartForm[$name_bedroom] < 0)) {
                $apartment->setBedRoomCount($apartForm[$name_bedroom]);
            } else {
                $errorMsgs[$name_bedroom] = "Enter a positive number of bedrooms";
            }

            /* ----------Set the price of this Apartment--------------------- */
            $priceRegex = "/^(\d*)\.?\d{0,2}$/";
            if ((isset($apartForm[$name_price])) 
                            && (is_numeric($apartForm[$name_price]))
                            && (preg_match($priceRegex, $apartForm[$name_price]))
                                                   && !($apartForm[$name_price] < 0)) {
                
                $apartment->setActualPrice($apartForm[$name_price]);
            } else {
                $errorMsgs[$name_price] = "Enter a price following any of these "
                                        . "number formats: ## or (many #).## or .## ";
            }

            /* ---------Set the starting renting term of this Apartment------ */
            if ((isset($apartForm[$name_startTerm])) 
                    && DateTime::createFromFormat('Y-m-d', $apartForm[$name_startTerm])) {

                $apartment->setBeginTerm($apartForm[$name_startTerm]);
            } else {
                $errorMsgs[$name_startTerm] = "Enter a valid date in the format:"
                                            . " mm/dd/yyyy";
            }

            /* ---------Set the end of the renting term of this Apartment---- */
            if ((isset($apartForm[$name_endTerm])) 
                        && DateTime::createFromFormat('Y-m-d', $apartForm[$name_endTerm])) {

                $apartment->setEndTerm($apartForm[$name_endTerm]);
            } else {
                $errorMsgs[$name_endTerm] = "Enter a valid date in the format:"
                                          . " mm/dd/yyyy";
            }

            /* ---------Set the zipcode of this Apartment-------------------- */
            if ((isset($apartForm[$name_zipcode])) 
                                    && is_numeric($apartForm[$name_zipcode]) 
                                             && !($apartForm[$name_zipcode] < 0)
                                             &&  (strlen($apartForm[$name_zipcode]) == 5)) {

                $apartment->setAreaCode($apartForm[$name_zipcode]);
            } else {
                $errorMsgs[$name_zipcode] = "Enter a valid 5 digit zipcode";
            }

            /* ---------Set the rest of the form data------------------------ */
            if (isset($apartForm[$name_description]))   { $apartment->setDescription($apartForm[$name_description]);}
            if (isset($apartForm[$name_petFriendly]))   { $apartment->setPetFriendly($apartForm[$name_petFriendly]);}
            if (isset($apartForm[$name_parking]))       { $apartment->setParking    ($apartForm[$name_parking]);    }
            if (isset($apartForm[$name_laundry]))       { $apartment->setLaundry    ($apartForm[$name_laundry]);    }
            if (isset($apartForm[$name_smoking]))       { $apartment->setSmoking    ($apartForm[$name_smoking]);    }
            if (isset($apartForm[$name_sharedRoom]))    { $apartment->setSharedRoom ($apartForm[$name_sharedRoom]); }
            if (isset($apartForm[$name_furnished]))     { $apartment->setFurnished  ($apartForm[$name_furnished]);  }
            if (isset($apartForm[$name_wheelChairAcc])) { $apartment->setWheelChairAccess($apartForm[$name_wheelChairAcc]); }
            
            
            /* --------- Add the images --------------------------------------*/
            for ($index = 0; $index < count($apartImgFiles); $index++){
                if (!empty(trim($apartImgFiles[$index]))){
                    if ($apartment->getImagesCount() === 10) {
                        //$errorMsgs[$name_images] = "The number of images exceeded 10";
                        break;
                    } else {
                        $apartment->addImage($apartImgNames[$index],
                                             file_get_contents($apartImgFiles[$index]));
                    }
                }
            }
            
            /* If not error messages thus far then add Apartment to database */
            if (empty($errorMsgs)) {
                /* Add apartment to Apartment database */
                $this->apartment_db->addApartment($apartment);
                $errorMsgs['Result'] = "Apartment has been successfully added!";
            }
            
        } catch (Exception $exception) {
            $errorMsgs['Error']  = $exception->getMessage();
            $errorMsgs['Result'] = "Failure: cannot add new apartment at this time!";
            echo json_encode($errorMsgs);
            return;
        }
        
        echo json_encode($errorMsgs);
        
        return $apartment;
    }
    
    
    /**
     * This method corresponds to the 'Edit Apartment Form' from mypost.php. This
     * method is called via POST and will edit this given Apartment record on the
     * database based on the POST-ed data.
     * 
     * <p>The apartment ID is identified by $_POST['apartment_id']</p>
     * 
     * @return \Apartment - Apartment object made from the POST-ed data.
     * @throws Exception - if the query/upload fails.
     */
    public function editApartment()
    {
        
        $userType = 0;
        if( isset($_COOKIE["myPlace_userType"]))
            $userType = $_COOKIE["myPlace_userType"];
        if( isset($_COOKIE["myPlace_userID"]))
            $userID = $_COOKIE["myPlace_userID"];
        
        
        /* 
         * -------Edit Apartment - Variables used by Edit Form 
         */
        $name_apartmentId   = "apartment_id";   //Apartment ID
        $name_imageIds      = "image_id";       //ARRAY of image IDs
        $apartImgIDs        = array();
        $apartImgNames      = array();          //holds the names of images sent.
        //-------------------------------------------------------
        
        
        /* Variables */
        $apartForm      = array();          //holds the 'Add Apartment Form' data. 
        $apartImgFiles   = array();          //holds the images sent from the form.
        $errorMsgs      = array();          //holds validation response messages.
        $apartment      = new Apartment();  //Apartment object to add to database.
        
        /* Form <input name=""> for quick reference */
        $name_bedroom       = "Bedroom";
        $name_price         = "Price";
        $name_startTerm     = "StartTerm";
        $name_endTerm       = "EndTerm";
        $name_zipcode       = "ZipCode";
        $name_description   = "Description";
        $name_petFriendly   = "PetFriendly";
        $name_parking       = "Parking";
        $name_laundry       = "Laundry";
        $name_smoking       = "Smoking";
        $name_sharedRoom    = "SharedRoom";
        $name_furnished     = "Furnished";
        $name_wheelChairAcc = "WheelChairAccess";
        $name_images        = "images";
        
        /* Verify that the User is a landlord (i.e usertype == 1 == landlord.) */
        if ($userType != 1) {
            $errorMsgs['Error'] = "You must be a landlord who's signed in to add a new apartment!";
            echo json_encode($errorMsgs);
            return;
        }
        
        /* Verify that the landlord owns the Apartment he/she wants to edit */
        if (isset($apartForm[$name_apartmentId])) {
            $apartmentRecord = $this->apartment_db->getApartment($apartForm[$name_apartmentId]);
            if ($apartmentRecord->user_id != $userID){
                $errorMsgs['Error'] = "This apartment doesn't belong to you!";
                echo json_encode($errorMsgs);
                return;
            }
        }
        
        /* Return if no form data was sent over */
        if ($_POST){ 
            $apartForm = array_filter($_POST);
        } else {
            $errorMsgs['Error']  = "Error: form data was not received!";
            $errorMsgs['Result'] = "Failure: cannot add new apartment at this time!";
            echo json_encode($errorMsgs);
            return;
        }
        
        /* Extract User input file data */
        if (isset($_FILES[$name_images]['tmp_name']) && (!empty($_FILES[$name_images]['tmp_name']))) 
        {
            $apartImgNames  = $_FILES[$name_images]['name'];
            $apartImgFiles   = $_FILES[$name_images]['tmp_name'];
        }
        
        /* Create new Apartment object acccording to the form values */
        try {
            
            /* Set the user ID of this Apartment to this logged in landlord's ID */
            $apartment->setUserID($userID);
            
            /*
             * ---------Edit Apartment : set this Apartment ID-------------- 
             */
            if ((isset($apartForm[$name_apartmentId]))){
                $apartment->setID($apartForm[$name_apartmentId]);
            } else {
                $errorMsgs['Error']  = "Failure: ApartmentID for editing is missing!";
                $errorMsgs['Result'] = "Failure: ApartmentID for editing is missing!";
                echo json_encode($errorMsgs);
                return;
            }
            
            /*
             * ---------Edit Apartment : set this Apartment ID-------------- 
             */
            if ((isset($apartForm[$name_imageIds]))){
                $apartImgIDs = array_filter($apartForm[$name_imageIds], 'trim');
            } 
            
            /* ---------Set number of bedrooms in this Apartment------------ */
            if ((isset($apartForm[$name_bedroom])) 
                                    && (is_numeric($apartForm[$name_bedroom])) 
                                              && !($apartForm[$name_bedroom] < 0)) {
                $apartment->setBedRoomCount($apartForm[$name_bedroom]);
            } else {
                $errorMsgs[$name_bedroom] = "Enter a positive number of bedrooms";
            }

            /* ----------Set the price of this Apartment--------------------- */
            $priceRegex = "/^(\d*)\.?\d{0,2}$/";
            if ((isset($apartForm[$name_price])) 
                            && (is_numeric($apartForm[$name_price]))
                            && (preg_match($priceRegex, $apartForm[$name_price]))
                                                   && !($apartForm[$name_price] < 0)) {
                
                $apartment->setActualPrice($apartForm[$name_price]);
            } else {
                $errorMsgs[$name_price] = "Enter a price following any of these "
                                        . "number formats: ## or (many #).## or .## ";
            }

            /* ---------Set the starting renting term of this Apartment------ */
            if ((isset($apartForm[$name_startTerm])) 
                    && DateTime::createFromFormat('Y-m-d', $apartForm[$name_startTerm])) {

                $apartment->setBeginTerm($apartForm[$name_startTerm]);
            } else {
                $errorMsgs[$name_startTerm] = "Enter a valid date in the format:"
                                            . " mm/dd/yyyy";
            }

            /* ---------Set the end of the renting term of this Apartment---- */
            if ((isset($apartForm[$name_endTerm])) 
                        && DateTime::createFromFormat('Y-m-d', $apartForm[$name_endTerm])) {

                $apartment->setEndTerm($apartForm[$name_endTerm]);
            } else {
                $errorMsgs[$name_endTerm] = "Enter a valid date in the format:"
                                          . " mm/dd/yyyy";
            }

            /* ---------Set the zipcode of this Apartment-------------------- */
            if ((isset($apartForm[$name_zipcode])) 
                                    && is_numeric($apartForm[$name_zipcode]) 
                                             && !($apartForm[$name_zipcode] < 0)
                                             &&  (strlen($apartForm[$name_zipcode]) == 5)) {

                $apartment->setAreaCode($apartForm[$name_zipcode]);
            } else {
                $errorMsgs[$name_zipcode] = "Enter a valid 5 digit zipcode";
            }

            /* ---------Set the rest of the form data------------------------ */
            if (isset($apartForm[$name_description]))   { $apartment->setDescription($apartForm[$name_description]);}
            if (isset($apartForm[$name_petFriendly]))   { $apartment->setPetFriendly($apartForm[$name_petFriendly]);}
            if (isset($apartForm[$name_parking]))       { $apartment->setParking    ($apartForm[$name_parking]);    }
            if (isset($apartForm[$name_laundry]))       { $apartment->setLaundry    ($apartForm[$name_laundry]);    }
            if (isset($apartForm[$name_smoking]))       { $apartment->setSmoking    ($apartForm[$name_smoking]);    }
            if (isset($apartForm[$name_sharedRoom]))    { $apartment->setSharedRoom ($apartForm[$name_sharedRoom]); }
            if (isset($apartForm[$name_furnished]))     { $apartment->setFurnished  ($apartForm[$name_furnished]);  }
            if (isset($apartForm[$name_wheelChairAcc])) { $apartment->setWheelChairAccess($apartForm[$name_wheelChairAcc]); }
            
            /* ----------------------------------------------------------------
             * 
             *                  Image Handling
             * ----------------------------------------------------------------
             * The idea: 
             * Every image this Apartment has is listed in the form where
             * their Image IDs are stored inside a hidden <input>. This means for example,
             * <input images[3]> === <input hidden image_id[3]>, therefore we can
             * check each image listing sequentially for any changes. Any new additional
             * images will have a hidden value of empty ''. Any manual input of over
             * existing images[] will take on the accompanied image_id[], thus
             * implying the edit since $_FILES['tmp_name'][?] will not be empty.
             * ----------------------------------------------------------------
             */
            
            /*
             * Cross check current images of this Apartment with any IDs unfounded 
             * in $apartForm. If a record is not found then in $apartForm then delete it
             * from the database (means the user manually deselected it in form).
             */
            $imageRecords = $this->apartment_db->getImageDB($apartForm[$name_apartmentId]);
            foreach ($imageRecords as $imageRecord){
                if (!in_array($imageRecord->id, $apartImgIDs)){
                    $this->apartment_db->deleteImage($imageRecord->id);
                }
            }
            
            /*
             * NOTE:
             * All images that were already in the database are listed first. 
             * Thus, we can determine that each ID and initial set of image 
             * elements are sequentially linked.
             */
            
            /* 
             * Update/swap any images the landlord has decided to. Any updating
             * images should already have their determined ID, which is in the
             * <input type="hidden"> element.
             */
            for ($index = 0; $index < count($apartImgIDs); $index++){
                if (!empty(trim($apartImgFiles[$index]))){
                    $this->apartment_db->editImageDB( $apartImgIDs[$index],
                                                      $apartImgNames[$index],
                                                      file_get_contents($apartImgFiles[$index]));
                }
            }
            
            /* 
             * Add any new images the landlord given. Notice that index start
             * with the value of image ID array since none of the remaining images
             * should have a pre-existing ID.
             */
            for ($index = count($apartImgIDs); $index < count($apartImgFiles); $index++){
                if (!empty(trim($apartImgFiles[$index]))){
                    $this->apartment_db->addToImageDB(  $apartForm[$name_apartmentId],
                                                        $apartImgNames[$index],
                                                        file_get_contents($apartImgFiles[$index]));
                }
            }
            
            
            /* If not error messages thus far then add Apartment to database */
            if (empty($errorMsgs)) {
                /* Add apartment to Apartment database */
                $this->apartment_db->editApartment($apartment);
                $errorMsgs['Result'] = "Apartment has been successfully edited!";
            }
            
        } catch (Exception $exception) {
            $errorMsgs['Error']  = $exception->getMessage();
            $errorMsgs['Result'] = "Failure: cannot edit apartment at this time!";
            echo json_encode($errorMsgs);
            return;
        }
        
        echo json_encode($errorMsgs);
        
        return $apartment;
    }
    
    /**
     * Delete the specified Apartment.
     * 
     * <strong>The apartment ID is passed in via the URL since deletion is
     * not done through a HTML form element.</strong>
     * 
     * @param int $apartmentId
     */
    public function deleteApartment()
    {
        $userType = 0;
        if( isset($_COOKIE["myPlace_userType"]))
            $userType = $_COOKIE["myPlace_userType"];
        if( isset($_COOKIE["myPlace_userID"]))
            $userID = $_COOKIE["myPlace_userID"];
        
        $errorMsgs = array();
        
        /* Verify that the User is a landlord (i.e usertype == 1 == landlord.) */
        if ($userType != 1) {
            $errorMsgs['Error'] = "You must be a landlord who's signed in to add a new apartment!";
            echo json_encode($errorMsgs);
            return;
        }
        
        /* Verify that the landlord owns the Apartment he/she wants to edit */
        if (isset($apartForm[$name_apartmentId])) {
            $apartmentRecord = $this->apartment_db->getApartment($apartForm[$name_apartmentId]);
            if ($apartmentRecord->user_id != $userID){
                $errorMsgs['Error'] = "This apartment doesn't belong to you!";
                echo json_encode($errorMsgs);
                return;
            }
        }
        
        try {
            
            /* If not error messages thus far then add Apartment to database */
            if (empty($errorMsgs)) {
                /* delete Apartment from database */
                $this->apartment_db->deleteApartment($apartForm[$name_apartmentId]);
                $errorMsgs['Result'] = "Apartment has been successfully deleted!";
            }
            
        } catch (Exception $ex) {
            
            $errorMsgs['Error']  = $exception->getMessage();
            $errorMsgs['Result'] = "Failure: cannot delete apartment at this time!";
            echo json_encode($errorMsgs);
            return;
        }
        
        echo json_encode($errorMsgs);
        
        return;
    }
    
}
