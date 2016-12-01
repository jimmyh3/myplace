<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * Description of user
 * 
 * @author Ilya
 */

class User {
    // type: int
    private $userID = 0;
    
    // type: string
    private $email;
    
    // type: string
    private $userName;
    
    // type: string
    private $password;
    
    // type: int 
    // (0 = student, 1 = landlord)
    public $userType;
    
    public function __construct( $email, $userName, $password, $type){
        $this->email = $this->validateEmail( $email);
        $this->userName = $userName;
        $this->password = $this->encryptPassword( $password);
        $this->userType = $type;
    }
    
    public function constructFromDB( $db_user) {
        $this->userID = $db_user->id;
        $this->email = $db_user->email;
        $this->userName = $db_user->name;
        $this->password = $db_user->password;
        $this->userType = $db_user->usertype;
    } 
    
    private function encryptPassword( $password) {
        // TODO encrypt password
        return $password;
    }
}

