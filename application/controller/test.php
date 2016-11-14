<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of test
 *
 * @author Jimmy
 */
class Test extends Controller{
    
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        //require APP . 'libs/Apartment.php';
        
        $aprt_addMe = new Apartment();
        $aprt_addMe->apartment_id = 12;
        $aprt_addMe->actualPrice = 5000.00;
        $aprt_addMe->areaCode = 94122;
        $aprt_addMe->bedroom = 2;
        $aprt_addMe->beginTerm = "2016-03-21";
        $aprt_addMe->endTerm   = "2016-11-11";
        $aprt_addMe->parking   = 0;
        $aprt_addMe->petFriendly = 1;
        $aprt_addMe->rentalTerm = "Not for sale";
        $aprt_addMe->tags   = array("Testing add apartment", "show me in tags");
        $aprt_addMe->user_id = 1;
        
        //Test simple search for ALL apartments;
        $apartments = $this->apartmentDB->search(array(), array());
        
//        //addApartment() also works. Read the commit.
//        $test_addApartment      = $this->apartmentDB->addApartment($aprt_addMe);
         
//        //EDIT WORKS KIND OF ... BLOBs causing issues.
//        $aprt = $apartments[2];     //Set $aprt to equal first result; Assume there is one.
//        $aprt->areaCode = 94177;    //Original area_code = 94166
//        $test_editApartment     = $this->apartmentDB->editApartment($aprt);
        
//        DELETE WORKS FINE. 
//        $test_deleteApartment = $this->apartmentDB->deleteApartment(6);
        
        $test_getLandLordAprt   = $this->apartmentDB->getLandLordApartments(1);
        
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/test/index.php';
        require APP . 'view/_templates/footer.php';
    }
    
}
