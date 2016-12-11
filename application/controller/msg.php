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
        $name_message = "Message";
        $name_aid = "aid";
        $name_messageRecipient = "MessageRecipient";
        
        $messageForm = array();
        $message = new Message();
        
        if($_POST) {
            $messageForm = array_filter($_POST);
        } else {
            throw new Exception ("Failure: could not send message");
        }

        if (isset($_COOKIE["myPlace_userID"]))
                $userID = $_COOKIE["myPlace_userID"];
        
        $message->setParentID($userID);
        if (isset($messageForm[$aid]))
            $message->setAID ($messageForm[$name_aid]);
        if (isset($messageForm[$name_messageRecipient]))
            $message->setMessageRecipient ($messageForm[$name_messageRecipient]);
        if (isset($messageForm[$name_message]))
            $message->setMessage ($messageForm[$name_message]);
        
        print_r($messageForm);
        
        $this->message_db->addMessage($message);
        
        return $message;
        
//        if (isset $messageForm['aid'])
        
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
                <th>aid</th>
                <th>idMessages</th>
                <th>parent_id</th>
                <th>message_recipient</th>
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
            $result .= '<td>'.htmlspecialchars($message->aid).'</td>';
            $result .= '<td>'.htmlspecialchars($message->idMessages).'</td>';
            $result .= '<td>'.htmlspecialchars($message->parent_id).'</td>';
            $result .= '<td>'.htmlspecialchars($message->message_recipient).'</td>';
            $result .= '<td>'.htmlspecialchars($message->message).'</td>';

            foreach($users as $user) {
                $result .= '<td>'.htmlspecialchars($user->email).'</td></tr>';
            }
        }
        
        $result .= '</tbody></table>';        
        return $result;
    }
   
    
}

