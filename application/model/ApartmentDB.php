<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ApartmentDB
 *
 * @author Jimmy
 */
class ApartmentDB extends Model{
    
    /**
     * @param object $db A PDO database connection
     */
    public function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
    
    /**
     * 
     * @param Apartment $apt
     */
    public function addApartment(Apartment $apt)
    {
        
    }
    
    /**
     * 
     * @param int $apt_id
     */
    public function deleteApartment($apt_id)
    {
        
    }
    
    /**
     * 
     * @param Apartment $apt
     */
    public function editApartment(Apartment $apt)
    {
        
    }
    
    /**
     * Search the database and return apartments that contains at least some of 
     * the values referenced by the given arrays of search parameters.
     * @param array $query
     * @param array $filters
     * @return Apartment $apartments - an array of Apartment records from the database.
     */
    public function search(array $query, array $filters){
        //TODO: Implement this.
        
        //return $apartments;
    }
    
    /**
     * 
     * @param int $user_id
     */
    public function getLandLordApartments($user_id)
    {
        
    }
}
