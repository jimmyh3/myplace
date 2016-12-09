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
    
    public function displayMsg()
    {
        $result ="";
        $messages = $this->apartment_db->getAllMessages();
//        $users = $this->user_db->getUser(1);
//        print_r($users);
//        print_r($users->email);
        $result .='<table class="table table-hover">
        <thead>
            <tr>
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
//            $users = $this->user_db->getUser(1);
            $result .= '<tr><td>'.htmlspecialchars($message->aid).'</td>';
            $result .= '<td>'.htmlspecialchars($message->idMessages).'</td>';
            $result .= '<td>'.htmlspecialchars($message->parent_id).'</td>';
            $result .= '<td>'.htmlspecialchars($message->message_recipient).'</td>';
            $result .= '<td>'.htmlspecialchars($message->message).'</td>';
            $message_recipient = $message->message_recipient;
            $users = $this->user_db->getUser($message_recipient);
//            print_r($user);
//            $result .= '<td>'.htmlspecialchars($user->email).'</td></tr>';
            
            foreach($users as $user) {
//                $user = getUser($message->message_recipient);
                $result .= '<td>'.htmlspecialchars($user->email).'</td></tr>';
            }

        }
        
//        foreach ($users as $user)
//        {
//            $user = getUser($message->message_recepient);
//            $result .= '<td>'.htmlspecialchars($user->email).'</td></tr>';
//        }
        
        $result .= '</tbody></table>';
        
        return $result;
    }
   
    
}

