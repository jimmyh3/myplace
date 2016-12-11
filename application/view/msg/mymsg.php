<!DOCTYPE html>
<html>
<title>myMessages</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">

<div id="headerwrap">
    <div class="container">
        <div class="row">
            <h1>myMessages</h1>
            <br>
            <h3>Messages from interested SFSU students</h3>
            <p><a href="<?php echo URL; ?>home" class="w3-btn w3-padding-large w3-large">APARTMENTS</a></p>
            <br>
            <br>
            <div class="col-lg-6 col-lg-offset-3">
            </div>
        </div>
    </div><!-- /container -->
</div><!-- /headerwrap -->   

<div class="container">
    <h2>myMessages</h2>
    <p>Interested students contacted you</p>
    <p>"<"Insert REPLY button later">"</p>  
    <table class="table table-hover">
        <?php        
        // default to 1 for testing purposes
        $user_id ="1";
        
        if(isset($_COOKIE["myPlace_userID"])){
            $user_id = $_COOKIE["myPlace_userID"];
        }
        
        $aid = $_GET['apartment_id'];
        echo "Apartment ID: ";
        print_r($aid);
        echo "\n";
        echo "User ID: ";
        print_r($user_id);
        

        echo $this->displayMsg($aid, $user_id); ?>
<!--        <thead>
            <tr>
                <th>Date</th>
                <th>Name</th>
                <th>Message</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>10/11/16</td>
                <td>John</td>
                <td>Hi..</td>
                <td>john@example.com</td>
            </tr>
            <tr>
                <td>11/3/16</td>
                <td>Mary</td>
                <td>I'm..</td>
                <td>mary@example.com</td>
            </tr>
            <tr>
                <td>11/5/16</td>
                <td>July</td>
                <td>Interested..</td>
                <td>july@example.com</td>
            </tr>
        </tbody>
    </table>-->
</div>