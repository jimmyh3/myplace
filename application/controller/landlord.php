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
        if (!isset($_POST['add-aprt-form'])) {
            echo "Failure: Adding apartment form data has not been sent!";
            return;
        }

        $apartForm  = array();

        $rawFormElements = filter_input(INPUT_POST, 'add-aprt-form');
        parse_str(rawurldecode( $rawFormElements), $apartForm);

        //-------DUMMY USER------------------------

        //TODO: remove this line if TEST no longer required.
        require_once APP . 'test/TEST.php';
        $user       = TEST::getDummyLandlordUser();
        $user->setName($apartForm['Name']);
        $user->setEmail($apartForm['Email']);
        //$user->setPhone($apartForm['Number']);    //Phone number stored where?

        //-------DUMMY USER------------------------


        $apartment  = new Apartment();

        try{
            
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

            $result = $this->apartment_db->addApartment($apartment);
            
        } catch (Exception $exception) {
            echo $exception->getMessage() . "\n Failed to add new apartment ";
        }
        
        echo "<p>Apartment has been successfully added!</p>";
            
    }
}
