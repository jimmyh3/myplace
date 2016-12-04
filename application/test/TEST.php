<?php


/**
 * ---------------------------------------------------------------
 * 
 * 
 * Put whatever here to make actual things work....for the moment.
 * 
 * 
 * ---------------------------------------------------------------
 * @author Jimmy
 */
class TEST extends Controller {
    //put your code here
    
    public static function getDummyLandlordUser()
    {
        $id = 1;
        $name = "DummyLandlord";
        $email = "dummylandlord@gmail.com";
        $password = "dummylandlordpassword";
        $usertype = 1;
        
        return new User($id, $email, $name, $password, $usertype);
    }
    
    public static function getDummyStudentUser()
    {
        $id = 0;
        $name = "DummyStudent";
        $email = "dummystudent@gmail.com";
        $password = "dummystudentpassword";
        $usertype = 0;
        
        return new User($id, $email, $name, $password, $usertype);
    }
    
    // function used for testing
    public static function getUsers() {
        $sql = "SELECT * FROM User";
        
        $stmt = $this->db->prepare( $sql);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
}
