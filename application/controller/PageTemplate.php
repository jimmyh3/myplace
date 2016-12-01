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
        
        //TODO create login
    }
    
    public function logout() {
        $user = '';
        //TODO create logout
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
}
