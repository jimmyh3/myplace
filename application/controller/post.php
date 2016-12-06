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
    public function displyLandlordApartments($user_id){
        // get from DB landlord apartments 
        $apartments = $this->model->getLandLordApartments($user_id); 
        if(!$apartments){
            //display No Apartments
            echo "No Apartments Listed"; 
        }else{
            foreach($apartments as $apartment){
                // enter loop format here 
            }
        }
    }
    
}

