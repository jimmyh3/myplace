<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Image
 *
 * @author Jimmy
 */
class Image {
    //put your code here
    
    /** @var int */
    private $id = NULL; //must be set.
    
    /** @var String */
    private $name = "";
    
    /** @var int */
    private $apartment_id = NULL; //must be set.
    
    /** @var String - BLOB data that is the thumbnail for this apartment. */
    private $image = NULL;
    
    
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
            throw new Exception("The given image ID is not a valid integer!");
        }
        return $result;
    }
    
    /**
     * Get the title of this Apartment.
     * @return string or null
     */
    public function getName(){
        return $this->name;
    }
    
    /**
     * Set the title of this Apartment.
     * @param string or null: $title
     * @return boolean
     * @throws Exception
     */
    public function setName($name){
        $result = false;
        if (is_string($name)) {
            $this->name = $name;
            $result = true;
        } elseif (is_null($name)) {
            $this->name = "";
            $result = true;
        } else {
            throw new Exception("The given name is not a string!");
        }
        return $result;
    }
    
    /**
     * Get the ID of the Apartment of which this Image belongs to.
     * @return int
     */
    public function getApartmentID(){
        return $this->apartment_id;
    }
    
    /**
     * Set the ID of the Apartment of which this Image belongs to.
     * 
     * @param  int $apartmentId
     * @return boolean
     * @throws Exception
     */
    public function setApartmentID($apartmentId){
        $result = false;
        if (filter_var($apartmentId, FILTER_VALIDATE_INT)) {
            $this->apartment_id = $apartmentId;
            $result = true;
        } else {
            throw new Exception("The given Apartment ID is not a valid integer!");
        }
        return $result;
    }
    
    /**
     * Get the image data.
     * @return boolean
     */
    public function getImage(){
        return $this->image;
    }
    
    /**
     * Set the image data.
     * @param string $blob - image BLOB
     * @return boolean
     * @throws Exception
     */
    public function setImage($blob){
        $result = false;
        if (is_string($blob) || is_null($blob)) {
            $this->image = $blob;
            $result = true;
        } else {
            throw new Exception("Failed to add image!");
        }
        return $result;
    }
    
}
