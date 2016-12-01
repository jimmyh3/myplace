<?php

/*
 * 
 * Author: Ilya
 */

class PageTemplate extends Controller {
    
    public $user = '';
    
    public function search() {
        // TODO move from home.php
    }
    
    private function formatApartment() {
        // TODO move from home.php
    }
    
    public function login() {
        $results = "login default";
        if( isset( $_POST['userinfo']))
            $results = $_POST['userinfo'];
        return $results;
        //TODO create login
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
    
    private function validateEmail( $email) {
        $email_validation = explode( '@', $email);
        if($email_validation[1] == "mail.sfsu.edu") {
            // TODO
        }
        return $email;
    }
    
    private function formatLogin() {
        // TODO format page html for logged in user
    }
    
    private function formatLogout() { 
        // TODO format page html for logged out user
    }
}
