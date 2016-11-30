<?php

/**
 * Description of User
 *
 * @author Jimmy
 */
class User {
    
    private $userID     = 0;
    private $email      = "";
    private $name       = "";
    private $userType   = 0;
    
    /**
     * Get the unique user ID.
     * @return int - userID;
     */
    public function getID()
    {
        return $this->userID;
    }
    
    /**
     * Get the user's email.
     * @return String - email.
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * Get the user's name.
     * @return String - user's name.
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Get the user's type (student or landlord)
     * @return int - 0 = student, 1 = landlord
     */
    public function getType()
    {
        return $this->userType;
    }
    
}
