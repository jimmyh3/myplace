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
    
    public function sendMsg()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/msg/mymsg.php';
        require APP . 'view/_templates/footer.php';
    }
    //
    public function displayMsg($aid)
    {
        $result ="";
        
        // Using getAllMessages() for testing purposes, 
        // will use getMessages($aid, $user_id) in final version
        
//        $messages = $this->apartment_db->getAllMessages();
        $messages = $this->apartment_db->getMessages($aid, 1);

        
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

