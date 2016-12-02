<?php

/*
 * 
 * Author: Ilya
 */

class PageTemplate extends Controller {
    
    protected $user = '';
    
    protected function search() {
        // TODO maybe move from home.php
    }
    
    protected function formatApartment() {
        // TODO move from home.php
    }
    
    public function login() {
        $results = "login default";
        if( isset( $_POST['userinfo']))
            $results = $_POST['userinfo'];
        
        $results_array = array();
        parse_str(rawurldecode( $results), $results_array);
        
        $results = $this->user_db->hasUser( $results_array["Email"]);
        
        if( $results) { // if user exists in db
            $user = new User( $results->id, $results->email, $results->name, $results->password, $results->usertype);
            if( $user->encryptPassword( $results_array["Password"]) == $user->getPassword()) { // password it correct
                $this->user = $user->getName();
                $results = $this->formatLogin();
            } else {
                // wrong password error
                $results = "Error-WPW";
            }
        } else { // user not found in db
            // user not found error
            $results = "Error-UNF";
        } 
        
        echo $results;
        //create cookie with user info
    }
    
    public function logout() {
        $user = '';
        //TODO create logout
        //remove cookie with user info
    }
    
    public function checkLogin() {
        // TODO check if implementation needed
    }
    
    protected function validateEmail( $email) {
        $email_validation = explode( '@', $email);
        return $email_validation[1] == "mail.sfsu.edu" ? $email: false;   
    }
    
    protected function formatLogin() {
        return "Login successful as " . $user;
        // TODO format page html for logged in user
        
    }
    
    protected function formatLogout() { 
        // TODO format page html for logged out user
    }
}
