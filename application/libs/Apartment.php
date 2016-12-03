<?php

/**
 * Description of Apartment
 *
 * @author Jimmy
 */
class Apartment {
    
    /** @var int */
    public $id = NULL; //must be set.
    
    /** @var String */
    public $title = "";
    
    /** @var int */
    public $user_id = NULL; //must be set.
    
    /** @var int */
    public $areaCode = 0;
    
    /** @var double */
    public $actualPrice = 0.0;
    
     /** @var date */
    public $beginTerm = "";
    
     /** @var date */
    public $endTerm = "";
    
    /** @var boolean */
    public $parking = false;     //0 == MySQL FALSE
    
    /** @var boolean */
    public $petFriendly = false; //0 == MySQL FALSE
    
    /** @var String */
    public $description = "";
    
    /** @var int */
    public $bedroom = 0;
    
    /**
     * @var String - BLOB data that is the thumbnail for this apartment.
     */
    public $thumbnail = NULL;
    
    /** @var boolean */
    public $smoking = false;
    
    /** @var boolean */
    public $laundry = false;
    
    /** @var boolean */
    public $sharedRoom = false;
    
    /** @var boolean */
    public $furnished = false;
    
    /** @var boolean */
    public $wheelChairAccess = false;
    
    /** @var String[] */
    public $tags = array();
    
    /** @var String */
    public $rentalTerm = "";
    
    /**
     * @var String[] - array of BLOBs that are images for this apartment.
     */
    public $apartmentImages = array();
    
    
    public function __construct() {
        
    }
    
    /**
     * 
     * @param int $zip_code - used for Google Maps
     */
    public function createMap($zip_code)
    {
        //TODO: implement this.
    }
}
