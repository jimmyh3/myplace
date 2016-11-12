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
    public $apartment_id;
    /** @var int */
    public $areaCode;
    /** @var double */
    public $priceRange;
    /** @var String */
    public $rentalTerm;
    /** @var String */
    public $image;
    /** @var boolean */
    public $parking;
    /** @var boolean */
    public $petFriendly;
    /** @var String */
    public $description;
    /** @var String */
    public $thumbnail;
    /** @var int */
    public $bedroom;
    /** @var String[] */
    public $tags;
    
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
