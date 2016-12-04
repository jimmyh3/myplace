<?php


/**
 * ---------------------------------------------------------------
 * 12/4/2016
 * Testing ground...
 * 
 * DON'T DELETE ME !!! AT LEAST NOT UNTIL NOTHING HERE IS USED ANYMORE.
 * Put whatever here to make actual things work....for the moment.
 * 
 * ---------------------------------------------------------------
 * @author Jimmy
 */
class TEST {
    //put your code here
    
    private static $db;
    private static $user_db;
    private static $apartment_db;
    
    private static function openConnection()
    {
        //Still uses config.php settings
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
        self::$db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
        
        self::$apartment_db = new ApartmentDB(self::$db);
        self::$user_db      = new UserDB(self::$db);
    }
    
    public static function getLocalDummyLandlordUser()
    {
        $id = 1;
        $name = "DummyLandlord";
        $email = "dummylandlord@gmail.com";
        $password = "dummylandlordpassword";
        $usertype = 1;
        
        return new User($id, $email, $name, $password, $usertype);
    }
    
    public static function getLocalDummyStudentUser()
    {
        $id = 0;
        $name = "DummyStudent";
        $email = "dummystudent@gmail.com";
        $password = "dummystudentpassword";
        $usertype = 0;
        
        return new User($id, $email, $name, $password, $usertype);
    }
    
    /**
     * Retrieves all database record, select top one, and re-add to test addApartment()
     * in ApartmentDB.php.
     * DON'T CALL THIS UNLESS YOU WANT A DUPLICATE RECORD ADDED.
     * 
     * Date: 12/4/16 - Worked
     */
    public static function getAddApartmentToDB()
    {
        self::openConnection();
        $apartmentRecords = self::$apartment_db->search(array(),array());
        
        $apartment = self::$apartment_db->dbRecordToApartment($apartmentRecords[0]);
        self::$apartment_db->addApartment($apartment);
    }
}
