<?php

require APP . 'libs/User.php';

/**
 * Description of UserDB
 *
 * @author Jimmy
 */
class UserDB {
    
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
    
    public function addUser(User $user)
    {
        
    }
    
    public function checkUser(User $user)
    {
        
    }
}
