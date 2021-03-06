<?php

/**
 * Description of User
 *
 * @author Jimmy, Ilya
 */
class User {
    
    private $userID     = 0;
    private $email      = "";
    private $name       = "";
    private $password   = "";
    private $userType   = 0;
    
    public function __construct( $id, $email, $userName, $password, $type){
        $this->userID = $id;
        $this->email = $email;
        $this->name = $userName;
        $this->password = $password;
        $this->userType = $type;
    }
    
//    public function constructFromDB( $db_user) {
//        $this->userID = $db_user->id;
//        $this->email = $db_user->email;
//        $this->userName = $db_user->name;
//        $this->password = $db_user->password;
//        $this->userType = $db_user->usertype;
//    } 
    
    public function encryptPassword( $password) {
        // TODO encrypt password
        return password_hash( $password, PASSWORD_DEFAULT);
    }
    
    /**
     * Set the user's ID.
     * @param int $id - value to set user ID to.
     */
    public function setID($id)
    {
        $this->userID = $id;
    }
    
    /**
     * Set the user's email;
     * @param String $email - value to set the user's email to.
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    /**
     * Set the user's name.
     * @param String $name - name of this user.
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    
    /**
     * Set the user's password.
     * @param String $password - password of this user's account.
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
    
    /**
     * Set the type of this user.
     * @param int $userType - 0 for student, 1 for landlords.
     */
    public function setType($userType)
    {
        $this->userType = $userType;
    }
    
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
    
    public function getPassword()
    {
        return $this->password;
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