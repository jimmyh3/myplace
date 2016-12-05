<?php

/**
 * Description of landlord
 *
 * @author Jimmy
 */
class Landlord extends PageTemplate{
    
    public function index()
    {
        /*
         * --------------------------------------------------------------------
         * TODO: need to merge other .php pages that shouldn't exist into here.
         * --------------------------------------------------------------------
         */
        
    }
    
    public function addApartment()
    {
        //-------DUMMY USER--DELETE THIS WHEN $user in PageTemplate is setup----
                 /* TODO: use actual User when User is fully implemented. */
                require_once APP . 'test/TEST.php';
                $user       = TEST::getLocalDummyLandlordUser();
                //$user->setName($apartForm['Name']);     //This should be set by $user object.
                //$user->setEmail($apartForm['Email']);   //This should be set by $user object.
                //$user->setPhone($apartForm['Number']);  //Phone number stored where?
        //-------DUMMY USER------------------------
                
        /* Return if form data was somehow not sent over */
        if (!isset($_POST['add-aprt-form'])) {
            echo "Failure: Adding apartment form data has not been sent!";
            return;
        }        
                
        /* Verify that the User is a landlord (i.e usertype == 1 == landlord.) */
        if ($user->getType() !== 1)
            { throw new Exception("You must be a landlord who's signed in to add a new apartment!"); }
            
        
        $apartment  = new Apartment();  //Apartment object to add to database.
        $isAdded    = false;            //if Apartment was added successfully.
        $message   = "";                //response message to echo to Client.
        
        $apartForm  = array(); //will hold the POST-ed form data.

        /* Parse the form data and store it in $apartForm */
        $rawFormElements = filter_input(INPUT_POST, 'add-aprt-form');
        parse_str(rawurldecode( $rawFormElements), $apartForm);

        /* Create new Apartment object acccording to the form values */
        try {
            //if (isset($apartForm['UserID']))   { $apartment->setBedRoomCount($apartForm['UserID']); }
            if (isset($apartForm['Bedroom']))   { $apartment->setBedRoomCount($apartForm['Bedroom']); }
            if (isset($apartForm['Price']))     { $apartment->setActualPrice($apartForm['Price']);  }
            if (isset($apartForm['StartTerm'])) { $apartment->setBeginTerm($apartForm['StartTerm']); }
            if (isset($apartForm['EndTerm']))   { $apartment->setEndTerm($apartForm['EndTerm']);    }
            if (isset($apartForm['ZipCode']))   { $apartment->setAreaCode($apartForm['ZipCode']);   }
            if (isset($apartForm['Description']))   { $apartment->setDescription($apartForm['Description']); }
            if (isset($apartForm['PetFriendly']))   { $apartment->setPetFriendly($apartForm['PetFriendly']); }
            if (isset($apartForm['Parking']))   { $apartment->setParking($apartForm['Parking']); }
            if (isset($apartForm['Laundry']))   { $apartment->setLaundry($apartForm['Laundry']); }
            if (isset($apartForm['Smoking']))   { $apartment->setSmoking($apartForm['Smoking']); }
            if (isset($apartForm['SharedRoom']))    { $apartment->setSharedRoom($apartForm['SharedRoom']); }
            if (isset($apartForm['Furnished'])) { $apartment->setFurnished($apartForm['Furnished']); }
            if (isset($apartForm['WheelChairAccess'])) { $apartment->setWheelChairAccess($apartForm['WheelChairAccess']); }
            if (isset($apartForm['images']))    { $apartment->addImages($apartForm['images']); }
            /* Set the 'user_id' of Apartment to equal this logged in landlord's ID */
            $apartment->setUserID($user->getID());
            
            /* Add apartment to Apartment database */
            $isAdded = $this->apartment_db->addApartment($apartment);
            $message = "Apartment has been successfully added!";
        } catch (Exception $exception) {
            $message = $exception->getMessage();
        }
        
        echo $message;
        
        return $isAdded;
    }
}
