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
            if( password_verify( $results_array['Password'], $results->password)) { //passsword is correct
                setcookie( "myPlace_userID", $user->getID(), time() + (84600 * 7), '/'); // create a login cookie that expires after a week
                setcookie( "myPlace_userType", $user->getType(), time() + (84600 * 7), '/');
                setcookie( "myPlace_user", $user->getName(), time() + (84600 * 7), '/');
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
    }
    
    public function logout() {
        $user = '';
        if( isset($_COOKIE["myPlace_user"])) { //unload the cookies and expire them
            unset($_COOKIE["myPlace_user"]);
            setcookie( "myPlace_user", 'none', time() - 3600, '/'); 
        }
        
        if( isset($_COOKIE["myPlace_userID"])) {
            unset($_COOKIE["myPlace_userID"]);
            setcookie( "myPlace_userID", 'none', time() - 3600, '/');
        }
        
        if( isset($_COOKIE["myPlace_userType"])) {
            unset($_COOKIE["myPlace_userType"]);
            setcookie( "myPlace_userType", 'none', time() - 3600, '/');
        }
        echo $this->formatLogout();    
    }
    
    protected function validateEmail( $email) {
        $email_validation = explode( '@', $email);
        return $email_validation[1] == "mail.sfsu.edu" ? $email: false;   
    }
    
    protected function formatLogin() {
        return '<a id="ajax_logout" onclick="logout()" data-toggle="tooltip" data-placement="bottom" title="Logout"><span class="glyphicon glyphicon-log-out"></span> Welcome ' . $this->user . '</a>';        
    }
    
    protected function formatLogout() { 
        return '<a href="#signup" data-toggle="modal" data-target=".bs-modal-sm" ><span class="glyphicon glyphicon-log-in"></span> Log in/Sign up</a>';
    }
    
    protected function getUser() {
        return $this->user;
    }
}
