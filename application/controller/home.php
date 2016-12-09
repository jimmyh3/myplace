<?php
/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

class Home extends PageTemplate
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
        
    }

    /*
     * 
     * Takes user registration data and attempts to add user to database
     */
    public function register( ) {
        $results = "Register default";
        if( isset( $_POST['userinfo']))
            $results = $_POST['userinfo'];
        
        $results_array = array();
        parse_str(rawurldecode( $results), $results_array);
        
        // if registering as landlord then no need for email validation
        // if student registration must end with @mail.sfsu.edu
        if( $results_array["registerAs"] == "landlord" || $this->validateEmail($results_array["Email"])) {
            if( !( $this->user_db->hasUser( $results_array["Email"]))) { // user doesn't already exist
                $user_type = null;
                switch( $results_array["registerAs"]) {
                    case "student":
                        $user_type = 0;
                        break;
                    case "landlord":
                        $user_type = 1;
                        break;
                }
                
                $user = new User( 0, $results_array["Email"], $results_array["Username"], $results_array["Password"], $user_type);
                $user->setPassword( $user->encryptPassword( $user->getPassword()));
                //echo( $user->getPassword());
                if( $this->user_db->addUser( $user)) { // adding user to db successful
                    setcookie( "myPlace_userID", $this->user_db->hasUser( $user->getEmail())->id, time() + (84600 * 7), '/'); // create a login cookie that expires after a week
                    setcookie( "myPlace_userType", $user->getType(), time() + (84600 * 7), '/');
                    setcookie( "myPlace_user", $user->getName(), time() + (84600 * 7), '/');
                    $this->user = $user->getName();
                    $results = $this->formatLogin();
                } else { // failed to add user
                    // Error adding user failed
                    $results = "Error-AUF";
                }
            }
        } else { // student registering with email that is not @mail.sfsu.edu
            // Error wrong email format
            $results = "Error-WEF";
        }
        
        echo $results;
    }
          
    public function getFilters() {
        if( isset($_POST['filters'])) {
            echo $_POST['filters'];
        } else 
            echo "Filters not found";
    }
}
