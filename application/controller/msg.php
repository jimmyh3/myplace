<?php

class Msg extends Controller
{
    public function index()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/msg/mymsg.php';
        require APP . 'view/_templates/footer.php';
    }
    
    public function postPage()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/msg/mymsg.php';
        require APP . 'view/_templates/footer.php';
    }
    
    
    /*
     * aid = apartment id
     * parent_id = user id
     * idMessages = ???
     * message_recipient = apartment user_id
     * message = message
     * 
     * 
     */
    
    public function sendMsg()
    {
        $form = "no results";
        if( isset( $_POST['message']))
            $form = $_POST['message'];
        
        // form[ 0] = message
        // form[ 1] = apartment id
        // form[ 2] = recipient id
        $values = explode( "&",$form);
        
        $form = array();
        foreach( $values as $entry) {
            $keyval = explode( "=", $entry);
            $form[$keyval[ 0]] = $keyval[ 1];
        }
        
        $message = explode( "+" ,$form[ "Message"]);
        $form[ "Message"] = implode( " ", $message);
        
        // default to admin
        $userID = 1;
        
        if (isset($_COOKIE["myPlace_userID"]))
                $userID = $_COOKIE["myPlace_userID"];

        // apartment ID, message ID, user ID, recipient ID, message  
        $message = new Message( $form[ "aid"], 0, $userID, $form[ "messageRecipient"], $form[ "Message"]);
        
        $this->message_db->addMessage( $message);
        
        //TODO echo whatever results should be
    }

    public function displayMsg($aid, $user_id)
    {
        $result ="";
        
        // Using getAllMessages() for testing purposes, 
        // will use getMessages($aid, $user_id) in final version
        
//        $messages = $this->message_db->getAllMessages();
        $messages = $this->message_db->getMessages($aid, $user_id);
        
//        $all_useres = $this->user_db->getUsers();
//        
//        print_r($all_useres);

        
        $result .='<table class="table table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <!--<th>aid</th>
                <th>idMessages</th>
                <th>parent_id</th>
                <th>message_recipient</th>-->
                <th>message</th>
                <th>email</th>
            </tr>
        </thead>
        <tbody>';
        foreach($messages as $message) {
            
            $users = $this->user_db->getUser($message->parent_id);

            foreach($users as $user) {
                $result .= '<tr><td>'.htmlspecialchars($user->name).'</td>';
            }
            //$result .= '<td>'.htmlspecialchars($message->aid).'</td>';
            //$result .= '<td>'.htmlspecialchars($message->idMessages).'</td>';
            //$result .= '<td>'.htmlspecialchars($message->parent_id).'</td>';
            //$result .= '<td>'.htmlspecialchars($message->message_recipient).'</td>';
            $result .= '<td>'.htmlspecialchars($message->message).'</td>';

            foreach($users as $user) {
                $result .= '<td>'.htmlspecialchars($user->email).'</td></tr>';
            }
        }
        
        $result .= '</tbody></table>';        
        return $result;
    }
   
    
}

