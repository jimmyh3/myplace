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
    
    public function getID(){
        return $this->id;
    }
    
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
    
    public function getTitle(){
        return $this->title;
    }
    
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
    
    public function getUserID(){
        return $this->user_id;
    }
    
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
    
    public function getAreaCode(){
        return $this->areaCode;
    }
    
    public function setAreaCode($areaCode){
        $result = false;
        if (filter_var($areaCode, FILTER_VALIDATE_INT)) {
            $this->areaCode = $areaCode;
            $result = true;
        } else {
            throw new Exception("The given area code is not a valid integer!");
        }
        return $result;
    }
    
    public function getActualPrice(){
        return $this->actualPrice;
    }
    
    public function setActualPrice($actualPrice){
        $result = false;
        if (filter_var($actualPrice, FILTER_VALIDATE_FLOAT)) {
            $this->actualPrice = $actualPrice;
            $result = true;
        } else {
            throw new Exception("The given price is not a valid float!");
        }
        return $result;
    }
    
    public function getBeginTerm(){
        return $this->beginTerm;
    }
    
    public function setBeginTerm($year_month_day){
        //TODO: below is correctly implemented. Just need UI to send right format.
//        $date = DateTime::createFromFormat('Y-m-d', $year_month_day);
//        $this->beginTerm = $date->format('Y-m-d');
    }
    
    public function getEndTerm(){
        return $this->endTerm;
    }
    
    public function setEndTerm($year_month_day){
        //TODO: below is correctly implemented. Just need UI to send right format.
//        $date = DateTime::createFromFormat('Y-m-d', $year_month_day);
//        $this->endTerm = $date->format('Y-m-d');
    }
    
    public function getDescription(){
        return $this->description;
    }
    
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
    
    public function getBedRoomCount(){
        return $this->bedroom;
    }
    
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
    
    public function hasParking(){
        return $this->parking;
    }
    
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
    
    public function hasWheelChairAccess(){
        return $this->wheelChairAccess;
    }
    
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
    
    public function hasSmoking(){
        return $this->smoking;
    }
    
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
    
    public function hasLaundry(){
        return $this->laundry;
    }
    
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
    
    public function isPetFriendly(){
        return $this->petFriendly;
    }
    
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
    
    public function isSharedRoom(){
        return $this->sharedRoom;
    }
    
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
    
    public function isFurnished(){
        return $this->furnished;
    }
    
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
        
    
    public function getThumbnail(){
        return $this->thumbnail;
    }
    
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
    
    public function getImages(){
        return $this->images;
    }
    
    
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
