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
        if (isset($_POST['add-aprt-form'])){
            
            $apartForm  = array();

            $rawFormElements = filter_input(INPUT_POST, 'add-aprt-form');
            parse_str(rawurldecode( $rawFormElements), $apartForm);
           
            foreach ($apartForm as $key=>$val)
            {
                echo "<p>".$key . " " . $val . "</p>";
            }
            
            
            
            //-------DUMMY USER------------------------
            
            //TODO: remove this line if TEST no longer required.
            require_once APP . 'test/TEST.php';
            $user       = TEST::getDummyLandlordUser();
            $user->setName($apartForm['Name']);
            $user->setEmail($apartForm['Email']);
            //$user->setPhone($apartForm['Number']);    //Phone number stored where?
            
            //-------DUMMY USER------------------------
            
            
            $apartment  = new Apartment();
            
            
            if (isset($apartForm['Bedroom'])) {
                $apartment->bedroom             = $apartForm['Bedroom'];
            }
            if (isset($apartForm['Price'])) {
                $apartment->actualPrice         = $apartForm['Price'];
            }
            if (isset($apartForm['StartTerm'])) {
                $apartment->beginTerm           = $apartForm['StartTerm'];
            }
            if (isset($apartForm['EndTerm'])) {
                $apartment->endTerm             = $apartForm['EndTerm'];
            }
            if (isset($apartForm['ZipCode'])) {
                $apartment->areaCode            = $apartForm['ZipCode'];
            }
            if (isset($apartForm['Description'])) {
                $apartment->description         = $apartForm['Description'];
            }
            if (isset($apartForm['PetFriendly'])) {
                $apartment->petFriendly         = $apartForm['PetFriendly'];
            }
            if (isset($apartForm['Parking'])) {
                $apartment->parking             = $apartForm['Parking'];
            }
            if (isset($apartForm['Laundry'])) {
                $apartment->laundry = $apartForm['Laundry'];
            }
            if (isset($apartForm['Smoking'])) {
                $apartment->smoking             = $apartForm['Smoking'];
            }
            if (isset($apartForm['SharedRoom'])) {
                $apartment->sharedRoom          = $apartForm['SharedRoom'];
            }
            if (isset($apartForm['Furnished'])) {
                $apartment->furnished           = $apartForm['Furnished'];
            }
            if (isset($apartForm['WheelChairAccess'])) {
                $apartment->wheelChairAccess    = $apartForm['WheelChairAccess'];
            }
            if (isset($apartForm['images'])) {
                $apartment->addImages($apartForm['images']);
            }
            
            $result = $this->apartment_db->addApartment($apartment);
            
            echo "<p>" . $result . "</p>";
        }else{
            echo "Failed to add apartment!";
        }
        
    }
}
