<?php

/**
 * Description of Apartment
 *
 * @author Jimmy
 */
class Apartment {
    
    /** @var int */
    private $id = NULL; //must be set.
    
    /** @var String */
    private $title = "";
    
    /** @var int */
    private $user_id = NULL; //must be set.
    
    /** @var int */
    private $areaCode = 0;
    
    /** @var double */
    private $actualPrice = 0.0;
    
     /** @var date */
    private $beginTerm = "";
    
     /** @var date */
    private $endTerm = "";
    
    /** @var boolean */
    private $parking = false;     //0 == MySQL FALSE
    
    /** @var boolean */
    private $petFriendly = false; //0 == MySQL FALSE
    
    /** @var String */
    private $description = "";
    
    /** @var int */
    private $bedroom = 0;
    
    /**
     * @var String - BLOB data that is the thumbnail for this apartment.
     */
    private $thumbnail = NULL;
    
    /** @var boolean */
    private $smoking = false;
    
    /** @var boolean */
    private $laundry = false;
    
    /** @var boolean */
    private $sharedRoom = false;
    
    /** @var boolean */
    private $furnished = false;
    
    /** @var boolean */
    private $wheelChairAccess = false;
    
//    /** @var String[] */
//    private $tags = array();
//    
//    /** @var String */
//    private $rentalTerm = "";
    
    /** @var String[] - array of BLOBs that are images for this apartment. */
    private $images = array();
    
    
    
    public function __construct() {
        
    }
    
    /**
     * Get Apartment_id.
     * @return int $id
     */
    public function getID(){
        return $this->id;
    }
    
    /**
     * Set Apartment ID.
     * @param type $id - the id to set apartment_id to.
     * @return boolean
     * @throws Exception
     */
    public function setID($id){
        $result = false;
        if (filter_var($id, FILTER_VALIDATE_INT)) {
            $this->id = $id;
            $result = true;
        } else {
            throw new Exception("The given aparment ID is not a valid integer!");
        }
        return $result;
    }
    
    /**
     * Get the title of this Apartment.
     * @return string or null
     */
    public function getTitle(){
        return $this->title;
    }
    
    /**
     * Set the title of this Apartment.
     * @param string or null: $title
     * @return boolean
     * @throws Exception
     */
    public function setTitle($title){
        $result = false;
        if (is_string($title)) {
            $this->title = $title;
            $result = true;
        } elseif (is_null($title)) {
            $this->title = "";
        } else {
            throw new Exception("The given title is not a string!");
        }
        return $result;
    }
    
    /**
     * Get the ID of the User of which this Apartment belongs to.
     * @return int
     */
    public function getUserID(){
        return $this->user_id;
    }
    
    /**
     * Set the ID of the User of which this Apartment belongs to.
     * @param int $userID
     * @return boolean
     * @throws Exception
     */
    public function setUserID($userID){
        $result = false;
        if (filter_var($userID, FILTER_VALIDATE_INT)) {
            $this->user_id = $userID;
            $result = true;
        } else {
            throw new Exception("The given user ID is not a valid integer!");
        }
        return $result;
    }
    
    /**
     * Get the Apartment's zip code.
     * @return int
     */
    public function getAreaCode(){
        return $this->areaCode;
    }
    
    /**
     * Set the Apartment's zip code.
     * @param int $areaCode
     * @return boolean
     * @throws Exception
     */
    public function setAreaCode($areaCode){
        $result = false;
        if (filter_var($areaCode,   FILTER_VALIDATE_INT) && 
                                    strlen($areaCode) === 5) {
            $this->areaCode = $areaCode;
            $result = true;
        } else {
            throw new Exception("The given area code is not a valid zip code!");
        }
        return $result;
    }
    
    /**
     * Get the renting price of the Apartment.
     * @return double
     */
    public function getActualPrice(){
        return $this->actualPrice;
    }
    
    /**
     * Set the price of the Apartment.
     * @param double $actualPrice
     * @return boolean
     * @throws Exception
     */
    public function setActualPrice($actualPrice){
        $result = false;
        if (filter_var($actualPrice, FILTER_VALIDATE_FLOAT)) {
            $this->actualPrice = $actualPrice;
            $result = true;
        } else {
            throw new Exception("The given price is not a valid decimal!");
        }
        return $result;
    }
    
    /**
     * Get the date of which the renting term begins.
     * @return string - date
     */
    public function getBeginTerm(){
        return $this->beginTerm;
    }
    
    /**
     * Set the date of which the renting term begins.
     * @param string $year_month_day - date
     * @throws Exception
     */
    public function setBeginTerm($year_month_day){
        $date = DateTime::createFromFormat('Y-m-d', $year_month_day);
        if ($date) {
            $this->beginTerm = $date->format('Y-m-d');
        } else {
            throw new Exception("The starting term is not a valid date!");
        }
    }
    
    /**
     * Get the date of which the renting term ends.
     * @return string - date
     */
    public function getEndTerm(){
        return $this->endTerm;
    }
    
    /**
     * Get the date of which the renting term ends.
     * @param string $year_month_day - date
     * @throws Exception
     */
    public function setEndTerm($year_month_day){
        $date = DateTime::createFromFormat('Y-m-d', $year_month_day);
        if ($date) {
            $this->endTerm = $date->format('Y-m-d');
        } else {
            throw new Exception("The ending term is not a valid date!");
        }
    }
    
    /**
     * Get the Apartment's description.
     * @return string
     */
    public function getDescription(){
        return $this->description;
    }
    
    /**
     * Set the Apartment's description
     * @param string $description
     * @return boolean
     * @throws Exception
     */
    public function setDescription($description){
        $result = false;
        if (is_string($description)) {
            $this->description = $description;
            $result = true;
        } elseif (is_null($description)) {
            $this->description = "";
        } else {
            throw new Exception("The given description is not a string!");
        }
        return $result;
    }
    
    /**
     * Get the total count of available bedrooms.
     * @return type
     */
    public function getBedRoomCount(){
        return $this->bedroom;
    }
    
    /**
     * Set the total count of available bedrooms.
     * @param int $count
     * @return boolean
     * @throws Exception
     */
    public function setBedRoomCount($count){
        $result = false;
        if (filter_var($count, FILTER_VALIDATE_INT) && $count >= 0) {
            $this->bedroom = $count;
            $result = true;
        } else {
            throw new Exception("The given bedroom count is not a valid integer!");
        }
        return $result;
    }
    
    /**
     * Check if this Apartment supports parking.
     * @return boolean
     */
    public function hasParking(){
        return $this->parking;
    }
    
    /**
     * Change if this Apartment supports parking.
     * @param boolean $boolean
     * @return boolean
     * @throws Exception
     */
    public function setParking($boolean){
        $result = false;
        $bool   = filter_var($boolean,  FILTER_VALIDATE_BOOLEAN, 
                                        FILTER_NULL_ON_FAILURE  );
        if (is_bool($bool)) {
            $this->parking = $bool;
            $result = true;
        } else {
            throw new Exception("The given parking setting is not true or false!");
        }
        return $result;
    }
    
    /**
     * Check if this Apartment has wheel chair access.
     * @return boolean
     */
    public function hasWheelChairAccess(){
        return $this->wheelChairAccess;
    }
    
    /**
     * Change if this Apartment has wheel chair access.
     * @param boolean $boolean
     * @return boolean
     * @throws Exception
     */
    public function setWheelChairAccess($boolean){
        $result = false;
        $bool   = filter_var($boolean,  FILTER_VALIDATE_BOOLEAN, 
                                        FILTER_NULL_ON_FAILURE  );
        if (is_bool($bool)) {
            $this->wheelChairAccess = $bool;
            $result = true;
        } else {
            throw new Exception("The given wheelchair access setting is not true or false!");
        }
        return $result;
    }
    
    /**
     * Check if this Apartment allows smoking.
     * @return boolean
     */
    public function hasSmoking(){
        return $this->smoking;
    }
    
    /**
     * Change if this Apartment allows smoking.
     * @param boolean $boolean
     * @return boolean
     * @throws Exception
     */
    public function setSmoking($boolean){
        $result = false;
        $bool   = filter_var($boolean,  FILTER_VALIDATE_BOOLEAN, 
                                        FILTER_NULL_ON_FAILURE  );
        if (is_bool($bool)) {
            $this->smoking = $bool;
            $result = true;
        } else {
            throw new Exception("The given smoking setting is not true or false!");
        }
        return $result;
    }
    
    /**
     * Check if this Apartment supports laundry cleaning.
     * @return boolean
     */
    public function hasLaundry(){
        return $this->laundry;
    }
    
    /**
     * Change if this Apartment supports laundry cleaning.
     * @throws Exception
     * @return boolean
     */
    public function setLaundry($boolean){
        $result = false;
        $bool   = filter_var($boolean,  FILTER_VALIDATE_BOOLEAN, 
                                        FILTER_NULL_ON_FAILURE  );
        if (is_bool($bool)) {
            $this->laundry = $bool;
            $result = true;
        } else {
            throw new Exception("The given laundry setting is not true or false!");
        }
        return $result;
    }
    
    /**
     * Check if this Apartment allow pets.
     * @return boolean
     */
    public function isPetFriendly(){
        return $this->petFriendly;
    }
    
    /**
     * Change if this Apartment allow pets.
     * @throws Exception
     * @return boolean
     */
    public function setPetFriendly($boolean){
        $result = false;
        $bool   = filter_var($boolean,  FILTER_VALIDATE_BOOLEAN, 
                                        FILTER_NULL_ON_FAILURE  );
        if (is_bool($bool)) {
            $this->petFriendly = $bool;
            $result = true;
        } else {
            throw new Exception("The given pet friendly setting is not true or false!");
        }
        return $result;
    }
    
    /**
     * Check if this Apartment is a shared room.
     * @return boolean
     */
    public function isSharedRoom(){
        return $this->sharedRoom;
    }
    
    /**
     * Change if this Apartment is a shared room.
     * @throws Exception
     * @return boolean
     */
    public function setSharedRoom($boolean){
        $result = false;
        $bool   = filter_var($boolean,  FILTER_VALIDATE_BOOLEAN, 
                                        FILTER_NULL_ON_FAILURE  );
        if (is_bool($bool)) {
            $this->sharedRoom = $bool;
            $result = true;
        } else {
            throw new Exception("The given shared room setting is not true or false!");
        }
        return $result;
    }
    
    /**
     * Check if this Apartment is furnished.
     * @return boolean
     */
    public function isFurnished(){
        return $this->furnished;
    }
    
    /**
     * Change if this Apartment is furnished.
     * @throws Exception
     * @return boolean
     */
    public function setFurnished($boolean){
        $result = false;
        $bool   = filter_var($boolean,  FILTER_VALIDATE_BOOLEAN, 
                                        FILTER_NULL_ON_FAILURE  );
        if (is_bool($bool)) {
            $this->furnished = $bool;
            $result = true;
        } else {
            throw new Exception("The given furnished setting is not true or false!");
        }
        return $result;
    }
        
    /**
     * Get the thumbnail of which this Apartment features.
     * @return boolean
     */
    public function getThumbnail(){
        return $this->thumbnail;
    }
    
    /**
     * Set the thumbnail of which this Apartment features.
     * @param string $blob - image BLOB
     * @return boolean
     * @throws Exception
     */
    public function setThumbnail($blob){
        $result = false;
        if (is_string($blob) || is_null($blob)) {
            $this->thumbnail = $blob;
            $result = true;
        } else {
            throw new Exception("Failed to add thumbnail!");
        }
        return $result;
    }
    
    /**
     * Get the set of images of this Apartment.
     * @return array
     */
    public function getImages(){
        return $this->images;
    }
    
    /**
     * Add the set the of images to this Apartment.
     * @param array $images
     * @return boolean
     * @throws Exception
     */
    public function addImages(array $images)
    {
        foreach ($images as $image){
            if (is_string($image) || is_null($image)) {
                array_push($this->images, $image);
            } else {
                throw new Exception("Failed to add images!");
            }
        }
        return true;
    }
    
    /**
     * Get the total count of images for this Apartment.
     * @return int
     */
    public function getImagesCount(){
        return count($this->images);
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
