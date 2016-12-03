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
    
    public function addApartment()
    {
        $rawFormElements = (isset($_POST['add-aprt-form'])) ?
                            filter_input(INPUT_POST, 'add-aprt-form') : "";
        
        $formElements = array();
        parse_str(rawurldecode( $rawFormElements), $formElements);
        
        foreach ($formElements as $key=>$val)
        {
            echo "<p>".$key."  ".$val."</p>";
        }
    }
    
    
}

