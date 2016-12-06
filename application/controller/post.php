<?php

class Post extends Controller
{
    public function index()
    {
        // load views
        $apartments = $this->model->getApartmentDB();
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
    
   
    public function displayApartments($user_id)
    {
        if(isset($_COOKIE["myPlace_userID"])){
            $user_id = $_COOKIE["myPlace_userID"]; 
        }
        $result =""; 
        $apartments = $this->apartment_db->getLandLordApartments($user_id); 
        
        if(!$apartments){
            $result .= "NO LISTINGS! Please Click ADD APARTMENT TO ADD AN APARTMENT"; 
            return $result; 
        }else{
            
            
            return $result;
        }
        
        
    }
}

