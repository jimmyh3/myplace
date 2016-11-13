<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Apartment
 *
 * @author Jimmy
 */
class Apartment {
    
    /** @var int */
    public $apartment_id = NULL; //must be initialized.
    
    /** @var int */
    public $areaCode = 0;
    
    /** @var double */
    public $price = 0.0;
    
    /** @var String */
    public $rentalTerm = "''";
    
    /** @var String[] */
    public $image = array();
    
    /** @var boolean */
    public $parking = 0;        //0 == MySQL FALSE
    
    /** @var boolean */
    public $petFriendly = 0;    //0 == MySQL FALSE
    
    /** @var String */
    public $description = "''";
    
    /** @var String */
    public $thumbnail = "''";
    
    /** @var int */
    public $bedroom = 0;
    
    /** @var String[] */
    public $tags = array();
    
    
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
