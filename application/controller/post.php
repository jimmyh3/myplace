<?php

class Post extends Controller
{

    public function index()
    {
        // load views

        require APP . 'view/_templates/header.php';
        require APP . 'view/post/mypost.php';
        require APP . 'view/_templates/footer.php';
    }
    
    public function postPage()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/post/mypost.php';
        require APP . 'view/_templates/footer.php';
    }
    
   
    public function displayApartments( $user_id )
    {
        // this section is to be moved to mypost.php 
//        if(isset($_COOKIE["myPlace_userID"])){
//            $user_id = $_COOKIE["myPlace_userID"]; 
//        }
        $result =""; 
        $user       = $this->user_db->getUser($user_id)[0];
        $apartmentRecords = $this->apartment_db->getLandLordApartments($user_id); 
        
        if(!$apartmentRecords){
            $result .= 'No Apartments Listed'; 
        }
        else{
            foreach ($apartmentRecords as $apartmentRecord){
                
                $apartment = $this->apartment_db->dbRecordToApartment($apartmentRecord);
                
                
                $landlordName        = htmlspecialchars($user->name, ENT_QUOTES, 'UTF-8');
                $landlordEmail       = htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8');
                //$landlordNumber;
                
                $apartID            = htmlspecialchars($apartment->getID(), ENT_QUOTES, 'UTF-8');
                $apartTitle         = htmlspecialchars($apartment->getTitle(), ENT_QUOTES, 'UTF-8');
                $apartBedrooms      = htmlspecialchars($apartment->getBedRoomCount(), ENT_QUOTES, 'UTF-8');
                $apartPrice         = htmlspecialchars($apartment->getActualPrice(), ENT_QUOTES, 'UTF-8');
                $apartStartTerm     = htmlspecialchars($apartment->getBeginTerm(), ENT_QUOTES, 'UTF-8');
                $apartEndTerm       = htmlspecialchars($apartment->getEndTerm(), ENT_QUOTES, 'UTF-8');
                $apartZipCode       = htmlspecialchars($apartment->getAreaCode(), ENT_QUOTES, 'UTF-8');         
                $apartDescription   = htmlspecialchars($apartment->getDescription(), ENT_QUOTES, 'UTF-8');
                
                $checkedbox = htmlspecialchars("checked='checked'", ENT_QUOTES, 'UTF-8');
                
                /* checked='checked' == HTML attribute to select checkbox */
                $apartPetFriendly    = ($apartment->isPetFriendly()) ? $checkedbox : "";
                $apartParking        = ($apartment->hasParking()) ? $checkedbox : "";
                $apartLaundry        = ($apartment->hasLaundry()) ? $checkedbox : "";
                $apartSmoking        = ($apartment->hasSmoking()) ? $checkedbox : "";
                $apartSharedRoom     = ($apartment->isSharedRoom()) ? $checkedbox : "";
                $apartFurnished      = ($apartment->isFurnished()) ? $checkedbox : "";
                $apartWheelChairAcc  = ($apartment->hasWheelChairAccess()) ? $checkedbox : "";
                   
                // Get images belong to the current apartment
                $apartImages = $this->apartment_db->getImageDB($apartmentRecord->id);
                
                if(isset($apartmentRecord->thumbnail)){
                    $apartThumbnail =   '<img src="data:image/jpeg;base64,'
                                        . base64_encode( $apartmentRecord->thumbnail) 
                                        . '" alt="" style="cursor: pointer;height:150px;width:320px;" alt="">';
                } else {
                    $apartThumbnail = '<img src="http://placehold.it/320x150" alt="">';
                }
                
                /*
                 * The view to be outputed is located in required file.
                 * Each iteration of this loop will fill the parameters typed
                 * in required file.
                 */
                require APP . 'view/post/mypost-apartment-listing.php';
                
            }
        }
    }
    
    //return $result;
}

?>