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
        $returnMsgs     = array();          //holds validation response messages.
        $apartment      = new Apartment();  //Apartment object to add to database.
        
        /* Form <input name=""> for quick reference */
        $name_title         = "Title";
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
            $returnMsgs['Failure'] = "You must be a landlord who's signed in to add a new apartment!";
            return;
        }
        
        /* Return if no form data was sent over */
        if ($_POST){ 
            $apartForm = array_filter($_POST);
        } else {
            $returnMsgs['Error']   = "Error: form data was not received!";
            $returnMsgs['Failure'] = "Failure: cannot add new apartment at this time!";
            echo json_encode($returnMsgs);
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
            
            /* ---------Set the title of this apartment------------ */
            if ((isset($apartForm[$name_title]))) {
                $apartment->setTitle($apartForm[$name_title]);
            }
            
            /* ---------Set number of bedrooms in this Apartment------------ */
            if ((isset($apartForm[$name_bedroom])) 
                                    && (is_numeric($apartForm[$name_bedroom])) 
                                              && !($apartForm[$name_bedroom] < 0)) {
                $apartment->setBedRoomCount($apartForm[$name_bedroom]);
            } else {
                $returnMsgs[$name_bedroom] = "Enter a positive number of bedrooms";
            }

            /* ----------Set the price of this Apartment--------------------- */
            $priceRegex = "/^(\d*)\.?\d{0,2}$/";
            if ((isset($apartForm[$name_price])) 
                            && (is_numeric($apartForm[$name_price]))
                            && ($apartForm[$name_price] < 99999999)
                            && (preg_match($priceRegex, $apartForm[$name_price]))
                                                   && !($apartForm[$name_price] < 0)) {
                
                $apartment->setActualPrice($apartForm[$name_price]);
            } else {
                $returnMsgs[$name_price] = "Enter a price following any of these "
                                        . "number formats: ## or (many #).## or .## "
                                        . "(AT MOST 8 digits)";
            }

            /* ---------Set the starting renting term of this Apartment------ */
            if ((isset($apartForm[$name_startTerm])) 
                    && DateTime::createFromFormat('Y-m-d', $apartForm[$name_startTerm])) {

                $apartment->setBeginTerm($apartForm[$name_startTerm]);
            } else {
                $returnMsgs[$name_startTerm] = "Enter a valid date in the format:"
                                            . " mm/dd/yyyy";
            }

            /* ---------Set the end of the renting term of this Apartment---- */
            if ((isset($apartForm[$name_endTerm])) 
                        && DateTime::createFromFormat('Y-m-d', $apartForm[$name_endTerm])) {

                $apartment->setEndTerm($apartForm[$name_endTerm]);
            } else {
                $returnMsgs[$name_endTerm] = "Enter a valid date in the format:"
                                          . " mm/dd/yyyy";
            }

            /* ---------Set the zipcode of this Apartment-------------------- */
            if ((isset($apartForm[$name_zipcode])) 
                                    && is_numeric($apartForm[$name_zipcode]) 
                                             && !($apartForm[$name_zipcode] < 0)
                                             &&  (strlen($apartForm[$name_zipcode]) == 5)) {

                $apartment->setAreaCode($apartForm[$name_zipcode]);
            } else {
                $returnMsgs[$name_zipcode] = "Enter a valid 5 digit zipcode";
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
            
            /* Set the Apartment thumbnail to the first image of image files */
            for ($index = 0; $index < count($apartImgFiles); $index++){
                if (!empty(trim($apartImgFiles[$index]))) {
                    $apartment->setThumbnail(file_get_contents($apartImgFiles[$index]));
                    break;
                }
            }
            
            /* If not error messages thus far then add Apartment to database */
            if (empty($returnMsgs)) {
                /* Add apartment to Apartment database */
                $this->apartment_db->addApartment($apartment);
                $returnMsgs['Success'] = "Apartment has been successfully added!";
            }
            
        } catch (Exception $exception) {
            $returnMsgs['Error']   = $exception->getMessage();
            $returnMsgs['Failure'] = "Failure: cannot add new apartment at this time!";
            echo json_encode($returnMsgs);
            return;
        }
        
        echo json_encode($returnMsgs);
        
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
        $apartImgsCount     = 0;                //total image inputs received (blank or not)
        //-------------------------------------------------------
        
        
        /* Variables */
        $apartForm       = array();          //holds the 'Add Apartment Form' data. 
        $apartImgFiles   = array();          //holds the images sent from the form.
        $returnMsgs      = array();          //holds validation response messages.
        $apartment       = new Apartment();  //Apartment object to add to database.
        
        /* Form <input name=""> for quick reference */
        $name_title         = "Title";
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
            $returnMsgs['Error'] = "You must be a landlord who's signed in to add a new apartment!";
            echo json_encode($returnMsgs);
            return;
        }
        
        /* Return if no form data was sent over */
        if ($_POST){ 
            $apartForm = array_filter($_POST);
        } else {
            $returnMsgs['Error']   = "Error: form data was not received!";
            $returnMsgs['Failure'] = "Failure: cannot add new apartment at this time!";
            echo json_encode($returnMsgs);
            return;
        }
        
        /* Extract User input file data */
        if (isset($_FILES[$name_images]['tmp_name']) && (!empty($_FILES[$name_images]['tmp_name']))) 
        {
            $apartImgNames   = $_FILES[$name_images]['name'];
            $apartImgFiles   = $_FILES[$name_images]['tmp_name'];
            $apartImgsCount  = count($apartImgFiles);
        }
        
        /* Verify that the landlord owns the Apartment he/she wants to edit */
        if (isset($apartForm[$name_apartmentId])) {
            $apartmentRecord = $this->apartment_db->getApartment($apartForm[$name_apartmentId]);
            if ($apartmentRecord->user_id != $userID){
                $returnMsgs['Error'] = "This apartment doesn't belong to you!";
                echo json_encode($returnMsgs);
                return;
            }
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
                $returnMsgs['Error']   = "Failure: target Apartment ID for editing is missing!";
                $returnMsgs['Failure'] = "Failure: target Apartment ID for editing is missing!";
                echo json_encode($returnMsgs);
                return;
            }
            
            /*
             * ---------Edit Apartment : set this Apartment ID-------------- 
             */
            if ((isset($apartForm[$name_imageIds]))){
                $apartImgIDs = $apartForm[$name_imageIds];
            }
            
            /* ---------Set the title of this apartment------------ */
            if ((isset($apartForm[$name_title]))) {
                $apartment->setTitle($apartForm[$name_title]);
            }
            
            /* ---------Set number of bedrooms in this Apartment------------ */
            if ((isset($apartForm[$name_bedroom])) 
                                    && (is_numeric($apartForm[$name_bedroom])) 
                                              && !($apartForm[$name_bedroom] < 0)) {
                $apartment->setBedRoomCount($apartForm[$name_bedroom]);
            } else {
                $returnMsgs[$name_bedroom] = "Enter a positive number of bedrooms";
            }

            /* ----------Set the price of this Apartment--------------------- */
            $priceRegex = "/^(\d*)\.?\d{0,2}$/";
            if ((isset($apartForm[$name_price])) 
                            && (is_numeric($apartForm[$name_price]))
                            && ($apartForm[$name_price] < 99999999)
                            && (preg_match($priceRegex, $apartForm[$name_price]))
                                                   && !($apartForm[$name_price] < 0)) {
                
                $apartment->setActualPrice($apartForm[$name_price]);
            } else {
                $returnMsgs[$name_price] = "Enter a price following any of these "
                                        . "number formats: ## or (many #).## or .## "
                                        . "(AT MOST 8 digits)";
            }

            /* ---------Set the starting renting term of this Apartment------ */
            if ((isset($apartForm[$name_startTerm])) 
                    && DateTime::createFromFormat('Y-m-d', $apartForm[$name_startTerm])) {

                $apartment->setBeginTerm($apartForm[$name_startTerm]);
            } else {
                $returnMsgs[$name_startTerm] = "Enter a valid date in the format:"
                                            . " mm/dd/yyyy";
            }

            /* ---------Set the end of the renting term of this Apartment---- */
            if ((isset($apartForm[$name_endTerm])) 
                        && DateTime::createFromFormat('Y-m-d', $apartForm[$name_endTerm])) {

                $apartment->setEndTerm($apartForm[$name_endTerm]);
            } else {
                $returnMsgs[$name_endTerm] = "Enter a valid date in the format:"
                                          . " mm/dd/yyyy";
            }

            /* ---------Set the zipcode of this Apartment-------------------- */
            if ((isset($apartForm[$name_zipcode])) 
                                    && is_numeric($apartForm[$name_zipcode]) 
                                             && !($apartForm[$name_zipcode] < 0)
                                             &&  (strlen($apartForm[$name_zipcode]) == 5)) {

                $apartment->setAreaCode($apartForm[$name_zipcode]);
            } else {
                $returnMsgs[$name_zipcode] = "Enter a valid 5 digit zipcode";
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
             * 
             * NOTE:
             * All images that were already in the database are listed first. 
             * Thus, we can determine that each ID and initial set of image 
             * elements are sequentially linked.
             *
             * ----------------------------------------------------------------
             */
            
            $imageRecords = $this->apartment_db->getImageDB($apartForm[$name_apartmentId]);
            
            /*
             * Cross check current images of this Apartment with any IDs unfounded 
             * in $apartForm. If a record is not found then in $apartForm then delete it
             * from the database (means the user manually deselected it in form).
             */
            foreach ($imageRecords as $imageRecord){
                if (!in_array($imageRecord->id, $apartImgIDs)){
                    $this->apartment_db->deleteImage($imageRecord->id);
                }
            }
            
            /* 
             * Swap/Add any images the landlord has decided to. Any updating
             * images should already have their determined ID, which is in the
             * <input type="hidden"> element.
             */
            for ($index = 0; $index < $apartImgsCount; $index++){
                if (!empty(trim($apartImgFiles[$index]))){
                    /* If accompanied ID is not blank and is numeric, edit Image record. */
                    if (!empty(trim($apartImgIDs[$index])) && (is_numeric($apartImgIDs[$index]))) {
                        
                        $this->apartment_db->editImageDB(   $apartImgIDs[$index],
                                                            $apartImgNames[$index],
                                                            file_get_contents($apartImgFiles[$index]));
                        
                    /* If the file is given but not recognized ID, then add new image. */
                    } else {
                        $this->apartment_db->addToImageDB(  $apartForm[$name_apartmentId],
                                                            $apartImgNames[$index],
                                                            file_get_contents($apartImgFiles[$index]));
                    }
                }
            }
            
            /*
             * Set the Apartment thumbnail to the first image of image files.
             */
            for ($index = 0; $index < $apartImgsCount; $index++){
                
                /* If an existing ID is found first, set thumbnail to that image. */
                if (!empty(trim($apartImgIDs[$index]) && (is_numeric ($apartImgIDs[$index])))) {
                    if (!empty(trim($apartImgFiles[$index]))){
                        $apartment->setThumbnail(file_get_contents($apartImgFiles[$index]));
                        break;  //thumbnail is NULL by default.
                    } else {
                        /* Need to get the image since the existing BLOB is not a file */
                        $imageBlob = $this->apartment_db->getImage($apartImgIDs[$index])->image;
                        $apartment->setThumbnail($imageBlob);
                        break;
                    }
                }
                
                /* If a newly uploaded image is found first, then thumbnail is set to it. */
                if (!empty(trim($apartImgFiles[$index]))){
                    $apartment->setThumbnail(file_get_contents($apartImgFiles[$index]));
                    break;  //thumbnail is NULL by default.
                }
                
            }
            
            /* If not error messages thus far then add Apartment to database */
            if (empty($returnMsgs)) {
                /* Add apartment to Apartment database */
                $this->apartment_db->editApartment($apartment);
                $returnMsgs['Success'] = "Apartment has been successfully edited!";
            }
            
        } catch (Exception $exception) {
            $returnMsgs['Error']  = $exception->getMessage();
            $returnMsgs['Failure'] = "Failure: cannot edit apartment at this time!";
            echo json_encode($returnMsgs);
            return;
        }
        
        echo json_encode($returnMsgs);
        
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
        
        /* Variables */
        $returnMsgs = array();
        
        /* Form names */
        $name_apartmentId = "apartment_id";
        
        /* Verify that the User is a landlord (i.e usertype == 1 == landlord.) */
        if ($userType != 1) {
            $returnMsgs['Error'] = "You must be a landlord who's signed in to add a new apartment!";
            echo json_encode($returnMsgs);
            return;
        }
        
        /* Return if no form data was sent over */
        if ($_POST){ 
            $apartForm = array_filter($_POST);
        } else {
            $returnMsgs['Error']  = "Error: form data was not received!";
            $returnMsgs['Failure'] = "Failure: cannot delete apartment at this time!";
            echo json_encode($returnMsgs);
            return;
        }
        
        /* Verify that the landlord owns the Apartment he/she wants to delete */
        if (isset($apartForm[$name_apartmentId])) {
            $apartmentRecord = $this->apartment_db->getApartment($apartForm[$name_apartmentId]);
            if ($apartmentRecord->user_id != $userID){
                $returnMsgs['Error'] = "You are not allowed to delete this apartment!";
                echo json_encode($returnMsgs);
                return;
            }
        }
        
        try {
            /* If not error messages thus far then add Apartment to database */
            if (empty($returnMsgs)) {
                /* delete Apartment from database */
                $this->apartment_db->deleteApartment($apartForm[$name_apartmentId]);
                $returnMsgs['Success'] = "Apartment has been successfully deleted!";
            }
            
        } catch (Exception $ex) {
            
            $returnMsgs['Error']  = $exception->getMessage();
            $returnMsgs['Failure'] = "Failure: cannot delete apartment at this time!";
            echo json_encode($returnMsgs);
            return;
        }
        
        echo json_encode($returnMsgs);
        
        return;
    }
    
}
