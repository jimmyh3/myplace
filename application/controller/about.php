<?php

class About extends Controller
{
    public function index()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/about/myabout.php';
        require APP . 'view/_templates/footer.php';
    }
    
    public function aboutPage()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/about/myabout.php';
        require APP . 'view/_templates/footer.php';
    } 
}

